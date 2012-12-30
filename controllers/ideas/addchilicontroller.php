<?php
//Add chili to the ideas in the list
	include_once("../../dbconnect.php");
	$idea_id = mysql_real_escape_string($_GET["a"]); 
	$giver_id = mysql_real_escape_string($_GET['b']);

	$query = "SELECT * FROM chili_ideas WHERE c_receiver='$idea_id' AND c_giver='$giver_id'";
        $result = mysql_query($query);
        
        if(mysql_num_rows($result) > 0) {
        	mysql_query("UPDATE ideas SET chilis = chilis-1
WHERE id = '$idea_id'");
		mysql_query("DELETE FROM chili_ideas WHERE c_receiver = '$idea_id' AND c_giver = '$giver_id'");
        }
        
        else {
        	// Insert a row of information into the table chili
		mysql_query("INSERT INTO chili_ideas (c_receiver, c_giver) VALUES('$idea_id', '$giver_id')") 
or die(mysql_error());
		mysql_query("UPDATE ideas SET chilis = chilis+1
WHERE id = '$idea_id'");
        }	
	$chili = mysql_query("SELECT chilis FROM ideas WHERE id='$idea_id'");
		// Do row zero below because I am already grabbing the specific cell from the above mysql_query, so there is only one row from the query
	echo mysql_result($chili, 0);
	
?>