<?php
	include_once('../../dbconnect.php');
	$id = mysql_real_escape_string($_GET["a"]);
	$link = mysql_real_escape_string($_GET["h"]);
	$description = mysql_real_escape_string($_GET["g"]);
	$thread_id = mysql_real_escape_string($_GET["e"]);
	if($description == '') {
		$description = $link;
	}
	$post = mysql_real_escape_string($_GET["b"]);
	if(substr($link, 0, 4) == 'http') {
		$post = $post.'<br /><center><a href="'.$link.'">'.$description.'</a></center>';
	}
	else {
		$post = $post.'<br /><center><a href="http://'.$link.'">'.$description.'</a></center>';
	}
	$anonymous = mysql_real_escape_string($_GET["c"]);
	$poster = mysql_real_escape_string($_GET["d"]);
	

	if($anonymous == 1) {
        mysql_query("INSERT INTO thread_messages (messageThreadId, senderId, body, type, anonymous, senderName) VALUES('$thread_id', '$id', '$post', '3', '1', '')");
        mysql_query("UPDATE thread_participants read_status as '0' WHERE threadId='$thread_id'");
        echo '<p>'.$post.'</p>
					<hr color="#fff" size="1" />';
     }   
    else {

		mysql_query("INSERT INTO thread_messages (messageThreadId, senderId, body, type, anonymous, senderName) VALUES('$thread_id', '$id', '$post', '3', '0', '$poster')") 
or die(mysql_error());
		mysql_query("UPDATE thread_participants read_status as '0' WHERE threadId='$thread_id'");
		echo '<p><strong><a class="name" href="profile/view/'.$id.'">'.$poster.'</a></strong>: '.$post.'</p>
					<hr color="#fff" size="1" />';
    }	

?>