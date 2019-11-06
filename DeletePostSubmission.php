<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "allemanz", "aim9ohLa", "allemanz");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$counter = 0;
$result = $mysqli->query("SELECT * from Posts");
if($result->num_rows > 0)
{
  for($i = 1; $i <= $result->num_rows; $i++)
  {
    $row = $result->fetch_assoc();
    $postid = $row['post_id'];
    if(($_POST[$postid]) == "delete")
    {
      $mysqli->query("DELETE FROM Posts WHERE post_id='$postid'");
      echo "Post " . $postid . " deleted.<br>";
      $counter = $counter + 1;
    }
  }
  if($counter == 0)
  {
    echo "No posts deleted.";
  }
  else
  {
    echo $counter . " posts deleted.";
  }
}
else {
  echo "No posts found.";
}
$mysqli->close();
?>
