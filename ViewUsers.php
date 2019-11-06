<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$mysqli = new mysqli("mysql.eecs.ku.edu", "allemanz", "aim9ohLa", "allemanz");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$result = $mysqli->query("SELECT * from Users");

echo "<table><tr>";
echo "<td>UserIDs</td></tr>";
for($i = 1; $i <= $result->num_rows; $i++)
{
  $row = $result->fetch_assoc();
  echo "<tr><td>" . $row["user_id"] . "</td></tr>";
}
echo "</table>";
$mysqli->close();

?>
