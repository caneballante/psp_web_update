<?php
include_once('../.newinclude.php');
$con=new MyPDO();
$qry = "SELECT id,DATE_FORMAT(dateCreated, '%m-%d-%Y') as dateCreated,title,body,cName,cPhone,cMail,info,pspRel,AltcName,AltcPhone,AltcMail,AltCellPhone FROM story WHERE id=:id";
$stmt=$con->prepare($qry);
$stmt->bindValue(":id",$_GET[id]);
if($stmt->execute()) { 
$num=$stmt->rowCount();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Puget Sound Partnership</title>
<link href="../psp_rev1inside.css" rel="stylesheet" type="text/css" />
</script> 
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="http://www.psp.wa.gov/css/ddsmoothmenu.css" />
<link rel="stylesheet" type="text/css" href="http://www.psp.wa.gov/css/ddsmoothmenu-v.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<script type="text/javascript" src="http://www.psp.wa.gov/Scripts/ddsmoothmenu.js"></script>
<script type="text/javascript">


ddsmoothmenu.init({
	mainmenuid: "mainmenu_inner", //Menu DIV id
	orientation: 'v', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu-v', //class added to menu's outer DIV
	//customtheme: ["#804000", "#482400"],
	contentsource: ["mainmenu", "http://www.psp.wa.gov/includes/pspmainnav.html"] //"markup" or ["container_id", "path_to_menu_file"]
})

</script>
	
</head> 
<body>
<h1>News from the Puget Sound Partnership</h1>
<p class="text"><strong>MEDIA CONTACT</strong><br />
<?php 
$rows=$stmt->fetchAll(PDO::FETCH_NUM);
foreach($rows as $row) {
                          echo stripslashes($row[4])."<br />".stripslashes($row[5])."<br />
                          <a href = \"mailto:".stripslashes($row[6])."\">".stripslashes($row[6])."</a>";
	if (!empty($row[9])) {
	
                         echo "<br />
					      <br />
                          ".stripslashes($row[9])."<br />".stripslashes($row[10])."<br />
                          <a href = \"mailto:".stripslashes($row[11])."\">".stripslashes($row[11])."</a>";
	}
	?>
</p>
						<p class="text"><strong>FOR IMMEDIATE RELEASE</strong><br />
                            <?php echo stripslashes($row[1])."</p>";

$title=stripslashes($row[2]);

					echo"	<p class=\"h2\"><p align=\"center\"><strong>".$title."</strong></p><p class=\"text\">".stripslashes($row[3])."</p><p align=\"center\">###</p><p align=\"center\">";
                       ?> 
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
				<a class="addthis_button_preferred_1"></a>
				<a class="addthis_button_preferred_2"></a>
				<a class="addthis_button_preferred_3"></a>
				<a class="addthis_button_preferred_4"></a>
				<a class="addthis_button_compact"></a>
				<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4d77b6ca5dc9f600"></script>
<!-- AddThis Button END -->
<p align="left" class="top"><span class="text"> <? echo stripslashes($row[7]); ?></span></p>
 <?php  }} ?>
<br class="clearfloat">
<p><a href="http://www.access.wa.gov">www.access.wa.gov</a><br />
 Copyright ©   2015 All Rights Reserved<br />
<a href="privacy.html">privacy policy</a><br />
</p>
	
 <p><strong>Puget Sound Partnership <br />
 </strong><a href="http://www.dnr.wa.gov/Publications/em_directions_to_dnr.pdf">1111 Washington Street SE</a>, Olympia, WA 98504-7000<br />
<br />
<a href="http://www.urbanwaters.org/sites/default/files/u9/Center_for_Urban_Waters_Map.pdf">326 East D Street</a>, Tacoma, WA 98421<br />
Phone: 360.464.1232 | Email: <a href="mailto:info@psp.wa.gov">info@psp.wa.gov</a><br />
Business Hours: 8am-5pm Monday through Friday<br />
<br />
 Please send <a href="../downloads/public records request form/Public Records Request.pdf">public record requests</a> to <a href="mailto:public.records@psp.wa.gov">public.records@psp.wa.gov</a><br />   </p>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-679161-6");
pageTracker._initData();
pageTracker._trackPageview();
</script>
</body>
</html>
