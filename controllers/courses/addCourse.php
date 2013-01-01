<?php
	include_once('../../dbconnect.php');
	$id = mysql_real_escape_string($_GET["a"]);
	$poster_name = mysql_real_escape_string($_GET["b"]);
	$course_name = mysql_real_escape_string($_GET["c"]);
	$course_number = mysql_real_escape_string($_GET["d"]);
	$course_description = mysql_real_escape_string($_GET["e"]);
	//$quotations = array("\"", "\'");
	//$description_clean = str_replace(array($quotations, '', $course_description)); 

	mysql_query("INSERT INTO courses (poster_id, poster_name, course_name, course_number, description) VALUES('$id', '$poster_name', '$course_name', '$course_number', '$course_description')");
	$row_id = mysql_insert_id();
	echo $row_id;
 

?>