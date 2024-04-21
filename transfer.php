<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Latest compiled and minified CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

     <!-- Latest compiled JavaScript -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
     <link rel="stylesheet" href="customerStyle.css">
    <title>Customer</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand"><h3>Spark Bank</h3></a>
          <form class="d-flex">
            <button class="btn btn-outline-light" type="submit">Back</button>
          </form>
        </div>
      </nav>
      <form method="get" action="transaction.php">
      <div class="customer-detail">
      <div class="customer-info">
        <div>
            <div>Transfer From : </div>
            <div>Transfer To : </div>
            <div>Amount : </div>
        </div>
        <div>
            <input type="hidden" name="transfer_from" value="<?php echo $_GET["account"];?>">
            <div><?php echo $_GET["from"].'('.$_GET["account"].')';?></div>
            <div>
                <select name="transfer_to">
                <!-- <option value="volvo">kirti</option>
                <option value="saab">Ram</option>
                <option value="opel">vijay</option>
                <option value="audi">Aadi</option> -->
                <?php
                include("dbconnection.php");
                $sql = "SELECT customer_id, name, email,acc_opening_date,account_no,balance FROM customer ORDER BY name;";
                $result = $conn->query($sql);
  
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    
                    echo "<option value=".$row["account_no"].">".$row["name"].'('.$row["account_no"].")</option>";
                    
                  }
                } else {
                  echo "0 results";
                }
                ?>
              </select>
              
            </div>
            <div><input type="number" min="1" required placeholder="Enter Amount" name="amount"></div>
            <div>
                
            </div>  
        </div>
      </div>
      <br>
      <center>
      <button class="btn btn-primary">Transfer</button>
    </center>
    </div>
    </form>
</body>
</html>