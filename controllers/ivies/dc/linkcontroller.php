<?php
	include_once('../../../dbconnect.php');
	$id = mysql_real_escape_string($_GET["a"]);
	$link = mysql_real_escape_string($_GET["h"]);
	$description = mysql_real_escape_string($_GET["g"]);
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
	$school = mysql_real_escape_string($_GET["e"]);

	if($anonymous == 1) {
        mysql_query("INSERT INTO $school (poster_id, post, type, anonymous, name) VALUES('$id', '$post', '3', '1', '')");
        echo '<p>'.$post.'</p>
					<hr color="#fff" size="1" />';
     }   
    else {

		mysql_query("INSERT INTO $school (poster_id, post, type, anonymous, name) VALUES('$id', '$post', '3', '0', '$poster')") 
or die(mysql_error());
		echo '<p><strong><a class="name" href="profile/view/'.$id.'">'.$poster.'</a></strong>: '.$post.'</p>
					<hr color="#fff" size="1" />';
    }	

?>