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

<?php /*?><?php
include_once('.newinclude.php');
$con=new MyPDO();
$qry = "SELECT id,DATE_FORMAT(dateCreated, '%m-%d-%Y') as CreationDate,title,org,storyLink,pspRel FROM story WHERE pspRel='true' AND dateCreated > '20111231' and dateCreated < '20151231' ORDER BY dateCreated DESC ";
$stmt=$con->prepare($qry);

if($stmt->execute()) { 
$num=$stmt->rowCount();
?><?php */?>
<!-- InstanceEndEditable -->
<!-- InstanceParam name="OptionalRegion1" type="boolean" value="true" -->
<!-- InstanceParam name="OptionalRegion2" type="boolean" value="false" -->
<!-- InstanceParam name="OptionalRegion3" type="boolean" value="true" -->
<!-- InstanceParam name="OptionalRegion4" type="boolean" value="false" -->
<!-- InstanceParam name="OptionalRegion5" type="boolean" value="true" -->
<!-- InstanceParam name="OptionalRegion6" type="boolean" value="true" -->
<!-- InstanceParam name="OptionalRegion7" type="boolean" value="false" -->
</head>
<body>
<?php include 'includes/modal-inc.html';?>
<!-- START IMAGE HEADER --> 
 <!-- InstanceBeginEditable name="overviewphoto" -->
<header class="overview-page-image-style overview-page-image12"> </header>
<!-- InstanceEndEditable -->  
<div class="container page-content padding-50-bottom">
	<div class="row">
		<div class="col-md-3 padding-20-top"></div>
		<div class="col-md-7 padding-20-top"> <!-- InstanceBeginEditable name="6col_header" -->
			<h1>PRESS RELEASES</h1>
			<p>&nbsp;</p>
			<!-- InstanceEndEditable --></div>
		<div class="col-md-2 padding-20-top"></div>
	</div>
	
	<div class="row"> 
		<div class="col-md-3">
			<ul class="nav nav-stacked nav-pills nav-leftside-custom padding-left-0 margin-10-top margin-left-20">
			<!-- InstanceBeginEditable name="left_nav" -->
			<?php include 'includes/ln-psp-overview.html';?>	
				
				<!-- InstanceEndEditable --> 
			</ul>
		
		</div>
			
	
		<div class="col-md-7 padding-20-top content-column">
		<!-- InstanceBeginEditable name="6col_content" -->
		
	
    			<?php include('includes/media_contact.html')?> 
	  <h2>Latest News Releases</h2>
	  <p>This will work when we launch</p>
<div class="news">
<table>             
<?php /*?><?php
$rows=$stmt->fetchAll(PDO::FETCH_NUM);
#print_r($rows);
#setlocale(LC_ALL, 'en_US');
foreach($rows as $row) {
foreach($row as $rw=>$val) {
ini_set('mbstring.substitute_character', 32);
$row[$rw]=mb_convert_encoding(stripslashes($val), 'UTF-8', 'UTF-8');}
#$row[$rw]=iconv("UTF-8", "ISO-8859-1//IGNORE", $row[$rw]);
?>
<tr><td width="70">     
<?php echo $row[1]; ?></td>
<td><?php echo "<a href='http://www.psp.wa.gov/pressreleases/partnership_release.php?id=".$row[0]."'>".$row[2]."</a></td><td>";	
#if(!empty($row[3])) { echo $row[3]."</td>";} else {echo "</td>";}
}
}
?><?php */?></tr>
	  						</table>
</div>		
		
		
		<!-- InstanceEndEditable -->
		</div>
	
		<div class="col-md-2 padding-20-top"> 
			<!-- InstanceBeginRepeat name="right_nav_repeat" --><!-- InstanceEndRepeat -->
		</div>
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


</body>
<!-- InstanceEnd --></html>
