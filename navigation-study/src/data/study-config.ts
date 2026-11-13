import type { NavigationVersion, StudyMode } from "@/lib/study-types";

// Change this one constant to run the study with Option B or both structures.
export const STUDY_MODE: StudyMode = "OPTION_A_ONLY";

export function navigationVersionsForMode(mode: StudyMode): NavigationVersion[] {
  if (mode === "OPTION_B_ONLY") return ["B"];
  if (mode === "BOTH") return ["A", "B"];
  return ["A"];
}
