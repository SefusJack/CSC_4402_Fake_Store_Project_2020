<?php
$con = new mysqli("localhost", "store", "qwerty12qwaszx", "store");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

//$sql = "INSERT INTO Cart (Customer_ID, Product_ID, Quantity) VALUES ('$_POST[Name]', '$_POST[Address]', '$_POST[Email]', $_POST[Username]', '$_POST[Password]');";
if ($con->query($sql)){
  echo "New record is inserted sucessfully";
}
else{
  echo "Error: ". $sql ."
". $con->error;
}
?>