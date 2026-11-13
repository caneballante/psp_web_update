import { NAVIGATION_OPTIONS } from "@/data/navigation-options";
import { ENABLED_TOPIC_CARDS } from "@/data/topic-cards";
import type {
  AggregatedAnalysis, CardAnalysis, CategoryAnalysis, ComparisonAnalysis, ComparisonChoice,
  Familiarity, NavigationVersion, StudyResult,
} from "@/lib/study-types";

const preferenceKeys: Array<ComparisonChoice | "NOT_ANSWERED"> = ["A", "B", "ABOUT_THE_SAME", "NOT_SURE", "NOT_ANSWERED"];

function emptyPreferenceCounts() {
  return Object.fromEntries(preferenceKeys.map((key) => [key, 0])) as Record<ComparisonChoice | "NOT_ANSWERED", number>;
}

function agreementLevel(agreement: number): "strong" | "moderate" | "weak" {
  if (agreement >= 0.8) return "strong";
  if (agreement >= 0.6) return "moderate";
  return "weak";
}

export function analyzeResults(results: StudyResult[]): AggregatedAnalysis {
  const familiarityCounts: Record<Familiarity | "NOT_PROVIDED", number> = {
    VERY_FAMILIAR: 0, SOMEWHAT_FAMILIAR: 0, NOT_VERY_FAMILIAR: 0, NOT_PROVIDED: 0,
  };
  const navigationSortCounts: Record<NavigationVersion, number> = { A: 0, B: 0 };
  const preferenceCounts = { reflectsFuturePSP: emptyPreferenceCounts(), makesSenseExternally: emptyPreferenceCounts() };

  results.forEach((result) => {
    const familiarity = result.participant.familiarity || "NOT_PROVIDED";
    familiarityCounts[familiarity as Familiarity | "NOT_PROVIDED"] += 1;
    const future = result.navigationComparison.reflectsFuturePSP || "NOT_ANSWERED";
    const external = result.navigationComparison.makesSenseExternally || "NOT_ANSWERED";
    preferenceCounts.reflectsFuturePSP[future] += 1;
    preferenceCounts.makesSenseExternally[external] += 1;
    result.sorts.forEach((sort) => { navigationSortCounts[sort.navigationVersion] += 1; });
  });

  const presentVersions = (["A", "B"] as NavigationVersion[]).filter((version) => navigationSortCounts[version] > 0);
  const cards: CardAnalysis[] = presentVersions.flatMap((version) => {
    const option = NAVIGATION_OPTIONS[version];
    return ENABLED_TOPIC_CARDS.map((card) => {
      const assignments = results.flatMap((result) => result.sorts.filter((sort) => sort.navigationVersion === version).flatMap((sort) => sort.assignments.filter((assignment) => assignment.cardId === card.id).map((assignment) => ({ result, assignment }))));
      const responseTotal = navigationSortCounts[version];
      const categoryCounts = option.categories.map((category) => {
        const count = assignments.filter(({ assignment }) => assignment.categoryId === category.id).length;
        return { categoryId: category.id, categoryTitle: category.title, count, percentage: responseTotal ? count / responseTotal : 0 };
      });
      const top = [...categoryCounts].sort((a, b) => b.count - a.count)[0];
      const uncertain = assignments.filter(({ assignment }) => assignment.uncertain);
      const agreement = responseTotal ? top.count / responseTotal : 0;
      return {
        navigationVersion: version,
        cardId: card.id,
        cardTitle: card.title,
        totalResponses: responseTotal,
        categoryCounts,
        mostSelectedCategory: top?.count ? top.categoryTitle : "—",
        agreement,
        agreementLevel: agreementLevel(agreement),
        uncertainCount: uncertain.length,
        uncertainPercentage: responseTotal ? uncertain.length / responseTotal : 0,
        comments: assignments.filter(({ assignment }) => assignment.comment.trim()).map(({ result, assignment }) => ({ participantId: result.participantId, comment: assignment.comment.trim() })),
      };
    });
  });

  const categories: CategoryAnalysis[] = presentVersions.flatMap((version) => NAVIGATION_OPTIONS[version].categories.map((category) => {
    const matching = results.flatMap((result) => result.sorts.filter((sort) => sort.navigationVersion === version).flatMap((sort) => sort.assignments.filter((assignment) => assignment.categoryId === category.id)));
    const cardCounts = new Map<string, { cardTitle: string; count: number }>();
    matching.forEach((assignment) => cardCounts.set(assignment.cardId, { cardTitle: assignment.cardTitle, count: (cardCounts.get(assignment.cardId)?.count ?? 0) + 1 }));
    return {
      navigationVersion: version,
      categoryId: category.id,
      categoryTitle: category.title,
      distinctCards: cardCounts.size,
      topCards: [...cardCounts.values()].sort((a, b) => b.count - a.count || a.cardTitle.localeCompare(b.cardTitle)).slice(0, 5),
    };
  }));

  const confusionPairs = cards.flatMap((card) => {
    const ranked = [...card.categoryCounts].filter((category) => category.count > 0).sort((a, b) => b.count - a.count);
    if (ranked.length < 2) return [];
    return [{
      navigationVersion: card.navigationVersion,
      cardTitle: card.cardTitle,
      description: `${card.cardTitle} was split primarily between ${ranked[0].categoryTitle} and ${ranked[1].categoryTitle}.`,
      splitCount: ranked[0].count + ranked[1].count,
    }];
  }).sort((a, b) => b.splitCount - a.splitCount).slice(0, 12);

  const comparisons: ComparisonAnalysis[] = ENABLED_TOPIC_CARDS.flatMap((card) => {
    const a = cards.find((item) => item.navigationVersion === "A" && item.cardId === card.id);
    const b = cards.find((item) => item.navigationVersion === "B" && item.cardId === card.id);
    if (!a || !b || a.mostSelectedCategory === "—" || b.mostSelectedCategory === "—") return [];
    return [{
      cardId: card.id,
      cardTitle: card.title,
      agreementA: a.agreement,
      agreementB: b.agreement,
      uncertaintyA: a.uncertainPercentage,
      uncertaintyB: b.uncertainPercentage,
      agreementDifference: b.agreement - a.agreement,
      uncertaintyDifference: b.uncertainPercentage - a.uncertainPercentage,
    }];
  });

  return {
    responseCount: results.length,
    familiarityCounts,
    navigationSortCounts,
    preferenceCounts,
    cards,
    categories,
    confusionPairs,
    comparisons,
    qualitative: {
      suggestedCategories: results.map((result) => result.feedback.suggestedCategory.trim()).filter(Boolean),
      unclearLabels: results.map((result) => result.feedback.unclearLabels.trim()).filter(Boolean),
      generalComments: results.map((result) => result.feedback.generalComments.trim()).filter(Boolean),
    },
  };
}
