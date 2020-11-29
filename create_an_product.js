var vendor_id = "";
var product_type = "";
var product_name = "";
var description = "";
var image_url = "";
var date = "";
var cost
var stock = "";

var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "user",
  password: "password",
  database: "db"
});

con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
  var sql = "INSERT INTO Product (Vendor_ID, Product_Type, Product_Name, Description, Image_URL, Date, Cost, Stock) VALUES ('" + vendor_id + "', '" + product_type + "', '" + product_name + "', '" + description + "', '" + image_url + "', '" + date + "', '" + cost + "', '" + stock + "');";
  con.query(sql, function (err, result) {
    if (err) throw err;
    console.log("Inserted");
  });
});