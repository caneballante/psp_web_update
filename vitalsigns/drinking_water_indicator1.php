<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="google-site-verification" content="lMaE6uVdAY_4P-zfoagi1Kj2QQLS8W3JvahLqMZMuDU" />
<title>Puget Sound Partnership - Vital Signs - Drinking Water</title>
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
  	navSelected = 2;
	color = "green";
</script>
</head>
<body id="dw" >
<div id="container">
	<?php include 'includes/header_test.html' ?>
	<?php include 'includes/drinking_water_title.html' ?>
	<?php include 'includes/drinking_water_tab.html' ?>
	<div id="accordioncontainer">
		<div id="accordion"> 
		<!--*********************************FOLD 02*********************************-->
			<h3><a href="#!">Indicator and target description</a></h3>
			<div> 
				<div class="greenBarHeader">What is the indicator?</div>
				<p>This indicator is currently in development. It will track drinking water source contamination in public and private water systems.</p>
				
				<!--*********************************PURPLE HEADER*********************************-->
			  <div class="greenBarHeader">What are the targets? </div>
				
				<p>No targets are currently set for this indicator.</p>
			</div>
			<!--*********************************FOLD*********************************-->
			<h3><a href="#!">Progress summary and data</a></h3>
			<div> 
			<!--*********************************PURPLE HEADER*********************************-->
				<h5>What is the trend?</h5>
<p>
No data are currently available for this indicator. We anticipate that data will be collected within the next 2 years, with assessment of trends and progress within the next 4 to 6 years.</p>
				<h5>Latest data:</h5>
<p>No data are currently available for this indicator. The Puget Sound Partnership is seeking funding to support data collection.</p>
				<h5>Why is this happening?</h5> 
				<p>
			    Analysis of data trends is not currently available. We have not yet identified the specific indicator and metric, which is necessary to determine which data are needed to assess trends.</p>
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