<?php
	include_once('../../../dbconnect.php');
	$giver_id = mysql_real_escape_string($_GET["a"]);
	$receiverpost_id = mysql_real_escape_string($_GET["b"]);
	$school = mysql_real_escape_string($_GET["c"]);
	$table = $school.'_chili';
        $query = "SELECT * FROM $table WHERE c_giver='$giver_id' AND c_receiver='$receiverpost_id'";
        $result = mysql_query($query);
        
        if(mysql_num_rows($result) > 0) {
        	mysql_query("UPDATE $school SET chili = chili-1
WHERE id = '$receiverpost_id'");
			mysql_query("DELETE FROM $table WHERE c_giver = '$giver_id' AND c_receiver = '$receiverpost_id'");
        }
        
        else {
        	// Insert a row of information into the table chili
			mysql_query("INSERT INTO $table (c_receiver, c_giver) VALUES('$receiverpost_id', '$giver_id')") 
or die(mysql_error());
			mysql_query("UPDATE $school SET chili = chili+1
WHERE id = '$receiverpost_id'");
        }	
	$chili = mysql_query("SELECT chili FROM $school WHERE id='$receiverpost_id'");
		// Do row zero below because I am already grabbing the specific cell from the above mysql_query, so there is only one row from the query
	echo mysql_result($chili, 0);

?>