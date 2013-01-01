<?php
include_once('../../dbconnect.php');
$user_id = mysqli_real_escape_string($_GET["a"]);
/* This checks if there are new messages and enters a number */

$query = "SELECT * FROM thread_participants WHERE viewerId='$user_id' AND read_status='0'";
$result = mysqli_query($query);
$number = mysqli_num_rows($result);
if($number > 0) {
	echo $number;
}
else {
	echo '';
}
?>