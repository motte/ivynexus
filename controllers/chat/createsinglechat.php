/* Create direct single chat */

<?php
	include_once('../../dbconnect.php');
	
	$chat_from_id = $_POST['1'];
	$chat_from_name = $_POST['4'];
	$chat_to_id = $_POST['2'];
	$chat_to_name = $_POST['3'];
	
	$max = mysqli_query("SELECT MAX(thread_id) FROM thread_participants");

	mysqli_query("INSERT INTO thread_participants(threadId, viewerId, viewerName, participantIds, participantNames, read_status) VALUES ($max+1, '$chat_from_id', '$chat_from_name', '$chat_to_id', '$chat_to_name', '1'),($max+1, '$chat_to_id', '$chat_to_name', '$chat_from_id', '$chat_from_name', '0')") or die(mysqli_error());
	header("Location: http://www.ivynexus.com/messages/view/".$max+1);

?>