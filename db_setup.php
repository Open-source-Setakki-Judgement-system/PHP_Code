<?php 

$mysql_hostname = '127.0.0.1';

$mysql_username = 'OSJ';

$mysql_password = '1q2w3e4r';

$mysql_database = 'OSJ';

$mysql_port = '3306';

$mysql_charset = 'UTF8';

$google_key = 'AAAAK-FImpw:APA91bFoP9EqeG89rNlPn9BBKMDxw9u1HARrBk6AQHFzvIq4bY4ee92o8rlHYGae-d95nmtdbGY2arwEHrWAZEFSKlYkHcxsZfeQdKrqsaIJRj85dzBwEXOvtYPYtzA27Z507VcIZh14';

$conn = new mysqli($mysql_hostname, $mysql_username, $mysql_password, $mysql_database, $mysql_port, $mysql_charset);
if ($conn->connect_errno) {
   // echo '[Failed.] : '.$connect->connect_error.'';
} else {
   // echo '[Success!]'.'<br>';
}

?>
