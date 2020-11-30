<?php
$servername = "localhost";
$username = "store";
$password = "qwerty12qwaszx";
$dbname = "store";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $product_id = $row["Product_ID"];
        $vendor_id = $row["Vendor_ID"];
        $product_type = $row["Product_Type"];
        $product_name = $row["Product_Name"];
        $description = $row["Description"];
        $image_url = $row["Image_URL"];
        $cost = $row["Cost"];
        $stock = $row["Stock"];

        echo "TSET";
    }
} else {
  echo "0 results";
}
$conn->close();
?>