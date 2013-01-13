<?php
	include_once('../../../dbconnect.php');
	$id = mysql_real_escape_string($_GET["a"]);
	$post = mysql_real_escape_string($_GET["b"]);
	$anonymous = mysql_real_escape_string($_GET["c"]);
	$poster = mysql_real_escape_string($_GET["d"]);
	$school = mysql_real_escape_string($_GET["e"]);
	$video_id = mysql_real_escape_string($_GET["j"]);
	$post = preg_replace('#\b(([\w-]+://)[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#', '<a href="$1">$1</a>', $post);
	$post = $post.'<br /><center><object width="200" height="200" data="http://www.youtube.com/v/'.$video_id.'" type="application/x-shockwave-flash"><param name="allowFullScreen" value="true"><param name="src" value="http://www.youtube.com/v/'.$video_id.'" /></object></center>';

	if($anonymous == 1) {
        mysql_query("INSERT INTO $school (poster_id, post, type, anonymous, name) VALUES('$id', '$post', '5', '1', '')");
        echo '<p>'.$post.'</p>
					<hr color="#fff" size="1" />';
     }   
    else {

		mysql_query("INSERT INTO $school (poster_id, post, type, anonymous, name) VALUES('$id', '$post', '5', '0', '$poster')") 
or die(mysql_error());
		echo '<p><strong><a class="name" href="profile/view/'.$id.'">'.$poster.'</a></strong>: '.$post.'</p>
					<hr color="#fff" size="1" />';
    }	
?>