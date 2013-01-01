<?php
//Add support to the ideas in the list
	include_once("../../../dbconnect.php");
	$idea_id = mysqli_real_escape_string($_GET["a"]); 
	$supporter_id = mysqli_real_escape_string($_GET['b']);

	$query = "SELECT * FROM support_ideas WHERE idea_id='$idea_id' AND supporter_id='$supporter_id'";
        $result = mysqli_query($query);
        
        if(mysqli_num_rows($result) > 0) {
        	mysqli_query("UPDATE ideas SET support = support-1
WHERE id = '$idea_id'");
		mysqli_query("DELETE FROM support_ideas WHERE idea_id = '$idea_id' AND supporter_id = '$supporter_id'");
        }
        
        else {
        	// Insert a row of information into the table support_ideas
		mysqli_query("INSERT INTO support_ideas (idea_id, supporter_id) VALUES('$idea_id', '$supporter_id')") 
or die(mysqli_error());
		mysqli_query("UPDATE ideas SET support = support+1
WHERE id = '$idea_id'");
        }	
	$support = mysqli_query("SELECT support FROM ideas WHERE id='$idea_id'");
		// Do row zero below because I am already grabbing the specific cell from the above mysql_query, so there is only one row from the query
	echo mysqli_result($support, 0);
	
?>