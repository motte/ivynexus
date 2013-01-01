<?php
	include_once('../../../dbconnect.php');
	$giverid = mysqli_real_escape_string($_GET["a"]);
	$receiverid = mysqli_real_escape_string($_GET["b"]);
	$school = mysqli_real_escape_string($_GET["d"]);
	$table = $school."_events";
	$chilitable = $school."_event_chili";

        $query = "SELECT * FROM $chilitable WHERE giver_id='$giverid' AND receiver_id='$receiverid'";
        $result = mysqli_query($query);
        
        if(mysqli_num_rows($result) > 0) {
        	mysqli_query("UPDATE $table SET chili = chili-1 WHERE id = '$receiverid'");
			mysqli_query("DELETE FROM $chilitable WHERE giver_id = '$giverid' AND receiver_id = '$receiverid'");
        }
        
        else {
        	// Insert a row of information into the table chili
			mysqli_query("INSERT INTO $chilitable (receiver_id, giver_id) VALUES('$receiverid', '$giverid')") 
or die(mysqli_error());
			mysqli_query("UPDATE $table SET chili = chili+1
WHERE id = '$receiverid'");
        }	
	$chili = mysqli_query("SELECT chili FROM $table WHERE id='$receiverid'");
		// Do row zero below because I am already grabbing the specific cell from the above mysqli_query, so there is only one row from the query
	
	echo mysqli_result($chili, 0);

?>