<?php
$con = new mysqli("localhost", "store", "Password", "store");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
$sql = "DELETE FROM Cart WHERE Cart_ID=$_POST[cart_id];";
if ($con->query($sql)){
  echo " New record is Deleted sucessfully";
}
else{
  echo "Error: ". $sql ."
". $con->error;
}
?>