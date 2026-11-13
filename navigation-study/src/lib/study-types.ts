export type NavigationVersion = "A" | "B";
export type StudyMode = "OPTION_A_ONLY" | "OPTION_B_ONLY" | "BOTH";
export type Familiarity = "VERY_FAMILIAR" | "SOMEWHAT_FAMILIAR" | "NOT_VERY_FAMILIAR";
export type ComparisonChoice = NavigationVersion | "ABOUT_THE_SAME" | "NOT_SURE";

export interface NavigationCategory { id: string; title: string; }
export interface NavigationOption {
  id: NavigationVersion;
  label: string;
  title: string;
  description: string;
  categories: NavigationCategory[];
}
export interface ParticipantDetails {
  nameOrInitials: string;
  role: string;
  familiarity: Familiarity | "";
}
export interface NavigationComparison {
  reflectsFuturePSP: ComparisonChoice | "";
  makesSenseExternally: ComparisonChoice | "";
  comment: string;
}
export interface IntroductionAnswers {
  participant: ParticipantDetails;
  navigationComparison: NavigationComparison;
}

export interface TopicCardDefinition {
  id: string;
  title: string;
  shortDescription?: string;
  testEnabled: boolean;
  displayOrder: number;
}

export interface CardAssignment {
  cardId: string;
  cardTitle: string;
  categoryId: string;
  categoryTitle: string;
  uncertain: boolean;
  comment: string;
}

export interface NavigationSortResult {
  navigationVersion: NavigationVersion;
  assignments: CardAssignment[];
}

export interface StudyFeedback {
  wantedAdditionalCategory: boolean;
  suggestedCategory: string;
  unclearLabels: string;
  generalComments: string;
}

export interface StudyResult {
  schemaVersion: "1.0";
  study: "PSP Website Navigation Card Sort";
  completedAt: string;
  participantId: string;
  participant: ParticipantDetails;
  navigationComparison: NavigationComparison;
  sorts: NavigationSortResult[];
  feedback: StudyFeedback;
}

export interface WorkingCardState {
  categoryId: string;
  uncertain: boolean;
  comment: string;
}

export interface WorkingSort {
  navigationVersion: NavigationVersion;
  cardOrder: string[];
  cards: Record<string, WorkingCardState>;
}

export interface WorkingStudySession {
  participantId: string;
  activeSortIndex: number;
  sorts: WorkingSort[];
  feedback: StudyFeedback;
  phase: "SORT" | "REVIEW" | "COMPLETE";
  downloaded: boolean;
  completedAt: string;
}

export interface ResultRepository {
  save(result: StudyResult): Promise<void>;
}

export type AgreementLevel = "strong" | "moderate" | "weak";

export interface CardAnalysis {
  navigationVersion: NavigationVersion;
  cardId: string;
  cardTitle: string;
  totalResponses: number;
  categoryCounts: Array<{ categoryId: string; categoryTitle: string; count: number; percentage: number }>;
  mostSelectedCategory: string;
  agreement: number;
  agreementLevel: AgreementLevel;
  uncertainCount: number;
  uncertainPercentage: number;
  comments: Array<{ participantId: string; comment: string }>;
}

export interface CategoryAnalysis {
  navigationVersion: NavigationVersion;
  categoryId: string;
  categoryTitle: string;
  distinctCards: number;
  topCards: Array<{ cardTitle: string; count: number }>;
}

export interface ComparisonAnalysis {
  cardId: string;
  cardTitle: string;
  agreementA: number;
  agreementB: number;
  uncertaintyA: number;
  uncertaintyB: number;
  agreementDifference: number;
  uncertaintyDifference: number;
}

export interface AggregatedAnalysis {
  responseCount: number;
  familiarityCounts: Record<Familiarity | "NOT_PROVIDED", number>;
  navigationSortCounts: Record<NavigationVersion, number>;
  preferenceCounts: {
    reflectsFuturePSP: Record<ComparisonChoice | "NOT_ANSWERED", number>;
    makesSenseExternally: Record<ComparisonChoice | "NOT_ANSWERED", number>;
  };
  cards: CardAnalysis[];
  categories: CategoryAnalysis[];
  confusionPairs: Array<{ navigationVersion: NavigationVersion; cardTitle: string; description: string; splitCount: number }>;
  comparisons: ComparisonAnalysis[];
  qualitative: {
    suggestedCategories: string[];
    unclearLabels: string[];
    generalComments: string[];
  };
}
