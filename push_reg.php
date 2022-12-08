<?php
include('db_setup.php');
include('key_value.php');
$conn = new mysqli($mysql_hostname, $mysql_username, $mysql_password, $mysql_database, $mysql_port, $mysql_charset);
if ($conn->connect_errno) {
   // echo '[Failed.] : '.$connect->connect_error.'';
} else {
   // echo '[Success!]'.'<br>';
}

$Token = $_GET[token];
$device_id = $_GET[device_id];
$expect_state = $_GET[exp_state];

$sql = "INSERT INTO PushAlert (Token, device_id, Expect_Status) VALUES ('$Token',$device_id,$expect_state)";

if ($conn->query($sql)) {
  header("HTTP/1.1 200 OK");
  print $sql;
} else {
  header("HTTP/1.1 400 Not Found");
  echo $conn->error;
}

$conn->close();
?>
