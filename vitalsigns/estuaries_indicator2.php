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
  	navSelected = 3;
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
			
			<!--*********************************FOLD 02*********************************-->
			
			<h3><a href="#!">Indicator and target description</a></h3>
			<div> 
				<!--*********************************PURPLE HEADER*********************************-->
				<div class="purpBarHeader">What is the indicator? </div>
				<p>This indicator is the number of Chinook salmon natal river deltas where 10-year salmon recovery goals have been met.
					The Puget Sound Partnership, as the regional organization for salmon recovery in Puget Sound, is working with the local salmon recovery community at the watershed scale to develop quantitative habitat goals and report out on a common set of indicators that reflect the highest priority monitoring needs across Puget Sound for Chinook salmon habitat. </p>
				<p>The shared goal for the salmon recovery community is to report on the following question: What is the historic, current, and desired amount of river delta area? Two indicators were identified to answer the question: functional estuary surface area and extent of shoreline armoring. </p>
				<p>While the objective of the salmon recovery community is to be able to report progress consistently relative Vital Sign targets, watershed groups will continue to track indicators that measure different aspects of the ecosystem that are important for their locally relevant goals. </p>
				
				<!--*********************************PURPLE HEADER*********************************-->
				<div class="purpBarHeader">What are the targets? </div>
				<h5>2020 target</h5>
				<ul>
					<li>By 2020, all Chinook natal river deltas meet 10-year salmon recovery goals (or 10% of restoration need as proxy for river deltas lacking quantitative acreage goals in salmon recovery plans).</li>
				</ul>
				<h5>Interim targets:</h5>
				<p><a href="http://www.psp.wa.gov/downloads/interimtargets/Estuaries Interim Targets - FINAL.pdf">Link to interim targets (PDF)</a></p>
				<h5>2014 Interim target</h5>
				<ul>
					<li>Restore one quarter of remaining estuary acreage in all Chinook natal rivers with 10-year plans.</li>
				</ul>
			</div>
			<!--*********************************FOLD 03*********************************-->
			
			<h3><a href="#!">Progress summary and data</a></h3>
			<div>
				<p><span><img src="images/status_no_data.png" width="120" height="123" alt=""/></span>No data are available yet to assess progress.</p>
				<p>Currently, not all of the salmon recovery watersheds have quantitative 10-year or long-term goals for river deltas, and for those that do, some are in need of updating based on new science and information. In addition, salmon recovery watersheds are monitoring river delta health in different ways and reporting on different metrics. For example:</p>
				<ul>
					<li>The Chinook salmon recovery plan for the Elwha River watershed includes a goal to protect and restore estuary and nearshore habitats. The indicator to track progress toward this goal is the amount of submerged aquatic vegetation in the estuary that requires protection.</li>
					<li>The Chinook salmon recovery plan for the Snohomish River watershed includes a goal to preserve the estuary. The indicator to track progress toward this goal is the area of blind tidal channels.</li>
				</ul>
				<p> The Puget Sound Partnership and Recovery Implementation Technical Team, in collaboration with watershed groups, have begun the process of developing monitoring and adaptive management frameworks for watershed chapters in the Puget Sound Salmon Recovery Plan. This process will include defining and quantifying restoration goals. Development of goals will ultimately refine how the Partnership reports progress toward implementation of the recovery plan.</p>
				<p>Some watersheds have already taken steps to quantify restoration goals. For instance, the Skagit and Snohomish deltas have tidal wetland restoration goals tied to estimated fish rearing capacity.</p>
				<p>To track this target for all watersheds, 2015 goals for Chinook natal river estuary wetland restoration must be enumerated in a way that can be reported at a regional level. For Chinook natal rivers lacking 10-year quantified goals, proxies of need must be translated into named restoration.</p>
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