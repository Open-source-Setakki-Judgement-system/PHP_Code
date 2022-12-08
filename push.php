<?php
	include('db_setup.php');
	include('key_value.php');
	function send_notification ($tokens, $message)
	{
		$url = 'https://fcm.googleapis.com/fcm/send';
		$fields = array(
			 'registration_ids' => $tokens,
			 'priority' => "high",
			 'data' => $message
			);

		$headers = array(
			'Authorization:key =' . GOOGLE_API_KEY,
			'Content-Type: application/json'
			);

	   $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       $result = curl_exec($ch);           
       if ($result === FALSE) {
           die('Curl failed: ' . curl_error($ch));
       }
       curl_close($ch);
       return $result;
	}

	$device_id = $_GET['device_id'];
	$Expect_Status = $_GET['exp_state'];
	$conn = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password, $mysql_database);
	$device_id = '0';
	$sql = "SELECT Token FROM PushAlert WHERE device_id = $device_id AND Expect_Status = $Expect_Status";

	$result = mysqli_query($conn,$sql);
	$tokens = array();

	if(mysqli_num_rows($result) > 0 )
	{
		while ($row = mysqli_fetch_assoc($result))
		{
			$tokens[] = $row["Token"];
		}
	}
	else
	{
		echo 'No Data';
	}

	$sql = "DELETE FROM PushAlert WHERE WHERE device_id = $device_id AND Expect_Status = $Expect_Status";
	$result = mysqli_query($conn,$sql);
	mysqli_close($conn);

	$myMessage = "$device_id 상태 $Expect_Status";

	$message = array("message" => $myMessage);
	$message_status = send_notification($tokens, $message);
	echo $message_status;

 ?>
