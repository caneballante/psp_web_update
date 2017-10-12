<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="google-site-verification" content="lMaE6uVdAY_4P-zfoagi1Kj2QQLS8W3JvahLqMZMuDU" />
<title>Puget Sound Partnership - Vital Signs - Orcas</title>
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
<body id="id09" >
<div id="container">
	<?php include 'includes/header_test.html' ?>
	<?php include 'includes/orca_title.html' ?>
	<?php include 'includes/orca_tab.html' ?>
	<div id="accordioncontainer">
		<div id="accordion"> 
			
			<!--*********************************FOLD 01*********************************-->
			<h3><a href="#!">Importance to Puget Sound recovery</a></h3>
			<div>
				<p>Killer whales, also called orcas, are among Puget Sound’s most distinctive and charismatic inhabitants. They occupy an important niche at the top of the food web and support a multi-million dollar whale-watching industry.</p>
				<p>Southern Resident Killer Whales are a unique population of orcas that ranges in the Salish Sea and the West Coast. While other orca populations prey heavily on marine mammals, this population primarily eats fish, and depends heavily on Chinook salmon for food.</p>
				<p>In the late-1990s, Southern Resident Killer Whales experienced a dramatic decline in population size. As a result, this population was federally listed as endangered in 2006.</p>
			</div>
			
			<!--*********************************FOLD 04*********************************-->
			
			<h3><a href="#!">What you can do</a></h3>
			<div>
				<ol>
					<li>Observe the <a href="http://www.bewhalewise.org" target="new">appropriate distances</a> and do not intentionally disturb orcas when boating or participating in other recreational activities.</li>
					<li>Familiarize yourself, family and friends with individual Puget Sound orcas, and follow their travels on the <a href="http://www.orcanetwork.org/sightings/map.html" target="new">Orca Network</a>.</li>
					<li>Look for orcas from land with help from the <a href="http://thewhaletrail.org/" target="new">Whale Trail</a>, and listen to them at the <a href="http://orcasound.net" target="new">Salish Sea Hydrophone Network</a>.</li>
					<li>Engage in citizen science by alerting researchers at the <a href="http://www.orcanetwork.org/sightings/map.html" target="new">Orca Network</a> or the <a href="http://orcasound.net" target="new">Salish Sea Hydrophone Network</a> when you spot orcas, so scientists can track their  travel.</li>
					<li>Take a day out to go on a responsibly managed whale-watching trip.</li>
					<li>Support salmon recovery in Puget Sound – orcas especially like to feed on <a href="salmon.php" target="new">Chinook salmon</a>.</li>
				</ol>
				
			</div>
			<!--*********************************FOLD 05*********************************-->
			<h3><a href="#!">What our partners are doing</a></h3>
			<div>
				<p><a href="http://psp.wa.gov/gis/ReportCard/VitalSign/indexVSOrcas.html" target="new">View Near Term Actions helping to advance this Vital Sign</a></p>
			</div>
			<!--*********************************FOLD 06*********************************-->
			<h3><a href="#!">Links for more information</a></h3>
			<div>
				<p> <a href="http://www.whaleresearch.com/" target="new">Center for Whale Research</a><br />
					<a href="http://www.westcoast.fisheries.noaa.gov/protected_species/marine_mammals/killer_whale/" target="new">National Oceanic and Atmospheric Administration Fisheries West Coast Region</a><br />
					<a href="http://www.nwfsc.noaa.gov/news/features/killer_whale_report/index.cfm" target="new">10-Years of Research and Conservation Report</a><br />
					<a href="http://www.nwfsc.noaa.gov/research/themes/species/index.cfm#marinemammals" target="new">National Oceanic and Atmospheric Administration Northwest Fisheries Science Center</a><br />
					<a href="http://www.nwfsc.noaa.gov/research/divisions/cb/ecosystem/marinemammal/satellite_tagging/index.cfm" target="new">Satellite tagging project</a> <br />
					<a href="http://www.orcanetwork.org/Main/" target="new">Orca Network</a> <br />
					<a href="http://www.orcasalmonalliance.org/" target="new">Orca Salmon Alliance</a> <br />
					<a href="http://www.pugetsoundnearshore.org/technical_papers/orcas.pdf" target="new">Orcas in Puget Sound:  Puget Sound Nearshore Partnership Tech Report 2007-01</a><br />
					<a href="http://media.wix.com/ugd/760f65_53514335778640b1be040a99378d2e47.pdf" target="new">J32 preliminary necropsy report</a><br />
					<a href="http://www.pac.dfo-mpo.gc.ca/fm-gp/species-especes/mammals-mammiferes/srkw-eprs-j32-eng.html" target="new">J-32 necropsy results from Fisheries and Oceans Canada</a><br />
				</p>
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