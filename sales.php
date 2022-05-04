<?php

$hostname='localhost';
$username='root';
$userpass='';
$dbname='ip_project21';
$con= mysqli_connect($hostname,$username,$userpass) or die('Database connection error!');

mysqli_select_db($con,$dbname);

//$sql ="insert into quantity_tab(slno,pid,cid) values('19','$npid','1')";
$sql ="insert into quantity_tab(cid) SELECT cid FROM quantity_tab";

if ($con->query($sql) === TRUE) {
  header('location:foodp.html');
} 
else {
  echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();

  
  ?>
