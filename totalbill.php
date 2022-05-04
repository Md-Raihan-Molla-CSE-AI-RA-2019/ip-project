<?php

$totalbill=0;
  
$hostname='localhost';
$username='root';
$userpass='';
$dbname='ip_project21';
$con= mysqli_connect($hostname,$username,$userpass) or die('Database connection error!');


mysqli_select_db($con,$dbname);



$sql = "select * from quantity_tab";

$result = mysqli_query($con,$sql);

if($result)
{
	while($data = mysqli_fetch_assoc($result))
	{
		
		$tpid= $data['pid'];
		$tquan= $data['p_quantity'];
		$tcid= $data['cid'];
		$quan = (int)$tquan;
		
		$sql2 = "select price from product where pid='$tpid'";

        $result2 = mysqli_query($con,$sql2);
		
		$datap = mysqli_fetch_assoc($result2);
	
		$cprice= $datap['price'];
		$price=(int)$cprice;
		
		
		$totalbill= ($tquan * $price) + $totalbill;
		echo $totalbill.'<br>';
		echo $tpid.'<br>';
		echo $tquan.'<br>';
		echo $cprice.'<br><br>';
		
	}
	
	    $sql3="select max(oid) from cus_order";
		
		$result3 = mysqli_query($con,$sql3);
		
		$datao = mysqli_fetch_assoc($result3);
	
		$toid= $datao['max(oid)'];
		
	 $sql4="insert into sales(cid,oid,totalbill) values('$tcid','$toid','$totalbill')";  
	 mysqli_query($con,$sql4);
}
else
	echo "Error";

$con->close();

header('location:invoicen.php');
  
  
  
  
  ?>


