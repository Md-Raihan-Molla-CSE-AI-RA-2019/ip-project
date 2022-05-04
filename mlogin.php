<?php
  
  $uname=$_POST['username'];
  $upass=$_POST['pass'];  
  
$hostname='localhost';
$username='root';
$userpass='';
$dbname='ip_project21';
$con= mysqli_connect($hostname,$username,$userpass) or die('Database connection error!');

mysqli_select_db($con,$dbname);

$sql = "select pass from cus_login where email='$uname'";

$result = mysqli_query($con,$sql);

if($result)
{
	while($data = mysqli_fetch_assoc($result))
	{
		$password= $data['pass'];
	}
	if($upass==$password)
	{
		$sql = "INSERT INTO quantity_tab(cid) select cid from cus_login where email='$uname'";
        mysqli_query($con,$sql);
        header('location:foodp.html');
	}
	else
	{
	  echo '<script>alert("Wrong Password or Username!!!")</script>';
	  header('location:mlogin.html'); 
     }
}
$con->close();
?>