var order_id = "";
var product_id = "";

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
  var sql = "INSERT INTO Order (Order_ID, Product_ID) VALUES ('" + order_id + "', '" + product_id + "');";
  con.query(sql, function (err, result) {
    if (err) throw err;
    console.log("Inserted");
  });
});