"use client";

import Link from "next/link";
import { useEffect, useState } from "react";
import { SiteHeader } from "@/components/site-header";
import { NAVIGATION_OPTIONS, UTILITY_NAVIGATION } from "@/data/navigation-options";
import type { ComparisonChoice, Familiarity, IntroductionAnswers } from "@/lib/study-types";

const INTRO_STORAGE_KEY = "psp-navigation-study-introduction-v1";
const INITIAL_ANSWERS: IntroductionAnswers = {
  participant: { nameOrInitials: "", role: "", familiarity: "" },
  navigationComparison: { reflectsFuturePSP: "", makesSenseExternally: "", comment: "" },
};
const COMPARISON_CHOICES: Array<{ value: ComparisonChoice; label: string }> = [
  { value: "A", label: "Option A" },
  { value: "B", label: "Option B" },
  { value: "ABOUT_THE_SAME", label: "About the same" },
  { value: "NOT_SURE", label: "Not sure" },
];

export function IntroductionStudy() {
  const [answers, setAnswers] = useState<IntroductionAnswers>(INITIAL_ANSWERS);
  const [ready, setReady] = useState(false);

  useEffect(() => {
    const frame = window.requestAnimationFrame(() => {
      try {
        const saved = window.sessionStorage.getItem(INTRO_STORAGE_KEY);
        if (saved) setAnswers(JSON.parse(saved) as IntroductionAnswers);
      } catch {}
      setReady(true);
    });
    return () => window.cancelAnimationFrame(frame);
  }, []);

  useEffect(() => {
    if (!ready) return;
    try { window.sessionStorage.setItem(INTRO_STORAGE_KEY, JSON.stringify(answers)); } catch {}
  }, [answers, ready]);

  const canContinue = Boolean(answers.participant.familiarity) && Boolean(answers.navigationComparison.reflectsFuturePSP) && Boolean(answers.navigationComparison.makesSenseExternally);

  function updateParticipant(field: "nameOrInitials" | "role", value: string) {
    setAnswers((current) => ({ ...current, participant: { ...current.participant, [field]: value } }));
  }

  function updateComparison(field: "reflectsFuturePSP" | "makesSenseExternally", value: ComparisonChoice) {
    setAnswers((current) => ({ ...current, navigationComparison: { ...current.navigationComparison, [field]: value } }));
  }

  return (
    <>
      <SiteHeader />
      <main className="page-shell intro-page">
        <section className="intro-lead" aria-labelledby="study-title">
          <p className="eyebrow">Navigation research · about 10–15 minutes</p>
          <h1 id="study-title">Help us make PSP’s work easier to find.</h1>
          <p className="lede">Puget Sound Partnership is redesigning its website. We are testing how people expect major areas of our work to be organized. This exercise tests the navigation—not you. There are no wrong answers.</p>
        </section>

        <section className="study-section" aria-labelledby="about-you-title">
          <div className="section-number" aria-hidden="true">01</div>
          <div className="section-content">
            <div className="section-heading"><div><p className="eyebrow">A little context</p><h2 id="about-you-title">About you</h2></div><p>Names and roles are optional. Please don’t include an email address.</p></div>
            <div className="form-grid">
              <label className="field"><span>Name or initials <small>Optional</small></span><input value={answers.participant.nameOrInitials} onChange={(event) => updateParticipant("nameOrInitials", event.target.value)} autoComplete="off" /></label>
              <label className="field"><span>Role or team <small>Optional</small></span><input value={answers.participant.role} onChange={(event) => updateParticipant("role", event.target.value)} autoComplete="organization-title" /></label>
            </div>
            <fieldset className="choice-fieldset">
              <legend>How familiar are you with the current PSP website?</legend>
              <div className="segmented-options">
                {([["VERY_FAMILIAR", "Very familiar"], ["SOMEWHAT_FAMILIAR", "Somewhat familiar"], ["NOT_VERY_FAMILIAR", "Not very familiar"]] as Array<[Familiarity, string]>).map(([value, label]) => (
                  <label key={value} className="choice-chip"><input type="radio" name="familiarity" value={value} checked={answers.participant.familiarity === value} onChange={() => setAnswers((current) => ({ ...current, participant: { ...current.participant, familiarity: value } }))} /><span>{label}</span></label>
                ))}
              </div>
            </fieldset>
          </div>
        </section>

        <section className="study-section" aria-labelledby="concepts-title">
          <div className="section-number" aria-hidden="true">02</div>
          <div className="section-content">
            <div className="section-heading"><div><p className="eyebrow">Two possible structures</p><h2 id="concepts-title">Compare the navigation concepts</h2></div><p>Focus on the labels and how the topics are grouped.</p></div>
            <div className="concept-grid">
              {Object.values(NAVIGATION_OPTIONS).map((option) => (
                <article key={option.id} className={`concept-card concept-card--${option.id.toLowerCase()}`}>
                  <div className="concept-card__heading"><span>{option.label}</span><h3>{option.title}</h3><p>{option.description}</p></div>
                  <nav aria-label={`${option.label} navigation concept`}>{option.categories.map((category, index) => <div key={category.id} className="nav-concept-item"><span>{String(index + 1).padStart(2, "0")}</span>{category.title}</div>)}</nav>
                </article>
              ))}
            </div>
            <div className="utility-concept"><div><span className="utility-concept__label">Common utility navigation</span><p>These links can remain easy to reach regardless of the main structure.</p></div><ul>{UTILITY_NAVIGATION.map((item) => <li key={item}>{item}</li>)}</ul></div>
          </div>
        </section>

        <section className="study-section" aria-labelledby="first-impression-title">
          <div className="section-number" aria-hidden="true">03</div>
          <div className="section-content">
            <div className="section-heading"><div><p className="eyebrow">Your first impression</p><h2 id="first-impression-title">Which feels clearer?</h2></div></div>
            <ComparisonQuestion name="reflects-future" legend="Which navigation better reflects the Partnership we are becoming?" value={answers.navigationComparison.reflectsFuturePSP} onChange={(value) => updateComparison("reflectsFuturePSP", value)} />
            <ComparisonQuestion name="external-sense" legend="Which navigation do you think would make more sense to someone outside PSP?" value={answers.navigationComparison.makesSenseExternally} onChange={(value) => updateComparison("makesSenseExternally", value)} />
            <label className="field field--wide"><span>What influenced your choice? <small>Optional</small></span><textarea rows={3} value={answers.navigationComparison.comment} onChange={(event) => setAnswers((current) => ({ ...current, navigationComparison: { ...current.navigationComparison, comment: event.target.value } }))} /></label>
            <div className="continue-row"><p>{canContinue ? "Your answers are saved in this browser session." : "Answer the three required questions to continue."}</p><Link className={`primary-button ${!canContinue ? "primary-button--disabled" : ""}`} href={canContinue ? "/sort" : "#first-impression-title"} aria-disabled={!canContinue}>Continue to card sorting <span aria-hidden="true">→</span></Link></div>
          </div>
        </section>
      </main>
    </>
  );
}

function ComparisonQuestion({ name, legend, value, onChange }: { name: string; legend: string; value: ComparisonChoice | ""; onChange: (value: ComparisonChoice) => void; }) {
  return <fieldset className="comparison-question"><legend>{legend}</legend><div className="segmented-options segmented-options--four">{COMPARISON_CHOICES.map((choice) => <label key={choice.value} className="choice-chip"><input type="radio" name={name} value={choice.value} checked={value === choice.value} onChange={() => onChange(choice.value)} /><span>{choice.label}</span></label>)}</div></fieldset>;
}
