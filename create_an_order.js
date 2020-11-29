var product_id = "";
var cost = "";
var date = "";
var address = "";
var customer_id = "";
var payment_info = "";

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
  var sql = "INSERT INTO Order (Product_ID, Cost, Date, Address, Customer_ID, Payment_Info) VALUES ('" + product_id + "', '" + cost + "', '" + date + "', '" + address + "', '" + customer_id + "', '" + payment_info + "');";
  con.query(sql, function (err, result) {
    if (err) throw err;
    console.log("Inserted");
  });
});