<?php
  
  
  $pname=$_POST['name'];
  $uname=$_POST['username'];
  $upass=$_POST['pass'];  
  
$hostname='localhost';
$username='root';
$userpass='';
$dbname='ip_project21';
$con= mysqli_connect($hostname,$username,$userpass) or die('Database connection error!');

mysqli_select_db($con,$dbname);

$sql = "INSERT INTO cus_login (name,email,pass)
VALUES ('$pname','$uname','$upass')";

if ($con->query($sql) === TRUE) {
	
	$sql = "INSERT INTO quantity_tab(cid) select cid from cus_login where email='$uname'";
        mysqli_query($con,$sql);
        header('location:foodp.html');
 
} 


$con->close();


  
  
  
  
  ?>