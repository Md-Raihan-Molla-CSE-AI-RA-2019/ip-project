<?php

$dcell= $_POST['cell'];
$dadd= $_POST['add'];
$ddate= $_POST['d_date'];


  
$hostname='localhost';
$username='root';
$userpass='';
$dbname='ip_project21';
$con= mysqli_connect($hostname,$username,$userpass) or die('Database connection error!');

mysqli_select_db($con,$dbname);




$sql1 = "select * from quantity_tab";

$result = mysqli_query($con,$sql1);

if($result)
{
	$data = mysqli_fetch_assoc($result);
	
		$ccid= $data['cid'];
}

$sql2 ="insert into cus_order(cid,cell_no,address,d_date) values('$ccid','$dcell','$dadd','$ddate')";

$result2 = mysqli_query($con,$sql2);

if($result2)
{
	header('location:totalbill.php');
}
else
{
	echo "Error";
}
$con->close();



?>