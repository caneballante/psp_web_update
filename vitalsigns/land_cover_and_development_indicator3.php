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
  	navSelected = 4;
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
				<p>This indicator is the conversion of ecologically important lands.</p>
<p>This indicator tracks the fate of ecologically important lands under development pressure in Puget Sound watersheds. The measure is the proportion of vegetated cover on undeveloped lands identified as both ecologically important and under high pressure from development for residential, commercial, and industrial uses, and that is converted in a given time period to developed cover. The rate of conversion of vegetated cover is estimated using Landsat satellite imagery with a 30-meter resolution.</p>
				<p>This indicator was developed in 2011 as part of a larger effort to define the ecological importance and development pressure on the Puget Sound basin. The technical basis for this indicator can be found <a href="https://app.box.com/files/0/f/3803565702/Tech_memo">here</a>.</p>
<p>To calculate the value of the indicator, the first step is to subdivide watersheds into parcels. Each parcel is defined as either: </p>
                <ol>
                  <li>Ecologically      important and under high pressure from development. These parcels together      make up the indicator land base over which we estimate the conversion of      vegetated cover.</li>
                  <li>Ecologically      important and under low pressure from development.</li>
                  <li>Less      ecologically important and under high development pressure.</li>
                  <li>Less      ecologically important and low development pressure.</li>
                </ol>
                <p>You can visualize the categories of lands and their geographic area by looking at the map in the &ldquo;Maps&rdquo; section.</p>
                  <p>A parcel&rsquo;s ecological importance was determined using Washington State Department of Ecology, Washington State Department of Fish &amp; Wildlife, and Puget Sound Nearshore Ecosystem Restoration Project data identifying areas of high significance and high integrity with respect to hydrological dynamics, habitat quality, or biodiversity. Areas under high pressure from development included parcels with less than 35 percent impervious surfaces in private ownership with limited or no ownership-based regulatory protection. For example, undeveloped parcels with significant riparian land would be included in the high-pressure category despite protections due to critical areas designations.</p>
                  <p>Once the ecological importance and the development pressure for each parcel are defined, the rate of conversion of vegetated cover is estimated using National Oceanic and Atmospheric Administration (NOAA) Coastal Change analysis of Landsat satellite imagery with a 30-meter resolution. The conversion rate is calculated over a five year period. The most recent period is 2006 – 2011.</p>
                  <p>Because of the coarse scale approach to defining ecologically important lands in the indicator land base, this indicator is appropriately used to identify broad regional trends. This indicator&rsquo;s results and designations are not intended for use in local decision-making, permitting, planning or any form of regulatory designation. Instead, this indicator provides a regional measure of the effectiveness of local jurisdictions&rsquo; efforts to direct growth away from ecologically functional and undeveloped areas. Specifically, the indicator provides a measure of the success of local governments in identifying and protecting ecologically significant and intact lands within and outside of Urban Growth Areas, a priority strategy in the Puget Sound Action Agenda.</p>
                  <p>It is also an indicator, though perhaps a weaker one, of how effectively local jurisdictions are using or incorporating landscape characterization methods, or other ecologically based information, into their land use decision-making.</p>

                <!--*********************************PURPLE HEADER*********************************-->
			  <div class="purpBarHeader">What are the targets? </div>
				<h5>2020 target</h5>
				<p>Basin-wide loss of vegetation cover on ecologically important lands under high pressure from development does not exceed 0.15 percent of the total 2011 baseline land area over a five-year period.</p>
				<h5>Interim Target</h5>
				<p>There currently are no interim targets for this Vital Sign.</p>
			</div>
			<!--*********************************FOLD 03*********************************-->
			
			<h3><a href="#!">Progress summary and data</a></h3>
			<div> 
				<!--*********************************PURPLE HEADER*********************************-->
				<h5>Is the indicator making progress toward the 2020 target? </h5>
				<p><span><img src="images/status_getting_worse.png" width="120" height="123" alt=""/></span>No, this indicator lost ground relative to a baseline reference.</p>
				<p>Estimates of conversion show that this indicator is losing ground. </p>
                <ul>
                  <li>Achieving the 2020 target will require reducing the conversion of ecologically important lands to development to less than half the rate of conversion observed in 2006 – 2011.</li>
                  <li>The five-year baseline rate of land cover change on the indicator land base across all 12 counties in Puget Sound for the period 2001 ­– 2006 was 0.28 percent and increased to 0.36 percent over the period 2006-2011. </li>
                </ul>
				<!--*********************************PURPLE HEADER*********************************-->
			  <div class="purpBarHeader">Latest data</div>
			  
				<h3>FIGURE 1.</h3> 
				<h4>LAND CONVERSION FROM VEGETATED TO DEVELOPED COVER, OF ECOLOGICALLY IMPORTANT LANDS UNDER HIGH PRESSURE OF DEVELOPMENT IN 12 PUGET SOUND COUNTIES. <br />
					<em>2001 – 2011, reported in 5-year periods</em></h4>

			  <img src="images/landcover_conversion.jpg" alt=""/>
				<blockquote><p>The percentage shown is the area of ecologically important lands under high pressure of development that was converted from vegetated to developed cover, as a percent of total area of ecologically important lands under high development pressure. <br />
					<em>Source: Washington Department of Fish &amp; Wildlife, Habitat Program. Analysis based on many federal, state, and local data sources. </em>
					</p></blockquote>
					
				<p>Similar analyses will be completed every five years to track change over the periods 2011-2016, and 2016-2021.</p>
				
				<h3>TABLE 1.</h3> 
				<h4>LAND COVER FROM VEGETATED TO DEVELOPED COVER, BY LAND BASE TYPES, IN 12 PUGET SOUND COUNTIES.<br />
					<em>2006 - 2011</em></h4>

			  <table width="750" border="1" cellspacing="0" cellpadding="0" class="vstable">
					<tbody>
						
							
					  <tr  class="purpBackground">
							<td width="235"  class="white">Land base type</td>
							<td width="120"  class="white">Land Area, in acres (Proportion of total Puget Sound land area)</td>
							<td width="120"  class="white">Area converted, in acres, in 2006-2011</td>
							<td width="120"  class="white">Proportion of area that was converted in 2006-2011</td>
							<td width="120"  class="white">Proportion of total Puget Sound land area converted in 2006-2011</td>
						</tr>
						<tr class="lightpurpBackground">
							<td width="235"  class="white">Indicator Land Base*<br />
								High ecological importance<br />
								High development pressure</td>
							<td  class="white">1,084,785<br />
								(13%)</td>
							<td  class="white">3,949</td>
							<td  class="white">0.36%**</td>
							<td  class="white">24%</td>
						</tr>
						<tr>
							<td width="235">High ecological importance<br />
								Low development pressure</td>
							<td>5,737,559<br />
								(68%)</td>
							<td>1,242</td>
							<td>0.02%</td>
							<td>7%</td>
						</tr>
						<tr>
							<td width="235">Low ecological importance<br />
								High development pressure</td>
							<td>1,101,134<br />
								(13%)</td>
							<td>9,698</td>
							<td>0.88%</td>
							<td>58%</td>
						</tr>
						<tr>
							<td width="235">Low ecological importance<br />
								Low development pressure</td>
							<td>558,315<br />
								(7%)</td>
							<td>1,742</td>
							<td>0.31%</td>
							<td>10%</td>
						</tr>
					
			  </table>
				
			  <blockquote>	<p>*This is the metric that is tracked for the conversion of ecologically important lands indicator<br />
								** This value represents the current status of indicator; the baseline is 0.28% and the 2020 target is 0.15%<br />
								<em>Source: Washington State Department of Fish and Wildlife, Habitat Program. Analysis based on many federal, state and local data sources</em>
					</p></blockquote>
				<p>The 2011 indicator land base represents 13% of the total Puget Sound land area. As shown in the map (in the Map section below), most of the indicator land base lies around the urban fringe, outside of urban growth areas (UGAs) in the Puget Sound lowlands. The parcels that make up the indicator land base often fall along transportation corridors that are also important habitat and hydrological corridors, within the region&rsquo;s most productive farmlands (e.g. around Mount Vernon and north of Bellingham), and in lowland forested areas to the south and west of the Puget Sound. Although the parcels typically fall outside of areas identified as the highest priority and most suitable areas for growth and development (i.e. urban growth areas), in most cases there are no protective measures in place to direct growth away from these ecologically important areas.</p>
<p>The majority of the land area in Puget Sound (68%) is classified as high ecological importance and low pressure from development. This land base type is primarily made up of publicly owned forest and protected lands, privately owned large scale forest lands, and privately owned protected lands. The remaining 20% of the land area is classified as low ecological importance with high and low development pressure and includes significantly ecologically degraded areas.</p>
<p>The 12-county analysis of land cover change done in 2011 over the period 2001-2006 reveals a loss of vegetative cover on 0.28 % of the indicator land base (2,996 of 1,084,785 acres). This is equivalent to 15% of total vegetation loss in Puget Sound for the period 2001-2006. In contrast, the land area classified as high ecological importance but under low pressure from development only experienced 6% of basin-wide vegetation loss. These results suggested to us that protective measures are influencing where development is occurring but it is not yet possible to say how much of the lower conversion rate on low pressure lands is due to protective measures versus suitability for development. The remaining 79% of vegetation loss for the five-year period 2001-2006 occurred on lands classified as low ecological importance, with 50% and 29% of vegetation loss occurring on high and low development pressure lands, respectively.</p>
<p>The analysis for the same 12 counties but for the 2006-2011 period (results in the table above) shows that the rate of conversion of ecologically important lands under high pressure increased relative to the baseline reference 2001-2006 (0.36% and 0.28%, respectively). The indicator is losing ground relative to the 2020 target.</p>
<p>This analysis suggests that regulatory and other protective measures are directing much of the region&rsquo;s development away from ecologically important lands. However, with roughly 20% of vegetation loss still occurring on ecologically important lands, there is significant room to improve the degree to which we are directing and concentrating new growth in those areas that are not as critical for maintaining and recovering the health or Puget Sound species, habitats, waters, and people.</p>
				<p>The purpose of the Ecologically Important Lands indicator is to track changes to the Puget Sound landscape that can directly impact ecological functions. While CCAP provides a cost effective solution to this problem, Landsat data&rsquo;s resolution is too coarse to capture many of the numerous small changes in urbanizing areas. Another data source for capturing change in land cover in Puget Sound is WDFW&rsquo;s High Resolution Change Detection (HRCD) project which uses 1m aerial imagery instead of 30m satellite information.  With this method, it is possible to detect much smaller or more subtle changes than with the CCAP data. However, the products and methods are quite different. A comparison of the methods and results between CCAP and HRCD to track the Ecologically Important Lands indicator can be downloaded from <a href="https://pspwa.box.com/s/rah37uwvdln3wdq3jerwf6ym8efxnc72">here</a>. The WDFW HRCD project webpage is <a href="http://www.pshrcd.com/#/intro">here</a>.</p>
                <div>
                  <div> </div>
                  <div> </div>
                </div>

                <!--*********************************PURPLE HEADER*********************************-->
			  <div class="purpBarHeader">Maps</div>
				<h3> FIGURE 2.</h3> 
				<h4>DISTRIBUTION OF LAND TYPES IN PUGET SOUND</h4>
				<img src="images/landcover_map.jpg" alt="Distribution of land base types in Puget Sound" />
				<blockquote><p><em>Source: Washington Department of Fish &Wildlife, Habitat Program. Analysis based on many federal, state, and local data sources.</em></p></blockquote>			</div>
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