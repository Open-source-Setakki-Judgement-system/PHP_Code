<?php
include('db_setup.php');

$Token = $_GET[token];
$device_id = $_GET[device_id];
$expect_state = $_GET[exp_state];

$sql = "INSERT INTO PushAlert (Token, device_id, Expect_Status) VALUES ('$Token',$device_id,$expect_state)";

if ($conn->query($sql)) {
  header("HTTP/1.1 200 OK");
  echo 'Updated';
} else {
  header("HTTP/1.1 400 Not Found");
  echo $conn->error;
}

$conn->close();
?>
