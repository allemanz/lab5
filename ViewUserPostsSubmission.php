<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "allemanz", "aim9ohLa", "allemanz");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$userid = $_POST['userid'];
$result = $mysqli->query("SELECT * from Posts WHERE author_id = '$userid'");
if($result->num_rows > 0)
{
  echo "<table><tr><td>Post id</td><td>Post content</td><td>Author id</td></tr>";
  for($i = 1; $i <= $result->num_rows; $i++)
  {
    $row = $result->fetch_assoc();
    echo "<tr><td>" . $row['post_id'] . "</td><td>" . $row['content'] . "</td><td>" . $row['author_id'] . "</td></tr>";
  }
  echo "</table>";
}
else
{
  echo "No posts found from user id: " . $userid;
}

?>
