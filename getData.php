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

$search = $_POST['search'];
$sort = trim($_POST['sort']);
$fruit = $_POST['fruit'];
$vegetable = $_POST['vegetable'];
$meat = $_POST['meat'];
$snack = $_POST['snack'];
$seafood = $_POST['seafood'];
$dessert = $_POST['dessert'];


$sql = "SELECT * FROM Product NATURAL JOIN Vendor";
$where = " WHERE";
$orderby = "";

if ($search != "") {
    $where .= " (Product_Name LIKE '%$search%' OR Vendor_Name LIKE '%$search%') AND";
}

if ($fruit == "true") {
    $where .= " Product_Type LIKE 'Fruit' OR ";
}
if ($vegetable == "true") {
    $where .= " Product_Type LIKE 'Vegetable' OR ";
}
if ($meat == "true") {
    $where .= " Product_Type LIKE 'Meat' OR ";
}
if ($snack == "true") {
    $where .= " Product_Type LIKE 'Snack' OR ";
}
if ($seafood == "true") {
    $where .= " Product_Type LIKE 'Seafood' OR ";
}
if ($dessert == "true") {
    $where .= " Product_Type LIKE 'Dessert' OR ";
}

$where = substr($where, 0, -3);

if ($where == " WHERE") {
    $where = "";
}

if ($sort == "Sort By A-Z") {
    $orderby = " ORDER BY Product_Name";
}
elseif ($sort == "Sort By Most Frequently Bought") {
    //$sql = "SELECT *, COUNT(*) FROM Order_Products NATURAL JOIN Product";
    $sql = "SELECT Product_ID, Vendor_ID, Vendor_Name, Product_Type, Product_Name, Description, Cost, Stock, Image_URL, COUNT(*) FROM Order_Products NATURAL JOIN Product NATURAL JOIN Vendor";
    $orderby = " GROUP BY Product_ID ORDER BY COUNT(*) DESC";
}
elseif ($sort == "Sort By Stock") {
    $orderby = " ORDER BY Stock DESC";
}
elseif ($sort == "Sort By Price Low to High") {
    $orderby = " ORDER BY Cost ASC";
}
elseif ($sort == "Sort By Price High to Low") {
    $orderby = " ORDER BY Cost DESC";
}


echo("$sql $where $orderby");

$result = $conn->query("$sql $where $orderby");

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $product_id = $row["Product_ID"];
        $vendor_id = $row["Vendor_ID"];
        $vendor_name = $row["Vendor_Name"];
        $product_type = $row["Product_Type"];
        $product_name = $row["Product_Name"];
        $description = $row["Description"];
        $image_url = $row["Image_URL"];
        $cost = $row["Cost"];
        $stock = $row["Stock"];

        echo '
        <div style="position:relative; background: #FFFFFF;border: 1px solid #BBBBBB;border-radius: 4px; width:260px; height:480px; margin:20px">
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
            <form style="width: 20px;position: absolute;height: 24px;left: 20px;right: 12px;/* top: calc(50% - 24px/2); */bottom: 83px;font-family: Inter;font-style: normal;font-weight: 500;font-size: 14px;color: #2264D1;">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" step="1" value="1" style="width: 60px">
            <button style="position: absolute;left: -2px;width:220;height: 32px;bottom: -80px;background: #FFFFFF;border: 1px solid #9DC2FF;box-sizing: border-box;border-radius: 4px;" onclick="addToCart(2, this)" method="post">
                <p class="text-center" style="position: absolute;height: 24px;left: 12px;right: 12px;top: calc(50% - 24px/2);font-family: Inter;font-style: normal;font-weight: 500;font-size: 14px;color: #2264D1;">Add To Cart</p>
            </button>
            </form>
        </div>';
    }
} else {
  echo "0 results";
}
$conn->close();
?>