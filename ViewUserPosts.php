<!DOCTYPE html>
<html>
<head>
<title>User Posts</title>
</head>
<body>
<center>

<h1>View User Posts</h1>
</center>
<form action="ViewUserPosts.php" method="POST">

<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "allemanz", "aim9ohLa", "allemanz");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$result = $mysqli->query("SELECT * from Users");
echo "<select>";
for($i = 1; $i <= $result->num_rows; $i++)
{
  $row = $result->fetch_assoc();
  echo "<option value=" . $row['user_id'] . " name='user'>" . $row["user_id"] . "</option>";
}
echo "</select>";

?>
<br><br>
<input type="submit" value="Submit">


</body>
</html>
