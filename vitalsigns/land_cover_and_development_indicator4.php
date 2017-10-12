<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="google-site-verification" content="lMaE6uVdAY_4P-zfoagi1Kj2QQLS8W3JvahLqMZMuDU" />
<title>Puget Sound Partnership - Vital Signs - Land Cover</title>
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
  	navSelected = 5;
	color = "purp";
</script>
</head>
<body id="id14" >
<div id="container">
	<?php include 'includes/header_test.html' ?>
	<?php include 'includes/land_cover_title.html' ?>
	<?php include 'includes/land_cover_tab.html' ?>
	
	<div id="accordioncontainer">
		<div id="accordion"> 
	
			
			<!--*********************************FOLD 02*********************************-->
			<h3><a href="#!">Indicator and target description</a></h3>
			<div> 
				<!--*********************************PURPLE HEADER*********************************-->
				<div class="purpBarHeader">What is the indicator? </div>
				<p>This indicator is the growth in Urban Growth Areas. </p>
				<p>This indicator tracks the proportion of population growth occurring within Urban Growth Areas (UGAs). Population growth is used as a surrogate for development activity in the region. Ten-year U.S. Census data are used for this indicator and the analysis will be updated when census data are next available in 2020. In order to generate intermediate measures of population growth distribution and assess progress toward the target, the less precise U.S. Census American Community Survey will be used.</p>
<p>County comprehensive plans designate urban growth areas for high-density urbanization with the intent to guide as much growth as possible to these areas to support regional and local economies, meet residence needs for a growing population, and be concurrent with infrastructure availability. This indicator therefore provides a measure of the effectiveness of land use policies and programs. It also measures the effectiveness of development practices in directing new development activities within existing urbanized areas and reducing land development pressures on rural and resource lands outside of urbanized areas. </p>

				
				
				
				
				
				
				
				<!--*********************************PURPLE HEADER*********************************-->
				<div class="purpBarHeader">What are the targets? </div>
				<h5>2020 target</h5>
			
				<p>The proportion of basin-wide growth occurring within urban growth areas is at least 86.5 percent (equivalent to all counties exceeding their population growth goals by 3 percent), with all counties showing an increase over their 2000−2010 percentage. </p>
				</p>
				<h5>Interim Target</h5>
				<p>There currently are no interim targets for this Vital Sign.</p>
			
			</div>
			<!--*********************************FOLD 03*********************************-->
			<h3><a href="#!">Progress summary and data</a></h3>
			<div> 
				<!--*********************************PURPLE HEADER*********************************-->
				
					<!--*********************************PURPLE HEADER*********************************-->
				<div class="purpBarHeader">Is the indicator making progress toward the 2020 target? </div>
			
			
			<p><span><img src="images/status_no_data.png" width="120" height="123" alt=""/></span>No data are available yet to assess progress.</p>

<p>The analysis of progress toward the 2020 target is pending until new data are made available. Based on U.S. Census data from 2000 to 2010, the Puget Sound basin-wide population growth occurring within urban growth areas was 83 percent (Table 1 below). For counties, this indicator ranged from 28-101%. For future analyses of progress, the value derived from the 2000 to 2010 census data will be used as a baseline reference for basin-wide (83 percent) and county-scale (ranging from 28-101 percent) population growth distribution. </p>
<p>The 2020 recovery target of 86.5 percent of population growth occurring within urban growth areas is equivalent to a 3 percent increase in the proportion of new population growth occurring within all Puget Sound urban growth areas. This target represents an effort to direct more growth to those areas deemed best suited for development, while also respecting that Puget Sound includes very urban as well as very rural counties with very different growth management needs and objectives. Data on the distribution of permits for new development (a proxy for population growth) within five of the 12 Puget Sound counties suggest that the target is achievable. </p>

				<div class="purpBarHeader">Latest data</div>
			
				
				<p> Washington population data, based on 2010 U.S. Census data, was used for the baseline analysis of population growth distribution for urban growth areas and rural areas between 2000 and 2010 (Table 1). Basin-wide, 83 percent of new population growth from 2000 to 2010 occurred within urban growth areas. For individual counties, the proportion of growth occurring within urban growth areas ranged from a low of 28 percent for Mason and Jefferson counties to highs of 92 percent and 101 percent for Snohomish and King counties, respectively.  </p>
				<img src="images/land_cover_table2.png" width="800" height="446" alt="Number of people within and outside UGAs from 2000-2010 in Puget Sound" />
				<p> Data are not currently available to complete a trend analysis of population distribution patterns over the past 10 years. However, the Washington State Department of Commerce has been collecting data on the distribution of permits for new development and a preliminary analysis suggests that growth is increasingly occurring within urban growth areas. For five central Puget Sound counties, the proportion of permits for new development within urban growth areas increased at an average rate of 0.85 percent per year from 2003 to 2010. Carried out over 10 years, these permit data suggest an almost 10 percent increase in the proportion of growth going into urban growth areas in central Puget Sound. While permit activity does not correlate exactly to population increase, these reports provide an indication of progress (in a five-county area) toward the 2020 recovery goal of an increasing proportion of population growth with urban growth areas. </p>
				
				
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