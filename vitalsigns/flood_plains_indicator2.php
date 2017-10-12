<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="google-site-verification" content="lMaE6uVdAY_4P-zfoagi1Kj2QQLS8W3JvahLqMZMuDU" />
<title>Puget Sound Partnership - Vital Signs - Floodplains</title>
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
<body id="id15" >
<div id="container">
	<?php include 'includes/header_test.html' ?>
	<?php include 'includes/floodplains_title.html' ?>
	<?php include 'includes/floodplains_tab.html' ?>
	<div id="accordioncontainer">
	  <div id="accordion"> 
			
			<!--*********************************FOLD 02*********************************-->
			<h3><a href="#!">Indicator and target description</a></h3>
			<div> 
				<!--*********************************PURPLE HEADER*********************************-->
				<div class="purpBarHeader">What is the indicator? </div>
				<p>Floodplain function can be assessed in term of the connectivity and cover of floodplain areas. In general, areas that have native vegetation (forest or wetland) with no constraints (roads railroads, levees, revetments, or development) separating them from an unregulated river are expected to support most functions or, in the case of timber harvesting, to be recovering those functions.</p>
				  <p>There are three general indicators of the loss of floodplain function:
				  <ol><li>Land cover change in floodplain areas indicating development or other removal of native vegetation other by river channel migration;</li>
				  <li>New construction of roads or levees on floodplains;</li>
			    <li>Increased flood regulation from new reservoirs, added capacity to existing dams, or changes in reservoir operations that reduce flood frequency or magnitude. Specific indicators of floodplain function require detailed site analysis that is beyond the scope of a region indicator.</li></ol> </p>
				
				<!--*********************************PURPLE HEADER*********************************-->
			  <div class="purpBarHeader">What are the targets? </div>
				<h5>2020 target</h5>
				<p>Have no net loss of floodplain function in any watershed relative to a 2011 baseline </p>
				<h5>Interim targets</h5>
				<p>No interim targets are currently available for this Vital Sign. </p>
				
				<!--*********************************PURPLE HEADER*********************************--> 
				
			</div>
			
			<!--*********************************FOLD 03*********************************-->
			<!--*********************************FOLD 03*********************************-->
			<h3><a href="#!">Progress summary and data</a></h3>
            <div>
			<p>The analysis of progress toward the 2020 target is pending until the characterization of floodplain function is completed. </p>	
<div class="purpBarHeader">Latest Data</div>
<p>The Habitat Science Division at the Washington Department of Fish and Wildlife has completed Puget Sound Change Maps covering the time periods 2006-2009, 2009-2011 and 2011-2013 (<a href="http://www.pshrcd.com">www.pshrcd.com</a>). The land cover change maps provide a template for assessing loss of floodplain function. </p>
<h5>Why is this happening?</h5>
<p>We will find out more about the causes of change once the data are in. </p>

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
