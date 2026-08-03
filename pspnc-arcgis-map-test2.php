<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="referrer" content="strict-origin-when-cross-origin">
	<title>PSP Nearshore Conservation Credit Program</title>
	<link rel="stylesheet" href="https://js.arcgis.com/4.34/esri/themes/light/main.css">
	<script src="https://js.arcgis.com/4.34/"></script>
	<style>
		:root {
			--psp-navy: #103d5c;
			--psp-blue: #176d91;
			--psp-teal: #087b79;
			--psp-gold: #f2bd4b;
			--ink: #183343;
			--muted: #5d6d78;
			--surface: #ffffff;
			--surface-soft: #edf5f6;
			--page: #f4f8f9;
			--border: #c7d7dc;
			--success: #176b45;
			--success-bg: #e8f6ee;
			--error: #a32727;
			--error-bg: #fff0f0;
			--loading: #76520e;
			--loading-bg: #fff7df;
			--shadow: 0 18px 48px rgba(16, 61, 92, 0.14);
		}

		* {
			box-sizing: border-box;
		}

		[hidden] {
			display: none !important;
		}

		html {
			min-width: 320px;
			color-scheme: light;
			scroll-behavior: smooth;
		}

		body {
			margin: 0;
			color: var(--ink);
			background:
				linear-gradient(135deg, rgba(23, 109, 145, 0.08), transparent 32rem),
				var(--page);
			font-family: Arial, Helvetica, sans-serif;
			line-height: 1.55;
		}

		a {
			color: #075f85;
			text-underline-offset: 0.16em;
		}

		a:hover {
			text-decoration-thickness: 2px;
		}

		button {
			font: inherit;
		}

		button,
		a,
		[tabindex] {
			outline-offset: 3px;
		}

		button:focus-visible,
		a:focus-visible,
		[tabindex]:focus-visible {
			outline: 3px solid var(--psp-gold);
		}

		.sr-only {
			position: absolute;
			width: 1px;
			height: 1px;
			padding: 0;
			margin: -1px;
			overflow: hidden;
			clip: rect(0, 0, 0, 0);
			white-space: nowrap;
			border: 0;
		}

		.site-header {
			position: relative;
			overflow: hidden;
			color: #fff;
			background: linear-gradient(120deg, var(--psp-navy), var(--psp-blue));
		}

		.site-header::after {
			position: absolute;
			right: -8rem;
			bottom: -13rem;
			width: 29rem;
			height: 29rem;
			border: 4.5rem solid rgba(255, 255, 255, 0.08);
			border-radius: 50%;
			content: "";
		}

		.header-content,
		main {
			width: min(1280px, calc(100% - 2rem));
			margin-inline: auto;
		}

		.header-content {
			position: relative;
			z-index: 1;
			padding: 1.7rem 0 4.1rem;
		}

		.eyebrow,
		.summary-kicker {
			margin: 0 0 0.55rem;
			font-size: 0.78rem;
			font-weight: 800;
			letter-spacing: 0.13em;
			text-transform: uppercase;
		}

		.eyebrow {
			color: #bee8ec;
		}

		h1 {
			max-width: 1060px;
			margin: 0;
			font-size: clamp(2rem, 4vw, 3.1rem);
			line-height: 1.04;
		}

		.intro {
			max-width: 980px;
			margin: 0.65rem 0 0;
			color: #e7f3f5;
			font-size: 1rem;
		}

		main {
			position: relative;
			z-index: 2;
			margin-top: -2.35rem;
			padding: 0 0 4rem;
		}

		.view-navigation {
			position: relative;
		}

		.view-navigation-copy {
			padding: 0 0.25rem 0.55rem;
		}

		.view-navigation-label {
			margin: 0;
			color: #e7f3f5;
			font-size: 0.76rem;
			font-weight: 800;
			letter-spacing: 0.1em;
			text-transform: uppercase;
		}

		.view-tabs {
			display: grid;
			grid-template-columns: repeat(2, minmax(0, 1fr));
			gap: 0.35rem;
			align-items: end;
		}

		.view-tab {
			position: relative;
			display: flex;
			align-items: center;
			gap: 0.75rem;
			min-height: 72px;
			padding: 0.72rem 1rem;
			border: 1px solid #92b2bd;
			border-bottom: 0;
			border-radius: 12px 12px 0 0;
			color: var(--psp-navy);
			background: #dcecef;
			box-shadow: inset 0 -4px 0 rgba(25, 70, 82, 0.08);
			text-align: left;
			cursor: pointer;
			transition: background 150ms ease, border-color 150ms ease, transform 150ms ease;
		}

		.view-tab::after {
			content: "Open";
			flex: 0 0 auto;
			margin-left: auto;
			padding: 0.18rem 0.4rem;
			border: 1px solid rgba(25, 70, 82, 0.28);
			border-radius: 999px;
			font-size: 0.64rem;
			font-weight: 900;
			letter-spacing: 0.06em;
			text-transform: uppercase;
		}

		.view-tab:hover {
			border-color: var(--psp-teal);
			background: #eef7f8;
			transform: translateY(-2px);
		}

		.view-tab[aria-selected="true"] {
			z-index: 1;
			margin-bottom: -1px;
			padding-bottom: calc(0.72rem + 1px);
			border-color: #92b2bd;
			color: var(--psp-navy);
			background: #fff;
			box-shadow: inset 0 5px 0 var(--psp-navy);
			transform: none;
		}

		.view-tab[aria-selected="true"]::before {
			position: absolute;
			right: 0;
			bottom: -2px;
			left: 0;
			height: 3px;
			background: #fff;
			content: "";
		}

		.view-tab[aria-selected="true"]::after {
			content: "Current";
			border-color: rgba(25, 70, 82, 0.16);
			color: var(--muted);
			background: var(--surface-soft);
		}

		.tab-copy {
			display: block;
			min-width: 0;
		}

		.tab-label,
		.tab-title {
			display: block;
		}

		.tab-label {
			font-size: 0.72rem;
			font-weight: 800;
			letter-spacing: 0.09em;
			opacity: 0.75;
			text-transform: uppercase;
		}

		.tab-title {
			font-size: 1.05rem;
			font-weight: 800;
		}

		.status-panel {
			display: flex;
			align-items: center;
			gap: 0.75rem;
			margin: 1rem 0 0;
			padding: 0.8rem 1rem;
			border: 1px solid #e4ca82;
			border-radius: 10px;
			color: var(--loading);
			background: var(--loading-bg);
			font-weight: 700;
		}

		.status-panel[data-state="success"] {
			width: fit-content;
			margin: 0.8rem 0 0;
			padding: 0.52rem 0.78rem;
			border-color: #9ac8ac;
			color: var(--success);
			background: var(--success-bg);
			font-size: 0.88rem;
		}

		.status-panel[data-state="error"] {
			border-color: #e2aaaa;
			color: var(--error);
			background: var(--error-bg);
		}

		.status-dot {
			flex: 0 0 auto;
			width: 0.75rem;
			height: 0.75rem;
			border-radius: 2px;
			background: currentColor;
			box-shadow: 0 0 0 5px rgba(118, 82, 14, 0.12);
		}

		.summary-band {
			display: grid;
			grid-template-columns: minmax(0, 1fr) auto;
			gap: 2rem;
			align-items: center;
			margin-bottom: 0.8rem;
			padding: clamp(1rem, 2.4vw, 1.3rem);
			border: 1px solid var(--border);
			border-radius: 0 0 14px 14px;
			background: #fff;
			box-shadow: 0 10px 24px rgba(13, 45, 54, 0.08);
		}

		.summary-kicker {
			color: var(--psp-teal);
		}

		.summary-copy h2 {
			margin: 0;
			color: var(--psp-navy);
			font-size: clamp(1.5rem, 2.6vw, 1.95rem);
			line-height: 1.15;
		}

		.summary-copy p:last-child {
			max-width: 760px;
			margin: 0.55rem 0 0;
			color: var(--muted);
		}

		.summary-total {
			min-width: 195px;
			padding-left: 1.4rem;
			border-left: 1px solid var(--border);
			text-align: right;
		}

		.summary-value,
		.summary-label {
			display: block;
		}

		.summary-value {
			color: var(--psp-navy);
			font-size: clamp(2.1rem, 4.5vw, 2.85rem);
			font-weight: 800;
			line-height: 1;
		}

		.summary-label {
			margin-top: 0.35rem;
			color: var(--muted);
			font-size: 0.76rem;
			font-weight: 800;
			letter-spacing: 0.08em;
			text-transform: uppercase;
		}

		.explorer-shell {
			display: grid;
			grid-template-columns: minmax(0, 1.55fr) minmax(330px, 0.85fr);
			min-height: 660px;
			overflow: hidden;
			border: 1px solid var(--border);
			border-radius: 16px;
			background: var(--surface);
			box-shadow: var(--shadow);
		}

		.explorer-shell[data-view="sold"] {
			grid-template-columns: minmax(300px, 0.72fr) minmax(0, 1.55fr);
		}

		.map-region {
			position: relative;
			order: 0;
			min-width: 0;
			height: 660px;
			background: #dce9ec;
		}

		.explorer-shell[data-view="sold"] .map-region {
			order: 1;
		}

		#nearshoreMap {
			display: flex;
			width: 100%;
			height: 660px;
		}

		.map-key {
			position: absolute;
			z-index: 2;
			right: 0.85rem;
			bottom: 1.8rem;
			max-width: min(20rem, calc(100% - 1.7rem));
			padding: 0.72rem 0.82rem;
			border: 1px solid rgba(16, 61, 92, 0.22);
			border-radius: 9px;
			background: rgba(255, 255, 255, 0.9);
			box-shadow: 0 5px 20px rgba(16, 61, 92, 0.15);
			font-size: 0.82rem;
			pointer-events: none;
		}

		.map-key strong {
			display: block;
			margin-bottom: 0.2rem;
			color: var(--psp-navy);
		}

		.map-key p {
			margin: 0;
			color: var(--muted);
		}

		.explorer-shell[data-view="sold"] .map-key {
			display: none;
		}

		.side-panel {
			min-width: 0;
			max-height: 660px;
			overflow-y: auto;
			background: #fff;
		}

		.project-panel {
			order: 1;
			border-left: 1px solid var(--border);
		}

		.sold-panel {
			order: 0;
			border-right: 1px solid var(--border);
		}

		.panel-toolbar {
			position: sticky;
			z-index: 3;
			top: 0;
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 1rem;
			padding: 0.85rem 1rem;
			border-bottom: 1px solid var(--border);
			background: rgba(255, 255, 255, 0.96);
			backdrop-filter: blur(6px);
		}

		.panel-toolbar strong {
			color: var(--psp-navy);
		}

		.secondary-button {
			padding: 0.48rem 0.72rem;
			border: 1px solid var(--psp-navy);
			border-radius: 6px;
			color: var(--psp-navy);
			background: #fff;
			font-size: 0.82rem;
			font-weight: 800;
			cursor: pointer;
		}

		.secondary-button:hover {
			color: #fff;
			background: var(--psp-navy);
		}

		.secondary-button:disabled {
			cursor: wait;
			opacity: 0.6;
		}

		.detail-content {
			padding: clamp(1.05rem, 2.4vw, 1.5rem);
		}

		.selection-type {
			display: inline-block;
			margin-bottom: 0.65rem;
			padding: 0.27rem 0.56rem;
			border-radius: 999px;
			color: #3d2b00;
			background: var(--psp-gold);
			font-size: 0.72rem;
			font-weight: 800;
			letter-spacing: 0.08em;
			text-transform: uppercase;
		}

		.detail-content h3 {
			margin: 0 0 0.5rem;
			color: var(--psp-navy);
			font-size: clamp(1.5rem, 3vw, 1.95rem);
			line-height: 1.15;
		}

		.detail-content h4 {
			margin: 1.4rem 0 0.55rem;
			color: var(--psp-navy);
			font-size: 1.02rem;
		}

		.detail-content p {
			margin: 0.35rem 0 1rem;
		}

		.muted {
			color: var(--muted);
		}

		.photo-frame {
			margin: 1rem 0;
			overflow: hidden;
			border: 1px solid var(--border);
			border-radius: 10px;
			background: var(--surface-soft);
		}

		.photo-frame img {
			display: block;
			width: 100%;
			aspect-ratio: 16 / 10;
			object-fit: cover;
		}

		.photo-frame figcaption {
			padding: 0.5rem 0.7rem;
			color: var(--muted);
			font-size: 0.76rem;
		}

		.metric-grid {
			display: grid;
			grid-template-columns: repeat(2, minmax(0, 1fr));
			gap: 0.65rem;
			margin: 1rem 0;
		}

		.metric {
			padding: 0.78rem;
			border: 1px solid var(--border);
			border-top: 4px solid var(--psp-teal);
			border-radius: 8px;
			background: var(--surface-soft);
		}

		.metric-label,
		.metric-value {
			display: block;
		}

		.metric-label {
			margin-bottom: 0.18rem;
			color: var(--muted);
			font-size: 0.68rem;
			font-weight: 800;
			letter-spacing: 0.05em;
			text-transform: uppercase;
		}

		.metric-value {
			color: var(--psp-navy);
			font-size: 1rem;
			font-weight: 800;
			line-height: 1.3;
			overflow-wrap: anywhere;
		}

		.project-browser {
			margin-top: 1rem;
			padding: 1rem;
			border: 1px solid var(--border);
			border-radius: 14px;
			background: #fff;
		}

		.browser-heading {
			display: flex;
			align-items: end;
			justify-content: space-between;
			gap: 1rem;
			margin-bottom: 0.85rem;
		}

		.browser-heading h2 {
			margin: 0;
			color: var(--psp-navy);
			font-size: 1.15rem;
		}

		.browser-heading p {
			margin: 0;
			color: var(--muted);
			font-size: 0.84rem;
		}

		.project-list {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
			gap: 0.75rem;
			padding: 0.15rem;
		}

		.project-card {
			position: relative;
			display: block;
			min-height: 116px;
			padding: 0.85rem;
			border: 1px solid var(--border);
			border-top: 4px solid #9eb6be;
			border-radius: 10px;
			color: var(--ink);
			background: #fff;
			text-align: left;
			cursor: pointer;
		}

		.project-card:hover {
			border-color: var(--psp-blue);
			box-shadow: 0 8px 20px rgba(16, 61, 92, 0.1);
		}

		.project-card[aria-pressed="true"] {
			border-color: var(--psp-navy);
			border-top-color: var(--psp-gold);
			background: #e8f2f4;
			box-shadow: inset 0 0 0 2px var(--psp-navy);
		}

		.project-card-title {
			display: block;
			color: var(--psp-navy);
			font-weight: 800;
			line-height: 1.25;
		}

		.project-card-meta {
			display: block;
			margin-top: 0.45rem;
			color: var(--muted);
			font-size: 0.78rem;
			line-height: 1.4;
		}

		.sold-intro {
			margin: 0;
			padding: 1rem 1rem 0.4rem;
			color: var(--muted);
			font-size: 0.86rem;
		}

		.basin-list {
			display: grid;
			gap: 0.65rem;
			padding: 0.75rem 1rem 1.2rem;
		}

		.basin-card {
			display: grid;
			grid-template-columns: minmax(0, 1fr) auto;
			gap: 0.75rem;
			align-items: center;
			width: 100%;
			padding: 0.8rem;
			border: 1px solid var(--border);
			border-left: 8px solid var(--basin-color, var(--psp-blue));
			border-radius: 10px;
			color: var(--ink);
			background: #fff;
			text-align: left;
			cursor: pointer;
		}

		.basin-card:hover {
			border-color: var(--basin-color, var(--psp-blue));
			box-shadow: 0 7px 18px rgba(16, 61, 92, 0.1);
		}

		.basin-card[aria-pressed="true"] {
			border-color: var(--basin-color, var(--psp-navy));
			background: #edf6f7;
			box-shadow: inset 0 0 0 2px var(--basin-color, var(--psp-navy));
		}

		.basin-name,
		.basin-credits {
			display: block;
		}

		.basin-name {
			color: var(--psp-navy);
			font-weight: 800;
			line-height: 1.25;
		}

		.basin-credits {
			color: var(--psp-navy);
			font-size: 1.25rem;
			font-weight: 900;
			text-align: right;
		}

		.basin-credits small {
			display: block;
			color: var(--muted);
			font-size: 0.6rem;
			letter-spacing: 0.06em;
			text-transform: uppercase;
		}

		.empty-state {
			padding: 1rem;
			border: 1px dashed #9eb6be;
			border-radius: 9px;
			color: var(--muted);
			background: var(--surface-soft);
		}

		.source-panel {
			margin-top: 1rem;
			padding: 1rem 1.1rem;
			border: 1px solid var(--border);
			border-radius: 10px;
			background: #fff;
			font-size: 0.9rem;
		}

		.source-panel summary {
			color: var(--psp-navy);
			font-weight: 800;
			cursor: pointer;
		}

		.source-panel ul {
			margin: 0.75rem 0 0;
			padding-left: 1.2rem;
		}

		@media (max-width: 940px) {
			.explorer-shell,
			.explorer-shell[data-view="sold"] {
				grid-template-columns: 1fr;
			}

			.map-region,
			#nearshoreMap {
				height: 540px;
			}

			.side-panel {
				max-height: none;
			}

			.project-panel {
				border-top: 1px solid var(--border);
				border-left: 0;
			}

			.sold-panel {
				border-right: 0;
				border-bottom: 1px solid var(--border);
			}

			.explorer-shell[data-view="sold"] .map-region {
				order: 1;
			}

			.basin-list {
				grid-template-columns: repeat(2, minmax(0, 1fr));
			}
		}

		@media (max-width: 660px) {
			.header-content,
			main {
				width: min(100% - 1rem, 1280px);
			}

			.header-content {
				padding-top: 2rem;
			}

			.view-tab {
				align-items: flex-start;
				min-height: 78px;
				padding: 0.72rem 0.65rem;
			}

			.view-tab[aria-selected="true"] {
				padding-bottom: calc(0.72rem + 1px);
			}

			.view-tab::after {
				align-self: center;
				padding-inline: 0.32rem;
				font-size: 0.58rem;
			}

			.tab-label {
				font-size: 0.64rem;
			}

			.tab-title {
				font-size: 0.94rem;
			}

			.summary-band {
				grid-template-columns: 1fr;
				gap: 1rem;
			}

			.summary-total {
				padding: 1rem 0 0;
				border-top: 1px solid var(--border);
				border-left: 0;
				text-align: left;
			}

			.explorer-shell {
				border-radius: 10px;
			}

			.map-region,
			#nearshoreMap {
				height: 460px;
			}

			.map-key {
				display: none;
			}

			.metric-grid,
			.basin-list {
				grid-template-columns: 1fr;
			}

			.browser-heading {
				display: block;
			}

			.browser-heading p {
				margin-top: 0.3rem;
			}
		}
	</style>
</head>
<body>
	<header class="site-header">
		<div class="header-content">
			<p class="eyebrow">Puget Sound Partnership</p>
			<h1>Nearshore Conservation Credit Program</h1>
			<p class="intro">
				Explore completed conservation projects and the Nearshore Conservation Credits they
				generated, then see where credits have been sold across Puget Sound. Every number,
				boundary, project, and photo is loaded from the Partnership's public ArcGIS data.
			</p>
		</div>
	</header>

	<main>
		<section class="view-navigation" aria-labelledby="viewNavigationHeading">
			<div class="view-navigation-copy">
				<p class="view-navigation-label">Two ways to explore</p>
				<h2 id="viewNavigationHeading" class="sr-only">Nearshore credit views</h2>
			</div>
			<div class="view-tabs" role="tablist" aria-label="Nearshore credit views">
				<button
					id="generatedTab"
					class="view-tab"
					type="button"
					role="tab"
					aria-selected="true"
					aria-controls="explorerShell"
					data-view="generated"
				>
					<span class="tab-copy">
						<span class="tab-label">Completed projects</span>
						<span class="tab-title">Credits generated</span>
					</span>
				</button>
				<button
					id="soldTab"
					class="view-tab"
					type="button"
					role="tab"
					aria-selected="false"
					aria-controls="explorerShell"
					data-view="sold"
					tabindex="-1"
				>
					<span class="tab-copy">
						<span class="tab-label">Marine service areas</span>
						<span class="tab-title">Credits sold</span>
					</span>
				</button>
			</div>
		</section>

		<section id="summaryPanel" class="summary-band" aria-live="polite">
			<div class="summary-copy">
				<p id="summaryKicker" class="summary-kicker">Credits generated</p>
				<h2 id="summaryHeading">Completed credit-generating projects</h2>
				<p id="summaryDescription">
					Select a project on the map or from the named project cards below.
				</p>
			</div>
			<div class="summary-total">
				<strong id="summaryValue" class="summary-value">--</strong>
				<span id="summaryLabel" class="summary-label">Conservation credits generated</span>
			</div>
		</section>

		<div
			id="explorerShell"
			class="explorer-shell"
			data-view="generated"
			role="tabpanel"
			aria-labelledby="generatedTab"
			aria-busy="true"
		>
			<section class="map-region" aria-label="Interactive Nearshore Credits map">
				<div
					id="nearshoreMap"
					aria-label="Interactive map of Nearshore marine service areas and completed projects"
				></div>
				<div class="map-key" aria-hidden="true">
					<strong id="mapKeyHeading">Map and project cards stay in sync</strong>
					<p id="mapKeyText">Select either one to see the same photo and project details.</p>
				</div>
			</section>

			<aside id="projectPanel" class="side-panel project-panel" aria-label="Selected project details">
				<div class="panel-toolbar">
					<strong>Project details</strong>
					<button id="allProjectsButton" class="secondary-button" type="button" disabled>
						View all projects
					</button>
				</div>
				<div id="projectDetail" class="detail-content">
					<span class="selection-type">Loading</span>
					<h3>Preparing project details</h3>
					<p class="muted">The first completed project will appear when the map is ready.</p>
				</div>
			</aside>

			<aside id="soldPanel" class="side-panel sold-panel" aria-label="Credits sold by marine service area" hidden>
				<div class="panel-toolbar">
					<strong>Marine service areas</strong>
					<button id="allBasinsButton" class="secondary-button" type="button" disabled>
						View all regions
					</button>
				</div>
				<p class="sold-intro">
					Select a region here or on the map. The map labels show the same live totals.
				</p>
				<div id="basinList" class="basin-list"></div>
			</aside>
		</div>

		<nav id="projectBrowser" class="project-browser" aria-labelledby="projectBrowserHeading">
			<div class="browser-heading">
				<h2 id="projectBrowserHeading">Browse completed projects</h2>
				<p>Select a project to see its location, photo, and details.</p>
			</div>
			<div id="projectList" class="project-list"></div>
		</nav>

		<details class="source-panel">
			<summary>Live ArcGIS data sources</summary>
			<ul>
				<li>
					<a
						href="https://www.arcgis.com/home/item.html?id=636b265207054bb2a61e1c0f97e11a10"
						target="_blank"
						rel="noopener"
					>
						Nearshore Conservation Credit Generating Projects Web Map
					</a>
				</li>
				<li>
					<a
						href="https://services7.arcgis.com/iAd79FjHxHKsLP0y/arcgis/rest/services/Service___Nearshore_Basins/FeatureServer/0"
						target="_blank"
						rel="noopener"
					>
						Marine service area boundaries and credits sold
					</a>
				</li>
				<li>
					<a
						href="https://services7.arcgis.com/iAd79FjHxHKsLP0y/arcgis/rest/services/survey123_1671e75d7d1c402a8ad2a313bad67e8b_results/FeatureServer/0"
						target="_blank"
						rel="noopener"
					>
						Completed projects, descriptions, photos, and credits generated
					</a>
				</li>
			</ul>
		</details>

		<div id="statusPanel" class="status-panel" data-state="loading" role="status" aria-live="polite">
			<span class="status-dot" aria-hidden="true"></span>
			<span id="statusText">Loading the live ArcGIS map and records...</span>
		</div>
	</main>

	<script>
		"use strict";

		const webMapItemId = "636b265207054bb2a61e1c0f97e11a10";
		const basinServiceFragment = "service___nearshore_basins/featureserver/0";
		const projectServiceFragment =
			"survey123_1671e75d7d1c402a8ad2a313bad67e8b_results/featureserver/0";

		const basinStyles = {
			"North Puget Sound": { hex: "#1687a7", rgb: [22, 135, 167] },
			"Strait of Juan de Fuca": { hex: "#405bb2", rgb: [64, 91, 178] },
			"Whidbey": { hex: "#77945f", rgb: [119, 148, 95] },
			"Hood Canal": { hex: "#8999c4", rgb: [137, 153, 196] },
			"South Central Puget Sound": { hex: "#e5a425", rgb: [229, 164, 37] }
		};
		const basinOrder = [
			"North Puget Sound",
			"Strait of Juan de Fuca",
			"Whidbey",
			"Hood Canal",
			"South Central Puget Sound"
		];

		const statusPanel = document.getElementById("statusPanel");
		const statusText = document.getElementById("statusText");
		const explorerShell = document.getElementById("explorerShell");
		const summaryKicker = document.getElementById("summaryKicker");
		const summaryHeading = document.getElementById("summaryHeading");
		const summaryDescription = document.getElementById("summaryDescription");
		const summaryValue = document.getElementById("summaryValue");
		const summaryLabel = document.getElementById("summaryLabel");
		const mapKeyHeading = document.getElementById("mapKeyHeading");
		const mapKeyText = document.getElementById("mapKeyText");
		const projectPanel = document.getElementById("projectPanel");
		const projectDetail = document.getElementById("projectDetail");
		const projectBrowser = document.getElementById("projectBrowser");
		const projectList = document.getElementById("projectList");
		const soldPanel = document.getElementById("soldPanel");
		const basinList = document.getElementById("basinList");
		const allProjectsButton = document.getElementById("allProjectsButton");
		const allBasinsButton = document.getElementById("allBasinsButton");
		const viewTabs = Array.from(document.querySelectorAll(".view-tab"));
		const numberFormatter = new Intl.NumberFormat("en-US");
		const dateFormatter = new Intl.DateTimeFormat("en-US", {
			year: "numeric",
			month: "short",
			day: "numeric",
			timeZone: "UTC"
		});

		let basinLayer = null;
		let projectLayer = null;
		let webMap = null;
		let mapView = null;
		let initialViewpoint = null;
		let projects = [];
		let basins = [];
		let activeView = "generated";
		let selectedProjectId = null;
		let selectedBasinId = null;
		let GraphicClass = null;

		function setStatus(state, message) {
			statusPanel.dataset.state = state;
			statusText.textContent = message;
		}

		function normalizeText(value, fallback = "Not provided") {
			const text = value === null || value === undefined ? "" : String(value).trim();
			return text || fallback;
		}

		function numberValue(value) {
			const number = Number(value);
			return Number.isFinite(number) ? number : 0;
		}

		function formatNumber(value) {
			const number = Number(value);
			return Number.isFinite(number) ? numberFormatter.format(number) : "Not provided";
		}

		function parseDate(value) {
			if (typeof value === "number") {
				return new Date(value);
			}

			if (typeof value === "string" && /^\d{4}-\d{2}-\d{2}$/.test(value)) {
				return new Date(value + "T00:00:00Z");
			}

			return value ? new Date(value) : null;
		}

		function formatDate(value) {
			const date = parseDate(value);
			return date && !Number.isNaN(date.getTime()) ? dateFormatter.format(date) : "Not provided";
		}

		function safeWebUrl(value) {
			if (!value) {
				return null;
			}

			try {
				const url = new URL(String(value));
				return url.protocol === "https:" || url.protocol === "http:" ? url.href : null;
			} catch (error) {
				return null;
			}
		}

		function element(tagName, className, text) {
			const node = document.createElement(tagName);
			if (className) {
				node.className = className;
			}
			if (text !== undefined) {
				node.textContent = text;
			}
			return node;
		}

		function featureId(feature, layer) {
			return String(feature.attributes[layer.objectIdField]);
		}

		function addMetric(grid, label, value) {
			const metric = element("div", "metric");
			metric.append(
				element("span", "metric-label", label),
				element("strong", "metric-value", value)
			);
			grid.appendChild(metric);
		}

		function createPhoto(url, altText) {
			const safeUrl = safeWebUrl(url);
			if (!safeUrl) {
				return null;
			}

			const figure = element("figure", "photo-frame");
			const image = document.createElement("img");
			image.src = safeUrl;
			image.alt = altText;
			image.loading = "eager";
			image.addEventListener("error", function () {
				figure.remove();
			});
			figure.append(
				image,
				element("figcaption", "", "Photo supplied by the ArcGIS project record")
			);
			return figure;
		}

		function renderProject(feature) {
			const attributes = feature.attributes || {};
			const name = normalizeText(attributes.project_name, "Completed project");
			const fragment = document.createDocumentFragment();
			fragment.append(
				element("span", "selection-type", "Completed project"),
				element("h3", "", name)
			);

			const photo = createPhoto(attributes.url_for_photo, name + " project photo");
			if (photo) {
				fragment.appendChild(photo);
			}

			const metrics = element("div", "metric-grid");
			addMetric(metrics, "Credits generated", formatNumber(attributes.number_of_credits));
			addMetric(metrics, "Completed", formatDate(attributes.date_completed));
			addMetric(metrics, "Service area", normalizeText(attributes.service_area));
			addMetric(metrics, "Project sponsor", normalizeText(attributes.sponsor_name));
			fragment.appendChild(metrics);
			fragment.append(
				element("h4", "", "What the project accomplished"),
				element("p", "", normalizeText(attributes.description))
			);
			projectDetail.replaceChildren(fragment);
		}

		function updateProjectCardSelection() {
			Array.from(projectList.querySelectorAll(".project-card")).forEach(function (button) {
				const selected = button.dataset.featureId === selectedProjectId;
				button.setAttribute("aria-pressed", String(selected));
			});
		}

		function updateBasinCardSelection() {
			Array.from(basinList.querySelectorAll(".basin-card")).forEach(function (button) {
				const selected = button.dataset.featureId === selectedBasinId;
				button.setAttribute("aria-pressed", String(selected));
			});
		}

		function clearMapHighlight() {
			if (mapView) {
				mapView.graphics.removeAll();
			}
		}

		function highlightProject(feature) {
			clearMapHighlight();
			mapView.graphics.add(
				new GraphicClass({
					geometry: feature.geometry,
					symbol: {
						type: "simple-marker",
						style: "circle",
						size: 25,
						color: [242, 189, 75, 0.18],
						outline: {
							color: [16, 61, 92, 1],
							width: 3
						}
					}
				})
			);
		}

		function highlightBasin(feature) {
			clearMapHighlight();
			mapView.graphics.add(
				new GraphicClass({
					geometry: feature.geometry,
					symbol: {
						type: "simple-fill",
						color: [255, 255, 255, 0.08],
						outline: {
							color: [16, 61, 92, 1],
							width: 4
						}
					}
				})
			);
		}

		async function selectProject(feature, options = {}) {
			selectedProjectId = featureId(feature, projectLayer);
			renderProject(feature);
			updateProjectCardSelection();
			highlightProject(feature);

			const selectedCard = Array.from(projectList.querySelectorAll(".project-card")).find(
				function (button) {
					return button.dataset.featureId === selectedProjectId;
				}
			);
			if (options.revealCard && selectedCard) {
				selectedCard.scrollIntoView({
					behavior: "smooth",
					block: "nearest",
					inline: "center"
				});
			}

			if (options.focusMap !== false) {
				try {
					await mapView.goTo(
						{
							target: feature.geometry,
							scale: 360000
						},
						{ duration: 650 }
					);
				} catch (error) {
					if (error && error.name !== "AbortError") {
						console.warn("Project map focus was interrupted.", error);
					}
				}
			}
		}

		async function selectBasin(feature, options = {}) {
			selectedBasinId = featureId(feature, basinLayer);
			updateBasinCardSelection();
			highlightBasin(feature);

			const selectedCard = Array.from(basinList.querySelectorAll(".basin-card")).find(
				function (button) {
					return button.dataset.featureId === selectedBasinId;
				}
			);
			if (options.revealCard && selectedCard) {
				selectedCard.scrollIntoView({
					behavior: "smooth",
					block: "nearest",
					inline: "nearest"
				});
			}

			if (options.focusMap !== false && feature.geometry && feature.geometry.extent) {
				try {
					await mapView.goTo(feature.geometry.extent.expand(1.15), { duration: 650 });
				} catch (error) {
					if (error && error.name !== "AbortError") {
						console.warn("Service-area map focus was interrupted.", error);
					}
				}
			}
		}

		function renderProjectCards() {
			const fragment = document.createDocumentFragment();
			projects.forEach(function (feature) {
				const attributes = feature.attributes || {};
				const button = element("button", "project-card");
				button.type = "button";
				button.dataset.featureId = featureId(feature, projectLayer);
				button.setAttribute("aria-pressed", "false");
				button.setAttribute(
					"aria-label",
					"View " + normalizeText(attributes.project_name, "completed project")
				);

				const copy = element("span");
				copy.append(
					element(
						"strong",
						"project-card-title",
						normalizeText(attributes.project_name, "Completed project")
					),
					element(
						"span",
						"project-card-meta",
						formatNumber(attributes.number_of_credits) +
							" credits | Completed " +
							formatDate(attributes.date_completed)
					)
				);
				button.appendChild(copy);
				button.addEventListener("click", function () {
					selectProject(feature, { focusMap: true, revealCard: false });
				});
				fragment.appendChild(button);
			});
			projectList.replaceChildren(fragment);
		}

		function basinStyle(name) {
			return basinStyles[name] || { hex: "#5f7d8c", rgb: [95, 125, 140] };
		}

		function renderBasinCards() {
			const fragment = document.createDocumentFragment();
			basins.forEach(function (feature) {
				const attributes = feature.attributes || {};
				const name = normalizeText(attributes.MarineBasin, "Marine service area");
				const style = basinStyle(name);
				const button = element("button", "basin-card");
				button.type = "button";
				button.dataset.featureId = featureId(feature, basinLayer);
				button.style.setProperty("--basin-color", style.hex);
				button.setAttribute("aria-pressed", "false");
				button.setAttribute(
					"aria-label",
					name + ", " + formatNumber(attributes.CreditsSold) + " credits sold"
				);

				const copy = element("span");
				copy.appendChild(element("strong", "basin-name", name));
				const credits = element("strong", "basin-credits");
				credits.append(
					document.createTextNode(formatNumber(attributes.CreditsSold)),
					element("small", "", "credits sold")
				);
				button.append(copy, credits);
				button.addEventListener("click", function () {
					selectBasin(feature, { focusMap: true, revealCard: false });
				});
				fragment.appendChild(button);
			});
			basinList.replaceChildren(fragment);
		}

		function buildBasinRenderer() {
			return {
				type: "unique-value",
				field: "MarineBasin",
				defaultSymbol: {
					type: "simple-fill",
					color: [95, 125, 140, 0.28],
					outline: { color: [95, 125, 140, 1], width: 1.5 }
				},
				uniqueValueInfos: basinOrder.map(function (name) {
					const style = basinStyle(name);
					return {
						value: name,
						label: name,
						symbol: {
							type: "simple-fill",
							color: style.rgb.concat(0.3),
							outline: {
								color: style.rgb.concat(1),
								width: 2
							}
						}
					};
				})
			};
		}

		function generatedLabels() {
			return [
				{
					labelExpressionInfo: {
						expression: "$feature.MarineBasin"
					},
					labelPlacement: "always-horizontal",
					minScale: 2200000,
					maxScale: 180000,
					symbol: {
						type: "text",
						color: "#173042",
						haloColor: "#ffffff",
						haloSize: 1.6,
						font: {
							family: "Arial",
							size: 10,
							weight: "bold"
						}
					}
				}
			];
		}

		function soldLabels() {
			return [
				{
					labelExpressionInfo: {
						expression:
							"$feature.MarineBasin + TextFormatting.NewLine + " +
							"Text($feature.CreditsSold, '#,###')"
					},
					labelPlacement: "always-horizontal",
					minScale: 2600000,
					maxScale: 120000,
					symbol: {
						type: "text",
						color: "#173042",
						haloColor: "#ffffff",
						haloSize: 2,
						font: {
							family: "Arial",
							size: 12,
							weight: "bold"
						}
					}
				}
			];
		}

		function totalCredits(features, field) {
			return features.reduce(function (sum, feature) {
				return sum + numberValue(feature.attributes[field]);
			}, 0);
		}

		function latestBasinDate() {
			return basins.reduce(function (latest, feature) {
				const date = parseDate(feature.attributes.LastUpdate);
				if (!date || Number.isNaN(date.getTime())) {
					return latest;
				}
				return !latest || date > latest ? date : latest;
			}, null);
		}

		function updateSummary() {
			if (activeView === "generated") {
				summaryKicker.textContent = "Credits generated";
				summaryHeading.textContent = "Completed credit-generating projects";
				summaryDescription.textContent =
					"Select a project on the map or from the named project cards below.";
				summaryValue.textContent = formatNumber(totalCredits(projects, "number_of_credits"));
				summaryLabel.textContent = "Conservation credits generated";
				mapKeyHeading.textContent = "Map and project cards stay in sync";
				mapKeyText.textContent =
					"Select either one to see the same photo and project details.";
			} else {
				const date = latestBasinDate();
				summaryKicker.textContent = "Credits sold";
				summaryHeading.textContent = "Credits sold by marine service area";
				summaryDescription.textContent =
					"Compare all five regions, then select one to bring its boundary into focus" +
					(date ? ". Data current as of " + formatDate(date) + "." : ".");
				summaryValue.textContent = formatNumber(totalCredits(basins, "CreditsSold"));
				summaryLabel.textContent = "Conservation credits sold";
				mapKeyHeading.textContent = "Map and region cards stay in sync";
				mapKeyText.textContent =
					"Labels show live totals. Select a region to emphasize its boundary.";
			}
		}

		function updateMapMode() {
			if (!basinLayer || !projectLayer) {
				return;
			}

			const generated = activeView === "generated";
			projectLayer.visible = generated;
			basinLayer.visible = true;
			basinLayer.opacity = generated ? 0.7 : 0.9;
			basinLayer.labelsVisible = true;
			basinLayer.labelingInfo = generated ? generatedLabels() : soldLabels();
			clearMapHighlight();

			if (generated && selectedProjectId) {
				const selected = projects.find(function (feature) {
					return featureId(feature, projectLayer) === selectedProjectId;
				});
				if (selected) {
					highlightProject(selected);
				}
			} else if (!generated && selectedBasinId) {
				const selected = basins.find(function (feature) {
					return featureId(feature, basinLayer) === selectedBasinId;
				});
				if (selected) {
					highlightBasin(selected);
				}
			}
		}

		function setActiveView(viewName, options = {}) {
			if (viewName !== "generated" && viewName !== "sold") {
				return;
			}

			const previousView = activeView;
			activeView = viewName;
			const generated = activeView === "generated";
			explorerShell.dataset.view = activeView;
			explorerShell.setAttribute(
				"aria-labelledby",
				generated ? "generatedTab" : "soldTab"
			);
			projectPanel.hidden = !generated;
			projectBrowser.hidden = !generated;
			soldPanel.hidden = generated;

			viewTabs.forEach(function (tab) {
				const selected = tab.dataset.view === activeView;
				tab.setAttribute("aria-selected", String(selected));
				tab.tabIndex = selected ? 0 : -1;
			});

			updateSummary();
			updateMapMode();

			if (
				previousView !== activeView &&
				mapView &&
				initialViewpoint &&
				options.preserveMapView !== true
			) {
				mapView.goTo(initialViewpoint, { duration: 500 }).catch(function (error) {
					if (error && error.name !== "AbortError") {
						console.warn("The map overview could not be restored.", error);
					}
				});
			}

			if (options.focusTab) {
				const activeTab = viewTabs.find(function (tab) {
					return tab.dataset.view === activeView;
				});
				if (activeTab) {
					activeTab.focus();
				}
			}
		}

		function findLayerByService(fragment, expectedTitles) {
			const lowerFragment = fragment.toLowerCase();
			return webMap.allLayers.find(function (layer) {
				const layerUrl = String(layer.url || "").toLowerCase();
				const layerTitle = String(layer.title || "").toLowerCase();
				return (
					layerUrl.includes(lowerFragment) ||
					expectedTitles.some(function (title) {
						return layerTitle === title.toLowerCase();
					})
				);
			});
		}

		async function handleMapClick(event) {
			if (!mapView || !basinLayer || !projectLayer) {
				return;
			}

			try {
				const targetLayer = activeView === "generated" ? projectLayer : basinLayer;
				const response = await mapView.hitTest(event, { include: [targetLayer] });
				const result = response.results.find(function (item) {
					return item.type === "graphic" && item.graphic.layer === targetLayer;
				});

				if (!result) {
					return;
				}

				if (activeView === "generated") {
					const id = String(result.graphic.attributes[projectLayer.objectIdField]);
					const feature = projects.find(function (project) {
						return featureId(project, projectLayer) === id;
					});
					if (feature) {
						await selectProject(feature, { focusMap: false, revealCard: true });
					}
				} else {
					const id = String(result.graphic.attributes[basinLayer.objectIdField]);
					const feature = basins.find(function (basin) {
						return featureId(basin, basinLayer) === id;
					});
					if (feature) {
						await selectBasin(feature, { focusMap: false, revealCard: true });
					}
				}
			} catch (error) {
				setStatus("error", "The map loaded, but the selected feature could not be read.");
				console.error("Nearshore map hit test failed.", error);
			}
		}

		async function showAll() {
			if (!mapView || !initialViewpoint) {
				return;
			}

			allProjectsButton.disabled = true;
			allBasinsButton.disabled = true;
			selectedBasinId = null;
			updateBasinCardSelection();
			clearMapHighlight();

			try {
				await mapView.goTo(initialViewpoint, { duration: 650 });
				if (activeView === "generated" && selectedProjectId) {
					const selected = projects.find(function (feature) {
						return featureId(feature, projectLayer) === selectedProjectId;
					});
					if (selected) {
						highlightProject(selected);
					}
				}
			} catch (error) {
				if (error && error.name !== "AbortError") {
					console.warn("Map overview was interrupted.", error);
				}
			} finally {
				allProjectsButton.disabled = false;
				allBasinsButton.disabled = false;
			}
		}

		function showInitializationError(error) {
			explorerShell.setAttribute("aria-busy", "false");
			setStatus(
				"error",
				"Map failed to load: " +
					(error && error.message ? error.message : "Unknown ArcGIS error.")
			);
			projectDetail.replaceChildren(
				element(
					"div",
					"empty-state",
					"The live ArcGIS data could not be loaded. Try refreshing the page."
				)
			);
			console.error("Nearshore map initialization failed.", error);
		}

		function initialize() {
			setStatus("loading", "Loading ArcGIS map modules...");

			require(
				[
					"esri/config",
					"esri/WebMap",
					"esri/views/MapView",
					"esri/Graphic"
				],
				async function (arcgisConfig, WebMapClass, MapViewClass, Graphic) {
					try {
						GraphicClass = Graphic;
						arcgisConfig.portalUrl = "https://wa-psp.maps.arcgis.com";
						webMap = new WebMapClass({
							portalItem: {
								id: webMapItemId
							}
						});
						mapView = new MapViewClass({
							container: "nearshoreMap",
							map: webMap,
							popupEnabled: false,
							constraints: {
								snapToZoom: false
							}
						});

						setStatus("loading", "Loading the saved Nearshore Web Map...");
						await mapView.when();
						initialViewpoint = mapView.viewpoint.clone();
						basinLayer = findLayerByService(basinServiceFragment, [
							"Marine Service Areas",
							"WA PSP Nearshore Service Areas"
						]);
						projectLayer = findLayerByService(projectServiceFragment, [
							"Completed Projects"
						]);

						if (!basinLayer || !projectLayer) {
							throw new Error("The saved Web Map did not contain the expected public layers.");
						}

						await Promise.all([basinLayer.load(), projectLayer.load()]);
						basinLayer.outFields = ["*"];
						projectLayer.outFields = ["*"];
						basinLayer.renderer = buildBasinRenderer();

						const results = await Promise.all([
							projectLayer.queryFeatures({
								where: "1=1",
								outFields: ["*"],
								returnGeometry: true
							}),
							basinLayer.queryFeatures({
								where: "1=1",
								outFields: ["*"],
								returnGeometry: true
							})
						]);

						projects = results[0].features.sort(function (a, b) {
							const aDate = parseDate(a.attributes.date_completed);
							const bDate = parseDate(b.attributes.date_completed);
							return (bDate ? bDate.getTime() : 0) - (aDate ? aDate.getTime() : 0);
						});
						basins = results[1].features.sort(function (a, b) {
							const aName = normalizeText(a.attributes.MarineBasin, "");
							const bName = normalizeText(b.attributes.MarineBasin, "");
							const aIndex = basinOrder.indexOf(aName);
							const bIndex = basinOrder.indexOf(bName);
							return (aIndex === -1 ? 99 : aIndex) - (bIndex === -1 ? 99 : bIndex);
						});

						if (!projects.length || !basins.length) {
							throw new Error("The expected project or marine-service-area records were empty.");
						}

						renderProjectCards();
						renderBasinCards();
						mapView.on("click", handleMapClick);
						allProjectsButton.disabled = false;
						allBasinsButton.disabled = false;
						explorerShell.setAttribute("aria-busy", "false");
						setActiveView("generated");
						await selectProject(projects[0], { focusMap: false, revealCard: false });
						setStatus(
							"success",
							"Live data ready: " +
								projects.length +
								" completed projects and " +
								basins.length +
								" marine service areas loaded."
						);
					} catch (error) {
						showInitializationError(error);
					}
				},
				showInitializationError
			);
		}

		viewTabs.forEach(function (tab) {
			tab.addEventListener("click", function () {
				setActiveView(tab.dataset.view);
			});
			tab.addEventListener("keydown", function (event) {
				if (event.key !== "ArrowLeft" && event.key !== "ArrowRight") {
					return;
				}
				event.preventDefault();
				const nextView =
					activeView === "generated" ? "sold" : "generated";
				setActiveView(nextView, { focusTab: true });
			});
		});

		allProjectsButton.addEventListener("click", showAll);
		allBasinsButton.addEventListener("click", showAll);
		initialize();
	</script>
</body>
</html>
