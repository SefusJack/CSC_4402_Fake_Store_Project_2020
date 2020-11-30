<?php
$con = new mysqli("localhost", "store", "qwerty12qwaszx", "store");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
$sql = "DELETE FROM Cart WHERE Customer_ID=$_POST[customer_id];";
if ($con->query($sql)){
  echo " New record is Deleted sucessfully";
}
else{
  echo "Error: ". $sql ."
". $con->error;
}
?>