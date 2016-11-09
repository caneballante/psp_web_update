<!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/page-4-template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Puget Sound Partnership - Press Releases</title>
<!-- InstanceEndEditable -->
<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet" type="text/css">
<link href="css/custom-erika.css" rel="stylesheet" type="text/css">
<!-- loads the wf-loading class right away to minimize FOUT -->
<script>document.documentElement.className += ' wf-loading';</script>
<!-- Font PRENTON TYPEKIT -->
<script src="https://use.typekit.net/srt5jze.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<!-- InstanceBeginEditable name="head" -->
<script>
/*this variable is used to set the proper nav to active. It should to the order the nav item is in the list*/
  	navSelected = 6;
</script>
<?php
include_once('.newinclude.php');
$con=new MyPDO();
$qry = "SELECT id,DATE_FORMAT(dateCreated, '%m-%d-%Y') as CreationDate,title,org,storyLink,pspRel FROM story WHERE pspRel='true' AND dateCreated > '20111231' and dateCreated < '20151231' ORDER BY dateCreated DESC ";
$stmt=$con->prepare($qry);

if($stmt->execute()) { 
$num=$stmt->rowCount();
?>
<!-- InstanceEndEditable -->
<!-- InstanceParam name="OptionalRegion1" type="boolean" value="true" -->
<!-- InstanceParam name="OptionalRegion2" type="boolean" value="false" -->
<!-- InstanceParam name="OptionalRegion3" type="boolean" value="true" -->
<!-- InstanceParam name="OptionalRegion4" type="boolean" value="false" -->
<!-- InstanceParam name="OptionalRegion5" type="boolean" value="true" -->
<!-- InstanceParam name="OptionalRegion6" type="boolean" value="true" -->
<!-- InstanceParam name="OptionalRegion7" type="boolean" value="false" -->
<!-- InstanceParam name="OptionalRegion8" type="boolean" value="false" -->
</head>
<body>
<?php include 'includes/modal-inc.html';?>
<!-- START IMAGE HEADER --> 
 <!-- InstanceBeginEditable name="overviewphoto" -->
<header class="overview-page-image-style overview-page-image12"> </header>
<!-- InstanceEndEditable -->  
<div class="container page-content padding-50-bottom">
	<div class="row">
		<div class="col-sm-3 padding-20-top"></div>
		<div class="col-sm-7 padding-20-top"> <!-- InstanceBeginEditable name="6col_header" -->
			<h1>NEWS RELEASES</h1>
			<p>&nbsp;</p>
			<!-- InstanceEndEditable --></div>
		<div class="col-sm-2 padding-20-top"></div>
	</div>
	
	<div class="row"> 
		<div class="col-sm-3">
			<div class="nav-leftside-custom">
				<ul class="nav nav-stacked nav-pills nav-leftside-custom padding-left-0 margin-10-top">
					<!-- InstanceBeginEditable name="left_nav" -->
				<?php include 'includes/ln-psp-overview.html';?>
				<!-- InstanceEndEditable -->
				</ul>
			</div>
		</div>
		 
		<div class="col-sm-7 padding-20-top content-column"> <!-- InstanceBeginEditable name="6col_content" -->
			<?php include('includes/media_contact.html')?>
			<h2>Latest News Releases</h2>
			
			
			
		<p>	<a href="https://content.govdelivery.com/accounts/WAPSP/bulletins/16d7688">Media advisory: Puget Sound Partnership Science Panel to discuss climate vulnerability, other Puget Sound issues</a> </p>
			
			
			<p><a href="https://content.govdelivery.com/accounts/WAPSP/bulletins/1695666">Media Advisory: Puget Sound Partnership's Leadership Council to discuss salmon recovery and more at Oct. 6 meeting</a></p>


<p><a href="https://content.govdelivery.com/accounts/WAPSP/bulletins/165b1ae">Media Advisory: Salmon Recovery Council to discuss sustainable funding options for Puget Sound salmon recovery</a></p>


<p><a href="https://content.govdelivery.com/accounts/WAPSP/bulletins/1622f40">Media Advisory: Ecosystem Coordination Board to discuss sustainable funding for salmon recovery, learn about the Wild Futures Initiative</a></p>


<p><a href="https://content.govdelivery.com/accounts/WAPSP/bulletins/15ef44c">Media advisory: Puget Sound Partnership Science Panel to discuss Science Work Plan, coastal resilience, sea-level rise</a></p>

<p><a href="https://content.govdelivery.com/accounts/WAPSP/bulletins/157d7e6">News release: Governor Inslee appoints Deborah Jensen to Puget Sound Partnership’s Leadership Council</a></p>

<p><a href="https://content.govdelivery.com/accounts/WAPSP/bulletins/1516532">Media Advisory: Puget Sound Partnership Leadership Council to consider adoption of 2016 Puget Sound Action Agenda at June 29 meeting</a></p>


<p><a href="https://content.govdelivery.com/accounts/WAPSP/bulletins/1501d66">Media advisory: Science Panel to discuss Biennial Science Work Plan, Marine Survival Project, Implementation Strategies</a></p>


<p><a href="https://content.govdelivery.com/accounts/WAPSP/bulletins/14dfb76">Puget Sound Partnership media advisory: Puget Sound Salmon Recovery Council and Ecosystem Coordination Board to discuss 2016 Action Agenda</a></p>


<p><a href="https://content.govdelivery.com/accounts/WAPSP/bulletins/14c958b">Puget Sound Partnership media advisory: Science Panel to discuss updates to Action Agenda</a></p>


<p><a href="https://content.govdelivery.com/accounts/WAPSP/bulletins/14b4461">Puget Sound Partnership Media Advisory: Salmon Recovery Council to meet May 26, discuss funding requests</a></p>


<p><a href="https://content.govdelivery.com/accounts/WAPSP/bulletins/149d6d2">Puget Sound Partnership Media Advisory: Ecosystem Coordination Board to meet May 19, discuss work plan</a></p>


<p><a href="https://content.govdelivery.com/accounts/WAPSP/bulletins/14862dc">Puget Sound Partnership Media Advisory: Science Panel meeting for May 11 cancelled</a></p>


<p><a href="https://content.govdelivery.com/accounts/WAPSP/bulletins/1478066">Puget Sound Partnership Media Advisory: Science Panel to meet May 11, in Puyallup</a></p>




			
			
			
			<strong>4.21.16<br>
			</strong><br>
			<a href="https://content.govdelivery.com/accounts/WAPSP/bulletins/144c2ff">Puget Sound Partnership media advisory: Leadership Council to hear status of resident orca, updates to 2016 Action Agenda </a><br>
			<strong>3.24.16<br>
			</strong><br>
			<a href="https://content.govdelivery.com/accounts/WAPSP/bulletins/13f10d0">Public invited to learn about Draft 2016 Action Agenda for Puget Sound</a><br>
			<!--news content BOX--><strong>3.18.16</strong><br>
			<a href="https://content.govdelivery.com/accounts/WAPSP/bulletins/13dc539"> Science Panel hears recovery funding update; Salmon Recovery Council discusses ecosystem recovery plans </a><br>
			<!--END news content BOX-->
			<div class="news">
				<table class="table table-responsive table-striped">
					<?php
$rows=$stmt->fetchAll(PDO::FETCH_NUM);
#print_r($rows);
#setlocale(LC_ALL, 'en_US');
foreach($rows as $row) {
foreach($row as $rw=>$val) {
ini_set('mbstring.substitute_character', 32);
$row[$rw]=mb_convert_encoding(stripslashes($val), 'UTF-8', 'UTF-8');}
#$row[$rw]=iconv("UTF-8", "ISO-8859-1//IGNORE", $row[$rw]);
?>
					<tr>
						<td width="70"><?php echo $row[1]; ?></td>
						<td><?php echo "<a href='http://www.psp.wa.gov/pressreleases/partnership_release.php?id=".$row[0]."'target='new'>".$row[2]."</a></td><td>";	
#if(!empty($row[3])) { echo $row[3]."</td>";} else {echo "</td>";}
}
}
?>
					</tr>
				</table>
			</div>
			<!-- InstanceEndEditable --> </div>
		
		<div class="col-sm-2 padding-20-top padding-0-right"> <!-- InstanceBeginRepeat name="right_nav_repeat" --><!-- InstanceEndRepeat --> </div>
	</div>
	<!--END OF ROW --> 
</div>
<!--END OF CONTENT CONTAINER -->

<?php include 'includes/footer-inc.html';?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.2.min.js"></script> 

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script> 
<!-- custom js --> 
<script src="js/custom.js"></script> 
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
<!-- InstanceEnd --></html>
