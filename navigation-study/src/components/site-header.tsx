import Link from "next/link";

export function SiteHeader() {
  return (
    <header className="site-header">
      <div className="site-header__inner">
        <Link className="brand" href="/" aria-label="PSP Website Navigation Study home">
          <span className="brand__mark" aria-hidden="true">PSP</span>
          <span className="brand__text">
            <strong>Puget Sound Partnership</strong>
            <span>Website Navigation Study</span>
          </span>
        </Link>
        <div className="site-header__actions">
          <nav aria-label="Study navigation">
            <Link href="/">Take the study</Link>
            <Link href="/results">Analyze results</Link>
          </nav>
          <span className="prototype-label">Research prototype — not the public PSP website.</span>
        </div>
      </div>
    </header>
  );
}
