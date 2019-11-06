<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$mysqli = new mysqli("mysql.eecs.ku.edu", "allemanz", "aim9ohLa", "allemanz");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$userid = $_POST["userid"];
$content = $_POST["content"];
$result = $mysqli->query("SELECT * from Users WHERE user_id = '$userid'");
 if($result->num_rows != 0)
{
  if($content != "")
  {
    $mysqli->query("INSERT INTO Posts (author_id, content) VALUES ('$userid', '$content')");
    echo "Post created.";
  }
  else
  {
    echo "Post cannot be empty.";
  }
}
else
{
  echo "User does not exist.";
}
$mysqli->close();
 ?>
