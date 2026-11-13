import { ENABLED_TOPIC_CARDS } from "@/data/topic-cards";
import type { NavigationVersion, StudyFeedback, WorkingStudySession, WorkingSort } from "@/lib/study-types";

export const INTRO_STORAGE_KEY = "psp-navigation-study-introduction-v1";
export const SESSION_STORAGE_KEY = "psp-navigation-study-session-v1";

export const EMPTY_FEEDBACK: StudyFeedback = {
  wantedAdditionalCategory: false,
  suggestedCategory: "",
  unclearLabels: "",
  generalComments: "",
};

export function shuffle<T>(items: T[], random: () => number = Math.random): T[] {
  const shuffled = [...items];
  for (let index = shuffled.length - 1; index > 0; index -= 1) {
    const swapIndex = Math.floor(random() * (index + 1));
    [shuffled[index], shuffled[swapIndex]] = [shuffled[swapIndex], shuffled[index]];
  }
  return shuffled;
}

export function createWorkingSort(navigationVersion: NavigationVersion, random: () => number = Math.random): WorkingSort {
  return {
    navigationVersion,
    cardOrder: shuffle(ENABLED_TOPIC_CARDS.map((card) => card.id), random),
    cards: Object.fromEntries(
      ENABLED_TOPIC_CARDS.map((card) => [card.id, { categoryId: "", uncertain: false, comment: "" }]),
    ),
  };
}

export function createWorkingSession(
  navigationVersions: NavigationVersion[],
  participantId: string,
  random: () => number = Math.random,
): WorkingStudySession {
  return {
    participantId,
    activeSortIndex: 0,
    sorts: navigationVersions.map((version) => createWorkingSort(version, random)),
    feedback: { ...EMPTY_FEEDBACK },
    phase: "SORT",
    downloaded: false,
    completedAt: "",
  };
}

export function createParticipantId(): string {
  if (typeof crypto !== "undefined" && "randomUUID" in crypto) {
    return crypto.randomUUID().replace(/-/g, "").slice(0, 6).toUpperCase();
  }
  return Math.random().toString(36).slice(2, 8).toUpperCase();
}
