<?php
	include_once('../../../dbconnect.php');
	$giverid = mysql_real_escape_string($_GET["a"]);
	$receiverid = mysql_real_escape_string($_GET["b"]);

        $query = "SELECT * FROM chili_photo WHERE c_giver='$giverid' AND c_receiver='$receiverid'";
        $result = mysql_query($query);
        
        if(mysql_num_rows($result) > 0) {
        	mysql_query("UPDATE photos SET chili = chili-1
WHERE id = '$receiverid'");
			mysql_query("DELETE FROM chili_photo WHERE c_giver = '$giverid' AND c_receiver = '$receiverid'");
        }
        
        else {
        	// Insert a row of information into the table chili
			mysql_query("INSERT INTO chili_photo (c_receiver, c_giver) VALUES('$receiverid', '$giverid')") 
or die(mysql_error());
			mysql_query("UPDATE photos SET chili = chili+1
WHERE id = '$receiverid'");
        }	
	$chili = mysql_query("SELECT chili FROM photos WHERE id='$receiverid'");
		// Do row zero below because I am already grabbing the specific cell from the above mysql_query, so there is only one row from the query
	echo mysql_result($chili, 0);

?>