<?php
//update and Insert
if(isset($_POST["date"]))
	$date=$_POST["date"];
if(isset($_POST["amt12"])){
	$amt12=$_POST["amt12"];
	$percent12="12";
}
if(isset($_POST["amt18"]))
{
		$amt18=$_POST["amt18"];
		$percent18="18";
}

//deletion
if(isset($_GET["date"]))
	$x=$_GET["date"];
if(isset($_GET["per"]))
		$y=$_GET["per"];

//connection
$conn = mysqli_connect("localhost","root","","dad_tax");
if(! $conn){
	   die('Connection Failed'.mysql_error());
}

//deletion
if(isset($x) && isset($y))
{
		$del="DELETE FROM `sales` WHERE `percent`='$y' and `date`='$x' ";
		if(mysqli_query($conn,$del)){
				echo "<script>alert('Successfuly Deleted!');
				location='sales.php';
				</script>";
		}
		else {
			echo "<script>alert('Not Deleted.  Try Again!');
			location='view.php';
			</script>";
		}
}

//update and Insertion
else {
	//percent12
	if(isset($percent12))
	{
		$sql= "SELECT * FROM `sales` WHERE `date`='$date' and `percent`='$percent12' ";
		$result=mysqli_query($conn,$sql);
		//percent12 updation
		if (mysqli_num_rows($result) !=  0 && $amt12!=0)
		{
			$sql1="UPDATE `sales` SET `amount`='$amt12' WHERE `percent`='$percent12' and `date`='$date'";
			if ($result=mysqli_query($conn,$sql1))
			{
				echo "<script>alert('Successfuly updated!');
				location='sales.php';</script>";
			}
			else{
				echo "<script>alert('Not updated. Try again!');
				location='view.php';
				</script>";
			}
		}
		//percent12 insertion
		else{
			if($amt12!=0)
			{
				$sql12="INSERT INTO `sales`(`date`,`percent`, `amount`,`status`) VALUES ('$date','12','$amt12','1')";
				if ($result=mysqli_query($conn,$sql12))
				{
					echo "<script>alert('Successfuly Inserted!');
					location='sales.php';
					</script>";
				}
				else{
					echo "<script>alert('Insertion Unsuccessful!');
					location='sales.php';
					</script>";
				}
			}
		}

	}

	//percent18
	if(isset($percent18))
	{
		$sql= "SELECT * FROM `sales` WHERE `date`='$date' and `percent`='$percent18' ";
		$result=mysqli_query($conn,$sql);
		//percent18 updation
		if (mysqli_num_rows($result) !=  0 && $amt18!=0)
		{
				$sql1="UPDATE `sales` SET `amount`='$amt18' WHERE `percent`='$percent18' and `date`='$date'";
				if ($result=mysqli_query($conn,$sql1))
				{
					echo "<script>alert('Successfuly updated!');
					location='sales.php';</script>";
				}
				else{
					echo "<script>alert('Not updated. Try again!');
					location='view.php';
					</script>";
				}
			}
			//percent18 insertion
			else{
				if($amt18!=0)
				{
					$sql18="INSERT INTO `sales`(`date`,`percent`, `amount`,`status`) VALUES ('$date','18','$amt18','1')";
					if ($result=mysqli_query($conn,$sql18))
					{
						echo "<script>alert('Successfuly Inserted!');
						location='sales.php';
						</script>";
					}
					else{
						echo "<script>alert('Insertion Unsuccessful!');
						location='sales.php';
						</script>";
					}
				}
			}
	}

	}

?>
