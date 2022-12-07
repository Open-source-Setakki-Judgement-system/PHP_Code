<?php
include('db_setup.php');

$id = $_GET[id];
$content = $_GET[content];

$sql = "UPDATE deviceStatus SET state=$content WHERE id=$id";

if ($conn->query($sql)) {
  header("HTTP/1.1 200 OK");
  print $sql;
} else {
  header("HTTP/1.1 400 Not Found");
  echo $conn->error;
}

$conn->close();
?>
