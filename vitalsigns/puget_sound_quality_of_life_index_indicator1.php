<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="google-site-verification" content="lMaE6uVdAY_4P-zfoagi1Kj2QQLS8W3JvahLqMZMuDU" />
<title>Puget Sound Partnership - Vital Signs - Puget Sound Quality of Life Index</title>
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
<body id="id04" >
<div id="container">
	<?php include 'includes/header_test.html' ?>
	<!--*********************************TITLE BAR BEGIN*********************************-->
	<div id="roundcornerstop"><img src="img/rounded_top.jpg" width="960" height="20" /></div>
	<div id="vitalheadercontainer">
		<div id="vitalheaderleftcontainer">
			<div id="vitaltitle">Puget Sound Quality of Life Index</div>
			<div id="vitalquote">We cannot underestimate or discount the many intangible contributions of the Sound to our quality of life</div>
			<div id="vitalchampion"> </div>
			<div id="vitalbuttonscontainer">
				<div id="button1"><a href="http://www.psp.wa.gov/pugetsoundprojectatlas" target="_blank">View Projects</a></div>
				<div id="button2"></div>
			</div>
		</div>
		<div id="vitalheaderrightphoto">
			<div class="underconstruction">This webpage is currently being updated. For the most recent findings for this Vital Sign, please consult the report in the latest <a href="https://pspwa.box.com/s/rhb2s6c2yzb2eskla1ssj2w84vcay7un">State of the Sound</a></div>
			<div class="photoCredit padding-top">Data last updated on March 21, 2014<br />
			Photo Credit: Hugh Grew</div></div>
	</div>
	<div id="roundcornerbottom"><img src="img/rounded_rounded_bottom.jpg" width="960" height="20" /></div>
	<!--*********************************TAB BEGIN*********************************-->
	
	<ul id="nav_indicator">
		<li ><a href="puget_sound_quality_of_life_index.php">Vital Sign Overview<br />
			<br />
			<br />
			</a> </li>
		<li class="indicator_active_orange"><a href="puget_sound_quality_of_life_index_indicator1.php">Indicator: Sound Quality of Life Index<br />
			<br />
			</a></li>
	</ul>
	<div class="clearfloat"></div>
	
	<!--*********************************TAB END*********************************--> 
	
	<!--*********************************TITLE BAR BEGIN*********************************-->
	<div id="accordioncontainer">
		<div id="accordion"> 
			
			<!--*********************************FOLD 02*********************************-->
			
			<h3><a href="#!">Indicator and target description</a></h3>
			<div>
				<h5>What is the Sound Quality of Life Index?</h5>
				<p>Recovering the Puget Sound ecosystem will reap many benefits — both tangible and intangible — for all of our residents. Whether we are employed in a marine industry, celebrating our cultural traditions, boating, or simply enjoying the scenic views, we receive gifts from Puget Sound that are part of the reason that we want to live here. A healthy Puget Sound includes a thriving natural world, a vibrant economy, and a high quality of life for people.</p>
				<p>The Puget Sound Partnership is working on a region-wide Quality of Life Index that will assign numeric values to these benefits, including attributes related to aesthetics, culture, recreation, and the economy. Work on defining the specific items to be included in the Quality of Life Index is underway and will seek input from a number of interest groups, as well as be informed by related efforts taking place at the local level. We do not have a target date for completion of the development work on the index. The final product will be presented to the Leadership Council for adoption. </p>
			</div>
			<!--*********************************FOLD 03*********************************-->
			<h3><a href="#!!">Progress summary and data</a></h3>
			<div>
				<p>There is currently no data for this indicator</p>
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
