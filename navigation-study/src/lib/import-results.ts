import type { StudyResult } from "@/lib/study-types";
import { NAVIGATION_OPTIONS } from "@/data/navigation-options";
import { TOPIC_CARD_BY_ID } from "@/data/topic-cards";

export interface ImportValidation {
  valid: boolean;
  result?: StudyResult;
  error?: string;
}

function isRecord(value: unknown): value is Record<string, unknown> {
  return typeof value === "object" && value !== null && !Array.isArray(value);
}

export function validateStudyResult(value: unknown): ImportValidation {
  if (!isRecord(value)) return { valid: false, error: "The file does not contain a JSON object." };
  if (value.schemaVersion !== "1.0") return { valid: false, error: "Unsupported or missing schemaVersion (expected 1.0)." };
  if (value.study !== "PSP Website Navigation Card Sort") return { valid: false, error: "This is not a PSP navigation study result file." };
  if (typeof value.completedAt !== "string" || Number.isNaN(Date.parse(value.completedAt))) return { valid: false, error: "The completion date is missing or invalid." };
  if (typeof value.participantId !== "string" || !value.participantId) return { valid: false, error: "The participant ID is missing." };
  if (!isRecord(value.participant) || typeof value.participant.role !== "string" || typeof value.participant.nameOrInitials !== "string" || typeof value.participant.familiarity !== "string") return { valid: false, error: "Participant information is malformed." };
  if (!["", "VERY_FAMILIAR", "SOMEWHAT_FAMILIAR", "NOT_VERY_FAMILIAR"].includes(value.participant.familiarity)) return { valid: false, error: "Participant familiarity is not recognized." };
  if (!isRecord(value.navigationComparison)) return { valid: false, error: "Navigation comparison answers are missing." };
  const comparisonValues = ["", "A", "B", "ABOUT_THE_SAME", "NOT_SURE"];
  if (!comparisonValues.includes(String(value.navigationComparison.reflectsFuturePSP ?? "invalid")) || !comparisonValues.includes(String(value.navigationComparison.makesSenseExternally ?? "invalid")) || typeof value.navigationComparison.comment !== "string") return { valid: false, error: "Navigation comparison answers are malformed." };
  if (!Array.isArray(value.sorts) || value.sorts.length === 0) return { valid: false, error: "No completed card sort was found." };

  for (const sort of value.sorts) {
    if (!isRecord(sort) || (sort.navigationVersion !== "A" && sort.navigationVersion !== "B") || !Array.isArray(sort.assignments)) return { valid: false, error: "A navigation sort is malformed." };
    const categories = new Set(NAVIGATION_OPTIONS[sort.navigationVersion].categories.map((category) => category.id));
    for (const assignment of sort.assignments) {
      if (!isRecord(assignment) || typeof assignment.cardId !== "string" || typeof assignment.cardTitle !== "string" || typeof assignment.categoryId !== "string" || typeof assignment.categoryTitle !== "string" || typeof assignment.uncertain !== "boolean" || typeof assignment.comment !== "string") return { valid: false, error: "A card assignment is malformed." };
      if (!TOPIC_CARD_BY_ID.has(assignment.cardId)) return { valid: false, error: `Unknown topic card: ${assignment.cardId}.` };
      if (!categories.has(assignment.categoryId)) return { valid: false, error: `Unknown Option ${sort.navigationVersion} category: ${assignment.categoryId}.` };
    }
  }

  if (!isRecord(value.feedback) || typeof value.feedback.wantedAdditionalCategory !== "boolean" || typeof value.feedback.suggestedCategory !== "string" || typeof value.feedback.unclearLabels !== "string" || typeof value.feedback.generalComments !== "string") return { valid: false, error: "Study feedback is missing or malformed." };
  return { valid: true, result: value as unknown as StudyResult };
}

export function parseStudyResult(text: string): ImportValidation {
  try {
    return validateStudyResult(JSON.parse(text));
  } catch {
    return { valid: false, error: "The file is not valid JSON." };
  }
}
