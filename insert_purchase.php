<?php
if(isset($_POST["company"]))
	$company=$_POST["company"];
if(isset($_POST["percent"]))
	$percent=$_POST["percent"];
if(isset($_POST["amt"]))
	$amt=$_POST["amt"];
if(isset($_POST["date"]))
	$date=$_POST["date"];
if(isset($_POST["invoiceno"]))
	$invoiceno=$_POST["invoiceno"];

if(isset($_GET["inno"]))
	$x=$_GET["inno"];
if(isset($_GET["per"]))
	$y=$_GET["per"];
if(isset($_GET["com"]))
		$z=$_GET["com"];

	$conn = mysqli_connect("localhost","root","","dad_tax");

	if(! $conn)
	{
	    die('Connection Failed'.mysql_error());
	}

	if(isset($x) and isset($y) and isset($z))
	{

			$del="DELETE FROM `purchase` WHERE `percent`='$y' and `invoice_no`='$x' and `company`='$z'";
			if(mysqli_query($conn,$del)){
					echo "<script>alert('Successfuly Deleted!');
					location='purchase.php';
					</script>";
			}
			else {
				echo "<script>alert('Not Deleted.  Try Again!');
				location='view.php';
				</script>";
			}
	}
	if(isset($percent) && isset($invoiceno)){
			$sql= "SELECT * FROM `purchase` WHERE `percent`='$percent' and `invoice_no`='$invoiceno' and `company`='$company' ";
			$result=mysqli_query($conn,$sql);
			if (mysqli_num_rows($result) !=  0)
			{
					$sql1="UPDATE `purchase` SET `date`='$date',`amount`='$amt' WHERE `percent`='$percent' and `invoice_no`='$invoiceno' and `company`='$company'";
					if ($result=mysqli_query($conn,$sql1))
					{
						echo "<script>alert('Successfuly updated!');
						location='purchase.php';</script>";
					}
					else{
						echo "<script>alert('Not updated. Try again!');
							location='view.php';
						</script>";
					}
			}
			else {
				$sql1="INSERT INTO `purchase`(`invoice_no`, `date`, `company`, `percent`, `amount`,`status`) VALUE('$invoiceno','$date','$company','$percent','$amt','1')";
				if ($result=mysqli_query($conn,$sql1))
				{
						echo "<script type='text/javascript'>
						alert('Successfuly Inserted!');
						location='purchase.php';
					</script>";
				}
				else{
					echo "<script>alert('Not Inserted. Try Again!');
					location='purchase.php';
					</script>";
				}
			}
	}
?>
