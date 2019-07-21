<?php

$i=$_POST["percentage"];
$j=1.18;
if($i==12)
	$j=1.12;

	$conn = mysqli_connect("localhost","root","","dad_tax");

	if(! $conn)
	{
	    die('Connection Failed'.mysql_error());
	}

	$filename = "Sale_GST3__month_" . date('m')."__"."$i"."%". ".csv";
	 header("Content-Disposition: attachment; filename=\"$filename\"");
	 header("Content-Type: application/vnd.ms-excel");
	 $x=array("S.No","Invoice Date","Name","GST/UIN","Phone Number","Invoice No","Value","State Tax","Central Tax","Total","\n");
	 echo implode(",",$x);
	 $no=1;
	 $y=array();
	 $da=1;
	 while($da<32)
	 {
			$sql= "SELECT `customer_name`, `date`, `invoice_no`, `percent`, `amt` FROM `sales_gst` WHERE DAY(`date`)='$da' and `percent`='$i' and `status`='1' ";
			if ($result=mysqli_query($conn,$sql))
			{
			 	while ($row=mysqli_fetch_row($result))
			 	{
						 array_push($y,$no);
						 $no=$no+1;
						 array_push($y,$row[1]);
						 array_push($y,$row[0]);
						 $com=$row[0];
						 $a = mysqli_query($conn,"SELECT `gst_no`, `phone_no` FROM `customers` WHERE `name`= '$com' ");

						 $b = mysqli_fetch_array($a);
						 array_push($y,$b[0]);
						 array_push($y,$b[1]);

						 array_push($y,$row[2]);
						 $value=((float)$row[4]/$j);
						 array_push($y,$value);
						 $tax=((float)$row[4]-$value)/2;
						 array_push($y,$tax);
						 array_push($y,$tax);
						 array_push($y,$row[4]);
						 array_push($y,"\n");
						 echo implode(",",$y);
						 unset($y);
						 $y=array();
				 }
	 	 }
		 else {
		 	echo "Not there.";
		 }

		 $sql1= "SELECT `date`, `amount` FROM `sales` WHERE DAY(`date`)='$da' and `percent`='$i' and `status`='1' ";
		 if ($result1=mysqli_query($conn,$sql1))
		 {
			 while ($row1=mysqli_fetch_row($result1))
			 {
						array_push($y,$no);
						$no=$no+1;
						array_push($y,$row1[0]);
						array_push($y,"BY SALE");
						array_push($y," ");
						array_push($y," ");
						array_push($y," ");
						array_push($y," ");
						array_push($y," ");
						array_push($y," ");
						array_push($y,$row1[1]);
						array_push($y,"\n");
						echo implode(",",$y);
						unset($y);
						$y=array();
				}
		}
		else {
		 echo "Not there.";
	 }
		 $da=$da+1;
	}
 	header("Refresh:0; Location: sales.php");
?>
