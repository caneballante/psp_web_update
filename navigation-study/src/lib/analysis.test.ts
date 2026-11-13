import { describe, expect, it } from "vitest";
import { analyzeResults } from "@/lib/analyze-results";
import { parseStudyResult, validateStudyResult } from "@/lib/import-results";
import type { NavigationVersion, StudyResult } from "@/lib/study-types";

function result(participantId: string, version: NavigationVersion, categoryId: string, categoryTitle: string, uncertain = false): StudyResult {
  return {
    schemaVersion: "1.0",
    study: "PSP Website Navigation Card Sort",
    completedAt: "2026-09-10T18:00:00.000Z",
    participantId,
    participant: { nameOrInitials: "", role: "Comms", familiarity: "SOMEWHAT_FAMILIAR" },
    navigationComparison: { reflectsFuturePSP: "B", makesSenseExternally: "A", comment: "" },
    sorts: [{ navigationVersion: version, assignments: [{ cardId: "action-agenda", cardTitle: "Action Agenda", categoryId, categoryTitle, uncertain, comment: uncertain ? "Hard to place" : "" }] }],
    feedback: { wantedAdditionalCategory: false, suggestedCategory: "", unclearLabels: "", generalComments: "" },
  };
}

describe("result import", () => {
  it("accepts an exported result and rejects malformed JSON", () => {
    const valid = result("P1", "A", "recovery-work", "Recovery Work");
    expect(validateStudyResult(valid).valid).toBe(true);
    expect(parseStudyResult(JSON.stringify(valid)).result).toEqual(valid);
    expect(parseStudyResult("{oops").error).toMatch(/not valid JSON/i);
  });

  it("identifies a schema mismatch", () => {
    expect(validateStudyResult({ schemaVersion: "2.0" }).error).toMatch(/schemaVersion/);
  });
});

describe("analysis", () => {
  it("calculates agreement, uncertainty, confusion, and A/B comparison", () => {
    const results = [
      result("P1", "A", "recovery-work", "Recovery Work"),
      result("P2", "A", "policy-government", "Policy & Government", true),
      result("P3", "B", "implementing-recovery", "Implementing Recovery"),
      result("P4", "B", "implementing-recovery", "Implementing Recovery"),
    ];
    const analysis = analyzeResults(results);
    const actionA = analysis.cards.find((card) => card.cardId === "action-agenda" && card.navigationVersion === "A")!;
    const actionB = analysis.cards.find((card) => card.cardId === "action-agenda" && card.navigationVersion === "B")!;
    expect(analysis.responseCount).toBe(4);
    expect(actionA.agreement).toBe(0.5);
    expect(actionA.uncertainPercentage).toBe(0.5);
    expect(actionB.agreement).toBe(1);
    expect(analysis.confusionPairs[0].description).toMatch(/split primarily/i);
    expect(analysis.comparisons.find((card) => card.cardId === "action-agenda")?.agreementDifference).toBe(0.5);
  });
});
