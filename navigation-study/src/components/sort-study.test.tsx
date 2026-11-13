import { fireEvent, render, screen, waitFor, within } from "@testing-library/react";
import { beforeEach, describe, expect, it, vi } from "vitest";
import { SortStudy } from "@/components/sort-study";

vi.mock("next/navigation", () => ({
  useRouter: () => ({ push: vi.fn() }),
}));

describe("SortStudy interactions", () => {
  beforeEach(() => {
    window.sessionStorage.clear();
  });

  it("moves a topic with drag-and-drop and with the accessible click path", async () => {
    const { container } = render(<SortStudy />);
    await screen.findByText("0 of 31 sorted");

    const firstCard = container.querySelector<HTMLButtonElement>(".topic-card--pile");
    const firstCardId = firstCard?.dataset.cardId;
    const recoveryZone = screen.getByRole("button", { name: "Recovery Work, 0 topics" }).closest("section");
    expect(firstCard).not.toBeNull();
    expect(firstCardId).toBeTruthy();
    expect(recoveryZone).not.toBeNull();

    const data = new Map<string, string>();
    const dataTransfer = {
      dropEffect: "none",
      effectAllowed: "none",
      setData: (type: string, value: string) => data.set(type, value),
      getData: (type: string) => data.get(type) ?? "",
    };
    fireEvent.dragStart(firstCard!, { dataTransfer });
    fireEvent.dragOver(recoveryZone!, { dataTransfer });
    fireEvent.drop(recoveryZone!, { dataTransfer });
    await screen.findByText("1 of 31 sorted");

    const movedCard = container.querySelector<HTMLButtonElement>(`[data-card-id="${firstCardId}"]`)!;
    fireEvent.click(movedCard);
    const scienceTarget = screen.getByRole("button", { name: /Place .+ in Science, Data & Reports/ });
    fireEvent.click(scienceTarget);

    await waitFor(() => expect(scienceTarget.closest("section")?.querySelector(`[data-card-id="${firstCardId}"]`)).not.toBeNull());
  });

  it("lets a participant pick an obvious card from anywhere in the pile", async () => {
    const { container } = render(<SortStudy />);
    const view = within(container);
    await view.findByText("0 of 31 sorted");

    fireEvent.click(view.getByRole("button", { name: "Jobs" }));
    fireEvent.click(view.getByRole("button", { name: "Place Jobs in About PSP" }));

    await view.findByText("1 of 31 sorted");
    expect(view.getByText("Added to About PSP")).toBeInTheDocument();
  });
});
