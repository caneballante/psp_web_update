<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="google-site-verification" content="lMaE6uVdAY_4P-zfoagi1Kj2QQLS8W3JvahLqMZMuDU" />
<title>Puget Sound Partnership - Vital Signs - Pacific Herring</title>
<link href="css/vital2016.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="css/custom-theme/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" src="js/settab.js"></script>
<script>
$(function() {
		$( "#accordion" ).accordion( { collapsible: true }, { active: false }, { autoHeight: false });
	});
	
$(function() {
  $(".ui-accordion-header").click( function() {
	  console.log("i ran");
     _gaq.push(['_trackEvent', 'Accordion', 'ShowPage', $(this).attr('id')]);
  });
});	
</script>
<script>
/*this variable is used to set the proper nav to active. It should to the order the nav item is in the list*/
  	navSelected = 1;
	color = "pink";
</script>
</head>
<body id="id10">
<div id="container">
	<?php include 'includes/header_test.html' ?>
	<?php include 'includes/pacific_herring_title.html' ?>
	<?php include 'includes/pacific_herring_tab.html' ?>
	<div id="accordioncontainer">
		<div id="accordion"> 
			
			<!--*********************************FOLD 01*********************************-->
			<h3><a href="#!">Importance to Puget Sound recovery</a></h3>
			<div>
				<p> Pacific herring are one of the most abundant forage fish species in Puget Sound. Together with a few other small schooling fish species, herring are an essential source of food for larger fish, seabirds, and marine mammals. As intermediates in the food web, they play a major role in energy transfer up to these higher-level consumers.</p>
				<p>Because they are a vital component of the marine food web, Pacific herring are one key indicator of the overall health of Puget Sound. Herring stocks require clean water and natural shorelines, so their continued survival depends on maintaining links between nearshore and open-water habitats.</p>
			</div>
			
			<!--*********************************FOLD 04*********************************-->
			
			<h3><a href="#!">What you can do</a></h3>
			<div>
				<ol>
					<li>Minimize shoreline alterations to preserve natural shoreline conditions for herring habitat. </li>
					<li>Dispose of oil and other auto wastes at your local <a href="https://fortress.wa.gov/ecy/hwfacilitysearch/Forms/SiteSearch.aspx">recycling location or hazardous waste collection facility</a>. Some county-based links are available <a href="https://fortress.wa.gov/ecy/recycle/UISearch/ServiceSearch.aspx">here</a>.</li>
					<li>Avoid using fertilizers. If fertilizer must be used, choose organic or time-released fertilizers with low levels of phosphorus and nitrogen, and follow the directions on the label. </li>
					<li>Instead of fertilizer, use compost to augment your soil and fertilize your plants. Also, compost vegetation and other yard waste; do not throw it over the bank into a waterway or shoreline. See <a href="http://www.ecy.wa.gov/programs/swfa/organics/soil.html#home"> Washington Department of Ecology's composting site</a> for more information.</li>
					<li>Use Low Impact Development (LID) techniques to manage <a href="(http://www.psp.wa.gov/downloads/LID/20121221_LIDmanual_FINAL_secure.pdf">stormwater runoff</a> such as natural landscaping, <a href="http://raingarden.wsu.edu/">rain gardens</a>, rain barrels, green roofs and permeable paving where appropriate.</li>
					<li><a href="http://pugetsoundstartshere.org/in-your-local-area/get-involved/">Volunteer in your area</a> to work with a group helping to reduce fresh water pollution.</li>
				</ol>
				<h5>Links for more information on what you can do</h5>
				<p><a href="http://www.earth911.com">Motor Oil Recycling</a></p>
			</div>
			
			<!--*********************************FOLD 05*********************************-->
			<h3><a href="#!">What our partners are doing</a></h3>
			<div>
				<p><a href="http://psp.wa.gov/gis/ReportCard/VitalSign/indexVSPacificHerring.html">View Near Term Actions helping to advance this Vital Sign</a></p>
			</div>
			<!--*********************************FOLD 06*********************************-->
			<h3><a href="#!">Links for more information</a></h3>
			<div>
				<p> <a href="http://www.nwfsc.noaa.gov/publications/scipubs/techmemos/tm45/tm45.htm">National Oceanic and Atmospheric Administration (NOAA) – Status Review of Pacific Herring in Puget Sound</a></p>
				<p> <a href="http://wdfw.wa.gov/conservation/research/projects/marine_toxics/pacificherring.html">Washington Department of Fish and Wildlife</a></p>
				<p> <a href="http://wfrc.usgs.gov/fieldstations/marrowstone/ps_forage.html">United State Geological Survey (USGS) Puget Sound Forage Fish</a></p>
			</div>
		</div>
	</div>
	<?php include 'includes/footer.html' ?>
</div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-679161-6']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
