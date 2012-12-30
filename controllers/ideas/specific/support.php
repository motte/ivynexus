<?php
//Add support to the ideas in the list
	include_once("../../../dbconnect.php");
	$idea_id = mysql_real_escape_string($_GET["a"]); 
	$supporter_id = mysql_real_escape_string($_GET['b']);

	$query = "SELECT * FROM support_ideas WHERE idea_id='$idea_id' AND supporter_id='$supporter_id'";
        $result = mysql_query($query);
        
        if(mysql_num_rows($result) > 0) {
        	mysql_query("UPDATE ideas SET support = support-1
WHERE id = '$idea_id'");
		mysql_query("DELETE FROM support_ideas WHERE idea_id = '$idea_id' AND supporter_id = '$supporter_id'");
        }
        
        else {
        	// Insert a row of information into the table support_ideas
		mysql_query("INSERT INTO support_ideas (idea_id, supporter_id) VALUES('$idea_id', '$supporter_id')") 
or die(mysql_error());
		mysql_query("UPDATE ideas SET support = support+1
WHERE id = '$idea_id'");
        }	
	$support = mysql_query("SELECT support FROM ideas WHERE id='$idea_id'");
		// Do row zero below because I am already grabbing the specific cell from the above mysql_query, so there is only one row from the query
	echo mysql_result($support, 0);
	
?>