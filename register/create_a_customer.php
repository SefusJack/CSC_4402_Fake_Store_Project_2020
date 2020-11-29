<html>
<body>
<?php
$con = mysql_connect("localhost","username","password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("db", $con);
$sql="INSERT INTO nametable (fname, lname) VALUES ('$_POST[fname]','$_POST[lname]')";
$sql = "INSERT INTO Customer (Name, Email, Address, Payment_Info) VALUES ('$_POST[name]', '$_POST[email]', '$_POST[address]', 'NULL', '$_POST[username]', '$_POST[password]',);";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";
mysql_close($con)
?>
</body>
</html>