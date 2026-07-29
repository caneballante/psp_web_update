<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="referrer" content="strict-origin-when-cross-origin">
	<title>PSP Native ArcGIS Map Test</title>
	<link rel="stylesheet" href="https://js.arcgis.com/4.34/esri/themes/light/main.css">
	<script src="https://js.arcgis.com/4.34/"></script>
	<style>
		:root {
			--psp-navy: #123b5d;
			--psp-blue: #176d91;
			--psp-teal: #087b79;
			--psp-gold: #f2bd4b;
			--ink: #173042;
			--muted: #5c6d79;
			--surface: #ffffff;
			--surface-soft: #edf5f6;
			--border: #c9d8dd;
			--success: #176b45;
			--success-bg: #e8f6ee;
			--error: #a32727;
			--error-bg: #fff0f0;
			--loading: #76520e;
			--loading-bg: #fff7df;
			--shadow: 0 16px 42px rgba(18, 59, 93, 0.14);
		}

		* {
			box-sizing: border-box;
		}

		html {
			min-width: 320px;
			color-scheme: light;
		}

		body {
			margin: 0;
			color: var(--ink);
			background:
				linear-gradient(135deg, rgba(23, 109, 145, 0.08), transparent 32rem),
				#f4f8f9;
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
			padding: 2.9rem 0 2.6rem;
		}

		.eyebrow {
			margin: 0 0 0.55rem;
			color: #bee8ec;
			font-size: 0.82rem;
			font-weight: 700;
			letter-spacing: 0.13em;
			text-transform: uppercase;
		}

		h1 {
			max-width: 860px;
			margin: 0;
			font-size: clamp(2.1rem, 5vw, 3.7rem);
			line-height: 1.05;
		}

		.intro {
			max-width: 830px;
			margin: 1.1rem 0 0;
			color: #e6f3f5;
			font-size: 1.08rem;
		}

		main {
			padding: 1.5rem 0 4rem;
		}

		.status-panel {
			display: flex;
			align-items: center;
			gap: 0.8rem;
			margin-bottom: 1rem;
			padding: 0.9rem 1.05rem;
			border: 1px solid #e4ca82;
			border-radius: 10px;
			color: var(--loading);
			background: var(--loading-bg);
			font-weight: 700;
		}

		.status-panel[data-state="success"] {
			border-color: #9ac8ac;
			color: var(--success);
			background: var(--success-bg);
		}

		.status-panel[data-state="error"] {
			border-color: #e2aaaa;
			color: var(--error);
			background: var(--error-bg);
		}

		.status-dot {
			flex: 0 0 auto;
			width: 0.8rem;
			height: 0.8rem;
			border-radius: 50%;
			background: currentColor;
			box-shadow: 0 0 0 5px rgba(118, 82, 14, 0.12);
		}

		.map-shell {
			display: grid;
			grid-template-columns: minmax(0, 1.7fr) minmax(320px, 0.85fr);
			min-height: 720px;
			overflow: hidden;
			border: 1px solid var(--border);
			border-radius: 16px;
			background: var(--surface);
			box-shadow: var(--shadow);
		}

		.map-region {
			position: relative;
			min-width: 0;
			height: 720px;
			background: #dce9ec;
		}

		#nearshoreMap {
			display: flex;
			width: 100%;
			height: 720px;
		}

		.map-key {
			position: absolute;
			z-index: 2;
			right: 0.85rem;
			bottom: 1.8rem;
			max-width: min(18rem, calc(100% - 1.7rem));
			padding: 0.75rem 0.85rem;
			border: 1px solid rgba(18, 59, 93, 0.2);
			border-radius: 9px;
			background: rgba(255, 255, 255, 0.94);
			box-shadow: 0 4px 18px rgba(18, 59, 93, 0.15);
			font-size: 0.84rem;
			pointer-events: none;
		}

		.map-key strong {
			display: block;
			margin-bottom: 0.3rem;
			color: var(--psp-navy);
		}

		.map-key p {
			margin: 0.15rem 0;
		}

		.detail-panel {
			min-width: 0;
			max-height: 720px;
			overflow-y: auto;
			border-left: 1px solid var(--border);
			background: #fff;
		}

		.detail-toolbar {
			position: sticky;
			z-index: 1;
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

		.detail-toolbar strong {
			color: var(--psp-navy);
		}

		.reset-button {
			padding: 0.55rem 0.8rem;
			border: 0;
			border-radius: 6px;
			color: #fff;
			background: var(--psp-navy);
			font: inherit;
			font-size: 0.86rem;
			font-weight: 700;
			cursor: pointer;
		}

		.reset-button:hover {
			background: #092e4a;
		}

		.reset-button:disabled {
			cursor: wait;
			opacity: 0.6;
		}

		.detail-content {
			padding: clamp(1.1rem, 3vw, 1.6rem);
		}

		.selection-type {
			display: inline-block;
			margin-bottom: 0.7rem;
			padding: 0.28rem 0.58rem;
			border-radius: 999px;
			color: #fff;
			background: var(--psp-teal);
			font-size: 0.75rem;
			font-weight: 700;
			letter-spacing: 0.08em;
			text-transform: uppercase;
		}

		.selection-type.project {
			color: #3d2b00;
			background: var(--psp-gold);
		}

		.detail-content h2 {
			margin: 0 0 0.45rem;
			color: var(--psp-navy);
			font-size: clamp(1.55rem, 4vw, 2rem);
			line-height: 1.15;
		}

		.detail-content h3 {
			margin: 1.6rem 0 0.75rem;
			color: var(--psp-navy);
			font-size: 1.15rem;
		}

		.detail-content p {
			margin: 0.4rem 0 1rem;
		}

		.muted {
			color: var(--muted);
		}

		.metric-grid {
			display: grid;
			grid-template-columns: repeat(2, minmax(0, 1fr));
			gap: 0.7rem;
			margin: 1.15rem 0;
		}

		.metric {
			padding: 0.85rem;
			border: 1px solid var(--border);
			border-top: 4px solid var(--psp-teal);
			border-radius: 8px;
			background: var(--surface-soft);
		}

		.metric-label {
			display: block;
			margin-bottom: 0.2rem;
			color: var(--muted);
			font-size: 0.72rem;
			font-weight: 700;
			letter-spacing: 0.05em;
			text-transform: uppercase;
		}

		.metric-value {
			display: block;
			color: var(--psp-navy);
			font-size: 1.05rem;
			font-weight: 700;
			line-height: 1.3;
			overflow-wrap: anywhere;
		}

		.photo-frame {
			margin: 1rem 0 1.15rem;
			overflow: hidden;
			border: 1px solid var(--border);
			border-radius: 10px;
			background: var(--surface-soft);
		}

		.photo-frame img {
			display: block;
			width: 100%;
			max-height: 290px;
			object-fit: cover;
		}

		.photo-frame figcaption {
			padding: 0.55rem 0.75rem;
			color: var(--muted);
			font-size: 0.78rem;
		}

		.provider-list {
			display: grid;
			gap: 0.8rem;
		}

		.provider-card {
			display: grid;
			grid-template-columns: 76px minmax(0, 1fr);
			gap: 0.85rem;
			align-items: center;
			padding: 0.85rem;
			border: 1px solid var(--border);
			border-radius: 9px;
			background: #fff;
		}

		.provider-logo {
			display: flex;
			align-items: center;
			justify-content: center;
			width: 76px;
			height: 68px;
			padding: 0.25rem;
			border-radius: 5px;
			background: #f4f7f8;
		}

		.provider-logo img {
			max-width: 100%;
			max-height: 100%;
			object-fit: contain;
		}

		.provider-card h4 {
			margin: 0 0 0.3rem;
			color: var(--psp-navy);
			font-size: 1rem;
			line-height: 1.25;
		}

		.provider-card p {
			margin: 0.18rem 0;
			font-size: 0.84rem;
			overflow-wrap: anywhere;
		}

		.empty-state {
			padding: 1rem;
			border: 1px dashed #9eb6be;
			border-radius: 9px;
			color: var(--muted);
			background: var(--surface-soft);
		}

		.empty-state ul {
			margin: 0.6rem 0 0;
			padding-left: 1.2rem;
		}

		.source-panel {
			margin-top: 1.25rem;
			padding: 1rem 1.1rem;
			border: 1px solid var(--border);
			border-radius: 10px;
			background: #fff;
			font-size: 0.9rem;
		}

		.source-panel summary {
			color: var(--psp-navy);
			font-weight: 700;
			cursor: pointer;
		}

		.source-panel ul {
			margin: 0.75rem 0 0;
			padding-left: 1.2rem;
		}

		@media (max-width: 920px) {
			.map-shell {
				grid-template-columns: 1fr;
			}

			.map-region,
			#nearshoreMap {
				height: 560px;
			}

			.detail-panel {
				max-height: none;
				border-top: 1px solid var(--border);
				border-left: 0;
			}
		}

		@media (max-width: 560px) {
			.header-content,
			main {
				width: min(100% - 1rem, 1280px);
			}

			.map-shell {
				border-radius: 10px;
			}

			.map-region,
			#nearshoreMap {
				height: 460px;
			}

			.map-key {
				display: none;
			}

			.metric-grid {
				grid-template-columns: 1fr;
			}

			.provider-card {
				grid-template-columns: 1fr;
			}
		}
	</style>
</head>
<body>
	<header class="site-header">
		<div class="header-content">
			<p class="eyebrow">Puget Sound Partnership test page</p>
			<h1>Native Nearshore Credits map</h1>
			<p class="intro">
				This test renders the Partnership's live ArcGIS Web Map directly in the page—without an
				iframe. Select a marine basin or completed project to explore its current data.
			</p>
		</div>
	</header>

	<main>
		<div id="statusPanel" class="status-panel" data-state="loading" role="status" aria-live="polite">
			<span class="status-dot" aria-hidden="true"></span>
			<span id="statusText">Loading the ArcGIS map and related provider data…</span>
		</div>

		<div id="mapShell" class="map-shell" aria-busy="true">
			<section class="map-region" aria-label="Interactive Nearshore Credits map">
				<div id="nearshoreMap" aria-label="Interactive map of Nearshore marine basins and completed projects"></div>
				<div class="map-key" aria-hidden="true">
					<strong>Explore the map</strong>
					<p>Select a shaded marine basin for credits and providers.</p>
					<p>Select a project marker for its photo and details.</p>
				</div>
			</section>

			<aside id="detailPanel" class="detail-panel" aria-label="Selected map feature details">
				<div class="detail-toolbar">
					<strong>Map details</strong>
					<button id="resetButton" class="reset-button" type="button" disabled>Reset map</button>
				</div>
				<div id="detailContent" class="detail-content">
					<span class="selection-type">Ready to explore</span>
					<h2>Select a feature</h2>
					<p class="muted">
						Choose an outlined marine basin or a completed-project marker on the map.
					</p>
					<div class="empty-state">
						<strong>What you can inspect</strong>
						<ul>
							<li>Credits sold and the latest basin update</li>
							<li>Credit providers, contact details, and logos</li>
							<li>Completed projects, photos, sponsors, and credits generated</li>
						</ul>
					</div>
				</div>
			</aside>
		</div>

		<details class="source-panel">
			<summary>Live data sources used by this test</summary>
			<ul>
				<li>
					<a href="https://www.arcgis.com/home/item.html?id=636b265207054bb2a61e1c0f97e11a10" target="_blank" rel="noopener">
						Nearshore Conservation Credit Generating Projects Web Map
					</a>
				</li>
				<li>
					<a href="https://services7.arcgis.com/iAd79FjHxHKsLP0y/arcgis/rest/services/Service___Nearshore_Basins/FeatureServer/0" target="_blank" rel="noopener">
						Nearshore basin polygons
					</a>
				</li>
				<li>
					<a href="https://services7.arcgis.com/iAd79FjHxHKsLP0y/arcgis/rest/services/Nearshore_Providers_Data_Entry/FeatureServer/0" target="_blank" rel="noopener">
						Nearshore credit providers
					</a>
				</li>
				<li>
					<a href="https://services7.arcgis.com/iAd79FjHxHKsLP0y/arcgis/rest/services/survey123_1671e75d7d1c402a8ad2a313bad67e8b_results/FeatureServer/0" target="_blank" rel="noopener">
						Completed projects and photo URLs
					</a>
				</li>
			</ul>
		</details>
	</main>

	<script>
		"use strict";

		const webMapItemId = "636b265207054bb2a61e1c0f97e11a10";
		const providerServiceUrl =
			"https://services7.arcgis.com/iAd79FjHxHKsLP0y/arcgis/rest/services/" +
			"Nearshore_Providers_Data_Entry/FeatureServer/0/query";
		const basinServiceFragment = "service___nearshore_basins/featureserver/0";
		const projectServiceFragment =
			"survey123_1671e75d7d1c402a8ad2a313bad67e8b_results/featureserver/0";

		const mapShell = document.getElementById("mapShell");
		const statusPanel = document.getElementById("statusPanel");
		const statusText = document.getElementById("statusText");
		const detailContent = document.getElementById("detailContent");
		const resetButton = document.getElementById("resetButton");
		const numberFormatter = new Intl.NumberFormat("en-US");
		const dateFormatter = new Intl.DateTimeFormat("en-US", {
			year: "numeric",
			month: "short",
			day: "numeric",
			timeZone: "UTC"
		});

		let basinLayer = null;
		let projectLayer = null;
		let providersByArea = new Map();
		let initialViewpoint = null;
		let webMap = null;
		let mapView = null;

		function setStatus(state, message) {
			statusPanel.dataset.state = state;
			statusText.textContent = message;
		}

		function normalizeText(value, fallback = "Not provided") {
			const text = value === null || value === undefined ? "" : String(value).trim();
			return text || fallback;
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

		function makeLink(text, href) {
			const safeHref = safeWebUrl(href);
			if (!safeHref) {
				return document.createTextNode(normalizeText(text));
			}

			const link = element("a", "", normalizeText(text));
			link.href = safeHref;
			link.target = "_blank";
			link.rel = "noopener";
			return link;
		}

		function addMetric(grid, label, value) {
			const metric = element("div", "metric");
			metric.append(
				element("span", "metric-label", label),
				element("strong", "metric-value", value)
			);
			grid.appendChild(metric);
		}

		function createPhoto(url, altText, captionText) {
			const safeUrl = safeWebUrl(url);
			if (!safeUrl) {
				return null;
			}

			const figure = element("figure", "photo-frame");
			const image = document.createElement("img");
			image.src = safeUrl;
			image.alt = altText;
			image.loading = "lazy";
			image.addEventListener("error", function () {
				figure.remove();
			});
			figure.appendChild(image);

			if (captionText) {
				figure.appendChild(element("figcaption", "", captionText));
			}

			return figure;
		}

		function createProviderCard(provider) {
			const card = element("article", "provider-card");
			const logoUrl = safeWebUrl(provider.Logo);

			if (logoUrl) {
				const logoBox = element("div", "provider-logo");
				const logo = document.createElement("img");
				logo.src = logoUrl;
				logo.alt = normalizeText(provider.Name) + " logo";
				logo.loading = "lazy";
				logo.addEventListener("error", function () {
					logoBox.remove();
					card.style.gridTemplateColumns = "1fr";
				});
				logoBox.appendChild(logo);
				card.appendChild(logoBox);
			} else {
				card.style.gridTemplateColumns = "1fr";
			}

			const body = element("div");
			const heading = element("h4");
			heading.appendChild(makeLink(provider.Name, provider.Website));
			body.appendChild(heading);

			if (provider.Email) {
				const email = element("a", "", provider.Email);
				email.href = "mailto:" + String(provider.Email).trim();
				const paragraph = element("p");
				paragraph.append("Email: ", email);
				body.appendChild(paragraph);
			}

			if (provider.Phone) {
				const phone = element("a", "", provider.Phone);
				phone.href = "tel:" + String(provider.Phone).replace(/[^\d+]/g, "");
				const paragraph = element("p");
				paragraph.append("Phone: ", phone);
				body.appendChild(paragraph);
			}

			card.appendChild(body);
			return card;
		}

		function renderWelcome() {
			const fragment = document.createDocumentFragment();
			fragment.append(
				element("span", "selection-type", "Ready to explore"),
				element("h2", "", "Select a feature"),
				element(
					"p",
					"muted",
					"Choose an outlined marine basin or a completed-project marker on the map."
				)
			);

			const help = element("div", "empty-state");
			help.appendChild(element("strong", "", "What you can inspect"));
			const list = document.createElement("ul");
			[
				"Credits sold and the latest basin update",
				"Credit providers, contact details, and logos",
				"Completed projects, photos, sponsors, and credits generated"
			].forEach(function (text) {
				list.appendChild(element("li", "", text));
			});
			help.appendChild(list);
			fragment.appendChild(help);
			detailContent.replaceChildren(fragment);
		}

		function renderBasin(attributes) {
			const basinName = normalizeText(attributes.MarineBasin, "Marine basin");
			const providers = providersByArea.get(basinName) || [];
			const fragment = document.createDocumentFragment();
			fragment.append(
				element("span", "selection-type", "Marine basin"),
				element("h2", "", basinName),
				element(
					"p",
					"muted",
					"Live basin totals and providers offering Nearshore Conservation Credits in this service area."
				)
			);

			const metrics = element("div", "metric-grid");
			addMetric(metrics, "Credits sold", formatNumber(attributes.CreditsSold));
			addMetric(metrics, "Last updated", formatDate(attributes.LastUpdate));
			fragment.appendChild(metrics);

			fragment.appendChild(
				element(
					"h3",
					"",
					providers.length === 1
						? "Credit provider"
						: "Credit providers (" + providers.length + ")"
				)
			);

			if (providers.length) {
				const list = element("div", "provider-list");
				providers.forEach(function (provider) {
					list.appendChild(createProviderCard(provider));
				});
				fragment.appendChild(list);
			} else {
				fragment.appendChild(
					element(
						"div",
						"empty-state",
						"No provider record was returned for this service area."
					)
				);
			}

			detailContent.replaceChildren(fragment);
		}

		function renderProject(attributes) {
			const projectName = normalizeText(attributes.project_name, "Completed project");
			const fragment = document.createDocumentFragment();
			fragment.append(
				element("span", "selection-type project", "Completed project"),
				element("h2", "", projectName)
			);

			const photo = createPhoto(
				attributes.url_for_photo,
				projectName + " project photo",
				"Photo supplied by the ArcGIS project record"
			);
			if (photo) {
				fragment.appendChild(photo);
			}

			const metrics = element("div", "metric-grid");
			addMetric(metrics, "Credits generated", formatNumber(attributes.number_of_credits));
			addMetric(metrics, "Completed", formatDate(attributes.date_completed));
			addMetric(metrics, "Service area", normalizeText(attributes.service_area));
			addMetric(metrics, "Sponsor", normalizeText(attributes.sponsor_name));
			fragment.appendChild(metrics);

			fragment.append(
				element("h3", "", "Project description"),
				element("p", "", normalizeText(attributes.description))
			);

			detailContent.replaceChildren(fragment);
		}

		async function fetchProviders() {
			const url = new URL(providerServiceUrl);
			url.search = new URLSearchParams({
				where: "1=1",
				outFields: "Name,Website,Email,Phone,Service_Area,Logo",
				returnGeometry: "false",
				orderByFields: "Name",
				f: "json"
			}).toString();

			const response = await fetch(url.toString(), {
				method: "GET",
				mode: "cors",
				cache: "no-store"
			});

			if (!response.ok) {
				throw new Error("Provider service returned HTTP " + response.status + ".");
			}

			const data = await response.json();
			if (data.error || !Array.isArray(data.features)) {
				throw new Error(data.error?.message || "Provider records were not returned.");
			}

			const grouped = new Map();
			data.features.forEach(function (feature) {
				const provider = feature.attributes || {};
				const area = normalizeText(provider.Service_Area, "");
				if (!area) {
					return;
				}
				if (!grouped.has(area)) {
					grouped.set(area, []);
				}
				grouped.get(area).push(provider);
			});
			return grouped;
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
			if (!basinLayer || !projectLayer) {
				return;
			}

			try {
				const response = await mapView.hitTest(event, {
					include: [projectLayer, basinLayer]
				});
				const graphics = response.results
					.filter(function (result) {
						return result.type === "graphic";
					})
					.map(function (result) {
						return result.graphic;
					});

				const projectGraphic = graphics.find(function (graphic) {
					return graphic.layer === projectLayer;
				});
				const basinGraphic = graphics.find(function (graphic) {
					return graphic.layer === basinLayer;
				});

				if (projectGraphic) {
					renderProject(projectGraphic.attributes || {});
				} else if (basinGraphic) {
					renderBasin(basinGraphic.attributes || {});
				} else {
					renderWelcome();
				}
			} catch (error) {
				setStatus("error", "The map loaded, but the selected feature could not be read.");
				console.error("Nearshore map hit test failed.", error);
			}
		}

		function showInitializationError(error) {
			document.documentElement.dataset.arcgisStage = "error";
			mapShell.setAttribute("aria-busy", "false");
			setStatus(
				"error",
				"Map failed to load: " +
					(error && error.message ? error.message : "Unknown ArcGIS error.")
			);
			console.error("Nearshore map initialization failed.", error);
		}

		function initialize() {
			document.documentElement.dataset.arcgisStage = "loading-modules";
			setStatus("loading", "Loading ArcGIS map modules…");

			require(
				[
					"esri/config",
					"esri/WebMap",
					"esri/views/MapView"
				],
				async function (arcgisConfig, WebMapClass, MapViewClass) {
					try {
						document.documentElement.dataset.arcgisStage = "modules-ready";
						arcgisConfig.portalUrl = "https://wa-psp.maps.arcgis.com";
						const providerPromise = fetchProviders();

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

						document.documentElement.dataset.arcgisStage = "waiting-for-view";
						setStatus("loading", "Loading the saved Nearshore Web Map…");
						await mapView.when();
						document.documentElement.dataset.arcgisStage = "view-ready";

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

						let providerWarning = "";
						try {
							providersByArea = await providerPromise;
						} catch (providerError) {
							providerWarning = " Provider cards are temporarily unavailable.";
							console.warn("Nearshore provider data could not be loaded.", providerError);
						}

						const counts = await Promise.all([
							basinLayer.queryFeatureCount(),
							projectLayer.queryFeatureCount()
						]);

						mapView.on("click", handleMapClick);
						resetButton.disabled = false;
						mapShell.setAttribute("aria-busy", "false");
						setStatus(
							"success",
							"Map ready: " +
								counts[0] +
								" marine basins and " +
								counts[1] +
								" completed projects loaded." +
								providerWarning
						);
					} catch (error) {
						showInitializationError(error);
					}
				},
				showInitializationError
			);
		}

		resetButton.addEventListener("click", async function () {
			if (!initialViewpoint || !mapView) {
				return;
			}

			resetButton.disabled = true;
			try {
				await mapView.goTo(initialViewpoint, { duration: 700 });
				renderWelcome();
			} finally {
				resetButton.disabled = false;
			}
		});

		initialize();
	</script>
</body>
</html>
