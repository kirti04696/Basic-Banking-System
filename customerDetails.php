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
    <title>Customer Details</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand"><h3>Spark Bank</h3></a>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-light" type="submit">Search</button>
          </form>
        </div>
      </nav>
    <div class="container mt-3">
        <h2>Customer Details</h2>           
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Account Number</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            
              <?php
              include("dbconnection.php");
              $sql = "SELECT customer_id, name, email,acc_opening_date,account_no,balance FROM customer;";
              if(isset($_GET['search'])){
                $search = $_GET['search'];
                $sql = 'SELECT customer_id, name, email,acc_opening_date,account_no,balance FROM customer where name like "%'.$search.'%" or email like "%'.$search.'%" or account_no like "%'.$search.'%" or balance like "%'.$search.'%"';
              }

              
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo"<tr>";
                  echo "<td>".$row["name"]."</td>";
                  echo "<td>".$row["account_no"]."</td>";
                  echo "<td>".$row["email"]."</td>";
                  echo '<td><a href="customer.php?id='.$row["customer_id"].'">View</a></td>';
                  echo"</tr>";
                 
                }
              } else {
                echo "0 results";
              }
              


              // for ($i=0; $i <5 ; $i++) { 
              //   echo"<tr>";
              //   echo "<td>Kirti</td>";
              //   echo "<td>34456789</td>";
              //   echo "<td>kirti@gmail.com</td>";
              //   echo "<td>view</td>";
              //   echo"</tr>";
              // }
              
              ?>

        
            
          </tbody>
        </table>
    </div>
    
</body>
</html>