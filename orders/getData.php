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

$sql = "SELECT * FROM `Order` WHERE Customer_ID=1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $order_id = $row["Order_ID"];
        $order_cost = number_format($row["Cost"], 2, '.', '');
        $date = $row["Date"];
        $address = $row["Address"];
        error_log("$order_id", 0);
        
        echo("
        <div style='border:1px solid #BBBBBB;border-radius: 4px; margin:5px; '>
            <div style='display:grid;align-items: stretch;justify-items: stretch;grid-template-columns: repeat(5,1fr);'>");

        $sql = "SELECT * FROM Order_Products NATURAL JOIN Product NATURAL JOIN Vendor WHERE Order_ID='$order_id'";
        $result2 = $conn->query($sql);
        if ($result2->num_rows > 0) {
            while($row = $result2->fetch_assoc()){
                $vendor_name = $row["Vendor_Name"];
                $product_type = $row["Product_Type"];
                $product_name = $row["Product_Name"];
                $image_url = $row["Image_URL"];
                $cost = number_format($row["Cost"], 2, '.', '');
                $quantity = $row["Quantity"];

                echo '
                <div style="position:relative; background: #FFFFFF;border: 1px solid #BBBBBB;border-radius: 4px; width:260px; height:400px; margin:20px">
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
        }
        echo('
        </div>
        <div style="margin:20px">
            <p>Total Cost: <b>$' . $order_cost . '</b></p>
            <p>Sent to: <b>' . $address . '</b></p>
            <p>Bought at: <b>' . $date . '</b></p>
        </div>
        </div>');
    }
} else {
  echo "0 results";
}
$conn->close();
?>