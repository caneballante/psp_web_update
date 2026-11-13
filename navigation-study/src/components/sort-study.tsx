"use client";

import Link from "next/link";
import { useRouter } from "next/navigation";
import { useEffect, useMemo, useRef, useState } from "react";
import { SiteHeader } from "@/components/site-header";
import { NAVIGATION_OPTIONS } from "@/data/navigation-options";
import { STUDY_MODE, navigationVersionsForMode } from "@/data/study-config";
import { ENABLED_TOPIC_CARDS, TOPIC_CARD_BY_ID } from "@/data/topic-cards";
import { DownloadResultRepository } from "@/lib/export-results";
import {
  createParticipantId, createWorkingSession, INTRO_STORAGE_KEY, SESSION_STORAGE_KEY,
} from "@/lib/study-session";
import type {
  IntroductionAnswers, StudyResult, WorkingCardState, WorkingStudySession,
} from "@/lib/study-types";

interface PlacementReceipt {
  cardId: string;
  previousCategoryId: string;
  categoryId: string;
}

const EMPTY_INTRO: IntroductionAnswers = {
  participant: { nameOrInitials: "", role: "", familiarity: "" },
  navigationComparison: { reflectsFuturePSP: "", makesSenseExternally: "", comment: "" },
};

export function SortStudy() {
  const router = useRouter();
  const versions = useMemo(() => navigationVersionsForMode(STUDY_MODE), []);
  const [session, setSession] = useState<WorkingStudySession | null>(null);
  const [intro, setIntro] = useState<IntroductionAnswers>(EMPTY_INTRO);
  const draggedCardId = useRef("");
  const rewardTimer = useRef<number | null>(null);
  const [storageNotice, setStorageNotice] = useState("");
  const [selectedCardId, setSelectedCardId] = useState("");
  const [activeDropZoneId, setActiveDropZoneId] = useState("");
  const [celebratingCategoryId, setCelebratingCategoryId] = useState("");
  const [placementReceipt, setPlacementReceipt] = useState<PlacementReceipt | null>(null);
  const [liveStatus, setLiveStatus] = useState("");

  useEffect(() => {
    const frame = window.requestAnimationFrame(() => {
      try {
        const savedIntro = window.sessionStorage.getItem(INTRO_STORAGE_KEY);
        if (savedIntro) setIntro(JSON.parse(savedIntro) as IntroductionAnswers);
        const savedSession = window.sessionStorage.getItem(SESSION_STORAGE_KEY);
        if (savedSession) {
          const parsed = JSON.parse(savedSession) as WorkingStudySession;
          const expected = versions.join(",");
          const actual = parsed.sorts.map((sort) => sort.navigationVersion).join(",");
          if (expected === actual) {
            setSession(parsed);
            return;
          }
        }
      } catch {
        setStorageNotice("A previous unfinished session could not be restored. A new session was started.");
      }
      setSession(createWorkingSession(versions, createParticipantId()));
    });
    return () => window.cancelAnimationFrame(frame);
  }, [versions]);

  useEffect(() => {
    if (!session) return;
    try { window.sessionStorage.setItem(SESSION_STORAGE_KEY, JSON.stringify(session)); } catch {}
  }, [session]);

  useEffect(() => {
    if (!session || session.phase === "COMPLETE") return;
    const warn = (event: BeforeUnloadEvent) => { event.preventDefault(); };
    window.addEventListener("beforeunload", warn);
    return () => window.removeEventListener("beforeunload", warn);
  }, [session]);

  useEffect(() => () => {
    if (rewardTimer.current !== null) window.clearTimeout(rewardTimer.current);
  }, []);

  useEffect(() => {
    const context = document.modelContext;
    if (!context?.registerTool || !session) return;
    const lifecycle = new AbortController();
    const currentSort = session.sorts[session.activeSortIndex];
    const option = NAVIGATION_OPTIONS[currentSort.navigationVersion];

    const registerTools = async () => {
      await context.registerTool({
        name: "read_sort_progress",
        title: "Read card-sort progress",
        description: "Read the current navigation version, sorting progress, and number of uncertain choices without changing the study.",
        inputSchema: { type: "object", properties: {}, additionalProperties: false },
        annotations: { readOnlyHint: true, untrustedContentHint: false },
        execute() {
          return {
            navigationVersion: currentSort.navigationVersion,
            sorted: Object.values(currentSort.cards).filter((card) => card.categoryId).length,
            total: ENABLED_TOPIC_CARDS.length,
            uncertain: Object.values(currentSort.cards).filter((card) => card.uncertain).length,
          };
        },
      }, { signal: lifecycle.signal });

      await context.registerTool({
        name: "assign_topic_cards",
        title: "Assign topic cards",
        description: "Place one or more visible study topic cards into categories in the current navigation structure, optionally updating confidence and comments.",
        inputSchema: {
          type: "object",
          properties: {
            assignments: {
              type: "array",
              minItems: 1,
              items: {
                type: "object",
                properties: {
                  cardId: { type: "string" },
                  categoryId: { type: "string" },
                  uncertain: { type: "boolean" },
                  comment: { type: "string" },
                },
                required: ["cardId", "categoryId"],
                additionalProperties: false,
              },
            },
          },
          required: ["assignments"],
          additionalProperties: false,
        },
        annotations: { readOnlyHint: false, untrustedContentHint: false },
        execute(input) {
          const assignments = (input as { assignments?: Array<{ cardId?: string; categoryId?: string; uncertain?: boolean; comment?: string }> }).assignments;
          if (!Array.isArray(assignments) || assignments.length === 0) throw new Error("assignments must be a non-empty array");
          const categoryIds = new Set(option.categories.map((category) => category.id));
          const nextCards = { ...currentSort.cards };
          assignments.forEach((assignment) => {
            if (!assignment.cardId || !nextCards[assignment.cardId]) throw new Error(`Unknown cardId: ${assignment.cardId ?? ""}`);
            if (!assignment.categoryId || !categoryIds.has(assignment.categoryId)) throw new Error(`Unknown categoryId: ${assignment.categoryId ?? ""}`);
            nextCards[assignment.cardId] = {
              ...nextCards[assignment.cardId],
              categoryId: assignment.categoryId,
              uncertain: assignment.uncertain ?? nextCards[assignment.cardId].uncertain,
              comment: assignment.comment ?? nextCards[assignment.cardId].comment,
            };
          });
          setSession((current) => current ? {
            ...current,
            sorts: current.sorts.map((sort, index) => index === current.activeSortIndex ? { ...sort, cards: nextCards } : sort),
          } : current);
          return { updated: assignments.length, navigationVersion: currentSort.navigationVersion };
        },
      }, { signal: lifecycle.signal });
    };

    void registerTools().catch(() => {});
    return () => lifecycle.abort();
  }, [session]);

  if (!session) {
    return <><SiteHeader /><main className="page-shell loading-state"><p>Preparing the card sort…</p></main></>;
  }

  const currentSort = session.sorts[session.activeSortIndex];
  const option = NAVIGATION_OPTIONS[currentSort.navigationVersion];
  const sortedCount = Object.values(currentSort.cards).filter((card) => card.categoryId).length;
  const uncertainCount = Object.values(currentSort.cards).filter((card) => card.uncertain).length;
  const complete = sortedCount === ENABLED_TOPIC_CARDS.length;

  function updateCard(cardId: string, patch: Partial<WorkingCardState>) {
    setSession((current) => {
      if (!current) return current;
      const sorts = current.sorts.map((sort, index) => index === current.activeSortIndex
        ? { ...sort, cards: { ...sort.cards, [cardId]: { ...sort.cards[cardId], ...patch } } }
        : sort);
      return { ...current, sorts };
    });
  }

  function placeCard(cardId: string, categoryId: string) {
    const cardState = currentSort.cards[cardId];
    if (!cardState || cardState.categoryId === categoryId) {
      setSelectedCardId("");
      setActiveDropZoneId("");
      draggedCardId.current = "";
      return;
    }

    const cardTitle = TOPIC_CARD_BY_ID.get(cardId)?.title ?? "Topic";
    const categoryTitle = categoryId
      ? option.categories.find((category) => category.id === categoryId)?.title ?? "category"
      : "the topic pile";

    setPlacementReceipt({ cardId, previousCategoryId: cardState.categoryId, categoryId });
    updateCard(cardId, { categoryId });
    setLiveStatus(`${cardTitle} placed in ${categoryTitle}.`);
    setSelectedCardId("");
    setActiveDropZoneId("");
    draggedCardId.current = "";

    if (categoryId) {
      setCelebratingCategoryId(categoryId);
      if (rewardTimer.current !== null) window.clearTimeout(rewardTimer.current);
      rewardTimer.current = window.setTimeout(() => setCelebratingCategoryId(""), 720);
    }
  }

  function undoLastPlacement() {
    if (!placementReceipt) return;
    const cardTitle = TOPIC_CARD_BY_ID.get(placementReceipt.cardId)?.title ?? "Topic";
    updateCard(placementReceipt.cardId, { categoryId: placementReceipt.previousCategoryId });
    setLiveStatus(`${cardTitle} returned to its previous location.`);
    setPlacementReceipt(null);
    setCelebratingCategoryId("");
  }

  function clearInteraction() {
    setSelectedCardId("");
    setPlacementReceipt(null);
    setCelebratingCategoryId("");
    setActiveDropZoneId("");
    draggedCardId.current = "";
  }

  function returnToSort() {
    clearInteraction();
    setSession((current) => current ? { ...current, phase: "SORT" } : current);
  }

  function advanceFromReview() {
    clearInteraction();
    setSession((current) => {
      if (!current) return current;
      if (current.activeSortIndex < current.sorts.length - 1) {
        return { ...current, activeSortIndex: current.activeSortIndex + 1, phase: "SORT" };
      }
      return { ...current, phase: "REVIEW" };
    });
  }

  function buildResult(current: WorkingStudySession): StudyResult {
    const completedAt = current.completedAt || new Date().toISOString();
    return {
      schemaVersion: "1.0",
      study: "PSP Website Navigation Card Sort",
      completedAt,
      participantId: current.participantId,
      participant: intro.participant,
      navigationComparison: intro.navigationComparison,
      sorts: current.sorts.map((sort) => ({
        navigationVersion: sort.navigationVersion,
        assignments: sort.cardOrder.map((cardId) => {
          const card = TOPIC_CARD_BY_ID.get(cardId)!;
          const category = NAVIGATION_OPTIONS[sort.navigationVersion].categories.find((item) => item.id === sort.cards[cardId].categoryId)!;
          return {
            cardId,
            cardTitle: card.title,
            categoryId: category.id,
            categoryTitle: category.title,
            uncertain: sort.cards[cardId].uncertain,
            comment: sort.cards[cardId].comment,
          };
        }),
      })),
      feedback: current.feedback,
    };
  }

  async function downloadResult() {
    if (!session) return;
    const completedAt = session.completedAt || new Date().toISOString();
    const completed: WorkingStudySession = { ...session, completedAt, downloaded: true, phase: "COMPLETE" };
    await new DownloadResultRepository().save(buildResult(completed));
    setSession(completed);
  }

  function startOver() {
    clearInteraction();
    const fresh = createWorkingSession(versions, createParticipantId());
    try {
      window.sessionStorage.removeItem(INTRO_STORAGE_KEY);
      window.sessionStorage.setItem(SESSION_STORAGE_KEY, JSON.stringify(fresh));
    } catch {}
    router.push("/");
  }

  if (session.phase === "COMPLETE") {
    return (
      <><SiteHeader /><main className="page-shell completion-page"><div className="completion-mark" aria-hidden="true">✓</div><p className="eyebrow">Results downloaded</p><h1>Thank you.</h1><p className="lede">Please send the downloaded results file to the PSP website redesign team.</p><div className="completion-actions"><button className="primary-button button-reset" onClick={downloadResult}>Download again</button><button className="secondary-button" onClick={startOver}>Start over</button><Link className="text-link" href="/results">Open the local analysis tool</Link></div></main></>
    );
  }

  const isLastSort = session.activeSortIndex === session.sorts.length - 1;

  if (session.phase === "REVIEW") {
    return (
      <><SiteHeader /><main className="page-shell review-page">
        <div className="sort-context"><div><p className="eyebrow">Review · {option.label}</p><h1>Check your placements.</h1><p>Cards marked with a dotted amber edge are choices you marked as uncertain.</p></div><button className="secondary-button" onClick={returnToSort}>← Return to sorting</button></div>
        <div className="review-grid">
          {option.categories.map((category) => {
            const cardIds = currentSort.cardOrder.filter((cardId) => currentSort.cards[cardId].categoryId === category.id);
            return <section key={category.id} className="review-category"><h2>{category.title}</h2><span>{cardIds.length} topics</span><ul>{cardIds.map((cardId) => { const card = TOPIC_CARD_BY_ID.get(cardId)!; const state = currentSort.cards[cardId]; return <li key={cardId} className={state.uncertain ? "is-uncertain" : ""}><strong>{card.title}</strong>{state.comment && <p>“{state.comment}”</p>}</li>; })}</ul></section>;
          })}
        </div>
        {isLastSort ? (
          <section className="feedback-panel" aria-labelledby="feedback-title"><p className="eyebrow">Final reflection</p><h2 id="feedback-title">A few last questions</h2>
            <fieldset className="choice-fieldset"><legend>Was there a category you wished existed but didn’t?</legend><div className="segmented-options segmented-options--two"><label className="choice-chip"><input type="radio" name="missing-category" checked={!session.feedback.wantedAdditionalCategory} onChange={() => setSession((current) => current ? { ...current, feedback: { ...current.feedback, wantedAdditionalCategory: false, suggestedCategory: "" } } : current)} /><span>No</span></label><label className="choice-chip"><input type="radio" name="missing-category" checked={session.feedback.wantedAdditionalCategory} onChange={() => setSession((current) => current ? { ...current, feedback: { ...current.feedback, wantedAdditionalCategory: true } } : current)} /><span>Yes</span></label></div></fieldset>
            {session.feedback.wantedAdditionalCategory && <label className="field field--wide"><span>What category would you add?</span><input value={session.feedback.suggestedCategory} onChange={(event) => setSession((current) => current ? { ...current, feedback: { ...current.feedback, suggestedCategory: event.target.value } } : current)} /></label>}
            <label className="field field--wide"><span>Were any navigation labels especially unclear? <small>Optional</small></span><textarea value={session.feedback.unclearLabels} onChange={(event) => setSession((current) => current ? { ...current, feedback: { ...current.feedback, unclearLabels: event.target.value } } : current)} /></label>
            <label className="field field--wide"><span>Any other comments about this navigation? <small>Optional</small></span><textarea value={session.feedback.generalComments} onChange={(event) => setSession((current) => current ? { ...current, feedback: { ...current.feedback, generalComments: event.target.value } } : current)} /></label>
            <div className="review-submit"><div><strong>Your file stays on this device.</strong><p>Nothing is uploaded when you download the JSON result.</p></div><button className="primary-button button-reset" onClick={downloadResult} disabled={session.feedback.wantedAdditionalCategory && !session.feedback.suggestedCategory.trim()}>Download my results <span aria-hidden="true">↓</span></button></div>
          </section>
        ) : <div className="review-submit"><div><strong>Next: {NAVIGATION_OPTIONS[session.sorts[session.activeSortIndex + 1].navigationVersion].label}</strong><p>You’ll place the same topics into the second structure.</p></div><button className="primary-button button-reset" onClick={advanceFromReview}>Continue to the next structure <span aria-hidden="true">→</span></button></div>}
      </main></>
    );
  }

  return (
    <><SiteHeader /><main className="sort-page">
      <div className="sort-toolbar"><div className="sort-toolbar__inner"><div><p className="eyebrow">Card sort · {session.activeSortIndex + 1} of {session.sorts.length} · {option.label}</p><h1>{option.title}</h1></div><div className="progress-summary" aria-live="polite"><strong>{sortedCount} of {ENABLED_TOPIC_CARDS.length} sorted</strong><span>{uncertainCount} marked not confident</span><div className="progress-track" aria-hidden="true"><span style={{ width: `${(sortedCount / ENABLED_TOPIC_CARDS.length) * 100}%` }} /></div></div></div></div>
      <div className="sort-workspace">
        {storageNotice && <div className="notice" role="status">{storageNotice}</div>}
        <div className="sort-instructions"><div><p className="eyebrow">Sort the topics</p><p>Start with whichever cards feel obvious. Drag a card into a category, or select a card and then choose a category. You can move cards at any time.</p></div><button className="primary-button button-reset" disabled={!complete} onClick={() => { clearInteraction(); setSession((current) => current ? { ...current, phase: "REVIEW" } : current); }}>Review placements <span aria-hidden="true">→</span></button></div>
        <div className="sorting-table">
          <CardPile
            cardIds={currentSort.cardOrder.filter((cardId) => !currentSort.cards[cardId].categoryId)}
            selectedCardId={selectedCardId}
            isActiveDropZone={activeDropZoneId === "unsorted"}
            onSelect={(cardId) => setSelectedCardId((current) => current === cardId ? "" : cardId)}
            onDragStart={(cardId) => { draggedCardId.current = cardId; }}
            onDragEnd={() => { draggedCardId.current = ""; setActiveDropZoneId(""); }}
            onDragEnter={() => setActiveDropZoneId("unsorted")}
            onDragLeave={() => setActiveDropZoneId((current) => current === "unsorted" ? "" : current)}
            onDrop={(cardId) => placeCard(cardId || draggedCardId.current, "")}
            onReturnSelected={() => selectedCardId && placeCard(selectedCardId, "")}
          />
          <section className="category-board" aria-label={`${option.label} category drop zones`}>
            <div className="category-board__heading"><div><p className="eyebrow">Navigation categories</p><h2>Where would you look?</h2></div><span>Drop cards into any category</span></div>
            <div className="category-grid">
          {option.categories.map((category) => {
            const cardIds = currentSort.cardOrder.filter((cardId) => currentSort.cards[cardId].categoryId === category.id);
            return <CategoryTray
              key={category.id}
              title={category.title}
              count={cardIds.length}
              cardIds={cardIds}
              states={currentSort.cards}
              selectedCardId={selectedCardId}
              isActiveDropZone={activeDropZoneId === category.id}
              isCelebrating={celebratingCategoryId === category.id}
              onSelect={(cardId) => setSelectedCardId((current) => current === cardId ? "" : cardId)}
              onChoose={() => selectedCardId && placeCard(selectedCardId, category.id)}
              onDragStart={(cardId) => { draggedCardId.current = cardId; }}
              onDragEnd={() => { draggedCardId.current = ""; setActiveDropZoneId(""); }}
              onDragEnter={() => setActiveDropZoneId(category.id)}
              onDragLeave={() => setActiveDropZoneId((current) => current === category.id ? "" : current)}
              onDrop={(cardId) => placeCard(cardId || draggedCardId.current, category.id)}
            />;
          })}
            </div>
          </section>
        </div>
        <SelectionTray selectedCardId={selectedCardId} placementReceipt={placementReceipt} cards={currentSort.cards} categories={option.categories} onChange={updateCard} onClearSelection={() => { setSelectedCardId(""); setPlacementReceipt(null); }} onUndo={undoLastPlacement} />
        <p className="sr-only" aria-live="polite">{liveStatus}</p>
        <div className="sort-footer"><p>{complete ? "All topics are placed. You can still move any card before reviewing." : `${ENABLED_TOPIC_CARDS.length - sortedCount} topics still need a category.`}</p><button className="primary-button button-reset" disabled={!complete} onClick={() => { clearInteraction(); setSession((current) => current ? { ...current, phase: "REVIEW" } : current); }}>Review placements <span aria-hidden="true">→</span></button></div>
      </div>
    </main></>
  );
}

function CardPile({ cardIds, selectedCardId, isActiveDropZone, onSelect, onDragStart, onDragEnd, onDragEnter, onDragLeave, onDrop, onReturnSelected }: {
  cardIds: string[];
  selectedCardId: string;
  isActiveDropZone: boolean;
  onSelect: (cardId: string) => void;
  onDragStart: (cardId: string) => void;
  onDragEnd: () => void;
  onDragEnter: () => void;
  onDragLeave: () => void;
  onDrop: (cardId: string) => void;
  onReturnSelected: () => void;
}) {
  return <section
    className={`card-pile ${isActiveDropZone ? "is-drag-over" : ""}`}
    onDragEnter={(event) => { event.preventDefault(); onDragEnter(); }}
    onDragLeave={(event) => { if (!event.currentTarget.contains(event.relatedTarget as Node | null)) onDragLeave(); }}
    onDragOver={(event) => { event.preventDefault(); event.dataTransfer.dropEffect = "move"; }}
    onDrop={(event) => { event.preventDefault(); onDrop(event.dataTransfer.getData("text/plain")); }}
  >
    <header className="card-pile__heading"><div><p className="eyebrow">Card pile</p><h2>Topics to place</h2></div><span>{cardIds.length} remaining</span></header>
    {selectedCardId && !cardIds.includes(selectedCardId) && <button className="return-to-pile button-reset" onClick={onReturnSelected}>Return selected card to the pile</button>}
    <div className="card-pile__cards">
      {cardIds.map((cardId) => <TopicCardButton key={cardId} cardId={cardId} selected={selectedCardId === cardId} variant="pile" onSelect={onSelect} onDragStart={onDragStart} onDragEnd={onDragEnd} />)}
      {cardIds.length === 0 && <div className="card-pile__empty"><span aria-hidden="true">✓</span><strong>Every topic has a category.</strong></div>}
    </div>
  </section>;
}

function CategoryTray({ title, count, cardIds, states, selectedCardId, isActiveDropZone, isCelebrating, onSelect, onChoose, onDragStart, onDragEnd, onDragEnter, onDragLeave, onDrop }: {
  title: string;
  count: number;
  cardIds: string[];
  states: Record<string, WorkingCardState>;
  selectedCardId: string;
  isActiveDropZone: boolean;
  isCelebrating: boolean;
  onSelect: (cardId: string) => void;
  onChoose: () => void;
  onDragStart: (cardId: string) => void;
  onDragEnd: () => void;
  onDragEnter: () => void;
  onDragLeave: () => void;
  onDrop: (cardId: string) => void;
}) {
  const selectedTitle = selectedCardId ? TOPIC_CARD_BY_ID.get(selectedCardId)?.title : "";
  return <section
    className={`category-tray ${isActiveDropZone ? "is-drag-over" : ""} ${isCelebrating ? "is-celebrating" : ""}`}
    onDragEnter={(event) => { event.preventDefault(); onDragEnter(); }}
    onDragLeave={(event) => { if (!event.currentTarget.contains(event.relatedTarget as Node | null)) onDragLeave(); }}
    onDragOver={(event) => { event.preventDefault(); event.dataTransfer.dropEffect = "move"; }}
    onDrop={(event) => { event.preventDefault(); onDrop(event.dataTransfer.getData("text/plain")); }}
  >
    <button type="button" className="category-tray__target button-reset" onClick={onChoose} aria-disabled={!selectedCardId} aria-label={selectedCardId ? `Place ${selectedTitle} in ${title}` : `${title}, ${count} topics`}>
      <span className="category-tray__title">{title}</span><span className="category-tray__count">{count}</span>
      <small>{selectedCardId ? "Place selected card here" : "Drop cards here"}</small>
    </button>
    <div className="category-tray__cards">
      {cardIds.map((cardId) => <TopicCardButton key={cardId} cardId={cardId} selected={selectedCardId === cardId} uncertain={states[cardId].uncertain} variant="placed" onSelect={onSelect} onDragStart={onDragStart} onDragEnd={onDragEnd} />)}
    </div>
    {isCelebrating && <span className="placement-pop" aria-hidden="true">✓</span>}
  </section>;
}

function TopicCardButton({ cardId, selected, uncertain = false, variant, onSelect, onDragStart, onDragEnd }: {
  cardId: string;
  selected: boolean;
  uncertain?: boolean;
  variant: "pile" | "placed";
  onSelect: (cardId: string) => void;
  onDragStart: (cardId: string) => void;
  onDragEnd: () => void;
}) {
  const card = TOPIC_CARD_BY_ID.get(cardId)!;
  return <button
    type="button"
    className={`topic-card topic-card--${variant} ${selected ? "is-selected" : ""} ${uncertain ? "topic-card--uncertain" : ""}`}
    data-card-id={cardId}
    draggable
    aria-pressed={selected}
    onClick={() => onSelect(cardId)}
    onDragStart={(event) => { event.dataTransfer.effectAllowed = "move"; event.dataTransfer.setData("text/plain", cardId); onDragStart(cardId); }}
    onDragEnd={onDragEnd}
  ><span className="drag-handle" aria-hidden="true">⠿</span><strong>{card.title}</strong>{uncertain && <span className="uncertain-dot" title="Marked not confident" aria-label="Marked not confident" />}</button>;
}

function SelectionTray({ selectedCardId, placementReceipt, cards, categories, onChange, onClearSelection, onUndo }: {
  selectedCardId: string;
  placementReceipt: PlacementReceipt | null;
  cards: Record<string, WorkingCardState>;
  categories: Array<{ id: string; title: string }>;
  onChange: (cardId: string, patch: Partial<WorkingCardState>) => void;
  onClearSelection: () => void;
  onUndo: () => void;
}) {
  const activeCardId = selectedCardId || placementReceipt?.cardId || "";
  if (!activeCardId) return null;
  const card = TOPIC_CARD_BY_ID.get(activeCardId)!;
  const state = cards[activeCardId];
  const category = categories.find((item) => item.id === state.categoryId);
  const isSelected = Boolean(selectedCardId);

  return <aside className={`selection-tray ${placementReceipt && !isSelected ? "selection-tray--placed" : ""}`} aria-label="Selected card details">
    <div className="selection-tray__message"><span className="selection-tray__mark" aria-hidden="true">{isSelected ? "⠿" : "✓"}</span><div><p className="eyebrow">{isSelected ? "Card selected" : "Placed"}</p><strong>{card.title}</strong><span>{category ? `${isSelected ? "Currently in" : "Added to"} ${category.title}` : "Choose a category to place this card."}</span></div></div>
    {state.categoryId && <div className="selection-tray__details"><label className="confidence-toggle"><input type="checkbox" checked={state.uncertain} onChange={(event) => onChange(activeCardId, { uncertain: event.target.checked })} /><span>I’m not confident about this choice.</span></label><details className="card-comment"><summary>{state.comment ? "Edit comment" : "Add a comment"}</summary><label><span className="sr-only">Comment about {card.title}</span><textarea rows={2} value={state.comment} onChange={(event) => onChange(activeCardId, { comment: event.target.value })} /></label></details></div>}
    <div className="selection-tray__actions">{placementReceipt && !isSelected && <button type="button" className="text-button" onClick={onUndo}>Undo placement</button>}<button type="button" className="text-button" onClick={onClearSelection}>{isSelected ? "Cancel selection" : "Dismiss"}</button></div>
  </aside>;
}
