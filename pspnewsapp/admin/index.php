<?php
// Admin interface Version 1.0

include_once("../../.newinclude.php");
if (!isset($_GET['type'])) {
$type="n";
} else {
$type = $_GET['type'];
}

$con=new MyPDO();
?>
<html>
<head>
<title >PSAT Press Release Management</title>
<LINK rel="StyleSheet" href="style.css" type="text/css">
<script type="text/javascript" src="./fckeditor/fckeditor.js"></script>
    
<script language = "Javascript">
/**
 * DHTML date validation script. Courtesy of SmartWebby.com (http://www.smartwebby.com/dhtml/)
 */
// Declaring valid date character, minimum year and maximum year
var dtCh="-";
var minYear=1900;
var maxYear=2100;

function isInteger(s){
	var i;
    for (i = 0; i < s.length; i++){   
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    // All characters are numbers.
    return true;
}

function stripCharsInBag(s, bag){
	var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not in bag, append to returnString.
    for (i = 0; i < s.length; i++){   
        var c = s.charAt(i);
        if (bag.indexOf(c) == -1) returnString += c;
    }
    return returnString;
}

function daysInFebruary (year){
	// February has 29 days in any year evenly divisible by four,
    // EXCEPT for centurial years which are not also divisible by 400.
    return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
}
function DaysArray(n) {
	for (var i = 1; i <= n; i++) {
		this[i] = 31
		if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
		if (i==2) {this[i] = 29}
   } 
   return this
}

function isDate(dtStr){
	var daysInMonth = DaysArray(12)
	var pos1=dtStr.indexOf(dtCh)
	var pos2=dtStr.indexOf(dtCh,pos1+1)
	var strMonth=dtStr.substring(0,pos1)
	var strDay=dtStr.substring(pos1+1,pos2)
	var strYear=dtStr.substring(pos2+1)
	strYr=strYear
	if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
	if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
	for (var i = 1; i <= 3; i++) {
		if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)
	}
	month=parseInt(strMonth)
	day=parseInt(strDay)
	year=parseInt(strYr)
	if (pos1==-1 || pos2==-1){
		alert("The date format should be : mm-dd-yyyy")
		return false
	}
	if (strMonth.length<1 || month<1 || month>12){
		alert("Please enter a valid month. The date format is : mm-dd-yyyy")
		return false
	}
	if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
		alert("Please enter a valid day. The date format is : mm-dd-yyyy")
		return false
	}
	if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
		alert("Please enter a valid 4 digit year between "+minYear+" and "+maxYear)
		return false
	}
	if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){
		alert("Please enter a valid date. The date format is : mm-dd-yyyy")
		return false
	}
return true
}

function ValidateForm(){
	var dt=document.formSample.dateCreated
	if (isDate(dt.value)==false){
		dt.focus()
		return false
	}
    return true
 }

</script>

</head>
<body>
<table class="mainTable" align="center" width="900">
<tr>
<td>Puget Sound Action Team Press Release</td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td height="20"><a href="index.php?type=1">Add Press Release</a></td>
<td><a href="index.php?type=4">View All Releases</a></td>
<td><a href="index.php">Admin Home</a></td>
<td></td>
<td></td>
</tr>
</table>


<?php
if ($type == "1") {
// ADD NEW RECORD
?>
<form action="addRelease.php" method="POST" name="formSample" >
<table class="mainTableA" align="center" width="900" align="center">
<tr><td align="right" height="40">Your Name</td><td><input type="text" name="creator" size="50" maxlength="100"></td></tr>
<tr><td align="right">Date Created</td><td><input type="text" name="dateCreated"  size="15" maxlength="10"> mm-dd-yyyy</td></tr>
<tr><td align="right">Date Expires</td><td><input type="text" name="dateExpires"  size="15" maxlength="10"> mm-dd-yyyy</td></tr>
<tr><td align="right">Category:</td><td>

<SELECT name="category">
<option></option>
  <option>TV</option>
<option>Radio</option>
<option>Newspaper</option>
<option>Press Release</option>
<option>Other</option>
</SELECT>
&nbsp;Subject: 
<SELECT name="Subject">
 <option value=""></option>
<option>Action Agenda</option>
<option>Action Areas</option>
<option>ANS</option>
<option>Ballast Water</option>
<option>Canada</option>
<option>Climate Change</option>
<option>Ecosystem C.Board</option>
<option>Education</option>
<option>Habitat</option>
<option>Hood Canal</option>
<option>Leadership Council</option>
<option>LID</option>
<option>North Central</option>
<option>PIE</option>
<option>PSCRP</option>
<option>San Juan</option>
<option>Science</option>
<option>Science Panel</option>
<option>Septic systems</option>
<option>Shellfish</option>
<option>SOS</option>
<option>South Central</option>
<option>South Sound</option>
<option>Species</option>
<option>Stormwater</option>
<option>Strait</option>
<option>Toxics</option>
<option>Update</option>
<option>Waste</option>
<option>Water</option>
<option>Whidbey</option>
</SELECT>
</td></tr>
<tr><td align="right">PSP Release ?</td><td><label>Yes:<INPUT type="radio" name="pspRel" value="true"></label><label>No:<INPUT type="radio" name="pspRel" value="false" checked="true"></label></td></tr>
<tr><td align="right">Title</td><td><input type="text" name="title" size="50" maxlength="100"></td></tr>
<tr><td align="right">Sub Title</td><td><input type="text" name="subTitle" size="50" maxlength="100"></td></tr>
<tr><td align="right">Story Link</td><td><input type="text" name="sLink" size="50" maxlength="100"></td></tr>
<tr><td align="right">Organization</td><td><input type="text" name="org" size="50" maxlength="100"></td></tr>

<tr><td align="right">Story Body</td><td><textarea name="body" rows="30"  cols="100" ></textarea></td></tr>
<script type="text/javascript">
      
        var oFCKeditor = new FCKeditor( 'body' ) ;
        oFCKeditor.BasePath = "./fckeditor/" ;
        oFCKeditor.ReplaceTextarea() ;
   
    </script>
<tr><td align="right">Contact Name</td><td><input type="text" name="cName" size="50" maxlength="100"></td></tr>
<tr><td align="right">Contact Phone</td><td><input type="text" name="cPhone" size="15" maxlength="14" >(333) 333-3333</td></tr>
<tr><td align="right">Cell Phone</td><td><input type="text" name="cellPhone" size="15" maxlength="14" >(333) 333-3333</td></tr>
<tr><td align="right">Contact E-Mail</td><td><input type="text" name="cEmail" size="50" maxlength="100"></td></tr>
<tr><td align="right">2nd Contact Name</td><td><input type="text" name="AltcName" size="50" maxlength="100"></td></tr>
<tr><td align="right">2nd Contact Phone</td><td><input type="text" name="AltcPhone" size="15" maxlength="14" >(333) 333-3333</td></tr>
<tr><td align="right">2nd Cell Phone</td><td><input type="text" name="AltcellPhone" size="15" maxlength="14" >(333) 333-3333</td></tr>
<tr><td align="right">2nd Contact E-Mail</td><td><input type="text" name="AltcEmail" size="50" maxlength="100"></td></tr>
<tr><td align="right">Additional Information</td><td><textarea name="info" cols="100" rows="10"></textarea></td></tr>
<tr>
<td colspan="10" align="center"><input type="submit" value="Add" onClick="return ValidateForm()"></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td><td></td><td></td><td></td><td></td><td></td>
</table>
</form>


<?php
}

if ($type == "2") {
// EDIT RECORD


}
if ($type == "3") {
// find all records
?>
<br>
<table class="mainTableB" align="center" width="1000" align="center" border="1" cellpadding="4" cellspacing="0">
<tr>
<td>Find By Creator:</td>
<td>
<?php
$qry = "SELECT creator FROM story";
$stmt=$con->prepare($qry);
$stmt->execute();
$num = $stmt->rowCount();
?>
<select>
<?php
for ($x=1 ; $x < $num ; $x++)
{
echo "<option>";
#$ans = mysql_fetch_row($result);
$ans = $stmt->fetchAll(PDO::FETCH_NUM);
	$opt = $ans[0];

}

?>

</select></td>
<td>View Last <select><option>10</option><option>20</option><option>30</option><option>40</option></select> entries</td><td></td>
</tr>
</table>
<?php
}
if ($type == "4") {
// find all records
if (!empty($_GET['order'])){
$order = $_GET['order'];
if($order=="dateCreatedDesc") { $order='dateCreated desc';$dsc='';} 
elseif ($order == "dateCreated")  {$order='dateCreated';$dsc='Desc';}
elseif($order == "creatorDesc") { $order='creator desc';$cdsc='';}
elseif($order == "creator") { $order = 'creator';$cdsc='Desc'; }
}
else {
$order = 'dateCreated desc';
}
$qry = "SELECT id,dateCreated,title,storyLink,body,cName,creator,pspRel FROM story ORDER BY ".$order;
$stmt=$con->prepare($qry);
$stmt->execute();
$rows = $stmt->rowCount();
?>
<br>
<table class="mainTableB" align="center" width="1000" align="center" border="1" cellpadding="4" cellspacing="0">
<tr>
<td height="60" class="mainTableData2" width="100"><a href="index.php?type=4&order=dateCreated<?php=$dsc?>">Date Created</a></td>
<td class="mainTableData2" width="100"><a href="index.php?type=4&order=creator<?php=$cdsc?>">Creator</a></td>
<td class="mainTableData2" width="500">Title</td>
<td class="mainTableData2" width="50">PSP Release</td>
<td class="mainTableData2" width="250">Contact Name</td>
</tr>
<?php
	$answers= $stmt->fetchAll(PDO::FETCH_NUM);
	foreach($answers as $ans)
	{
	?>
	<tr>
	<td height="60" class="mainTableData"><a href="viewDetails.php?id=<?php echo $ans[0]; ?>"><?php echo stripslashes($ans[1]) ; ?></a></td>
	<td class="mainTableData"><?php echo stripslashes($ans[6]) ; ?></td>
	<td class="mainTableData" nowrap="true"><?php echo stripslashes($ans[2]) ; ?></td>
	<td class="mainTableData" ><?php echo stripslashes($ans[7]) ; ?></td>
	<td class="mainTableData"><?php echo stripslashes($ans[5]) ; ?></td>
	
        </tr>
	
	<?php
	}
echo "</table>";
}
if ($type == "0") {
// Insert OK
echo "<br>";
echo "<center>";
echo "Record Added OK";
echo "</center>";
}

?>
</body>
</html>

