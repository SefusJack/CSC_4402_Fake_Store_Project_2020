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

$sql = "SELECT Product_ID FROM Product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<div>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>