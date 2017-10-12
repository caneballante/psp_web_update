<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="google-site-verification" content="lMaE6uVdAY_4P-zfoagi1Kj2QQLS8W3JvahLqMZMuDU" />
<title>Puget Sound Partnership - Vital Signs - Birds</title>
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
	color = "pink";
</script>
</head>
<body id="id11">
<div id="container">
	<?php include 'includes/header_test.html' ?>
	<?php include 'includes/birds_title.html' ?>
	<?php include 'includes/birds_tab.html' ?>
	<div id="accordioncontainer">
		<div id="accordion"> 
			<!--*********************************FOLD 01*********************************-->
			<h3><a href="#!">Importance to Puget Sound recovery</a></h3>
			<div>
				<p>Walk along the shores of Boundary Bay in any season, and you’ll see an ever-changing cast of birds. Each winter, thousands of seabirds, seaducks, and waterfowl migrate from all directions to converge in the relatively calm and food-rich waters of Puget Sound. In summer, colonies of seabirds are busy attending their young. In spring and fall, the shorelines are full of shorebirds that stop to feed and rest during migration.</p>
				<p>Birds serve as useful indicators of ecosystem change and ecosystem health, biodiversity, condition of habitats, and climate change.</p>
			</div>
			
			<!--*********************************FOLD 04*********************************-->
			<h3><a href="#!">What you can do</a></h3>
			<div>
				<ul>
					<li>Participate in citizen science programs such as:</li>
					<li>
						<ul>
							<li>Breeding Bird Survey - USGS</li>
							<li>Christmas Bird Count - Audubon</li>
							<li>Coastal Observation and Seabird Survey Team (COASST)</li>
							<li>Pigeon Guillemot Monitoring at the Nisqually Reach Aquatic Reserve</li>
							<li>Pigeon Guillemot Research Project on Whidbey</li>
							<li>Seattle Audubon’s Puget Sound Seabird Survey</li>
						</ul>
					</li>
					<li>Volunteer at the National Refuges (WA Maritime Complex)</li>
					<li>Become of member of your local chapter of bird conservation and management organizations</li>
					<li>Follow conservation issues with marbled murrelets, tufted puffins, and other species of concern</li>
					<li>Hop on a commercial or private boat and tour around Protection Island (but stay 200 yards from the island to avoid disturbing nesting and roosting birds).</li>
					<li>Drive boats around birds on the water</li>
					<li>Respect closed islands during seabird breeding seasons</li>
				</ul>
			</div>
			<!--*********************************FOLD 05*********************************-->
			<h3><a href="#!">What our partners are doing</a></h3>
			<div>
				<p><a href="http://psp.wa.gov/gis/ReportCard/VitalSign/indexVSBirds.html">View Near Term Actions helping to advance this Vital Sign</a></p>
			</div>
			<!--*********************************FOLD 06*********************************-->
			<h3><a href="#!">Links for more information</a></h3>
			<div>
				<p><a href="http://wdfw.wa.gov/conservation/research/projects/seabird/">Washington Department of Fish and Wildlife Seabird Ecology program </a></p>
				<p><a href="http://wdfw.wa.gov/conservation/research/projects/waterfowl/">Washington Department of Fish and Wildlife Waterfowl Ecology program</a> </p>
				<p><a href="http://wdfw.wa.gov/hunting/waterfowl/wildlife_management.html">Washington Department of Fish and Wildlife Wildlife Management </a> </p>
				<p><a href="http://www.eopugetsound.org/articles/marine-birds-0">Encyclopedia of Puget Sound Marine Birds</a> </p>
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
