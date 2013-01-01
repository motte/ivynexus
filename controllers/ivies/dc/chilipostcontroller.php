<?php
	include_once('../../../dbconnect.php');
	$giver_id = mysqli_real_escape_string($_GET["a"]);
	$receiverpost_id = mysqli_real_escape_string($_GET["b"]);
	$school = mysqli_real_escape_string($_GET["c"]);
	$table = $school.'_chili';
        $query = "SELECT * FROM $table WHERE c_giver='$giver_id' AND c_receiver='$receiverpost_id'";
        $result = mysqli_query($query);
        
        if(mysqli_num_rows($result) > 0) {
        	mysqli_query("UPDATE $school SET chili = chili-1
WHERE id = '$receiverpost_id'");
			mysqli_query("DELETE FROM $table WHERE c_giver = '$giver_id' AND c_receiver = '$receiverpost_id'");
        }
        
        else {
        	// Insert a row of information into the table chili
			mysqli_query("INSERT INTO $table (c_receiver, c_giver) VALUES('$receiverpost_id', '$giver_id')") 
or die(mysqli_error());
			mysqli_query("UPDATE $school SET chili = chili+1
WHERE id = '$receiverpost_id'");
        }	
	$chili = mysqli_query("SELECT chili FROM $school WHERE id='$receiverpost_id'");
		// Do row zero below because I am already grabbing the specific cell from the above mysqli_query, so there is only one row from the query
	echo mysqli_result($chili, 0);

?>