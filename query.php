<?php
include('db_setup.php');
$conn = new mysqli($mysql_hostname, $mysql_username, $mysql_password, $mysql_database, $mysql_port, $mysql_charset);
if ($conn->connect_errno) {
   // echo '[Failed.] : '.$connect->connect_error.'';
} else {
   // echo '[Success!]'.'<br>';
}
$results = array();

$result = $conn->query("SELECT * FROM deviceStatus");
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
  $results[] = $row;
}
header('Content-type: application/json');
echo json_encode($results, JSON_NUMERIC_CHECK);

$conn->close();
?>
