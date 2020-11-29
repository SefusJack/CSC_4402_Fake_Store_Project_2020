var name = document.getElementById('Name');
var email = document.getElementById('Email');
var address = document.getElementById('Address');
var payment_info = "NULL";
var username = document.getElementById('Username');
var password = document.getElementById('Password');

console.log("")

var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "user",
  password: "password",
  database: "db"
});

function createCustomer(){
    console.log(name);
    console.log(email);
    console.log(address);
    console.log(payment_info);
    console.log(username);
    console.log(password);
    /*con.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
    var sql = "INSERT INTO Customer (Name, Email, Address, Payment_Info) VALUES ('" + name + "', '" + email + "', '" + address + "' , '" + payment_info + "', '" + username + "', '" + password + "');";
    con.query(sql, function (err, result) {
        if (err) throw err;
        console.log("Inserted");
    });
    });
    */
}