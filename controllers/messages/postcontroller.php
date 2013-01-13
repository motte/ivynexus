<?php
	include_once('../../dbconnect.php');
	$id = mysql_real_escape_string($_GET["a"]);
	$post = mysql_real_escape_string($_GET["b"]);
	$anonymous = mysql_real_escape_string($_GET["c"]);
	$poster = mysql_real_escape_string($_GET["d"]);
	$thread_id = mysql_real_escape_string($_GET["e"]);
	$post = preg_replace('#\b(([\w-]+://)[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#', '<a href="$1">$1</a>', $post);
	if($anonymous == 1) {
        mysql_query("INSERT INTO thread_messages(messageThreadId, senderId, body, type, anonymous, senderName) VALUES('$thread_id', '$id', '$post', '1', '1', '')");
        mysql_query("UPDATE read_status as '0' FROM thread_participants WHERE threadId='$thread_id'");
        echo '<p>'.$post.'</p><hr color="#fff" size="1" />';
     }   
    else {

		mysql_query("INSERT INTO thread_messages(messageThreadId, senderId, body, type, anonymous, senderName) VALUES('$thread_id', '$id', '$post', '1', '0', '$poster')") 
or die(mysql_error());
mysql_query("UPDATE read_status as '0' FROM thread_participants WHERE threadId='$thread_id'");
		echo '<p><strong><a class="name" href="profile/view/'.$id.'">'.$poster.'</a></strong>: '.$post.'</p><hr color="#fff" size="1" />';
    }	

?>