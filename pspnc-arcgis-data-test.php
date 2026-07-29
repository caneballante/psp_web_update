<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="referrer" content="no-referrer">
	<title>PSP ArcGIS Direct Data Test</title>
	<style>
		:root {
			--psp-navy: #123b5d;
			--psp-blue: #176d91;
			--psp-teal: #067a78;
			--psp-gold: #f2bd4b;
			--ink: #173042;
			--muted: #5e6f7b;
			--surface: #ffffff;
			--surface-soft: #eef6f7;
			--border: #c8d8de;
			--success: #176b45;
			--success-bg: #e8f6ee;
			--error: #a32727;
			--error-bg: #fff0f0;
			--loading: #7a5510;
			--loading-bg: #fff7df;
			--shadow: 0 14px 38px rgba(18, 59, 93, 0.12);
		}

		* {
			box-sizing: border-box;
		}

		body {
			min-width: 320px;
			margin: 0;
			color: var(--ink);
			background:
				linear-gradient(135deg, rgba(23, 109, 145, 0.08), transparent 35%),
				#f5f8f9;
			font-family: Arial, Helvetica, sans-serif;
			line-height: 1.55;
		}

		a {
			color: #075f85;
		}

		a:hover {
			text-decoration-thickness: 2px;
		}

		button,
		a {
			outline-offset: 3px;
		}

		button:focus-visible,
		a:focus-visible,
		summary:focus-visible {
			outline: 3px solid var(--psp-gold);
		}

		[hidden] {
			display: none !important;
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
			width: 28rem;
			height: 28rem;
			border: 4rem solid rgba(255, 255, 255, 0.08);
			border-radius: 50%;
			content: "";
		}

		.header-content,
		main {
			width: min(1120px, calc(100% - 2rem));
			margin-inline: auto;
		}

		.header-content {
			position: relative;
			z-index: 1;
			padding: 3.5rem 0 3rem;
		}

		.eyebrow {
			margin: 0 0 0.55rem;
			color: #bfe8ec;
			font-size: 0.82rem;
			font-weight: 700;
			letter-spacing: 0.13em;
			text-transform: uppercase;
		}

		h1 {
			max-width: 780px;
			margin: 0;
			font-size: clamp(2rem, 5vw, 3.8rem);
			line-height: 1.06;
		}

		.intro {
			max-width: 760px;
			margin: 1.25rem 0 0;
			color: #e6f3f5;
			font-size: 1.08rem;
		}

		main {
			padding: 2rem 0 4rem;
		}

		.panel {
			margin-bottom: 1.5rem;
			padding: clamp(1.1rem, 3vw, 1.75rem);
			border: 1px solid var(--border);
			border-radius: 14px;
			background: var(--surface);
			box-shadow: var(--shadow);
		}

		.status-row {
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 1rem;
			flex-wrap: wrap;
		}

		.status-message {
			display: flex;
			align-items: flex-start;
			gap: 0.75rem;
			margin: 0;
			font-weight: 700;
		}

		.status-dot {
			flex: 0 0 auto;
			width: 0.85rem;
			height: 0.85rem;
			margin-top: 0.3rem;
			border-radius: 50%;
			background: currentColor;
			box-shadow: 0 0 0 5px rgba(122, 85, 16, 0.12);
		}

		.status-panel[data-state="loading"] {
			border-color: #e7cf8e;
			color: var(--loading);
			background: var(--loading-bg);
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

		.button {
			padding: 0.72rem 1.1rem;
			border: 0;
			border-radius: 7px;
			color: #fff;
			background: var(--psp-navy);
			font: inherit;
			font-weight: 700;
			cursor: pointer;
		}

		.button:hover {
			background: #092e4a;
		}

		.button:disabled {
			cursor: wait;
			opacity: 0.6;
		}

		.summary-grid {
			display: grid;
			grid-template-columns: repeat(3, minmax(0, 1fr));
			gap: 1rem;
			margin-bottom: 1.5rem;
		}

		.metric {
			padding: 1.35rem;
			border: 1px solid var(--border);
			border-top: 5px solid var(--psp-teal);
			border-radius: 10px;
			background: var(--surface);
			box-shadow: 0 8px 24px rgba(18, 59, 93, 0.08);
		}

		.metric-label {
			display: block;
			margin-bottom: 0.25rem;
			color: var(--muted);
			font-size: 0.82rem;
			font-weight: 700;
			letter-spacing: 0.06em;
			text-transform: uppercase;
		}

		.metric-value {
			display: block;
			font-size: clamp(1.45rem, 4vw, 2.25rem);
			font-weight: 700;
			line-height: 1.2;
		}

		h2 {
			margin: 0 0 0.35rem;
			color: var(--psp-navy);
			font-size: 1.5rem;
		}

		.section-intro {
			margin: 0 0 1.25rem;
			color: var(--muted);
		}

		.table-scroll {
			overflow-x: auto;
			border: 1px solid var(--border);
			border-radius: 8px;
		}

		table {
			width: 100%;
			border-collapse: collapse;
			background: #fff;
		}

		caption {
			padding: 0.85rem 1rem;
			color: var(--ink);
			background: var(--surface-soft);
			font-weight: 700;
			text-align: left;
		}

		th,
		td {
			padding: 0.9rem 1rem;
			border-bottom: 1px solid #dce6e9;
			text-align: left;
			vertical-align: top;
		}

		th {
			color: #fff;
			background: var(--psp-navy);
		}

		tbody tr:last-child td {
			border-bottom: 0;
		}

		tbody tr:nth-child(even) {
			background: #f5f9fa;
		}

		.number {
			font-variant-numeric: tabular-nums;
			text-align: right;
		}

		details {
			border-top: 1px solid var(--border);
		}

		details:first-of-type {
			border-top: 0;
		}

		summary {
			padding: 0.9rem 0;
			color: var(--psp-navy);
			font-weight: 700;
			cursor: pointer;
		}

		.diagnostic-list {
			display: grid;
			grid-template-columns: max-content 1fr;
			gap: 0.45rem 1rem;
			margin: 0 0 1rem;
		}

		.diagnostic-list dt {
			font-weight: 700;
		}

		.diagnostic-list dd {
			min-width: 0;
			margin: 0;
			overflow-wrap: anywhere;
		}

		pre {
			max-height: 28rem;
			overflow: auto;
			margin: 0 0 1rem;
			padding: 1rem;
			border-radius: 8px;
			color: #eaf4f7;
			background: #102d3e;
			font: 0.82rem/1.5 Consolas, "Courier New", monospace;
			white-space: pre-wrap;
			overflow-wrap: anywhere;
		}

		.test-note {
			margin: 1.5rem 0 0;
			color: var(--muted);
			font-size: 0.92rem;
		}

		@media (max-width: 720px) {
			.summary-grid {
				grid-template-columns: 1fr;
			}

			.diagnostic-list {
				grid-template-columns: 1fr;
				gap: 0.1rem;
			}

			.diagnostic-list dd {
				margin-bottom: 0.55rem;
			}

			th,
			td {
				padding: 0.75rem;
			}
		}
	</style>
</head>
<body>
	<header class="site-header">
		<div class="header-content">
			<p class="eyebrow">Puget Sound Partnership test page</p>
			<h1>ArcGIS direct data connection</h1>
			<p class="intro">
				This page uses browser-native JavaScript to request Nearshore Conservation Credit data
				directly from the Partnership's public ArcGIS FeatureServer. No embed, proxy, JavaScript
				framework, or ArcGIS SDK is used.
			</p>
		</div>
	</header>

	<main>
		<section id="statusPanel" class="panel status-panel" data-state="loading" aria-live="polite">
			<div class="status-row">
				<p class="status-message">
					<span class="status-dot" aria-hidden="true"></span>
					<span id="statusText">Checking whether this server can reach ArcGIS…</span>
				</p>
				<button id="refreshButton" class="button" type="button">Run test again</button>
			</div>
		</section>

		<section id="summary" class="summary-grid" aria-label="Query summary" hidden>
			<div class="metric">
				<span class="metric-label">Marine basins returned</span>
				<strong id="basinCount" class="metric-value">—</strong>
			</div>
			<div class="metric">
				<span class="metric-label">Total credits sold</span>
				<strong id="creditsTotal" class="metric-value">—</strong>
			</div>
			<div class="metric">
				<span class="metric-label">ArcGIS update date</span>
				<strong id="updateDate" class="metric-value">—</strong>
			</div>
		</section>

		<section id="resultsPanel" class="panel" hidden>
			<h2>Nearshore credits by marine basin</h2>
			<p class="section-intro">
				The table below was built from the live JSON response. Geometry was excluded to keep the
				request small.
			</p>
			<div class="table-scroll">
				<table>
					<caption>Live results from ArcGIS</caption>
					<thead>
						<tr>
							<th scope="col">Marine basin</th>
							<th scope="col" class="number">Credits sold</th>
							<th scope="col">Update date</th>
						</tr>
					</thead>
					<tbody id="resultsBody"></tbody>
				</table>
			</div>
		</section>

		<section class="panel">
			<h2>Test details</h2>
			<p class="section-intro">
				A successful result confirms that JavaScript running on this page can read the ArcGIS
				service across domains.
			</p>

			<details open>
				<summary>Connection diagnostics</summary>
				<dl class="diagnostic-list">
					<dt>Service</dt>
					<dd>
						<a id="serviceLink" href="#" target="_blank" rel="noopener">ArcGIS FeatureServer layer 0</a>
					</dd>
					<dt>Request</dt>
					<dd>GET using the browser <code>fetch()</code> API</dd>
					<dt>Fields</dt>
					<dd><code>MarineBasin</code>, <code>CreditsSold</code>, <code>LastUpdate</code></dd>
					<dt>Geometry</dt>
					<dd>Not requested</dd>
					<dt>Last attempt</dt>
					<dd id="lastAttempt">Not run</dd>
					<dt>Result</dt>
					<dd id="diagnosticResult">Waiting</dd>
				</dl>
			</details>

			<details id="rawDetails" hidden>
				<summary>Raw JSON response</summary>
				<pre id="rawJson"></pre>
			</details>

			<p class="test-note">
				This is a diagnostic page, not a production design. If it fails only after deployment,
				check the browser console and the site's <code>Content-Security-Policy</code>
				<code>connect-src</code> setting.
			</p>
		</section>
	</main>

	<script>
		"use strict";

		(function () {
			const serviceUrl =
				"https://services7.arcgis.com/iAd79FjHxHKsLP0y/arcgis/rest/services/" +
				"Service___Nearshore_Basins/FeatureServer/0";
			const numberFormatter = new Intl.NumberFormat("en-US");
			const dateFormatter = new Intl.DateTimeFormat("en-US", {
				year: "numeric",
				month: "short",
				day: "numeric",
				timeZone: "UTC"
			});

			const statusPanel = document.getElementById("statusPanel");
			const statusText = document.getElementById("statusText");
			const refreshButton = document.getElementById("refreshButton");
			const summary = document.getElementById("summary");
			const resultsPanel = document.getElementById("resultsPanel");
			const resultsBody = document.getElementById("resultsBody");
			const basinCount = document.getElementById("basinCount");
			const creditsTotal = document.getElementById("creditsTotal");
			const updateDate = document.getElementById("updateDate");
			const serviceLink = document.getElementById("serviceLink");
			const lastAttempt = document.getElementById("lastAttempt");
			const diagnosticResult = document.getElementById("diagnosticResult");
			const rawDetails = document.getElementById("rawDetails");
			const rawJson = document.getElementById("rawJson");

			serviceLink.href = serviceUrl;

			function buildQueryUrl() {
				const queryUrl = new URL(serviceUrl + "/query");
				queryUrl.search = new URLSearchParams({
					where: "1=1",
					outFields: "MarineBasin,CreditsSold,LastUpdate",
					returnGeometry: "false",
					orderByFields: "MarineBasin",
					f: "json"
				}).toString();
				return queryUrl;
			}

			function setStatus(state, message) {
				statusPanel.dataset.state = state;
				statusText.textContent = message;
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

			function addCell(row, value, className) {
				const cell = document.createElement("td");
				cell.textContent = value;
				if (className) {
					cell.className = className;
				}
				row.appendChild(cell);
			}

			function renderResults(features) {
				const records = features
					.map(function (feature) {
						return feature.attributes || {};
					})
					.sort(function (a, b) {
						return String(a.MarineBasin || "").localeCompare(String(b.MarineBasin || ""));
					});

				const fragment = document.createDocumentFragment();
				let totalCredits = 0;
				let newestUpdate = null;

				records.forEach(function (record) {
					const row = document.createElement("tr");
					const credits = Number(record.CreditsSold);
					const recordDate = parseDate(record.LastUpdate);

					addCell(row, record.MarineBasin || "Unnamed basin");
					addCell(row, Number.isFinite(credits) ? numberFormatter.format(credits) : "Not provided", "number");
					addCell(row, formatDate(record.LastUpdate));
					fragment.appendChild(row);

					if (Number.isFinite(credits)) {
						totalCredits += credits;
					}

					if (
						recordDate &&
						!Number.isNaN(recordDate.getTime()) &&
						(!newestUpdate || recordDate > newestUpdate)
					) {
						newestUpdate = recordDate;
					}
				});

				resultsBody.replaceChildren(fragment);
				basinCount.textContent = numberFormatter.format(records.length);
				creditsTotal.textContent = numberFormatter.format(totalCredits);
				updateDate.textContent = newestUpdate ? dateFormatter.format(newestUpdate) : "Not provided";
				summary.hidden = false;
				resultsPanel.hidden = false;
			}

			async function runTest() {
				const queryUrl = buildQueryUrl();
				const controller = new AbortController();
				const timeout = window.setTimeout(function () {
					controller.abort();
				}, 15000);

				refreshButton.disabled = true;
				summary.hidden = true;
				resultsPanel.hidden = true;
				rawDetails.hidden = true;
				rawJson.textContent = "";
				lastAttempt.textContent = new Date().toLocaleString();
				diagnosticResult.textContent = "Request in progress";
				setStatus("loading", "Requesting live data from ArcGIS…");

				try {
					const response = await fetch(queryUrl.toString(), {
						method: "GET",
						mode: "cors",
						cache: "no-store",
						signal: controller.signal
					});

					if (!response.ok) {
						throw new Error("ArcGIS returned HTTP " + response.status + ".");
					}

					const data = await response.json();

					if (data.error) {
						throw new Error(data.error.message || "ArcGIS returned a service error.");
					}

					if (!Array.isArray(data.features)) {
						throw new Error("The response did not contain the expected features array.");
					}

					renderResults(data.features);
					rawJson.textContent = JSON.stringify(data, null, 2);
					rawDetails.hidden = false;
					diagnosticResult.textContent =
						"Success — HTTP " + response.status + ", " + data.features.length + " records";
					setStatus(
						"success",
						"Success: this page retrieved " +
							data.features.length +
							" ArcGIS records directly with JavaScript."
					);
				} catch (error) {
					const timedOut = error && error.name === "AbortError";
					const message = timedOut
						? "The ArcGIS request timed out after 15 seconds."
						: error && error.message
							? error.message
							: "The ArcGIS request failed.";

					diagnosticResult.textContent = "Failed — " + message;
					setStatus(
						"error",
						"Connection failed: " +
							message +
							" Check the browser console, CORS response, network access, and Content-Security-Policy."
					);
				} finally {
					window.clearTimeout(timeout);
					refreshButton.disabled = false;
				}
			}

			refreshButton.addEventListener("click", runTest);
			runTest();
		})();
	</script>
</body>
</html>
