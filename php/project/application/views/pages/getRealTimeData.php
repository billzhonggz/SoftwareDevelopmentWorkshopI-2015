<?php
$con = mysqli_connect("mysql.coding.io","user-OMgnQb09bC","pM5u^A0nFd)]+^0lV?}p","db-u4BLEXV83Q");
if (!$con){
	echo 'Could not connect: ' . mysql_error();
}
$sql = "SELECT `name` FROM `raw_data` WHERE d_id='".$_GET["t"]."'";
$result=mysql_query($sql,$con);
$row = mysql_fetch_row($result);
if($row==FALSE){
	echo 'Error1' . mysql_error();
}
else{
	echo $row;
}
mysql_close($con);	
?>
