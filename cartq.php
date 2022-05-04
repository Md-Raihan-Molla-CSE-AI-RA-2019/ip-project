<?php

$quan= $_POST['quantity'];


  
$hostname='localhost';
$username='root';
$userpass='';
$dbname='ip_project21';
$con= mysqli_connect($hostname,$username,$userpass) or die('Database connection error!');

mysqli_select_db($con,$dbname);

$sql = "UPDATE quantity_tab SET p_quantity='$quan' WHERE slno IN( SELECT MAX(slno) FROM quantity_tab)";

$result = mysqli_query($con,$sql);

if($result)
{
	header('location:cart.html');
	
}
else
{
	echo "Error";
}

$con->close();
?>