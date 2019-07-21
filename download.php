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
</head>
<script>
    function check() {
    if (document.getElementById('purchase').checked) {
        document.getElementById('container1').style.display = 'block';
        document.getElementById('container2').style.display = 'none';
        document.getElementById('container3').style.display = 'none';
    }
    if (document.getElementById('gst1').checked) {
        document.getElementById('container2').style.display = 'block';
        document.getElementById('container1').style.display = 'none';
        document.getElementById('container3').style.display = 'none';
    }
    if (document.getElementById('gst3').checked) {
        document.getElementById('container3').style.display = 'block';
        document.getElementById('container1').style.display = 'none';
        document.getElementById('container2').style.display = 'none';
    }
  }
</script>
<body>
<a href="index.html"><button class="btn btn-warning" style="margin:5px;">Back</button></a>
<center><h2>DOWNLOAD OF EXCEL SHEETS</h2></center>

<div class="container">
  <div class="form-group">
    <label for="pg13">Select Purchase/ GST1/ GST3:</label><br>
    <input type="radio" name="pg13" value="purchase" id="purchase" onclick="javascript:check();"> PURCHASE<br>
    <input type="radio"  name="pg13" value="gst1" id="gst1" onclick="javascript:check();"> SALE GST1<br>
    <input type="radio"  name="pg13" value="gst3" id="gst3" onclick="javascript:check();"> SALE GST3<br>
  </div>
</div>


<div class="container" id="container1" style="display:none">
  <form id="form2" action="export.php" method="POST">
	<div class="row">
			<div class="form-group">
				<div class="col-md-3">
			      <input type="number" class="form-control" id="percentage" placeholder="Percentage" name="percentage" required>
					</div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-warning">Go</button>
			</div>
		</div>
	</div>
</br>
</form>
</div>

<div class="container" id="container2" style="display:none">
  <form id="form2" action="export_sales.php" method="POST">
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
			      <input type="number" class="form-control" id="percentage" placeholder="Percentage" name="percentage" required>
    			</div>
		</div>
		<div class="col-md-4">
			<button type="submit" class="btn btn-warning">Go</button>
		</div>
	</div>
  </form>
  </div>
  <div class="container" id="container3" style="display:none">
  <form id="form3" action="export_gst1.php" method="POST">
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
			      <input type="number" class="form-control" id="percentage" placeholder="Percentage" name="percentage" required>
    			</div>
		</div>
		<div class="col-md-4">
			<button type="submit" class="btn btn-warning">Go</button>
		</div>
	</div>
  </form>
</div>

</body>
</html>
