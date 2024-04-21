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
          <form class="d-flex" action="customerDetails.php">
            <button class="btn btn-outline-light" type="submit">Back</button>
          </form>
        </div>
      </nav>
      <div class="customer-detail">
      <div class="customer-info">
        <div>
            <div>Name : </div>
            <div>Email : </div>
            <div>Account No : </div>
            <div>Balance: </div>
            
        </div>
        <div>
            <!-- <div>Ram vijay Sharma</div>
            <div>ramvijay@gmail.com</div>
            <div>345678</div>
            <div>1000</div> -->
            <?php
            include("dbconnection.php");
              $id = $_GET["id"];
              $sql = "SELECT customer_id, name, email,acc_opening_date,account_no,balance FROM customer where customer_id=$id;";
              $result = $conn->query($sql);

              $name="";
              $account="";

              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  
                  echo "<div>".$row["name"]."</div>";
                  echo "<div>".$row["email"]."</div>";
                  echo "<div>".$row["account_no"]."</div>";
                  echo "<div>".$row["balance"]."</div>";
                  $name = $row["name"];
                  $account=$row["account_no"];
                }
              } else {
                echo "0 results";
              }
            ?>

        </div>

      </div>
      <br>
      <center>
      <a href="transfer.php?from=<?php echo $name.'&account='.$account;?>"><button class="btn btn-primary">Transfer</button></a>
    </center>
    </div>
</body>
</html>