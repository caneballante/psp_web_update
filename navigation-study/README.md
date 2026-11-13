# PSP Website Navigation Study

A static, local-first research application for testing two proposed information architectures for the Puget Sound Partnership website. Participants compare the concepts, sort 31 topics, flag uncertain choices, add comments, and download a JSON response. Researchers can combine those files on the `/results` page without uploading them.

This is an exploratory UX research prototype, not the public PSP website or a statistically rigorous A/B test.

## Run locally

Requirements: Node.js 20 or newer and npm.

```powershell
npm install
npm run dev
```

Open the exact local URL printed by Next.js. The main routes are:

- `/` — introduction and navigation comparison
- `/sort` — card-sorting exercise
- `/results` — local multi-file analysis tool

## Verify changes

```powershell
npm run typecheck
npm run test
npm run lint
npm run build
```

`npm run build` creates a fully static export in `out/`.

## Deploy to Vercel

Import this repository into Vercel as a Next.js project and use the default build command (`npm run build`). The project uses `output: "export"`, so there are no server functions, API routes, databases, or hosted secrets to configure.

## Edit the study

- Navigation labels and category order: `src/data/navigation-options.ts`
- Topic cards, order, and `testEnabled` flags: `src/data/topic-cards.ts`
- Active study mode: `src/data/study-config.ts`

The default is:

```ts
export const STUDY_MODE = "OPTION_A_ONLY"
```

Change it to `"OPTION_B_ONLY"` or `"BOTH"` and rebuild. Participants are never randomly assigned. Starting a new study session randomizes topic-card order but preserves navigation-category order.

## Participant workflow

1. Complete the introduction and two navigation-comparison questions.
2. Place every topic in a category using drag-and-drop or the category selector on the card.
3. Mark uncertain choices and add optional card comments.
4. Review all placements and complete the final feedback questions.
5. Download the JSON result and send it to the PSP website redesign team.

An unfinished session is preserved in browser session storage. Results are not uploaded or saved to a server.

## Analyze downloaded results

Open `/results`, then drag in or choose multiple participant JSON files. Invalid files are identified individually. Imported responses can be removed or cleared and exist only in the current browser page.

The analysis includes participation counts, navigation preference bars, per-card agreement and uncertainty, category patterns, common category splits, participant comments, qualitative feedback, and an exploratory Option A/Option B comparison when both are present.

Available exports:

- Participant CSV — one row per participant/card assignment
- Summary CSV — one row per card/navigation combination
- Aggregated JSON — the complete calculated analysis

## Future persistence

Completed responses are saved through the `ResultRepository` interface in `src/lib/study-types.ts`. Version 1 uses `DownloadResultRepository` in `src/lib/export-results.ts`, which creates a local download.

A future `NeonResultRepository` can implement the same `save(result)` contract. The card-sort UI would receive or instantiate that implementation without changing session state, assignment logic, result construction, or analysis calculations. Do not add database packages until remote persistence is explicitly approved, along with appropriate consent and privacy decisions.
