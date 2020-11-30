<?php
$con = new mysqli("localhost", "store", "qwerty12qwaszx", "store");
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
echo "Connected successfully.";

$query = "SELECT * FROM Product";

$result = $con->query($query);
echo $result
?>