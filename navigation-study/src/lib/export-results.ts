import type { AggregatedAnalysis, ResultRepository, StudyResult } from "@/lib/study-types";

function downloadText(content: string, filename: string, type: string) {
  const blob = new Blob([content], { type });
  const url = URL.createObjectURL(blob);
  const anchor = document.createElement("a");
  anchor.href = url;
  anchor.download = filename;
  document.body.appendChild(anchor);
  anchor.click();
  anchor.remove();
  URL.revokeObjectURL(url);
}

function safeParticipantLabel(value: string) {
  return value.trim().replace(/[^a-z0-9]+/gi, "-").replace(/^-|-$/g, "").slice(0, 18);
}

export function resultFilename(result: StudyResult) {
  const date = result.completedAt.slice(0, 10);
  const participant = safeParticipantLabel(result.participant.nameOrInitials) || result.participantId;
  return `psp-navigation-sort-${date}-${participant}.json`;
}

export class DownloadResultRepository implements ResultRepository {
  async save(result: StudyResult): Promise<void> {
    downloadText(JSON.stringify(result, null, 2), resultFilename(result), "application/json");
  }
}

function csvCell(value: unknown) {
  const text = String(value ?? "");
  return /[",\n\r]/.test(text) ? `"${text.replace(/"/g, '""')}"` : text;
}

function toCsv(rows: unknown[][]) {
  return rows.map((row) => row.map(csvCell).join(",")).join("\r\n");
}

export function downloadParticipantCsv(results: StudyResult[]) {
  const rows: unknown[][] = [[
    "participant ID", "role", "familiarity", "navigation version", "card", "category selected",
    "uncertain", "card comment", "completed date",
  ]];
  results.forEach((result) => result.sorts.forEach((sort) => sort.assignments.forEach((assignment) => {
    rows.push([
      result.participantId, result.participant.role, result.participant.familiarity, sort.navigationVersion,
      assignment.cardTitle, assignment.categoryTitle, assignment.uncertain, assignment.comment, result.completedAt,
    ]);
  })));
  downloadText(toCsv(rows), "psp-navigation-participant-assignments.csv", "text/csv;charset=utf-8");
}

export function downloadSummaryCsv(analysis: AggregatedAnalysis) {
  const rows: unknown[][] = [[
    "navigation version", "card", "most common category", "agreement percentage", "uncertain count",
    "uncertain percentage", "total responses",
  ]];
  analysis.cards.forEach((card) => rows.push([
    card.navigationVersion, card.cardTitle, card.mostSelectedCategory,
    Math.round(card.agreement * 1000) / 10, card.uncertainCount,
    Math.round(card.uncertainPercentage * 1000) / 10, card.totalResponses,
  ]));
  downloadText(toCsv(rows), "psp-navigation-summary.csv", "text/csv;charset=utf-8");
}

export function downloadAggregatedJson(analysis: AggregatedAnalysis) {
  downloadText(JSON.stringify(analysis, null, 2), "psp-navigation-aggregated-analysis.json", "application/json");
}
