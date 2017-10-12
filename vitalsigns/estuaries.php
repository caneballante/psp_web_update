<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="google-site-verification" content="lMaE6uVdAY_4P-zfoagi1Kj2QQLS8W3JvahLqMZMuDU" />
<title>Puget Sound Partnership - Vital Signs - Estuaries</title>
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
	color = "purp";
</script>
</head>
<body id="id16" >
<div id="container">
	<?php include 'includes/header_test.html' ?>
	<?php include 'includes/estuaries_title.html' ?>
	<?php include 'includes/estuaries_tab.html' ?>
	<div id="accordioncontainer">
		<div id="accordion"> 
			
			<!--*********************************FOLD 01*********************************-->
			
			<h3><a href="#!">Importance to Puget Sound recovery</a></h3>
			<div>
				<p>River delta estuaries form where river floodplains meet the sea, creating a unique and important environment where freshwater mixes with salt water and sediments collect. Estuaries are home to a diverse array of specially adapted plants and animals, which take advantage of the fertility there, moving in and out with the tides.</p> 
<p>Estuaries provide important feeding and resting habitat for young salmon, migratory birds, and many other species that cannot find these unique benefits in any other place in our landscape. Young salmon that spend time in delta estuaries grow faster and are more likely to survive their ocean migration.
</p>
			</div>
			
			<!--*********************************FOLD 04*********************************-->
			<h3><a href="#!">What you can do</a></h3>
			<div>
				<ol>
					<li>Volunteer to participate in conservation and restoration work related to estuary ecosystems in your watershed or local area. <a href="http://www.estuaries.org/national-estuaries-day.html">Restore America's Estuaries</a> lists volunteer opportunities.</li>
					<li>Find out where your nearest estuary is, <a href="http://www.estuaries.org/">learn more</a> about estuary ecosystems, and teach others.</li>
				</ol>
			</div>
			<!--*********************************FOLD 05*********************************-->
			<h3><a href="#!">What our partners are doing</a></h3>
			<div>
				<p><a href="http://psp.wa.gov/gis/ReportCard/VitalSign/indexVSEstuaries.html">View Near Term Actions helping to advance this Vital Sign</a></p>
			</div>
			<!--*********************************FOLD 06*********************************-->
			<h3><a href="#!">Links for more information</a></h3>
			<div>
				<p><a href="http://www.pugetsoundnearshore.org/esrp/" target="_blank">Estuary and Salmon Restoration Program</a></p>
				<p><a href="https://salishsearestoration.org/wiki/River_Deltas" target="_blank">Salish Sea Restoration Wiki</a></p>
				<p><a href="http://www.rco.wa.gov/salmon_recovery/" target="_blank">Washington State Salmon Recovery</a></p>
				<p><a href="http://www.ecy.wa.gov/programs/sea/pugetsound/species/salmon.html" target="_blank">Salmon in Puget Sound Shorelines</a></p>
				<p><a href="http://www.ecy.wa.gov/programs/sea/pugetsound/beaches/estuary.html" target="_blank">Puget Sound Estuaries</a></p>
			
				<p><a href="https://data.results.wa.gov/reports/G3-4-4-f-Estuary-Restoration">Results Washington Estuaries Findings</a></p>
				<p><a href="https://data.results.wa.gov/reports/G3-4-4-f-Supplemental-Report" target="_blank">Results Washington Estuaries Report</a> </p>
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