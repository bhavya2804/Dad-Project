<?Php
$invoiceno = $_GET["invoiceno"];
$percent = $_GET["percent"];
$company = $_GET["company"];

$conn = mysqli_connect("localhost","root","","dad_tax");

if(! $conn)
{
    die('Connection Failed'.mysql_error());
}

$sql= "SELECT * FROM `purchase` WHERE `percent`='$percent' and `invoice_no`='$invoiceno' and `company`='$company' ";
if ($result=mysqli_query($conn,$sql))
{
  $row1=mysqli_fetch_row($result);
}
else {
  echo "<script>alert('Try Again');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>PURCHASE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />


  <script>
	$(function() {
	  $('.selectpicker').selectpicker();
	});
  </script>
</head>
<body>
<a href="view.php"><button class="btn btn-warning" style="margin:5px;">Back</button></a>
<div class="container">
  <h2>UPDATE PURCHASE  ((*Only Date and Amount can be updated!*))</h2>
  <br>
  <form id="form1" action="insert_purchase.php" method="POST">

		<div class="form-group">
 		 <label for="company">COMPANY:</label>
 	 <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="company" name="company" readonly>
 	 <option selected ><?php echo $row1[2]; ?></option>
 	 </select>
	 <a href="add_dealers.php">Add New</a>
 	 </div>
   <div class="form-group">
      <label for="date">Date:</label>
      <input type="date" class="form-control" style="width:280px;" id="date" value="<?php echo $row1[1]; ?>" name="date" required>
    </div>
    <div class="form-group">
      <label for="invoiceno">INVOICE NO:</label>
      <input type="text" class="form-control" id="invoiceno" value="<?php echo $row1[0]; ?>" name="invoiceno" readonly>
    </div>
    <div class="form-group">
      <label for="percent">PERCENTAGE:</label>
	  <select class="form-control" name="percent" id="percent" readonly>
	  <option selected><?php echo $row1[3]; ?></option>
	    <option>12</option>
	    <option>18</option>
	  </select>
    </div>

    <div class="form-group">
      <label for="amt">Amount:</label>
      <input type="number" class="form-control" id="amt" value="<?php echo $row1[4]; ?>" name="amt" required>
    </div>

    <button type="submit" class="btn btn-info">UPDATE</button>
    <button class="btn btn-danger"><a href='insert_purchase.php?inno=<?php echo $row1[0];?>&per=<?php echo $row1[3];?>&com=<?php echo $row1[2];?>'>DELETE</a></button>
  </form>

	<br><br>
</div>
  </body>
</html>
