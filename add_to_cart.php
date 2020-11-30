<?php
$con = new mysqli("localhost", "store", "qwerty12qwaszx", "store");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
echo "$_POST[product_quantity]";
$sql = "SELECT Product_ID, Quantity FROM Cart WHERE Customer_ID=1 AND Product_ID=$_POST[product_id]";
$result = $con->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()){
    $quantity = $row["Quantity"];
    $quantity = "$_POST[product_quantity]" + $quantity;
  }
  $sql = "UPDATE Cart SET Quantity=$quantity WHERE Customer_ID=1 AND Product_ID=$_POST[product_id]";
  if ($con->query($sql)){
    echo "New record is inserted sucessfully";
  }
  else{
    echo "Error: ". $sql ."
  ". $con->error;
  }
}
else{
  $sql = "INSERT INTO Cart (Customer_ID, Product_ID, Quantity) VALUES ('1' , '$_POST[product_id]', '$_POST[product_quantity]');";
  if ($con->query($sql)){
    echo "New record is inserted sucessfully";
  }
  else{
    echo "Error: ". $sql ."
  ". $con->error;
  }
}
?>