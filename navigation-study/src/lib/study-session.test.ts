import { describe, expect, it } from "vitest";
import { ENABLED_TOPIC_CARDS } from "@/data/topic-cards";
import { createWorkingSession, shuffle } from "@/lib/study-session";

describe("study session", () => {
  it("creates one independent sort for each requested navigation", () => {
    const session = createWorkingSession(["A", "B"], "ABC123", () => 0.5);
    expect(session.sorts.map((sort) => sort.navigationVersion)).toEqual(["A", "B"]);
    expect(Object.keys(session.sorts[0].cards)).toHaveLength(ENABLED_TOPIC_CARDS.length);
    expect(Object.values(session.sorts[0].cards).every((card) => card.categoryId === "")).toBe(true);
  });

  it("shuffles without changing the source array", () => {
    const source = [1, 2, 3, 4];
    const result = shuffle(source, () => 0);
    expect(source).toEqual([1, 2, 3, 4]);
    expect(result).toEqual([2, 3, 4, 1]);
  });
});
