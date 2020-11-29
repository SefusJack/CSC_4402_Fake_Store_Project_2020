var name = "";
var email = "";
var address = "";
var payment_info = "";
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
  var sql = "INSERT INTO Customer (Name, Email, Address, Payment_Info) VALUES ('" + name + "', '" + email + "', '" + address + "' , '" + payment_info + "', '" + username + "', '" + password + "');";
  con.query(sql, function (err, result) {
    if (err) throw err;
    console.log("Inserted");
  });
});