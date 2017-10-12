<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="google-site-verification" content="lMaE6uVdAY_4P-zfoagi1Kj2QQLS8W3JvahLqMZMuDU" />
<title>Puget Sound Partnership - Vital Signs - Outdoor Activities</title>
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
	color = "green";
</script>
</head>
<body id="id02" >
<div id="container">
	<?php include 'includes/header_test.html' ?>
	<?php include 'includes/outdoor_activities_title.html' ?>
	<?php include 'includes/outdoor_activities_tab.html' ?>
	<div id="accordioncontainer">
		<div id="accordion"> 
			
			<!--*********************************FOLD 02*********************************-->
			<h3><a href="#!">Indicator and target description</a></h3>
			<div> 
				<!--*********************************GREEN HEADER*********************************-->
				<div class="greenBarHeader">What is the indicator? </div>
				<p>This indicator tracks participation in nature-based recreation in the Puget Sound region. Recreational activities tracked are limited to those within the scope of Puget Sound recovery and include both passive and active recreational activities, such as wildlife-watching, fishing, bicycling, boating, and swimming. </p>
                <p>We are not yet collecting data for this indicator, but when we do, data will be collected every 2 years via a survey of Puget Sound residents about their outdoor recreation habits. The results will be reported as the average time Puget Sound residents spend per week engaging in seasonal outdoor recreation activity.  All data will be analyzed for significant differences across demographic groups.</p>

                <!--*********************************GREEN HEADER*********************************-->
			  <div class="greenBarHeader">What are the targets?</div>
				<h5>2020 target</h5>
				<p>No targets are currently set for this indicator.			</p>
			</div>
			
			<!--*********************************FOLD 03*********************************-->
			<h3><a href="#!">Progress summary and data</a></h3>
			<div> 
            <h5>What is the status and trend? <br />
            </h5>
				<p>No data are currently available for this indicator. We anticipate that data will be collected within the next 2 years, with assessment of trends and progress within the next 4 to 6 years.<br />

				<!--*********************************GREEN HEADER*********************************-->			  </p>
			  <div class="greenBarHeader">Latest Data</div>
				<p>No data are currently available for this indicator. The Puget Sound Partnership is seeking funding to support data collection.</p>
				<h5>Why is this happening?</h5>
				<p>No data or trends analyses are currently available for this indicator. </p>
         
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

<!-- Google Tracking  --> 
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-69373425-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
