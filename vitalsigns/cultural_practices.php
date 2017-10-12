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
  	navSelected = 1;
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
			<!--*********************************FOLD 01*********************************-->
			<h3><a href="#!">Importance to Puget Sound recovery</a></h3>
			<div>
				<p>The Cultural Wellbeing Vital Sign addresses the extent to which people feel able to maintain their cultural traditions. The Puget Sound region is home to human populations from diverse cultures, some with long-held connections to place, and others more recently arrived. Cultural practices and knowledge systems have always been shaped by the ecosystems in which a culture is based. Cultural traditions are critical to human wellbeing because they provide people a sense of belonging, create the foundation for moral development, and define rules for social interaction. Many of the cultural traditions held by Puget Sound residents depend on the health of Puget Sound ecosystems. The Cultural Wellbeing Vital Sign addresses the extent to which people feel able to maintain their cultural traditions as related to the natural environment. The loss of such cultural traditions could affect not only human quality of life but also sense of place and stewardship for the region, livelihoods, and traditions that form the base of belonging for communities.</p>
			</div>
			
			<!--*********************************FOLD 04*********************************-->
			<h3><a href="#!">What you can do</a></h3>
			<div>
				<p>Check back later for information and resources.</p>
			</div>
			
			<!--*********************************FOLD 05*********************************-->
			<h3><a href="#!">What our partners are doing</a></h3>
			<div>
				<p>Partner actions are not yet linked to this Vital Sign.</p>
			</div>
			<!--*********************************FOLD 06*********************************-->
			<h3>Links for more information</h3>
			<div>
				<ul><li><a href="https://pspwa.box.com/s/achcm3ekcy6uxqn2rrdmxsi4rko3459h">Human Wellbeing Indicators technical memo</a></li></ul>
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
