<?php
	include_once('../../../dbconnect.php');
	$giverid = mysql_real_escape_string($_GET["a"]);
	$receiverid = mysql_real_escape_string($_GET["b"]);
	$school = mysql_real_escape_string($_GET["d"]);
	$table = $school."_events";
	$chilitable = $school."_event_chili";

        $query = "SELECT * FROM $chilitable WHERE giver_id='$giverid' AND receiver_id='$receiverid'";
        $result = mysql_query($query);
        
        if(mysql_num_rows($result) > 0) {
        	mysql_query("UPDATE $table SET chili = chili-1 WHERE id = '$receiverid'");
			mysql_query("DELETE FROM $chilitable WHERE giver_id = '$giverid' AND receiver_id = '$receiverid'");
        }
        
        else {
        	// Insert a row of information into the table chili
			mysql_query("INSERT INTO $chilitable (receiver_id, giver_id) VALUES('$receiverid', '$giverid')") 
or die(mysql_error());
			mysql_query("UPDATE $table SET chili = chili+1
WHERE id = '$receiverid'");
        }	
	$chili = mysql_query("SELECT chili FROM $table WHERE id='$receiverid'");
		// Do row zero below because I am already grabbing the specific cell from the above mysql_query, so there is only one row from the query
	
	echo mysql_result($chili, 0);

?>