import type { Metadata } from "next";
import { SortStudy } from "@/components/sort-study";

export const metadata: Metadata = {
  title: "Card sorting",
  description: "Sort Puget Sound Partnership topics into a proposed navigation structure.",
};

export default function SortPage() {
  return <SortStudy />;
}
