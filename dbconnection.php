<?php
$servername = "<db_server_url>";
$username = "<db_user_name>";
$password = "<db_password>";
$dbname = "<db_name>";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>