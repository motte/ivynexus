<?php
// Share the idea to the sharer's school
	include_once('../../../dbconnect.php');
	$idea_id = mysqli_real_escape_string($_GET['a']);
	$school = strtolower(mysqli_real_escape_string($_GET['b']));
	$sharer_id = mysqli_real_escape_string($_GET['c']);
	$sharer_name = mysqli_real_escape_string($_GET['d']);
	$idea_name = mysqli_real_escape_string($_GET['e']);
	$idea_description = mysqli_real_escape_string($_GET['f']);
	$post='<a href="ideas/view/'.$idea_id.'">'.$idea_name.'</a>:&nbsp'.$idea_description;
	
	mysqli_query("INSERT INTO $school (poster_id, name, post, type) VALUES ('$sharer_id', '$sharer_name', '$post', '1')") or die(mysqli_error()); 

	echo 'Shared!';
?>