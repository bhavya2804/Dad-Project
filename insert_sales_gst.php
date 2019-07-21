<?php
if(isset($_POST["customer_name"]))
	$customer_name=$_POST["customer_name"];
if(isset($_POST["percent"]))
	$percent=$_POST["percent"];
if(isset($_POST["amt"]))
	$amt=$_POST["amt"];
if(isset($_POST["date"]))
	$date=$_POST["date"];
if(isset($_POST["invoiceno"]))
	$invoiceno=$_POST["invoiceno"];

//deletion
if(isset($_GET["customer"]))
	$x=$_GET["customer"];
if(isset($_GET["per"]))
		$y=$_GET["per"];
if(isset($_GET["invoiceno"]))
	$z=$_GET["invoiceno"];


//connection
$conn = mysqli_connect("localhost","root","","dad_tax");
if(! $conn)
{
	    die('Connection Failed'.mysql_error());
}

if(isset($x))
{
	$del="DELETE FROM `sales_gst` WHERE `percent`='$y' and `customer_name`='$x' and `invoice_no`='$z' ";
	if(mysqli_query($conn,$del)){
			echo "<script>alert('Successfuly Deleted!');
			location='sales_gst.php';
			</script>";
	}
	else {
		echo "<script>alert('Not Deleted.  Try Again!');
		location='view.php';
		</script>";
	}
}
if(isset($percent) && isset($invoiceno)) {
	$sql= "SELECT * FROM `sales_gst` WHERE `invoice_no`='$invoiceno' and `percent`='$percent' and `customer_name`='$customer_name' ";
	$result=mysqli_query($conn,$sql);
	//updation
	if (mysqli_num_rows($result) !=  0)
	{
		echo "<script>alert('$amt');</script>";
		$sql1="UPDATE `sales_gst` SET `date`='$date',`amt`='$amt' WHERE `invoice_no`='$invoiceno' and `percent`='$percent' and `customer_name`='$customer_name'";
		if ($result=mysqli_query($conn,$sql1))
		{
			echo "<script>alert('Successfuly updated!');
			location='sales_gst.php';</script>";
		}
		else{
			echo "<script>alert('Not updated. Try again!');
			location='view.php';
			</script>";
		}
	}
	// insertion
	else{
			$sql12="INSERT INTO `sales_gst`(`customer_name`, `date`, `invoice_no`, `percent`, `amt`,`status`) VALUES ('$customer_name','$date','$invoiceno','$percent','$amt','1')";
			if ($result=mysqli_query($conn,$sql12))
			{
				echo "<script>alert('Successfuly Inserted!');
				location='sales_gst.php';
				</script>";
			}
			else{
				echo "<script>alert('Insertion Unsuccessful!');
				location='sales_gst.php';
				</script>";
			}
		}
}

?>
