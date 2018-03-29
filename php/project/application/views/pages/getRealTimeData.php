<?php
$con = mysql_connect("cstserver.uic.edu.hk","j430003045","123456","j430003045");
if (!$con){
	echo 'Could not connect: ' . mysql_error();
}
$sql = "SELECT `name` FROM `ESDC`.`raw_data` WHERE d_id='".$_GET["t"]."'";
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
