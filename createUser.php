<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$mysqli = new mysqli("mysql.eecs.ku.edu", "allemanz", "aim9ohLa", "allemanz");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$userid = $_POST["userid"];
$result = $mysqli->query("SELECT * from Users WHERE user_id = '$userid'");
 if($result->num_rows != 0)
{
  echo "User already exists.";
}
else
{
  $mysqli->query("INSERT INTO Users (user_id) VALUES ('$userid')");
  echo "User created.";
}

 ?>
