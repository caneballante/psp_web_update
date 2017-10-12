<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="google-site-verification" content="lMaE6uVdAY_4P-zfoagi1Kj2QQLS8W3JvahLqMZMuDU" />
<title>Puget Sound Partnership - Vital Signs - Cultural Wellbeing</title>
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
	color = "orange";
</script>
</head>
<body id="cp" >
<div id="container">
	<?php include 'includes/header_test.html' ?>
	<?php include 'includes/cultural_practices_title.html' ?>
	<?php include 'includes/cultural_practices_tab.html' ?>
	<div id="accordioncontainer">
		<div id="accordion"> 
		<!--*********************************FOLD 02*********************************-->
			<h3><a href="#!">Indicator and target description</a></h3>
			<div> 
				<div class="orangeBarHeader">What is the indicator?</div>
				<p>This indicator describes Puget Sound residents’ perception of their ability to engage in cultural practices as a result of either natural resource quality or management restrictions. “Cultural practices” addresses a range of practices linked to the natural environment, including tribal cultural practices related to the use, celebration, and stewardship of natural resources. The term also refers to non-tribal participation in practices associated with natural resource industries, such as agriculture, timber harvest, fishing and aquaculture; and to individual participation in cultural practices associated with nature-based outdoor recreation. This indicator will be important for assessing tradeoffs among potential recovery strategies and ensuring that strategies enhance cultural practices across diverse cultural groups.</p> 
				
				<p>Data will be collected every 2 years via survey to Puget Sound residents about their ability to engage in cultural practices linked to the natural environment. It is particularly important to survey diverse populations to reflect the varying definitions of cultural wellbeing as it relates to the natural environment.</p>
				
				<!--*********************************PURPLE HEADER*********************************-->
			  <div class="orangeBarHeader">What are the targets? </div>
				
				<p>No targets are currently set for this indicator.</p>
			</div>
			<!--*********************************FOLD*********************************-->
			<h3><a href="#!">Progress summary and data</a></h3>
			<div> 
			<!--*********************************PURPLE HEADER*********************************-->
				<h5>What is the trend?</h5>
<p>


No data are available for this indicator. We anticipate that data will be collected within the next 2 years, with assessment of trends and progress within the next 4 to 6 years.</p>
				<h5>Latest data:</h5>
<p>
No data are currently available for this indicator. The Puget Sound Partnership is seeking funding to support data collection.</p>
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