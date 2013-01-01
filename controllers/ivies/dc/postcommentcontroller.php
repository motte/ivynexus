<?php
	include_once('../../../dbconnect.php');
	$post_id = mysqli_real_escape_string($_GET["a"]);
	$comment = mysqli_real_escape_string($_GET["b"]);
	$poster_id = mysqli_real_escape_string($_GET["c"]);
	$poster_name = mysqli_real_escape_string($_GET["d"]);
	$school = mysqli_real_escape_string($_GET["e"]);
	$table = $school.'_comments';

		$result = mysqli_query("INSERT INTO $table (ventpost_id, poster_id, poster, comment) VALUES('$post_id', '$poster_id', '$poster_name', '$comment')") or die(mysqli_error());
		/*if($result == false) {
			die(mysqli_error());
			echo 'false';
		}
		else {
			echo 'true';
		}*/
		mysqli_query("UPDATE $school SET comments=comments+1 WHERE id=$post_id") or die(mysqli_error());
		//echo '<p><strong><a class="name" href="profile/view/'.$id.'">'.$poster.'</a></strong>: '.$post.'</p><hr color="#fff" size="1" />';
    

?>