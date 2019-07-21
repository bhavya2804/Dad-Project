<?php
	$conn = mysqli_connect("localhost","root","","dad_tax");

	if(! $conn)
	{
	    die('Connection Failed'.mysql_error());
	}

?>
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


  <script>
	$(function() {
	  $('.selectpicker').selectpicker();
	});
		function matthy(obj) {
		obj.value = eval(obj.value);
		}
  </script>
</head>
<body>
<a href="index.html"><button class="btn btn-warning" style="margin:5px;">Back</button></a>
<div class="container">
  <form id="form1" action="insert_sales_gst.php" method="POST">
	<h3>GST SALE</h3>
	<br>
		<div class="form-group">
				<label for="company">CUSTOMER name:</label>
			<select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="customer_name" name="customer_name">
			<option selected disabled>customer name</option>
			<?php
			$sql="SELECT `name` FROM `customers`";
			if ($result=mysqli_query($conn,$sql))
				{

					while ($row=mysqli_fetch_row($result))
						{
							echo "<option>".$row[0]."</option>";
						}
				}
				?>
			</select>
			<a href="add_customers.php">Add New</a>
			</div>
			<div class="form-group">
				<label for="invoiceno">INVOICE NO:</label>
				<input type="text" class="form-control" id="invoiceno" placeholder="Enter Invoice No" name="invoiceno" required>
			</div>
			<div class="form-group">
	       <label for="date">Invoice Date:</label>
	       <input type="date" class="form-control" style="width:280px;" id="date" placeholder="Enter Date" name="date" required>
	     </div>

    <div class="form-group">
      <label for="percent">PERCENTAGE:</label>
	  <select class="form-control" name="percent" id="percent" required>
	  <option selected disabled>percent</option>
	    <option>12</option>
	    <option>18</option>
	  </select>
    </div>

    <div class="form-group">
      <label for="amt">Amount:</label>
      <input type="number" class="form-control" id="amt" placeholder="Enter Amount" name="amt" required>
    </div>

    <button type="submit" class="btn btn-info">Submit</button>
  </form>

</div>
  </body>
</html>
