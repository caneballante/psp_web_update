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
<!-- custom news js --> 

<?php
include_once('.newinclude.php');
$con=new MyPDO();
$qry = "SELECT id,DATE_FORMAT(dateCreated, '%m-%d-%Y') as CreationDate,title,org,storyLink,pspRel FROM story WHERE pspRel='true' AND dateCreated > '20111231' and dateCreated < '20151231' ORDER BY dateCreated DESC ";
$stmt=$con->prepare($qry);

if($stmt->execute()) { 
$num=$stmt->rowCount();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
			<div id="newsDiv"></div>
			
			
	

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
