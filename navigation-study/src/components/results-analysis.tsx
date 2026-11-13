"use client";

import { useMemo, useRef, useState } from "react";
import { SiteHeader } from "@/components/site-header";
import { analyzeResults } from "@/lib/analyze-results";
import { downloadAggregatedJson, downloadParticipantCsv, downloadSummaryCsv } from "@/lib/export-results";
import { parseStudyResult } from "@/lib/import-results";
import type { CardAnalysis, ComparisonChoice, StudyResult } from "@/lib/study-types";

interface ImportedResponse { id: string; fileName: string; result: StudyResult; }
interface ImportError { fileName: string; message: string; }
type CardSortOrder = "LOWEST_AGREEMENT" | "HIGHEST_UNCERTAINTY" | "ALPHABETICAL" | "HIGHEST_AGREEMENT";

const preferenceLabels: Record<ComparisonChoice | "NOT_ANSWERED", string> = {
  A: "Option A", B: "Option B", ABOUT_THE_SAME: "About the same", NOT_SURE: "Not sure", NOT_ANSWERED: "Not answered",
};

export function ResultsAnalysis() {
  const inputRef = useRef<HTMLInputElement>(null);
  const [responses, setResponses] = useState<ImportedResponse[]>([]);
  const [errors, setErrors] = useState<ImportError[]>([]);
  const [cardSortOrder, setCardSortOrder] = useState<CardSortOrder>("LOWEST_AGREEMENT");
  const analysis = useMemo(() => analyzeResults(responses.map((item) => item.result)), [responses]);
  const sortedCards = useMemo(() => sortCards(analysis.cards, cardSortOrder), [analysis.cards, cardSortOrder]);

  async function importFiles(files: FileList | File[]) {
    const incoming: ImportedResponse[] = [];
    const rejected: ImportError[] = [];
    for (const file of Array.from(files)) {
      try {
        const validation = parseStudyResult(await file.text());
        if (validation.valid && validation.result) {
          incoming.push({ id: `${file.name}-${file.lastModified}-${Math.random()}`, fileName: file.name, result: validation.result });
        } else {
          rejected.push({ fileName: file.name, message: validation.error ?? "The file could not be validated." });
        }
      } catch {
        rejected.push({ fileName: file.name, message: "The file could not be read." });
      }
    }
    setResponses((current) => [...current, ...incoming]);
    setErrors(rejected);
    if (inputRef.current) inputRef.current.value = "";
  }

  return (
    <><SiteHeader /><main className="page-shell results-page">
      <section className="results-hero"><div><p className="eyebrow">Local analysis workspace</p><h1>Find the patterns,<br />keep the files private.</h1><p className="lede">Combine participant result files in this browser. Files are validated and analyzed on this device; nothing is uploaded.</p></div><div className="privacy-note"><strong>Local by design</strong><p>Closing or refreshing this page clears the imported results.</p></div></section>

      <section className="import-panel" aria-labelledby="import-title">
        <div className="import-panel__heading"><div><p className="eyebrow">01 · Import</p><h2 id="import-title">Add participant files</h2></div>{responses.length > 0 && <button className="text-button" onClick={() => { setResponses([]); setErrors([]); }}>Clear all</button>}</div>
        <div className="file-drop" onDragOver={(event) => { event.preventDefault(); event.dataTransfer.dropEffect = "copy"; }} onDrop={(event) => { event.preventDefault(); void importFiles(event.dataTransfer.files); }}>
          <div className="file-drop__icon" aria-hidden="true">↓</div><strong>Drop JSON result files here</strong><span>or choose several files from your computer</span><button className="secondary-button" onClick={() => inputRef.current?.click()}>Choose JSON files</button><input ref={inputRef} className="sr-only" type="file" accept="application/json,.json" multiple onChange={(event) => event.target.files && void importFiles(event.target.files)} />
        </div>
        {errors.length > 0 && <div className="import-errors" role="alert"><strong>{errors.length} {errors.length === 1 ? "file" : "files"} could not be imported</strong><ul>{errors.map((error, index) => <li key={`${error.fileName}-${index}`}><b>{error.fileName}:</b> {error.message}</li>)}</ul></div>}
        {responses.length > 0 && <div className="imported-files"><h3>Imported responses <span>{responses.length}</span></h3><ul>{responses.map((item) => <li key={item.id}><div><strong>{item.fileName}</strong><span>{item.result.participantId} · {new Date(item.result.completedAt).toLocaleDateString()}</span></div><button aria-label={`Remove ${item.fileName}`} onClick={() => setResponses((current) => current.filter((response) => response.id !== item.id))}>Remove</button></li>)}</ul></div>}
      </section>

      {responses.length === 0 ? <section className="empty-analysis"><span aria-hidden="true">≈</span><h2>Analysis will appear here</h2><p>Import one or more valid PSP navigation study JSON files to begin.</p></section> : <>
        <section className="analysis-section" aria-labelledby="participation-title"><div className="analysis-heading"><div><p className="eyebrow">02 · Overview</p><h2 id="participation-title">Participation</h2></div><p>Descriptive counts only. This exploratory study is not designed to measure statistical significance.</p></div>
          <div className="metric-grid"><Metric value={analysis.responseCount} label="Responses" /><Metric value={analysis.navigationSortCounts.A} label="Sorted Option A" /><Metric value={analysis.navigationSortCounts.B} label="Sorted Option B" /><Metric value={analysis.familiarityCounts.VERY_FAMILIAR} label="Very familiar" /><Metric value={analysis.familiarityCounts.SOMEWHAT_FAMILIAR} label="Somewhat familiar" /><Metric value={analysis.familiarityCounts.NOT_VERY_FAMILIAR} label="Not very familiar" /></div>
        </section>

        <section className="analysis-section" aria-labelledby="preference-title"><div className="analysis-heading"><div><p className="eyebrow">03 · First impressions</p><h2 id="preference-title">Navigation preference</h2></div><p>Responses gathered before participants sorted the topic cards.</p></div><div className="preference-grid"><PreferenceChart title="Better reflects the Partnership we are becoming" counts={analysis.preferenceCounts.reflectsFuturePSP} total={analysis.responseCount} /><PreferenceChart title="Would make more sense to someone outside PSP" counts={analysis.preferenceCounts.makesSenseExternally} total={analysis.responseCount} /></div></section>

        <section className="analysis-section" aria-labelledby="agreement-title"><div className="analysis-heading analysis-heading--controls"><div><p className="eyebrow">04 · Topic placement</p><h2 id="agreement-title">Card agreement</h2></div><label className="sort-control">Sort rows<select value={cardSortOrder} onChange={(event) => setCardSortOrder(event.target.value as CardSortOrder)}><option value="LOWEST_AGREEMENT">Lowest agreement</option><option value="HIGHEST_UNCERTAINTY">Highest uncertainty</option><option value="ALPHABETICAL">Alphabetical</option><option value="HIGHEST_AGREEMENT">Highest agreement</option></select></label></div>
          <div className="heuristic-key"><span><i className="strong" /> 80%+ strong</span><span><i className="moderate" /> 60–79% moderate</span><span><i className="weak" /> Below 60% weak</span><small>Design heuristics, not statistical claims.</small></div>
          <div className="table-wrap"><table className="agreement-table"><thead><tr><th>Topic / version</th><th>Most selected</th><th>Category distribution</th><th>Agreement</th><th>Uncertain</th></tr></thead><tbody>{sortedCards.map((card) => <tr key={`${card.navigationVersion}-${card.cardId}`} className={card.agreementLevel === "weak" ? "low-agreement" : ""}><th scope="row"><strong>{card.cardTitle}</strong><span>Option {card.navigationVersion}</span></th><td>{card.mostSelectedCategory}</td><td><div className="distribution-list">{card.categoryCounts.map((category) => <span key={category.categoryId}><b>{category.count}</b> {shortCategory(category.categoryTitle)} · {percent(category.percentage)}</span>)}</div></td><td><span className={`agreement-pill agreement-pill--${card.agreementLevel}`}>{percent(card.agreement)}</span></td><td>{card.uncertainCount} <span className="muted">({percent(card.uncertainPercentage)})</span></td></tr>)}</tbody></table></div>
        </section>

        <section className="analysis-section" aria-labelledby="category-title"><div className="analysis-heading"><div><p className="eyebrow">05 · Category patterns</p><h2 id="category-title">Category analysis</h2></div><p>Distinct topics and the placements that appeared most often in each category.</p></div><div className="category-analysis-grid">{analysis.categories.map((category) => <article key={`${category.navigationVersion}-${category.categoryId}`}><span>Option {category.navigationVersion}</span><h3>{category.categoryTitle}</h3><p><strong>{category.distinctCards}</strong> distinct topics placed here</p><ol>{category.topCards.map((card) => <li key={card.cardTitle}><span>{card.cardTitle}</span><b>{card.count}</b></li>)}</ol></article>)}</div>
          <div className="confusion-panel"><div><p className="eyebrow">Common splits</p><h3>Confusion pairs</h3><p>Topics divided between two leading categories.</p></div><ol>{analysis.confusionPairs.length ? analysis.confusionPairs.map((pair) => <li key={`${pair.navigationVersion}-${pair.cardTitle}`}><span>Option {pair.navigationVersion}</span>{pair.description}</li>) : <li>No category splits appear in the current files.</li>}</ol></div>
        </section>

        <section className="analysis-section" aria-labelledby="uncertainty-title"><div className="analysis-heading"><div><p className="eyebrow">06 · Confidence</p><h2 id="uncertainty-title">Topics people were least confident placing</h2></div></div><div className="uncertainty-list">{[...analysis.cards].sort((a, b) => b.uncertainPercentage - a.uncertainPercentage || a.cardTitle.localeCompare(b.cardTitle)).slice(0, 10).map((card, index) => <article key={`${card.navigationVersion}-${card.cardId}`}><span className="rank">{String(index + 1).padStart(2, "0")}</span><div><h3>{card.cardTitle}</h3><p>Option {card.navigationVersion} · {card.uncertainCount} of {card.totalResponses} marked uncertain ({percent(card.uncertainPercentage)})</p>{card.comments.length > 0 && <ul>{card.comments.map((comment, commentIndex) => <li key={`${comment.participantId}-${commentIndex}`}>“{comment.comment}” <span>— {comment.participantId}</span></li>)}</ul>}</div></article>)}</div></section>

        {analysis.comparisons.length > 0 && <ComparisonSection cards={analysis.comparisons} />}

        <section className="analysis-section" aria-labelledby="qualitative-title"><div className="analysis-heading"><div><p className="eyebrow">07 · Written feedback</p><h2 id="qualitative-title">Qualitative feedback</h2></div><p>Comments are shown as written. No automated sentiment analysis is applied.</p></div><div className="qualitative-grid"><FeedbackList title="Suggested missing categories" items={analysis.qualitative.suggestedCategories} /><FeedbackList title="Unclear navigation labels" items={analysis.qualitative.unclearLabels} /><FeedbackList title="General comments" items={analysis.qualitative.generalComments} /></div></section>

        <section className="export-panel"><div><p className="eyebrow">Export</p><h2>Take the analysis with you.</h2><p>Download participant-level rows for Excel, a compact card summary, or the complete aggregated analysis.</p></div><div className="export-actions"><button className="secondary-button" onClick={() => downloadParticipantCsv(responses.map((item) => item.result))}>Participant CSV</button><button className="secondary-button" onClick={() => downloadSummaryCsv(analysis)}>Summary CSV</button><button className="primary-button button-reset" onClick={() => downloadAggregatedJson(analysis)}>Aggregated JSON</button></div></section>
      </>}
    </main></>
  );
}

function Metric({ value, label }: { value: number; label: string }) { return <article className="metric-card"><strong>{value}</strong><span>{label}</span></article>; }

function PreferenceChart({ title, counts, total }: { title: string; counts: Record<ComparisonChoice | "NOT_ANSWERED", number>; total: number; }) {
  return <article className="preference-chart"><h3>{title}</h3><div>{(Object.entries(counts) as Array<[ComparisonChoice | "NOT_ANSWERED", number]>).filter(([, count]) => count > 0).map(([key, count]) => <div className="bar-row" key={key}><div><span>{preferenceLabels[key]}</span><strong>{count}</strong></div><div className="bar-track"><span style={{ width: `${total ? (count / total) * 100 : 0}%` }} /></div></div>)}</div></article>;
}

function FeedbackList({ title, items }: { title: string; items: string[] }) { return <article><h3>{title}</h3>{items.length ? <ul>{items.map((item, index) => <li key={`${item}-${index}`}>“{item}”</li>)}</ul> : <p>No responses.</p>}</article>; }

function ComparisonSection({ cards }: { cards: ReturnType<typeof analyzeResults>["comparisons"] }) {
  const score = (card: (typeof cards)[number]) => card.agreementDifference - card.uncertaintyDifference;
  const easier = cards.filter((card) => score(card) > 0).sort((a, b) => score(b) - score(a)).slice(0, 6);
  const harder = cards.filter((card) => score(card) < 0).sort((a, b) => score(a) - score(b)).slice(0, 6);
  const average = (values: number[]) => values.length ? values.reduce((sum, value) => sum + value, 0) / values.length : 0;
  return <section className="analysis-section comparison-section" aria-labelledby="comparison-title"><div className="analysis-heading"><div><p className="eyebrow">A / B comparison</p><h2 id="comparison-title">How placement changed</h2></div><p>Exploratory averages only. This view does not declare a winner.</p></div><div className="comparison-averages"><Metric value={Math.round(average(cards.map((card) => card.agreementA)) * 100)} label="Average agreement A (%)" /><Metric value={Math.round(average(cards.map((card) => card.agreementB)) * 100)} label="Average agreement B (%)" /><Metric value={Math.round(average(cards.map((card) => card.uncertaintyA)) * 100)} label="Average uncertainty A (%)" /><Metric value={Math.round(average(cards.map((card) => card.uncertaintyB)) * 100)} label="Average uncertainty B (%)" /></div><div className="comparison-columns"><ComparisonList title="Topics that became easier to place in Option B" cards={easier} /><ComparisonList title="Topics that became harder to place in Option B" cards={harder} /></div></section>;
}

function ComparisonList({ title, cards }: { title: string; cards: ReturnType<typeof analyzeResults>["comparisons"] }) { return <article><h3>{title}</h3>{cards.length ? <ol>{cards.map((card) => <li key={card.cardId}><strong>{card.cardTitle}</strong><span>Agreement {signedPercent(card.agreementDifference)} · uncertainty {signedPercent(card.uncertaintyDifference)}</span></li>)}</ol> : <p className="muted">No topics met this condition in the imported responses.</p>}</article>; }

function sortCards(cards: CardAnalysis[], order: CardSortOrder) {
  const sorted = [...cards];
  if (order === "HIGHEST_UNCERTAINTY") return sorted.sort((a, b) => b.uncertainPercentage - a.uncertainPercentage || a.cardTitle.localeCompare(b.cardTitle));
  if (order === "ALPHABETICAL") return sorted.sort((a, b) => a.cardTitle.localeCompare(b.cardTitle) || a.navigationVersion.localeCompare(b.navigationVersion));
  if (order === "HIGHEST_AGREEMENT") return sorted.sort((a, b) => b.agreement - a.agreement || a.cardTitle.localeCompare(b.cardTitle));
  return sorted.sort((a, b) => a.agreement - b.agreement || a.cardTitle.localeCompare(b.cardTitle));
}

function percent(value: number) { return `${Math.round(value * 100)}%`; }
function signedPercent(value: number) { const rounded = Math.round(value * 100); return `${rounded > 0 ? "+" : ""}${rounded} pts`; }
function shortCategory(value: string) { return value.length > 24 ? `${value.slice(0, 22)}…` : value; }
