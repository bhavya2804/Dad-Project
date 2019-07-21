<!DOCTYPE html>
<html lang="en">
<head>
  <title>SALES</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />

<?php
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $gst_no=$_POST['gst_no'];
    $phone_no=$_POST['phone_no'];
    $conn = mysqli_connect("localhost","root","","dad_tax");

  	if(! $conn)
  	{
  	    die('Connection Failed'.mysql_error());
  	}
  	$sql="INSERT INTO `customers`(`name`, `gst_no`, `phone_no`) VALUES ('$name','$gst_no','$phone_no')";
  	if ($result=mysqli_query($conn,$sql))
  	{
  		header("Location: sales_gst.php");
  	}
  	else{
  		echo "not inserted!!";
  	}
}
?>
<body>
<a href="purchase.php"><button class="btn btn-warning" style="margin:5px;">Back</button></a>
  <center><h1>Add Customer Name and GST NO</h1>
    <br>

  <div class="container">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label for="name">Customer:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
      </div>
      <div class="form-group">
        <label for="gst">Gst No:</label>
        <input type="text" class="form-control" id="gst_no" placeholder="Enter GST NO" name="gst_no" required>
      </div>
      <div class="form-group">
        <label for="gst">Phone No:</label>
        <input type="number" class="form-control" id="phone_no" placeholder="Enter Phone NO" name="phone_no" required>
      </div>
       <input type="submit" name="submit" class="btn btn-info" value="Submit"><br>
    </form>
  </div>
</body>
</html>
