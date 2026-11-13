import { describe, expect, it } from "vitest";
import { navigationVersionsForMode } from "@/data/study-config";

describe("navigationVersionsForMode", () => {
  it.each([
    ["OPTION_A_ONLY", ["A"]],
    ["OPTION_B_ONLY", ["B"]],
    ["BOTH", ["A", "B"]],
  ] as const)("maps %s to the configured sequence", (mode, expected) => {
    expect(navigationVersionsForMode(mode)).toEqual(expected);
  });
});
