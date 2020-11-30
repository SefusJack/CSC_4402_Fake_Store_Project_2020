<?php
$con = new mysqli("localhost", "store", "qwerty12qwaszx", "store");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected";

$sql = "SELECT * FROM `Order`;"
$result = $con->query($sql);
$order_id = $result->numrows+1;
/*
$sql = "SELECT * FROM Cart WHERE Customer_ID=1;"
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $product_id = $row["Product_ID"];
      $sql = "INSERT INTO Order_Products (Order_ID, Product_ID) VALUES ('$order_id', '$product_id');";
  }
}

$date = date('Y-m-d H:i:s');

$sql = "INSERT INTO Order (Product_ID, Cost, Date, Address, Customer_ID, Payment_Info) VALUES ('NULL', '100', '$date', $_POST[Address]', '1');";
if ($con->query($sql)){
  echo "New record is inserted sucessfully";
}
else{
  echo "Error: ". $sql ."
". $con->error;
}
*/
?>