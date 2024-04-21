

<!-- --------------------------html ------------>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Transaction Details</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand"><h3>Spark Bank</h3></a>
          <form class="d-flex" action="customerDetails.php">
        
            <button class="btn btn-outline-light" type="submit">Home</button>
          </form>
        </div>
      </nav>
    <div class="container mt-3">
        <h2>Transaction Details</h2>           
        <table class="table table-striped">
          <thead>
            <tr>
                <th>Sender Name</th>
              <th>Sender Account</th>
              <th>Reciver Name</th>
              <th>Receiver Account</th>
              <th>Date</th>
              <th>Amount</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            
              <?php
              include("dbconnection.php");
            //   $sql = "SELECT transfer_id, transfer_from, transfer_to,date,amount,status FROM transaction;";
            $sql = "SELECT c.name as sender, c2.name as receiver, tf.* FROM customer c INNER JOIN transaction tf ON c.account_no = tf.transfer_from inner join customer c2 on c2.account_no=tf.transfer_to ORDER BY tf.transfer_id desc;" ; 
            $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo"<tr>";
                  echo "<td>".$row["sender"]."</td>";
                  echo "<td>".$row["transfer_from"]."</td>";
                  echo "<td>".$row["receiver"]."</td>";
                  echo "<td>".$row["transfer_to"]."</td>";
                  echo "<td>".$row["date"]."</td>";
                  echo "<td>".$row["amount"]."</td>";
                  if($row["status"]=='success'){
                  echo "<td class='text-success'>".$row["status"]."</td>";
                  }else{
                    echo "<td class='text-danger'>".$row["status"]."</td>";
                  }
                  echo"</tr>";
                 
                }
              } else {
                echo "0 results";
              }
              ?>
          </tbody>
        </table>
    </div>
    
</body>
</html>