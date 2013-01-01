<?php
//Add support to the ideas in the list
	include_once("../../../dbconnect.php");
	$course_id = mysql_real_escape_string($_GET["a"]); 
	$supporter_id = mysql_real_escape_string($_GET['b']);

	$query = "SELECT * FROM support_courses WHERE course_id='$course_id' AND supporter_id='$supporter_id'";
        $result = mysql_query($query);
        
        if(mysql_num_rows($result) > 0) {
        	mysql_query("UPDATE courses SET support = support-1
WHERE id = '$course_id'");
		mysql_query("DELETE FROM support_courses WHERE course_id = '$course_id' AND supporter_id = '$supporter_id'");
        }
        
        else {
        	// Insert a row of information into the table support_courses
		mysql_query("INSERT INTO support_courses (course_id, supporter_id) VALUES('$course_id', '$supporter_id')") 
or die(mysql_error());
		mysql_query("UPDATE courses SET support = support+1
WHERE id = '$course_id'");
        }	
	$support = mysql_query("SELECT support FROM courses WHERE id='$course_id'");
		// Do row zero below because I am already grabbing the specific cell from the above mysql_query, so there is only one row from the query
	echo mysql_result($support, 0);
	
?>