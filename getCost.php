<?php
$servername = "localhost";
$username = "store";
$password = "qwerty12qwaszx";
$dbname = "store";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT SUM(Quantity * Cost) FROM Cart NATURAL JOIN Product WHERE Customer_ID=2";
//echo($conn->query($sql)->fetch_assoc()["SUM"]);
echo(number_format($conn->query($sql)->fetch_assoc()["SUM(Quantity * Cost)"], 2, '.', ''));

$conn->close();
?>