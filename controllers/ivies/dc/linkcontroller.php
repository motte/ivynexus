<?php
	include_once('../../../dbconnect.php');
	$id = mysqli_real_escape_string($_GET["a"]);
	$link = mysqli_real_escape_string($_GET["h"]);
	$description = mysqli_real_escape_string($_GET["g"]);
	if($description == '') {
		$description = $link;
	}
	$post = mysqli_real_escape_string($_GET["b"]);
	if(substr($link, 0, 4) == 'http') {
		$post = $post.'<br /><center><a href="'.$link.'">'.$description.'</a></center>';
	}
	else {
		$post = $post.'<br /><center><a href="http://'.$link.'">'.$description.'</a></center>';
	}
	$anonymous = mysqli_real_escape_string($_GET["c"]);
	$poster = mysqli_real_escape_string($_GET["d"]);
	$school = mysqli_real_escape_string($_GET["e"]);

	if($anonymous == 1) {
        mysqli_query("INSERT INTO $school (poster_id, post, type, anonymous, name) VALUES('$id', '$post', '3', '1', '')");
        echo '<p>'.$post.'</p>
					<hr color="#fff" size="1" />';
     }   
    else {

		mysqli_query("INSERT INTO $school (poster_id, post, type, anonymous, name) VALUES('$id', '$post', '3', '0', '$poster')") 
or die(mysqli_error());
		echo '<p><strong><a class="name" href="profile/view/'.$id.'">'.$poster.'</a></strong>: '.$post.'</p>
					<hr color="#fff" size="1" />';
    }	

?>