<?php
 // error_reporting( E_ALL );
 // ini_set( "display_errors", 1 );

include('db_setup.php');
$mysql_username = $_GET[id];
$mysql_password = $_GET[pw];
$device_id = $_GET[device_id];
$state = $_GET[state];

$conn = new mysqli($mysql_hostname, $mysql_username, $mysql_password, $mysql_database, $mysql_port, $mysql_charset);
if ($conn->connect_errno) {
  // echo '[Failed.] : '.$connect->connect_error.'';
} else {
  // echo '[Success!]'.'<br>';
}

$sql = "UPDATE deviceStatus SET state = $state WHERE id = $device_id";

if ($conn->query($sql)) {
  header("HTTP/1.1 200 OK");
  print $sql;
} else {
  header("HTTP/1.1 400 Not Found");
  echo $conn->error;
}

$conn->close();
?>
