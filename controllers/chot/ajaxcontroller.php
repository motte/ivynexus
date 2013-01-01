<?php
	include_once('dbconnect.php');
	$giverid = mysqli_real_escape_string($_GET["a"]);
	$receiverid = mysqli_real_escape_string($_GET["b"]);

        $query = "SELECT * FROM chili WHERE c_giver='$giverid' AND c_receiver='$receiverid'";
        $result = mysqli_query($query);
        
        if(mysqli_num_rows($result) > 0) {
        	mysqli_query("UPDATE profile SET chili = chili-1
WHERE user_id = '$receiverid'");
			mysqli_query("DELETE FROM chili WHERE c_giver = '$giverid' AND c_receiver = '$receiverid'");
        }
        
        else {
        	// Insert a row of information into the table chili
			mysqli_query("INSERT INTO chili (c_receiver, c_giver) VALUES('$receiverid', '$giverid')") 
or die(mysqli_error());
			mysqli_query("UPDATE profile SET chili = chili+1
WHERE user_id = '$receiverid'");
        }	
	$chili = mysqli_query("SELECT chili FROM profile WHERE user_id='$receiverid'");
		// Do row zero below because I am already grabbing the specific cell from the above mysqli_query, so there is only one row from the query
	echo mysqli_result($chili, 0);

?>