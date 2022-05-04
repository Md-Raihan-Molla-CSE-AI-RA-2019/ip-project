<?php

$npid= $_GET['pid'];

$hostname='localhost';
$username='root';
$userpass='';
$dbname='ip_project21';
$con= mysqli_connect($hostname,$username,$userpass) or die('Database connection error!');

mysqli_select_db($con,$dbname);

//$sql ="insert into quantity_tab(slno,pid,cid) values('19','$npid','1')";
$sql =" UPDATE quantity_tab SET pid='$npid' WHERE slno IN( SELECT MAX(slno) FROM quantity_tab)";

if ($con->query($sql) === TRUE) {
  echo "New record created successfully";
} 
else {
  echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();


 header('location:cart.html');
  
  ?>
