<?php
$con = new mysqli("localhost", "user", "password", 'db');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "INSERT INTO Vendor (Vendor_Name, Address, Email, Username, Password) VALUES ('$_POST[Name]', '$_POST[Address]', '$_POST[Email]', $_POST[Username]', '$_POST[Password]');";
if ($con->query($sql)){
  echo "New record is inserted sucessfully";
}
else{
  echo "Error: ". $sql ."
". $con->error;
}
?>