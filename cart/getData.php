<?php
$con = new mysqli("localhost", "store", "qwerty12qwaszx", "store");
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
echo "Connected successfully.";

$result = $con->query($query);

?>