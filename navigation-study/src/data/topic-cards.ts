import type { TopicCardDefinition } from "@/lib/study-types";

const titles = [
  "Action Agenda",
  "Implementation Strategies",
  "Results-Based / Adaptive Management",
  "Salmon Recovery",
  "Local Recovery / Local Integrating Organizations",
  "Strategic Initiative Leads",
  "National Estuary Program",
  "Human Wellbeing",
  "Nearshore Conservation Credits",
  "Science & Research",
  "Evaluation & Effectiveness",
  "Ecosystem Monitoring / PSEMP",
  "Vital Signs / Recovery Indicators",
  "State of the Sound",
  "Future Scenarios / Alternative Futures",
  "Puget Sound Data & Tools",
  "Puget Sound Acquisition and Restoration / PSAR",
  "Strategic Funding",
  "RAFT / Funding & Technical Assistance",
  "Boards & Councils",
  "Meetings & Agendas",
  "Government Relations",
  "Tribal Relations",
  "Community & Partner Engagement",
  "Environmental Justice / HEAL",
  "Multi-Agency Review Team / Regulatory Coordination",
  "About Puget Sound & Recovery",
  "About the Puget Sound Partnership",
  "Staff & Contact",
  "Jobs",
  "News & Updates / Making Waves",
] as const;

function slugify(value: string) {
  return value
    .toLowerCase()
    .replace(/&/g, "and")
    .replace(/[^a-z0-9]+/g, "-")
    .replace(/^-|-$/g, "");
}

export const TOPIC_CARDS: TopicCardDefinition[] = titles.map((title, index) => ({
  id: slugify(title),
  title,
  testEnabled: true,
  displayOrder: index + 1,
}));

export const ENABLED_TOPIC_CARDS = TOPIC_CARDS.filter((card) => card.testEnabled).sort(
  (a, b) => a.displayOrder - b.displayOrder,
);

export const TOPIC_CARD_BY_ID = new Map(TOPIC_CARDS.map((card) => [card.id, card]));
