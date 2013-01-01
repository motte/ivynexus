<?php
// Share the course to the sharer's school
	include_once('../../../dbconnect.php');
	$course_id = mysql_real_escape_string($_GET['a']);
	$school = strtolower(mysql_real_escape_string($_GET['b']));
	$sharer_id = mysql_real_escape_string($_GET['c']);
	$sharer_name = mysql_real_escape_string($_GET['d']);
	$course_name = mysql_real_escape_string($_GET['e']);
	$course_description = substr(mysql_real_escape_string($_GET['f']), 0, 100);
	$post='<a href="courses/view/'.$course_id.'">'.$course_name.'</a>:&nbsp'.$course_description;
	
	mysql_query("INSERT INTO $school (poster_id, name, post, type) VALUES ('$sharer_id', '$sharer_name', '$post', '1')") or die(mysql_error()); 

	echo 'Shared!';
?>