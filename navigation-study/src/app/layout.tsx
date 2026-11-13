import type { Metadata } from "next";
import "./globals.css";

export const metadata: Metadata = {
  title: {
    default: "PSP Website Navigation Study",
    template: "%s | PSP Navigation Study",
  },
  description:
    "A local-first research prototype for testing Puget Sound Partnership website navigation concepts.",
};

export default function RootLayout({ children }: LayoutProps<"/">) {
  return (
    <html lang="en" data-scroll-behavior="smooth">
      <body>{children}</body>
    </html>
  );
}
