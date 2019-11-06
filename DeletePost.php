<!DOCTYPE html>
<html>
<head>
<title>Delete User Posts</title>
</head>
<body>
<center>

<h1>Delete User Posts</h1>
</center>
<form action="DeletePostSubmission.php" method="POST">

<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "allemanz", "aim9ohLa", "allemanz");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$result = $mysqli->query("SELECT * from Posts");
if($result->num_rows > 0)
{
  echo "<table><tr><td>Post id</td><td>Post content</td><td>Author id</td></tr>";
  for($i = 1; $i <= $result->num_rows; $i++)
  {
    $row = $result->fetch_assoc();
    echo "<tr><td>" . $row['post_id'] . "</td><td>" . $row['content'] . "</td><td>" . $row['author_id'] . "</td>";
    echo "<td> <input type='checkbox' name='" . $row['post_id'] . "' value='delete'></input>";
  }
  echo "</table>";
}
else {
  echo "No posts found.";
}
$mysqli->close();
?>
<br><br>
<input type="submit" value="Submit">


</body>
</html>
