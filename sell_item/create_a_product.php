<?php
$con = new mysqli("localhost", "store", "Password", "store");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully.";

$date = date('Y-m-d H:i:s');

$sql = "INSERT INTO Product (Vendor_ID, Product_Type, Product_Name, Description, Image_URL, Date, Cost, Stock) VALUES ('$_POST[Vendor]', '$_POST[ProductType]', '$_POST[Name]', '$_POST[Description]', '$_POST[Image]', '$date', '$_POST[Cost]', '$_POST[Quantity]');";
if ($con->query($sql)){
  echo " New record is inserted sucessfully.";
}
else{
  echo "Error: ". $sql ."
". $con->error;
}
?>