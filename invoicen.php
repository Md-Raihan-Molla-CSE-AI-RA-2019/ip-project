
<?php

$hostname='localhost';
$username='root';
$userpass='';
$dbname='ip_project21';
$con= mysqli_connect($hostname,$username,$userpass) or die('Database connection error!');

mysqli_select_db($con,$dbname);




$sql7 = "select cid from quantity_tab";
$result7 = mysqli_query($con,$sql7);

if($result7)
{
   $data7 = mysqli_fetch_assoc($result7);
      $fcid= $data7['cid'];
   //echo $fcid.'<br>';

}



$sql1 = "select * from cus_login where cid='$fcid'";

$result1 = mysqli_query($con,$sql1);

if($result1)
{
	$data1 = mysqli_fetch_assoc($result1);
	
	
	  $fname= $data1['name'];
	  $uname= $data1['email'];
	//echo $fname.'<br>';
	//echo $uname.'<br>';
	
}	


$sql2 = "SELECT * FROM cus_order WHERE oid in(SELECT max(oid) from cus_order)";
$result2 = mysqli_query($con,$sql2);

if($result2)
{
   $data2 = mysqli_fetch_assoc($result2);
	
	$cell= $data2['cell_no'];
	$add= $data2['address'];
	$od= $data2['odate'];
	$dd= $data2['d_date'];
	  
	//echo $cell.'<br>';
	//echo $add.'<br>';
	//echo $od.'<br>';
	//echo $dd.'<br>';
}




	




$sql9 = "SELECT * FROM sales WHERE invoice_no in(SELECT max(invoice_no) from sales)";	
$result9 = mysqli_query($con,$sql9);
if($result9)
{
	$data9 = mysqli_fetch_assoc($result9);
	
	  $invoice9= $data9['invoice_no'];
	  $foid9= $data9['oid'];  
	  $tbill9= $data9['totalbill'];
	  //echo '<br><br>'.$invoice9.'<br>';
	 //echo $tbill9.'<br>';
	 
	
}
else
	echo "Error";

	
	



?>

<!DOCTYPE html>
<html>

<head>
	<title>PUBLICSHODAI</title>
  <link rel="stylesheet" type="text/css" href="invo.css">
</head>
<body>


	
<div class="design" style="width:1000px; height:1520px;">

<form action="login.php" align="center" method='POST'>
<ul>
 <li><h2 style="color:blue; text-align:center;">Delivery Receipt</h2></li>
 <li style="text-align:center;"><img src="ip_images/pblogo2.png"></li>
 
 <li><h4 style="text-align:center;">PUBLICSHODAI</h4></li> 
 <li><h5 style=" text-align:left;color:black; font-size:40px;line-height: 0.1;"><bold>Customer Information</bold></h5></li>
 <li><font size="6" face="Times" color="black"><strong>Receipt Number: </strong> <?php echo $invoice9; ?></font></li><br>
 <li><strong>Name: </strong> <?php echo $fname; ?>&emsp;&emsp;<strong>Email: </strong> <?php echo $uname; ?></li><br>

 <li><strong>Phone Number: </strong> <?php echo $cell; ?>&emsp;&emsp;<strong>Delivery Address: </strong> <?php echo $add; ?></li><br>
 
 <li><strong>Order ID: </strong> <?php echo $foid9; ?>&emsp;&emsp;<strong>Order Date & Time: </strong> <?php echo $od; ?></li><br>  
 
 <li><strong>Delivery Date: </strong> <?php echo $dd; ?></li>
 <li><h5 style="text-align:left; color:black; font-size:40px;line-height: 0.1;"><bold>Order Details:</bold></h5></li>
  
  </ul>
 
 

  
  
 
 <table border="1">
     <tr>
	   <th><font size="6" face="Times" color="black">Product Name</font></th>
	   <th><font size="6" face="Times" color="black">Quantity</font></th>
	   <th><font size="6" face="Times" color="black">Unit Price</font></th>
	   <th><font size="6" face="Times" color="black">Amount</font></th>
	 </tr>
	 
<?php	 
$sql4 = "select * from quantity_tab";	
$result4 = mysqli_query($con,$sql4);

	while($data4 = mysqli_fetch_assoc($result4))
	{
		
		$tpid4= $data4['pid'];
		$tquan4= $data4['p_quantity'];
		$tcid4= $data4['cid'];
		$quan4 = (int)$tquan4;
		
		$sql6 = "select pname,price from product where pid='$tpid4'";

        $result6 = mysqli_query($con,$sql6);
		
		$data6 = mysqli_fetch_assoc($result6);
	
	    $cname= $data6['pname'];
		$cprice= $data6['price'];
		
		$price=(int)$cprice;
		$totalbill= ($tquan4 * $price);
		//echo $totalbill.'<br>';
		//echo $tpid4.'<br>';
		//echo $tquan4.'<br>';
		//echo $cprice.'<br>';
		//echo $cname.'<br>';
		
		?>
		<tr>
	    <td style="padding:10px;"><font size="6" face="Times" color="black"><?php echo $cname; ?></font></td>
		<td style="padding:10px;"><font size="6" face="Times" color="black"><?php echo $quan4; ?></font></td>
		<td style="padding:10px;"><font size="6" face="Times" color="black"><?php echo $cprice; ?></font></td>
		<td style="padding:10px;"><font size="6" face="Times" color="black"><?php echo $totalbill; ?></font></td>
	 
	 </tr>
	 <?php
	 
	 
	 
		
	}
	
	$sql11 = "Delete from quantity_tab";

    mysqli_query($con,$sql11);
	
	$con->close();
	
	?>
	
 
  </table>
   <h1>Totalbill : <?php echo $tbill9; ?> tk only</h1><br>
   <button class="buttonf" onclick="window.print();">Print this page</button>
 </form>
   
   
   
   
  </div>
  
  
  
</body>

</html>

  
  
  
  

