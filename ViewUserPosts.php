<!DOCTYPE html>
<html>
<head>
<title>User Posts</title>
</head>
<body>
<center>

<h1>View User Posts</h1>
</center>
<form action="ViewUserPostsSubmission.php" method="POST">

<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "allemanz", "aim9ohLa", "allemanz");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$result = $mysqli->query("SELECT * from Users");
echo "<select name='userid' >";
for($i = 1; $i <= $result->num_rows; $i++)
{
  $row = $result->fetch_assoc();
  echo '<option value="'.$row[user_id].'">'.$row[user_id].'</option>';
}
echo "</select>";
$mysqli->close();
?>
<br><br>
<input type="submit" value="Submit">


</body>
</html>
