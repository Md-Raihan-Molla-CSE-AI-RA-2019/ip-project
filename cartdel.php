<?php

$hostname='localhost';
$username='root';
$userpass='';
$dbname='ip_project21';
$con= mysqli_connect($hostname,$username,$userpass) or die('Database connection error!');

mysqli_select_db($con,$dbname);

$sql = "DELETE FROM `quantity_tab` WHERE slno IN( SELECT MAX(slno) FROM `quantity_tab`)";

$result = mysqli_query($con,$sql);

if($result)
{
	header('location:cartshow.php');
}
else
{
	echo "Error";
}
$con->close();



?>