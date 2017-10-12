<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="google-site-verification" content="lMaE6uVdAY_4P-zfoagi1Kj2QQLS8W3JvahLqMZMuDU" />
<title>Puget Sound Partnership - Vital Signs - Land Cover</title>
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
<body id="id14" >w
<div id="container">
	<?php include 'includes/header_test.html' ?>
	<?php include 'includes/land_cover_title.html' ?>
	<?php include 'includes/land_cover_tab.html' ?>
	<div id="accordioncontainer">
		<div id="accordion"> 
			<!--*********************************FOLD 01*********************************-->
			<h3><a href="#!">Importance to Puget Sound recovery</a></h3>
			<div>
				<p>The land surrounding Puget Sound is home to 4 million people who live, work, and play in our region. The need for homes, businesses, roads, and agriculture must be balanced with ecosystem protection. Forest and riparian areas provide important habitat for many species and reduce the rate of polluted runoff flowing into Puget Sound. </p>
				<p>Land development and cover indicators measure how well we are directing our region’s ongoing growth to protect our best remaining natural areas and working forests. There are four indicators for this Vital Sign: Forest Loss, Riparian Restoration, Growth in Urban Growth Areas (UGAs), and Conversion of Ecologically Important Lands.</p>
			</div>
			
			<!--*********************************FOLD 04*********************************-->
			
			<h3><a href="#!">What you can do</a></h3>
			<div>
				<ul>
					<li>Support conservation easements</li>
					<li>Adhere to municipal growth and land development ordinances</li>
					<li>Consider low impact development techniques on your own property </li>
					<li>When possible use pervious surfaces</li>
					<li>Support restoration projects by volunteering, or consider donating</li>
					<li>Consider participating in the <a href="http://scc.wa.gov/crep/" target="new">Conservation Reserve Enhancement Program (CREP)</a>, a voluntary program that pays landowners to establish buffers of native trees and shrubs along fish bearing streams and rivers</li>
				</ul>
			</div>
			
			<!--*********************************FOLD 05*********************************-->
			<h3><a href="#!">What our partners are doing</a></h3>
			<div>
				<p><a href="http://psp.wa.gov/gis/ReportCard/VitalSign/indexVSLandDevelopmentandCover.html" target="new">View Near Term Actions helping to advance this Vital Sign</a></p>
			</div>
			<!--*********************************FOLD 06*********************************-->
			<h3><a href="#!">Links for more information</a></h3>
			<div>
				<p><a href="https://pspwa.box.com/s/n6ikgcj8kmex2fpjikrb6oa55hvov7xk" target="new">Technical memorandum on setting targets for Land Cover and Land Development</a></p>
				<p> <a href="http://wdfw.wa.gov/conservation/research/projects/aerial_imagery/index.html" target="new">Coastal Change Analysis Program</a></p>
				<p><a href="http://wdfw.wa.gov/conservation/research/projects/aerial_imagery/index.html" target="new">Washington Department of Fish and Wildlife High-Resolution Aerial Imagery Change Detection </a></p>
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