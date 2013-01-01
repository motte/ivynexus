<?php
	include_once('../../dbconnect.php');
	$id = mysqli_real_escape_string($_GET["a"]);
	$post = mysqli_real_escape_string($_GET["b"]);
	$anonymous = mysqli_real_escape_string($_GET["c"]);
	$poster = mysqli_real_escape_string($_GET["d"]);
	$thread_id = mysqli_real_escape_string($_GET["e"]);

	if($anonymous == 1) {
        mysqli_query("INSERT INTO thread_messages(messageThreadId, senderId, body, type, anonymous, senderName) VALUES('$thread_id', '$id', '$post', '1', '1', '')");
        mysqli_query("UPDATE read_status as '0' FROM thread_participants WHERE threadId='$thread_id'");
        echo '<p>'.$post.'</p><hr color="#fff" size="1" />';
     }   
    else {

		mysqli_query("INSERT INTO thread_messages(messageThreadId, senderId, body, type, anonymous, senderName) VALUES('$thread_id', '$id', '$post', '1', '0', '$poster')") 
or die(mysqli_error());
mysqli_query("UPDATE read_status as '0' FROM thread_participants WHERE threadId='$thread_id'");
		echo '<p><strong><a class="name" href="profile/view/'.$id.'">'.$poster.'</a></strong>: '.$post.'</p><hr color="#fff" size="1" />';
    }	

?>