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
  <center><h2>SALES</h2>
		<button class="btn btn-warning"><a href="sales_gst.php" target="_blank">Enter Gst Sale Recored</a></button>
	</center>
  <form id="form" action="insert_sales.php" method="POST">
   <h3> By Sale </h3>
   <div class="form-group">
      <label for="date">Date:</label>
      <input type="date" class="form-control" style="width:280px;" id="date" placeholder="Enter Date" name="date" required>
    </div>
    <div class="form-group">
      <label for="amt">Amount For 12%:</label>
      <input type="text" class="form-control" id="amt12" name="amt12" placeholder="Enter Amount of 12%" value='' onblur="matthy(this)" required>
    </div>
		<div class="form-group">
      <label for="amt">Amount For 18%:</label>
      <input type="text" class="form-control" id="amt18" name="amt18" placeholder="Enter Amount of 18%" value='' onblur="matthy(this)" required>
    </div>
    <div class="col-md-4">
			<button type="submit" class="btn btn-info">Submit</button>
    </div>
    </form>

</div>
  </body>
</html>
