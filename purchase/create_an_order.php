<?php
$con = new mysqli("localhost", "store", "qwerty12qwaszx", "store");
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
echo "Connected";

$date = date('Y-m-d H:i:s');
$sql = "INSERT INTO `Order` (Cost, Date, Address, Customer_ID, Payment_Info) SELECT '0', '$date', '$_POST[customer_address]', '1', '$_POST[customer_payment]' WHERE (SELECT COUNT(*) FROM Cart WHERE Customer_ID=1) > 0;";
if ($response = $con->query($sql)){
  echo "New record is inserted sucessfully";
}
else{
  echo "Error: ". $sql ."
". $con->error;
}
$order_id = $con->insert_id;

error_log($order_id, 0);

$sql = "Update `Order` SET Cost = (SELECT SUM(Quantity * Cost) FROM Cart NATURAL JOIN Product WHERE Customer_ID=1) WHERE Order_ID = '$order_id';";
if ($con->query($sql)){
  echo "New record is inserted sucessfully";
}
else{
  echo "Error: ". $sql ."
". $con->error;
}


$sql = "SELECT * FROM Cart NATURAL JOIN Product WHERE Customer_ID=1";
$result = $con->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $product_id = $row["Product_ID"];
      $quantity = $row["Quantity"];
      $stock = $row["Stock"];

      $newstock = $stock - $quantity;
      $sql = "UPDATE Product SET Stock='$newstock' WHERE Product_ID='$product_id'";
      if ($con->query($sql)){
        echo "New record is inserted sucessfully";
      }
      else{
        echo "Error: ". $sql ."
      ". $con->error;
      }

      $sql = "INSERT INTO Order_Products (Order_ID, Product_ID, Quantity) VALUES ('$order_id', '$product_id', '$quantity');";
      if ($con->query($sql)){
        echo "New record is inserted sucessfully";
      }
      else{
        echo "Error: ". $sql ."
      ". $con->error;
      }
  }
}

?>