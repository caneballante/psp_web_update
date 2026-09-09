<!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/page-4-template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BGEZ5L3EJY"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-BGEZ5L3EJY');
</script>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Puget Sound Partnership Nearshore Conservation Credit Program</title>
<!-- InstanceEndEditable -->
<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet" type="text/css">
<link href="css/custom-erika.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://js.arcgis.com/4.34/esri/themes/light/main.css">
<script src="https://js.arcgis.com/4.34/"></script>
<!-- loads the wf-loading class right away to minimize FOUT -->
<script>document.documentElement.className += ' wf-loading';</script>
<!-- Font PRENTON TYPEKIT -->
<script src="https://use.typekit.net/srt5jze.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<!-- InstanceBeginEditable name="head" -->
<script>
/*this variable is used to set the proper nav to active. It should to the order the nav item is in the list*/
  	navSelected = 1;
</script> 
<!-- InstanceEndEditable -->
<!-- InstanceParam name="OptionalRegion1" type="boolean" value="true" -->
<!-- InstanceParam name="OptionalRegion2" type="boolean" value="false" -->
<!-- InstanceParam name="OptionalRegion3" type="boolean" value="true" -->
<!-- InstanceParam name="OptionalRegion4" type="boolean" value="false" -->
<!-- InstanceParam name="OptionalRegion5" type="boolean" value="true" -->
<!-- InstanceParam name="OptionalRegion6" type="boolean" value="true" -->
<!-- InstanceParam name="OptionalRegion7" type="boolean" value="false" -->
<!-- InstanceParam name="OptionalRegion8" type="boolean" value="false" -->
</head>
<body>
<?php include 'includes/modal-inc.html';?>
<!-- START IMAGE HEADER --> 
 <!-- InstanceBeginEditable name="overviewphoto" -->
<header class="overview-page-image-style overview-page-image8"></header>
<!-- InstanceEndEditable -->  
<div class="container-fluid page-content padding-50-bottom">
	<div class="row">
		<div class="col-sm-3 padding-20-top"></div>
		<div class="col-sm-7 padding-20-top"> <!-- InstanceBeginEditable name="6col_header" -->
			<h1>Puget Sound Partnership Nearshore Conservation Credit Program</h1>
			
			<!-- InstanceEndEditable --></div>
		<div class="col-sm-2 padding-20-top"></div>
	</div>
	
	<div class="row"> 
		<div class="col-sm-3">
			<div class="nav-leftside-custom">
				<ul class="nav nav-stacked nav-pills nav-leftside-custom padding-left-0 margin-10-top">
					<!-- InstanceBeginEditable name="left_nav" -->
					<?php include 'includes/ln-pspnc-left.html';?>
					
				<!-- InstanceEndEditable -->
				</ul>
			</div>
		</div>
		 
		<div class="col-sm-7 padding-20-top content-column"> <!-- InstanceBeginEditable name="6col_content" -->
		
			<p>
				The Puget Sound Partnership Nearshore Conservation Credit Program is an in-lieu fee
				program that sells conservation credits to help federal permit applicants meet
				obligations to offset impacts to critical habitat and uses funds from those credit
				sales to implement equivalent conservation projects. The credits represent units of
				nearshore habitat function (as quantified by
				<a href="https://www.fisheries.noaa.gov/west-coast/habitat-conservation/puget-sound-nearshore-habitat-conservation-calculator" target="_blank" rel="noopener">a calculator developed by the National Marine Fisheries Service</a>).
				Conservation projects must occur in the same service area as the permitted impact—use
				the dashboard below to explore projects, service areas, and current credit totals.
			</p>

<section
				id="nearshoreDashboard"
				class="nearshore-dashboard"
				aria-label="Nearshore Conservation Credit Program dashboard"
			>
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
			</section>
			<div id="sectionPager"></div><br>
			
			
			<!-- InstanceEndEditable --> </div>
		
		<div class="col-sm-2 padding-20-top padding-0-right"> <!-- InstanceBeginRepeat name="right_nav_repeat" --><!-- InstanceBeginRepeatEntry --> <!-- InstanceBeginEditable name="right_nav_title" -->
			
			<a class="pspnc-calculator-button margin-20-bottom" href="https://www.fisheries.noaa.gov/west-coast/habitat-conservation/puget-sound-nearshore-habitat-conservation-calculator" target="_blank">Puget Sound Nearshore Habitat Conservation Calculator</a>

			<div class="right-nav-title margin-20-top nonresponsive-object-hide-rightnav">CONTACT</div>
			<!-- InstanceEndEditable -->
			<ul class="nav-rightside-custom">
				<!-- InstanceBeginEditable name="right_nav_links" -->
		<li class="active" role="presentation"> <?php include 'includes/pspnc_contact.html';?></li>
				<div class="right-nav-title margin-20-top nonresponsive-object-hide-rightnav">SEE ALSO</div>
				<li class="active" role="presentation"><a href="https://www.noaa.gov/news-release/army-and-noaa-to-advance-endangered-species-act-consultations" target="new">Army and NOAA to advance Endangered Species Act consulations</a></li>
				<li class="active" role="presentation"><a href="https://medium.com/puget-sound-partnership/puget-sound-partnership-credits-will-fund-nearshore-conservation-398c573bea50" target ="_blank">Puget Sound Partnership credits will fund nearshore conservation</a></li>
					<li class="active" role="presentation"><a href="https://wdfw.wa.gov/species-habitats/habitat-recovery/puget-sound/nearshore-program" target="new">Washington State Department of Fish and Wildlife Nearshore Program</a></li>
				<!-- InstanceEndEditable -->
			</ul>
			<!-- InstanceEndRepeatEntry --><!-- InstanceEndRepeat --> </div>
	</div>
	<!--END OF ROW --> 
</div>
<!--END OF CONTENT CONTAINER -->

<?php include 'includes/footer-inc.html';?>

<script>
(function () {
"use strict";

		const dashboardRoot = document.getElementById("nearshoreDashboard");
		if (!dashboardRoot) {
			return;
		}

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
		const projectPanel = document.getElementById("projectPanel");
		const projectDetail = document.getElementById("projectDetail");
		const projectBrowser = document.getElementById("projectBrowser");
		const projectList = document.getElementById("projectList");
		const soldPanel = document.getElementById("soldPanel");
		const basinList = document.getElementById("basinList");
		const allProjectsButton = document.getElementById("allProjectsButton");
		const allBasinsButton = document.getElementById("allBasinsButton");
		const viewTabs = Array.from(dashboardRoot.querySelectorAll(".view-tab"));
		const numberFormatter = new Intl.NumberFormat("en-US");
		const dateFormatter = new Intl.DateTimeFormat("en-US", {
			year: "numeric",
			month: "long",
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
			const sourceEditingInfo =
				basinLayer && basinLayer.sourceJSON ? basinLayer.sourceJSON.editingInfo : null;
			const serviceEditDate = parseDate(
				sourceEditingInfo && sourceEditingInfo.dataLastEditDate
					? sourceEditingInfo.dataLastEditDate
					: basinLayer && basinLayer.editingInfo
						? basinLayer.editingInfo.lastEditDate
						: null
			);
			if (serviceEditDate && !Number.isNaN(serviceEditDate.getTime())) {
				return serviceEditDate;
			}

			// Older services may not expose edit metadata, so retain the data field as a fallback.
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
			} else {
				const date = latestBasinDate();
				summaryKicker.textContent = "Credits sold";
				summaryHeading.textContent = "Credits sold by marine service area";
				summaryDescription.textContent =
					"Compare all five regions, then select one to bring its boundary into focus" +
					(date ? ". Data current as of " + formatDate(date) + "." : ".");
				summaryValue.textContent = formatNumber(totalCredits(basins, "CreditsSold"));
				summaryLabel.textContent = "Conservation credits sold";
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
})();
</script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script> 
<!-- custom js --> 
<script src="js/custom.js"></script> 
<!-- Google Tracking  -->


</body>
<!-- InstanceEnd --></html>
