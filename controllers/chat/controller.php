<?php
/* Create direct single chat */
	include_once('../../dbconnect.php');
	
	$chat_from_id = $_POST['1'];
	$chat_from_name = $_POST['4'];
	$chat_to_id = $_POST['2'];
	$chat_to_name = $_POST['3'];
	
	$query = mysqli_query("SELECT * FROM thread_participants WHERE viewerId='$chat_from_id' AND viewerName='$chat_from_name' AND participantIds='$chat_to_id' AND participantNames='$chat_to_name'");
	$rows = mysqli_num_rows($query);
	if($rows > 0) {
		$threadId = mysqli_result($query, 0, threadId);
		
	}
	else {
		date_default_timezone_set('UTC');
		$threadId = date('His');
		$threadId = $chat_from_id.$chat_to_id.$threadId;
		mysqli_query("INSERT INTO thread_participants(threadId, viewerId, viewerName, participantIds, participantNames, read_status) VALUES ('$threadId', '$chat_from_id', '$chat_from_name', '$chat_to_id', '$chat_to_name', '1'),('$threadId', '$chat_to_id', '$chat_to_name', '$chat_from_id', '$chat_from_name', '0')") or die(mysqli_error());

		/*$max = mysqli_query("SELECT MAX(thread_id) FROM thread_participants");
		$max = mysqli_query("SELECT max(threadId) FROM thread_participants WHERE temporary=0");

		mysqli_query("UPDATE thread_participants SET threadId='$max+1', temporary=0 WHERE threadId='$temp'") or die(mysqli_error());*/
	}
	header("Location:http://www.ivynexus.com/messages/view/".$threadId);
	exit;
?>