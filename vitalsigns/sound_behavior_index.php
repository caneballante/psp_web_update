<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="google-site-verification" content="lMaE6uVdAY_4P-zfoagi1Kj2QQLS8W3JvahLqMZMuDU" />
<title>Puget Sound Partnership - Vital Signs - Sound Stewardship</title>
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
<body id="id05" >
<div id="container">
	<?php include 'includes/header_test.html' ?>
	<?php include 'includes/sound_stewardship-title.html' ?>
	<?php include 'includes/sound_stewardship-tab.html' ?>
	<div id="accordioncontainer">
		<div id="accordion"> 
			
			<!--*********************************FOLD 01*********************************-->
			
			<h3><a href="#!">Importance to Puget Sound recovery</a></h3>
			<div>
				<p>The Sound Stewardship Vital Sign tells us about:</p>
				
				<ul><li>The effectiveness of our management actions as they relate to the human behaviors that can affect the health of Puget Sound</li>
					<li>The degree to which engagement in stewardship of Puget Sound contributes to people’s wellbeing</li></ul> 
					
					<p>The Sound Stewardship Vital Sign tracks individual behaviors that either positively or negatively affect Puget Sound ecosystems. Many common day-to-day household behaviors seem benign on their own, but when multiplied by 4.5 million residents their cumulative effect can significantly harm the health of the environment. Small, individual behavioral changes can lessen the negative effects. Likewise, when people participate collectively in actions to improve the health of the environment, the effect can be significant. Although people pose a significant threat to the natural environment of Puget Sound, the public’s participation in protection and restoration efforts offers the opportunity for major contributions to Puget Sound recovery.</p>
</div>
			
			<!--*********************************FOLD 05*********************************-->
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
			<h3><a href="#!">Links for more information</a></h3>
			<div>
			<ul>
				<li><a href="https://pspwa.box.com/s/achcm3ekcy6uxqn2rrdmxsi4rko3459h">Human Wellbeing Indicators technical memo</a></li>
				<li> <a href="http://www.psp.wa.gov/evaluating-public-opinion.php">Behavior index reports</a></li>
				<li><a href="http://www.psp.wa.gov/evaluating-public-opinion.php">Stewardship grant materials</a></li>
				<li><a href="http://www.pugetsoundstartshere.org">Puget Sound Starts Here</a></li>
				</ul>
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
