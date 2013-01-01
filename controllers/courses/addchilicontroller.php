<?php
//Add chili to the courses in the list
	include_once("../../dbconnect.php");
	$course_id = mysql_real_escape_string($_GET["a"]); 
	$giver_id = mysql_real_escape_string($_GET['b']);

	$query = "SELECT * FROM chili_courses WHERE c_receiver='$course_id' AND c_giver='$giver_id'";
        $result = mysql_query($query);
        
        if(mysql_num_rows($result) > 0) {
        	mysql_query("UPDATE courses SET chilis = chilis-1
WHERE id = '$course_id'");
		mysql_query("DELETE FROM chili_courses WHERE c_receiver = '$course_id' AND c_giver = '$giver_id'");
        }
        
        else {
        	// Insert a row of information into the table chili
		mysql_query("INSERT INTO chili_courses (c_receiver, c_giver) VALUES('$course_id', '$giver_id')") 
or die(mysql_error());
		mysql_query("UPDATE courses SET chilis = chilis+1
WHERE id = '$course_id'");
        }	
	$chili = mysql_query("SELECT chilis FROM courses WHERE id='$course_id'");
		// Do row zero below because I am already grabbing the specific cell from the above mysql_query, so there is only one row from the query
	echo mysql_result($chili, 0);
	
?>