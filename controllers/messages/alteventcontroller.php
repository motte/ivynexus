<?php
	include_once('../../dbconnect.php');
	$id = mysql_real_escape_string($_GET["a"]);
	$event_name = mysql_real_escape_string($_GET["g"]);
	$event_start = mysql_real_escape_string($_GET["h"]);
	$event_starttime = mysql_real_escape_string($_GET["i"]);
	$event_end = mysql_real_escape_string($_GET["j"]);
	$event_endtime = mysql_real_escape_string($_GET["k"]);
	$event_description = mysql_real_escape_string($_GET["l"]);
	$post = mysql_real_escape_string($_GET["b"]);
	$post = preg_replace('#\b(([\w-]+://)[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#', '<a href="$1">$1</a>', $post);
	$post = $post.'<br /><center><a href="'.$event_name.'" style="font-size: 20px;">'.$event_name.'</a><br />From '.$event_start.' at '.$event_starttime.' to '.$event_end.' at '.$event_endtime.'<br /><div style="color:#555;">'.$event_description.'</div></center>';
	$anonymous = mysql_real_escape_string($_GET["c"]);
	$poster = mysql_real_escape_string($_GET["d"]);
	$thread_id = mysql_real_escape_string($_GET["e"]);

	if($anonymous == 1) {
	        mysql_query("INSERT INTO thread_messages (messageThreadId, senderId, body, type, anonymous, senderName) VALUES('$thread_id', '$user_id', '$post', '2', '1', '')") or die(mysql_error());
	        mysql_query("UPDATE thread_participants read_status as '0' WHERE threadId='$thread_id'");
	        echo '<p>'.$post.'</p><hr color="#fff" size="1" />';
	}   
	
	else {
		mysql_query("INSERT INTO thread_messages (messageThreadId, senderId, body, type, anonymous, senderName) VALUES('$thread_id', '$user_id', '$post', '2', '0', '$poster')") or die(mysql_error());
		mysql_query("UPDATE thread_participants read_status as '0' WHERE threadId='$thread_id'");
		echo '<p><strong><a class="name" href="profile/view/'.$id.'">'.$poster.'</a></strong>: '.$post.'</p><hr color="#fff" size="1" />';
	}	

?>