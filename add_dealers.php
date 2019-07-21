<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Dealers</title>
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
    $company = $_POST['company'];
    $gst_no=$_POST['gst_no'];
    $conn = mysqli_connect("localhost","root","","dad_tax");

  	if(! $conn)
  	{
  	    die('Connection Failed'.mysql_error());
  	}
  	$sql="INSERT INTO `dealers`(`company`, `gstno`) VALUES ('$company','$gst_no')";
  	if ($result=mysqli_query($conn,$sql))
  	{
  		header("Location: purchase.php");
  	}
  	else{
  		echo "not inserted!!";
  	}
}
?>
<body>
<a href="sales_gst.php"><button class="btn btn-warning" style="margin:5px;">Back</button></a>
  <center><h1>Add Company Name and GST NO</h1></center>
    <br>

  <div class="container">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label for="name">Company:</label>
        <input type="text" class="form-control" id="company" placeholder="Enter Name" name="company" required>
      </div>
      <div class="form-group">
        <label for="gst">Gst No:</label>
        <input type="text" class="form-control" id="gst_no" placeholder="Enter GST NO" name="gst_no" required>
      </div>
       <input type="submit" name="submit" class="btn btn-info" value="Submit"><br>
    </form>
  </div>
</body>
</html>
