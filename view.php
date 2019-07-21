<?php
$conn = mysqli_connect("localhost","root","","dad_tax");

  if(! $conn)
  {
      die('Connection Failed'.mysql_error());
  }
  if (isset($_POST["submit"]))
  {
    $conn = mysqli_connect("localhost","root","","dad_tax");

    if(! $conn)
    {
        die('Connection Failed'.mysql_error());
    }

    $pur_sale=$_POST["pur_sale"];

    if($pur_sale=="purchase" || $pur_sale=="sales_gst")
    {

        $invoiceno=$_POST["invoiceno"];
        $sql= "SELECT * FROM `$pur_sale` WHERE `invoice_no`='$invoiceno' ";
        if ($result=mysqli_query($conn,$sql))
        {
          if($pur_sale=="purchase")
          {
            if(mysqli_num_rows($result) !=  0){
              echo "<table border='3' style='width:90%; margin:20px'>";
              echo "
              <br>
              <tr>
                <th>Invoice no</th>
                <th>Date</th>
                <th>Name of the Company</th>
                <th>Percent</th>
                <th>Amount</th>
              </tr>
              ";
              while ($row=mysqli_fetch_row($result))
              {

                echo "
                <tr>
                    <td><a href='update_purchase.php?invoiceno=$row[0]&amp;percent=$row[3]&amp;company=$row[2]'>$row[0]</a></td>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                    <td>$row[3]</td>
                    <td>$row[4]</td>
                  </tr> ";
              }
              echo "</table>";
            }
          }
          else if($pur_sale=="sales_gst")
          {
            if(mysqli_num_rows($result) !=  0){
              echo "<table border='3' style='width:90%; margin:20px'>";
              echo "
              <br>
              <tr>
                <th>Name of the Customer</th>
                <th>Date</th>
                <th>Invoice No</th>
                <th>Percent</th>
                <th>Amount</th>
              </tr>
              ";
              while ($row=mysqli_fetch_row($result))
              {

                echo "
                <tr>
                    <td><a href='update_sale.php?customer=$row[0]&amp;percent=$row[3]&amp;invoiceno=$row[2]'>$row[0]</a></td>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                    <td>$row[3]</td>
                    <td>$row[4]</td>
                  </tr> ";
              }
              echo "</table>";
            }
          }
          else{
            echo "<script>alert('No record of Invoice number $invoiceno in $pur_sale');</script>";
          }
        }
      }
    else {
      $date=$_POST["date"];
      $sql= "SELECT * FROM `$pur_sale` WHERE `date`='$date' ";
      if ($result=mysqli_query($conn,$sql))
      {
        if(mysqli_num_rows($result) !=  0){
          echo "<table border='3' style='width:90%; margin:20px'>";
          echo "
          <br>
          <tr>
            <th>Date</th>
            <th>Percent</th>
            <th>Amount</th>
          </tr>
          ";
          while ($row=mysqli_fetch_row($result))
          {

            echo "
            <tr>
                <td><a href='update_sale.php?date=$row[0]&amp;percent=$row[1]'>$row[0]</a></td>
                <td>$row[1]</td>
                <td>$row[2]</td>
              </tr> ";
          }
          echo "</table>";
        }
        else{
          echo "<script>alert('No record of Invoice number $invoiceno in $pur_sale');</script>";
        }
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>VIEW</title>
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
      function check() {
      if (document.getElementById('purchase').checked || document.getElementById('sales_gst').checked) {
          document.getElementById('invoiceno').style.display = 'block';
          document.getElementById('date').style.display = 'none';
      }
      if (document.getElementById('sales').checked) {
          document.getElementById('date').style.display = 'block';
          document.getElementById('invoiceno').style.display = 'none';
      }

    }
  </script>
</head>
<body>
  <a href="index.html"><button class="btn btn-warning" style="margin:5px;">Back</button></a>
  <center><h1>View Records</h1></center>
  <form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <div class="container">
      <div class="form-group">
        <label for="sale_purchase">Select PURCHASE/SALE:</label><br>
        <input type="radio" name="pur_sale" value="purchase" id="purchase" onclick="javascript:check();"> PURCHASE<br>
        <input type="radio"  name="pur_sale" value="sales" id="sales" onclick="javascript:check();"> SALE<br>
        <input type="radio"  name="pur_sale" value="sales_gst" id="sales_gst" onclick="javascript:check();"> SALE(GST)<br>
      </div>

      <div class="form-group" id="date" style="display:none">
        <label for="date">Date:</label>
        <input type="date" class="form-control" id="date" placeholder="Enter Date" name="date">
      </div>

      <div class="form-group" id="invoiceno" style="display:none">
        <label for="invoiceno">Invoice No:</label>
        <input type="text" class="form-control" id="invoiceno" placeholder="Enter Invoice No" name="invoiceno">
      </div>


    <button type="submit" name="submit" value="submit" class="btn btn-info">Submit</button>
    </div>
  </form>
</body>
</html>
