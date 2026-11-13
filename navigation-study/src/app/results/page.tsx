import type { Metadata } from "next";
import { ResultsAnalysis } from "@/components/results-analysis";

export const metadata: Metadata = {
  title: "Local results analysis",
  description: "Import and explore PSP navigation card-sort result files locally in the browser.",
};

export default function ResultsPage() {
  return <ResultsAnalysis />;
}
