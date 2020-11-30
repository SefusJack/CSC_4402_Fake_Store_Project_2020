<?php
$con = new mysqli("localhost", "store", "qwerty12qwaszx", "store");
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
echo "Connected";

$sql = "SELECT * FROM `Order`;";
$result = $con->query($sql);
$order_id = $result->numrows+1;

$sql = "SELECT * FROM Cart WHERE Customer_ID=1;";
$result = $con->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $product_id = $row["Product_ID"];
      $sql = "INSERT INTO Order_Products (Order_ID, Product_ID) VALUES ('$order_id', '$product_id');";
  }
  $date = date('Y-m-d H:i:s');

  $sql = "INSERT INTO `Order` (Cost, Date, Address, Customer_ID, Payment_Info) VALUES ('100', '$date', '1', '1', '1');";
  if ($con->query($sql)){
    echo "New record is inserted sucessfully";
  }
  else{
    echo "Error: ". $sql ."
  ". $con->error;
  }
}
?>