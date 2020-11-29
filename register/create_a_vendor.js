var name = "";
var email = "";
var address = "";
var username = "";
var password = "";

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
  var sql = "INSERT INTO Vendor (Vendor_Name, Address, Email) VALUES ('" + name + "', '" + address + "', '" + email + "', '" + username + "', '" + password + "');";
  con.query(sql, function (err, result) {
    if (err) throw err;
    console.log("Inserted");
  });
});