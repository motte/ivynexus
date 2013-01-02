<?php
	include_once('../../dbconnect.php');
	$id = mysql_real_escape_string($_GET["a"]);
	$post = mysql_real_escape_string($_GET["b"]);
	$anonymous = mysql_real_escape_string($_GET["c"]);
	$poster = mysql_real_escape_string($_GET["d"]);
	$thread_id = mysql_real_escape_string($_GET["e"]);
	$mins = mysql_real_escape_string($_GET["m"]);
	$hours = mysql_real_escape_string($_GET["n"]);
	$days = mysql_real_escape_string($_GET["o"]);
	$months = mysql_real_escape_string($_GET["p"]);
	$years = mysql_real_escape_string($_GET["q"]);
	$ny = date_default_timezone_set('America/New_York');
	$decaytemp = mktime(date("H")+$hours, date("i")+$mins, 0, date("m")+$months, date("d")+$days, date("Y")+$years);
	$decay = date('Y-m-d H:i:s', $decaytemp);

	if($anonymous == 1) {
        mysql_query("INSERT INTO thread_messages(messageThreadId, senderId, body, expirationFuse, type, anonymous, senderName) VALUES('$thread_id', '$id', '$post', '$decay', '1', '1', '')");
        mysql_query("UPDATE read_status as '0' FROM thread_participants WHERE threadId='$thread_id'");
        echo '<p>'.$post.'</p><hr color="#fff" size="1" />';
     }   
    else {

		mysql_query("INSERT INTO thread_messages(messageThreadId, senderId, body, expirationFuse, type, anonymous, senderName) VALUES('$thread_id', '$id', '$post', '$decay', '1', '0', '$poster')") 
or die(mysql_error());
mysql_query("UPDATE read_status as '0' FROM thread_participants WHERE threadId='$thread_id'");
		echo '<p><strong><a class="name" href="profile/view/'.$id.'">'.$poster.'</a></strong>: '.$post.'</p><hr color="#fff" size="1" />';
    }	

?>