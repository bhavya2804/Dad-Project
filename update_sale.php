<?Php

$conn = mysqli_connect("localhost","root","","dad_tax");

if(! $conn)
{
    die('Connection Failed'.mysql_error());
}

$percent = $_GET["percent"];

if(isset($_GET["date"]))
{
  $date= $_GET["date"];
  $sql= "SELECT * FROM `sales` WHERE `percent`='$percent' and `date`='$date' ";
}

if(isset($_GET["customer"]) && isset($_GET["invoiceno"]) ) {
  $customer = $_GET["customer"];
  $invoiceno = $_GET["invoiceno"];
  $sql= "SELECT * FROM `sales_gst` WHERE `percent`='$percent' and `invoice_no`='$invoiceno' and `customer_name`='$customer' ";
  echo "<script>document.getElementById('container2').style.display = 'none';
  document.getElementById('container1').style.display = 'block';
  </script>";
}


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
  function matthy(obj) {
  obj.value = eval(obj.value);
  }
  </script>
</head>
<body>
<a href="view.php"><button class="btn btn-warning" style="margin:5px;">Back</button></a>
<div class="container" id="container1" style="display:none">
  <center><h2>UPDATE SALES</h2></center>
  <form id="form" action="insert_sales.php" method="POST">
   <h3> By Sale </h3>
   <div class="form-group">
      <label for="date">Date:</label>
      <input type="date" class="form-control" style="width:280px;" id="date" value="<?php echo $row1[0]; ?>" name="date"  >
    </div>
    <div class="form-group">
    <?php
      if($row1[1]=='12')
      {
          echo "<label for='amt'>Amount For 12%:</label>
                <input type='text' class='form-control' id='amt12' name='amt12'  value='$row1[2]' onblur='matthy(this)'  >
          ";
      }
      else {
        echo "<label for='amt'>Amount For 18%:</label>
              <input type='text' class='form-control' id='amt18' name='amt18'  value='$row1[2]'  onblur='matthy(this)'  >
        ";
      }
    ?>
    </div>
    <button type="submit" class="btn btn-info">UPDATE</button>
    <button class="btn btn-danger"><a href='insert_sales.php?date=<?php echo $row1[0];?>&per=<?php echo $row1[1];?>'>DELETE</a></button>
    </form>

</div>
<div class="container" id="container2" style="display:none">
  <form id="form1" action="insert_sales_gst.php" method="POST">
  <h3>UPDATE GST SALE</h3>
  <br>
    <div class="form-group">
        <label for="company">CUSTOMER name:</label>
      <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="customer_name" name="customer_name">
      <option selected readonly><?php echo $row1[0];?></option>
      </select>
      </div>
      <div class="form-group">
        <label for="invoiceno">INVOICE NO:</label>
        <input type="text" class="form-control" id="invoiceno" value="<?php echo $row1[2];?>" name="invoiceno" readonly >
      </div>
      <div class="form-group">
         <label for="date">Invoice Date:</label>
         <input type="date" class="form-control" style="width:280px;" id="date" value="<?php echo $row1[1];?>" name="date"  >
       </div>

    <div class="form-group">
      <label for="percent">PERCENTAGE:</label>
    <select class="form-control" name="percent" id="percent"  >
    <option selected><?php echo $row1[3];?></option>
    </select>
    </div>

    <div class="form-group">
      <label for="amt">Amount:</label>
      <input type="number" class="form-control" id="amt" value="<?php echo $row1[4];?>" name="amt"  >
    </div>
    <button type="submit" class="btn btn-info">UPDATE</button>
    <button class="btn btn-danger"><a href='insert_sales_gst.php?customer=<?php echo $row1[0];?>&invoiceno=<?php echo $row1[2];?>&per=<?php echo $row1[3];?>'>DELETE</a></button>
  </form>
  <script>
      <?php
        if(isset($date))
        {
      ?>
          document.getElementById('container2').style.display = 'none';
          document.getElementById('container1').style.display = 'block';
      <?php
        }
        if(isset($customer))
        {
       ?>
          document.getElementById('container1').style.display = 'none';
          document.getElementById('container2').style.display = 'block';
        <?php }
       ?>
  </script>
</div>
</body>
</html>
