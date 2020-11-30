<?php
$con = new mysqli("localhost", "store", "qwerty12qwaszx", "store");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
echo $_POST[product_id];
echo $_POST[product_quantity];
$sql = "INSERT INTO Cart (Customer_ID, Product_ID, Quantity) VALUES ('1' , '$_POST[product_id]', ''$POST[product_quantity]');";
if ($con->query($sql)){
  echo "New record is inserted sucessfully";
}
else{
  echo "Error: ". $sql ."
". $con->error;
}
?>