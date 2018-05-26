<?php
header('Content-Type: text/xml');
$con = mysql_connect("mysql.coding.io","user-OMgnQb09bC","pM5u^A0nFd)]+^0lV?}p","db-u4BLEXV83Q");
if (!$con){
	die('Could not connect: ' . mysql_error());
}
$sql = "SELECT * FROM `raw_data` WHERE d_id='".$_GET["t"]."'";
$result=mysql_query($sql,$con);
$row = mysql_fetch_row($result);
echo mysql_error();
if($row==FALSE){
	die( 'Error1' . mysql_error());
}
else{
	echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
	echo "<tr>
	<td>".$row[0]."</td>
	<td>".$row[1]."</td>
	<td>".$row[2]."</td>
	<td>".$row[3]."</td>
	<td>".sprintf("%f",$row[4])."</td>
	<td>".sprintf("%f",$row[5])."</td>
	<td>".sprintf("%f",$row[6])."</td>
	<td>".$row[7]."</td>
	<td>".$row[8]."</td>
	<td>".$row[9]."</td>
	<td>".$row[10]."</td>
	<td>".$row[11]."</td>
	</tr>";
}
mysql_close($con);	
?>
