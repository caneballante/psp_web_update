<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="google-site-verification" content="lMaE6uVdAY_4P-zfoagi1Kj2QQLS8W3JvahLqMZMuDU" />
<title>Puget Sound Partnership - Vital Signs - Freshwater Quality</title>
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
	color = "blue";
</script>
</head>
<body id="id17" >
<div id="container">
	<?php include 'includes/header_test.html' ?>
	  <?php include 'includes/summer_stream_flows-title.html' ?>
<?php include 'includes/summer_stream_flows-tab.html' ?>	
	<div id="accordioncontainer">
		<div id="accordion"> 
			<!--*********************************FOLD 01*********************************-->
			
			<h3><a href="#!">Importance to Puget Sound recovery</a></h3>
			<div>
				<p>Although Puget Sound is known for plentiful rain most of the year, the roaring torrents of spring can slow to a lazy stream during our dry and sunny summer months. Although this seasonal variation is normal, low summer flows can affect salmon runs, wildlife, and our water supply.</p>
			    <p>Development that draws water away from streams can reduce flows even more. Pumps can divert water. New wells tap ground water. New buildings, roads, and parking lots that prevent water from percolating into the ground can reduce the amount of water that would otherwise recharge summer streams. Shrinking snowpack and warmer summer temperatures can also reduce summer flows.</p>
</div>
			
			<!--*********************************FOLD 04*********************************-->
			<h3><a href="#!">What you can do</a></h3>
			<div>
				<ol>
					<li>Use water friendly natural landscaping and <a href="http://raingarden.wsu.edu/">rain gardens</a> where appropriate. </li>
					<li>Let the Rain Soak In: Slow stormwater runoff by directing downspouts into lawns, beds or <a href="http://raingarden.wsu.edu/">rain gardens</a>. Plant more trees to help capture rainwater.</li>
					<li>Test Automatics: Test, repair and adjust your sprinklers annually, and install a rain shut-off device. Water deeply and infrequently—one inch a week is the rule of thumb.</li>
					<li>Encourage your neighborhood association or local government to establish a buffer along creeks and streams in your area. More information is available on the <a href="http://www.ecy.wa.gov/programs/sea/shorelines/smp/faqs.html#Buffer">Washington State Department of Ecology website.</a></li>
				</ol>
			
			</div>
			<!--*********************************FOLD 05*********************************-->
			<h3><a href="#!">What our partners are doing</a></h3>
			<div>
				<p><a href="http://psp.wa.gov/gis/ReportCard/VitalSign/indexVSSummerStreamFlows.html">View Near Term Actions helping to advance this Vital Sign</a></p>
			</div>
			<!--*********************************FOLD 06*********************************-->
			<h3><a href="#!">Links for more information</a></h3>
			<div>
				<p><a href="http://www.ecy.wa.gov/programs/eap/flow/index.html" target="_blank">Washington Department of Ecology River and Stream Flow Monitoring</a></p>
				<p><a href="https://fortress.wa.gov/ecy/wrx/wrx/flows/regions/state.asp" target="_blank">Washington Department of Ecology Flow monitoring network</a></p>
				<p><a href="http://wa.water.usgs.gov/data/" target="_blank">USGS Water Data</a></p>
				<p><a href="documents/WR Indicator Outcomes Memo - 10-24-10.pdf">Flow Indicator Methodology Memo</a></p>
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