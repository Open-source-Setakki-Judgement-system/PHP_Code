<?php
include('db_setup.php');
$conn = new mysqli($mysql_hostname, $mysql_username, $mysql_password, $mysql_database, $mysql_port, $mysql_charset);
if ($conn->connect_errno) {
   // echo '[Failed.] : '.$connect->connect_error.'';
} else {
   // echo '[Success!]'.'<br>';
}

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
