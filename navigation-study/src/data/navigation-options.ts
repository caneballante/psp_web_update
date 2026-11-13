import type { NavigationOption } from "@/lib/study-types";

export const NAVIGATION_OPTIONS: Record<"A" | "B", NavigationOption> = {
  A: {
    id: "A",
    label: "Option A",
    title: "Topic-based",
    description: "A balanced structure organized around the major subject areas of the Partnership’s work.",
    categories: [
      { id: "recovery-work", title: "Recovery Work" },
      { id: "science-data-reports", title: "Science, Data & Reports" },
      { id: "funding-projects", title: "Funding & Projects" },
      { id: "policy-government", title: "Policy & Government" },
      { id: "boards-meetings", title: "Boards & Meetings" },
      { id: "about-psp", title: "About PSP" },
    ],
  },
  B: {
    id: "B",
    label: "Option B",
    title: "Implementation-oriented",
    description: "An implementation-oriented structure emphasizing moving regional recovery strategies into coordinated action.",
    categories: [
      { id: "implementing-recovery", title: "Implementing Recovery" },
      { id: "funding-project-support", title: "Funding & Project Support" },
      { id: "science-monitoring-results", title: "Science, Monitoring & Results" },
      { id: "local-tribal-government-partnerships", title: "Local, Tribal & Government Partnerships" },
      { id: "planning-policy-governance", title: "Planning, Policy & Governance" },
      { id: "about-psp", title: "About PSP" },
    ],
  },
};

export const UTILITY_NAVIGATION = ["Meetings", "Staff", "Jobs", "Contact", "Search"];
