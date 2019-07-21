<?php
if(isset($_POST["percentage"]))
	$i=$_POST["percentage"];
$j=1.18;
if($i==12)
	$j=1.12;

$months=['JANUARY','FEBRUARY','MARCH','APRIL','MAY','JUNE','JULY','AUGUST','SEPTEMBER','OCTOBER','NOVEMBER','DECEMBER'];

	$conn = mysqli_connect("localhost","root","","dad_tax");

	if(! $conn)
	{
	    die('Connection Failed'.mysql_error());
	}
	$filename =$months[date('m')-2]." PURCHASE $i% ".date('Y').".csv";
	 header("Content-Disposition: attachment; filename=\"$filename\"");
	 header("Content-Type: application/vnd.ms-excel");
	 $x=array("S.No","Name","GST/UIN","Invoice No","Invoice Date","Value","State Tax","Central Tax","Total","\n");
	 echo implode(",",$x);
	 $no=1;
	 $y=array();
	 $sql= "SELECT * FROM `purchase` WHERE `percent`='$i' and `status`='1' ORDER BY `date`";
	 if ($result=mysqli_query($conn,$sql))
	 {
	 	while ($row=mysqli_fetch_row($result))
		{
		    	array_push($y,$no);
		    	$no=$no+1;
		   	array_push($y,$row[2]);
		   	$com=$row[2];
			$a = mysqli_query($conn,"SELECT `gstno` FROM `dealers` WHERE `company`= '$com' ");
			$b = mysqli_fetch_array($a);
			array_push($y,$b[0]);
			array_push($y,$row[0]);
			array_push($y,$row[1]);
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
	else
		echo "not done!";

?>
