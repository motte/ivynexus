<?php
	include_once('../../../dbconnect.php');
	$post_id = mysql_real_escape_string($_GET["a"]);
	$comment = mysql_real_escape_string($_GET["b"]);
	$poster_id = mysql_real_escape_string($_GET["c"]);
	$poster_name = mysql_real_escape_string($_GET["d"]);
	$school = mysql_real_escape_string($_GET["e"]);
	$table = $school.'_comments';
	$comment = preg_replace('#\b(([\w-]+://)[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#', '<a href="$1">$1</a>', $post);
		$result = mysql_query("INSERT INTO $table (ventpost_id, poster_id, poster, comment) VALUES('$post_id', '$poster_id', '$poster_name', '$comment')") or die(mysql_error());
		/*if($result == false) {
			die(mysql_error());
			echo 'false';
		}
		else {
			echo 'true';
		}*/
		mysql_query("UPDATE $school SET comments=comments+1 WHERE id=$post_id") or die(mysql_error());
		//echo '<p><strong><a class="name" href="profile/view/'.$id.'">'.$poster.'</a></strong>: '.$post.'</p><hr color="#fff" size="1" />';
    

?>