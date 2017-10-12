<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="google-site-verification" content="lMaE6uVdAY_4P-zfoagi1Kj2QQLS8W3JvahLqMZMuDU" />
<title>Puget Sound Partnership - Vital Signs - Air Quality</title>
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
<body id="aq" >
<div id="container">
	<?php include 'includes/header_test.html' ?>
	<?php include 'includes/air_quality_title.html' ?>
	<?php include 'includes/air_quality_tab.html' ?>
	<div id="accordioncontainer">
		<div id="accordion"> 
		<!--*********************************FOLD 02*********************************-->
			<h3><a href="#!">Indicator and target description</a></h3>
			<div> 
				<div class="greenBarHeader">What is the indicator?</div>
				<p>The Air Quality Vital Sign will track the annual status of air quality across Puget Sound counties and will attempt to identify whether specific demographic groups are more exposed to poor air quality than others, as well as the sources of poor quality in different areas. We have not yet identified the type of data that will be reported.</p>
				
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
			    Analysis of data trends is not currently available.</p>
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