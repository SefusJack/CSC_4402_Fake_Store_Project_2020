var name = "";
var email = "";
var address = "";

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
  var sql = "INSERT INTO Customer (Name, Email, Address) VALUES ('" + name + "', '" + email + "', '" + address + "');";
  con.query(sql, function (err, result) {
    if (err) throw err;
    console.log("Inserted");
  });
});