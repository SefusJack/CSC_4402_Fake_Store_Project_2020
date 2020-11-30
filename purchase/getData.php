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

$sql = "SELECT * FROM Cart NATURAL JOIN Product NATURAL JOIN Vendor WHERE Customer_ID=1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $cart_id = $row["Cart_ID"];
        $product_id = $row["Product_ID"];
        $vendor_id = $row["Vendor_ID"];
        $vendor_name = $row["Vendor_Name"];
        $product_type = $row["Product_Type"];
        $product_name = $row["Product_Name"];
        $description = $row["Description"];
        $image_url = $row["Image_URL"];
        $cost = $row["Cost"];
        $stock = $row["Stock"];
        $quantity = $row["Quantity"];

        echo '
        <div style="position:relative; background: #FFFFFF;border: 1px solid #BBBBBB;border-radius: 4px; width:260px; height:360px; margin:20px">
            <div style="position: absolute;width: 50px;height: 24px;left: 0px;top: 0px;background: #C4C4C4; border-bottom-right-radius: 15px;">
                <p class="text-center font-medium" style="color: #FFFFFF">
                    ' . $quantity . '
                </p>
            </div>
            <div style="position: absolute;width: 100px;height: 24px;right: 0px;top: 0px;background: #C4C4C4; border-bottom-left-radius: 15px;">
                <p class="text-center font-medium" style="color: #FFFFFF">
                    ' . $product_type . '
                </p>
            </div>

            <div style="position: absolute;height: 218px;left: 20px;right: 20px;top: 25px;background-image: url(\'' . $image_url . '\');background-size: 100%;background-repeat: no-repeat;"></div>
            <div style="position: absolute;left: 20px;right: 20px;top: 250px;font-family: Inter;font-style: normal;font-weight: normal;font-size: 16px;color: #19191D;">
                ' . $product_name . '
            </div>
            <div style="position: absolute;left: 20px;right: 20px;top: 300px;font-family: Inter;font-style: normal;font-weight: 600;font-size: 16px;color: #19191D;">
                Sold by ' . $vendor_name . '
            </div>
            <div style="position: absolute;height: 35px;left: 20px;right: 20px;top:320px;font-family: Inter;font-style: normal;font-weight: bold;font-size: 24px;line-height: 150%;display: flex;align-items: center;color: rgba(0, 0, 0, 0.87);">
                $' . $cost . '
            </div>
        </div>';
    }
} else {
  echo "0 results";
}
$conn->close();
?>