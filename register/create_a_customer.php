<?php
$con = new mysqli("localhost", "store", "Password", "store");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "INSERT INTO Customer (Name, Email, Address, Payment_Info, Username, Password) VALUES ('$_POST[Name]', '$_POST[Email]', '$_POST[Address]', 'NULL', '$_POST[Username]', '$_POST[Password]');";
if ($con->query($sql)){
  echo "New record is inserted sucessfully";
}
else{
  echo "Error: ". $sql ."
". $con->error;
}
?>