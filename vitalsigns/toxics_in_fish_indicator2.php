<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="google-site-verification" content="lMaE6uVdAY_4P-zfoagi1Kj2QQLS8W3JvahLqMZMuDU" />
<title>Puget Sound Partnership - Vital Signs - Toxics in Fish</title>
<link href="css/vital1.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="css/custom-theme/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" src="js/divhide.js"></script>
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
</head>
<body id="id21" >
<div id="container">
	<?php include 'includes/header_test.html' ?>
	<?php include 'includes/toxics_in_fish_title.html' ?>

	<!--*********************************TAB BEGIN*********************************-->
	
	<ul id="nav_indicator">
		<li><a href="toxics_in_fish.php">Vital Sign Overview<br />
			<br />
			<br />
			</a> </li>
		<li><a href="toxics_in_fish_indicator1.php">Indicator: Four types of contaminants in fish<br />
			<br />
			</a></li>
		<li class="indicator_active_aqua"><a href="toxics_in_fish_indicator2.php">Indicator: contaminant-related disease in fish<br />
			<br />
			</a></li>
	</ul>
	<div class="clearfloat"></div>
	<!--*********************************TAB END*********************************-->
	<div id="accordioncontainer">
		<div id="accordion"> 
			
			<!--*********************************FOLD 02*********************************-->
			<h3><a href="#!">Indicator and target description</a></h3>
			<div> 
				<!--*********************************AQUA HEADER*********************************-->
				<div class="aquaBarHeader">What is the indicator? </div>
				<h4 class="aqua">Contaminant-related disease in fish</h4>
				<p>In some cases it is easier to measure contaminant-induced disease or other health impairment directly. Examples of these metrics in the Toxics in Fish Indicator are PAH-related liver disease and EDC-related reproductive impairment in English sole. In these cases it is possible to observe recovery of fish health directly, after exposure to the contaminant is removed from the fish’s habitat.</p>
				<h4 class="aqua">The Contaminant Monitoring Program</h4>
				<p>The Washington Department of Fish & Wildlife monitors toxic contaminants in fish and other organisms, as a member of the Puget Sound Ecosystem Monitoring Program (PSEMP). This program has tracked the indicator metrics described above for several species in the ecosystem, in addition to a number of chemicals not covered here. In addition, the PSEMP Toxics in Fish Unit has conducted a number of focus and diagnostic studies, along with partners including NOAA Fisheries, to develop new markers and investigate contaminants in the food web. </p>
				
				<!--*********************************AQUA HEADER*********************************-->
				<div class="aquaBarHeader">What is the target? </div>
				<h5>2020 target</h5>
				<p> By 2020, contaminant-related disease or impairments in fish are reduced to background levels</p>
				<h5>Interim target</h5>
				<p><a href="http://www.psp.wa.gov/downloads/interimtargets/Toxics in Fish Interim Targets - FINAL.pdf">Link to interim targets (PDF)</a></p>
				
				<!--*********************************AQUA HEADER*********************************-->
				<div class="aquaBarHeader">Is there progress?</div>
				<p>The second part of the toxics in fish target is about reducing contaminant-related disease or impairments in fish to background levels. We focus on the effects of PAHs and EDCs. There has been a dramatic decline in PAH-related liver disease over the past 24 years, from prevalence rates of more than 30% to less than 10% in English sole in Elliott Bay, one of Puget Sound’s most highly contaminated bays. The reason for declining PAHs in Elliott Bay is unclear, but could be related to sediment cleanup, removal of creosote-treated pilings, or control of new inputs to the bay.</p>
				<p>EDC effects were observed in fish, primarily as a trend toward feminization of males, in most places where English sole and juvenile salmon were sampled. Only one status survey has been conducted for these species so far; additional surveys are in progress.</p>
			</div>
			
			<!--*********************************FOLD 03*********************************-->
			<h3><a href="#!">Progress summary and data</a></h3>
			<div> 
				<!--*********************************AQUA HEADER*********************************-->
				<div class="aquaBarHeader">Data</div>
				<p>No Data</p>
				
				<!--*********************************AQUA HEADER*********************************-->
				<div class="aquaBarHeader">Maps</div>
				<p>No Maps</p>
			</div>
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
