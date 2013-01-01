<?php
	include_once('../../dbconnect.php');
	$giverid = mysqli_real_escape_string($_GET["a"]);
	$receiverid = mysqli_real_escape_string($_GET["b"]);
	$receivername = mysqli_real_escape_string($_GET["c"]);
	$givername = mysqli_real_escape_string($_GET["d"]);

	$giver_query = "SELECT * FROM profile WHERE user_id='$giverid'";
	//$giver_result = mysqli_query($giver_query);
	$giver_row = mysqli_fetch_array(mysqli_query($giver_query));
	$receiver_query = "SELECT * FROM profile WHERE user_id='$receiverid'";
	$receiver_row = mysqli_fetch_array(mysqli_query($receiver_query));
	if($giver_row['can_crush'] > 0) {
	        $query = "SELECT * FROM crushes WHERE c_id='$giverid' AND crush='$receiverid'";
	        //$result = mysqli_query($query);
	        // This limits the number of crushes to three total
        	$totalquery = "SELECT * FROM crushes WHERE c_id='$giverid' LIMIT 3";
	        //$totalresult = mysqli_query($totalquery);
	        //remove a crush
	        if(mysqli_num_rows(mysqli_query($query)) > 0) {
	   
	        	mysqli_query("DELETE FROM crushes WHERE c_id = '$giverid' AND crush = '$receiverid'");
	        	mysqli_query("UPDATE profile SET totalcrushes = totalcrushes-1 WHERE user_id = '$receiverid'");
	        	//mysqli_query("UPDATE profile SET totalcrushes = totalcrushes-1, can_crush = can_crush+1 WHERE user_id = '$receiverid'");
			echo $receiver_row['totalcrushes']-1;
			
	        }
	        //if trying to add a crush but already has three crushes
	        elseif(mysqli_num_rows(mysqli_query($query)) <= 0 && mysqli_num_rows(mysqli_query($totalquery)) > 2) { 
	        	echo 'You already have three crushes.  If your interest has changed remove one of them by pressing their crush button and then adding your new crush. '.$receiver_row['totalcrushes'];
	        	
	        	}
	        // add a crush
	        else {
	        	// Insert a row of information into the table crush
			mysqli_query("INSERT INTO crushes (crush, c_id) VALUES('$receiverid', '$giverid')") 
	or die(mysqli_error());
			mysqli_query("UPDATE profile SET can_crush = can_crush-1 WHERE user_id = '$giverid'");
			mysqli_query("UPDATE profile SET totalcrushes = totalcrushes+1 WHERE user_id = '$receiverid'");
			mysqli_query("UPDATE users SET crush_counter=crush_counter+1 WHERE ID='$receiverid'");
			if($giverid != $receiverid) {
				$mutualquery="SELECT COUNT(*) as $count FROM crushes WHERE c_id = '$receiverid' AND crush = '$giverid'";
				$ifmutual = mysqli_query($mutualquery);
				if ($ifmutual > 0) {
					$receivername .= ' (Mutual Crush)';
					$givername .=  ' (Mutual Crush)';
					mysqli_query("INSERT INTO thread_participants (viewerId, participantIds) VALUES ('$giverid', '$receiverid')");
					$t_id=mysqli_insert_id();
					mysqli_query("DELETE FROM thread_participants WHERE threadId='$t_id'");
					mysqli_query("INSERT INTO thread_participants (threadId, viewerId, participantIds, viewerName, participantNames) VALUES ('$t_id', '$giverid', '$receiverid', '$givername', '$receivername'), ('$t_id', '$receiverid', '$giverid', '$receivername', '$givername')");
					
				}
			
				else{
					$receivername .= ' (Crush)';
					$givername .= ' (Crush)';
					mysqli_query("INSERT INTO thread_participants (viewerId, participantIds) VALUES ('$giverid', '$receiverid')");
						$t_id=mysqli_insert_id();
						mysqli_query("DELETE FROM thread_participants WHERE threadId='$t_id'");
						mysqli_query("INSERT INTO thread_participants (threadId, viewerId, participantIds, viewerName, participantNames) VALUES ('$t_id', '$giverid', '$receiverid', '$givername', '$receivername'), ('$t_id', '$receiverid', '$giverid', '$receivername', 'A Crush!')");
				}
			}
			//mysqli_query("UPDATE profile SET can_crush = can_crush-1 WHERE user_id = '$giverid'");
			echo $receiver_row['totalcrushes']+1;
			
	        }
	        
	}	
        else {
        	// do "this" if the user has used the quota of crush changes for the day
        	echo "Already changed your crushes three times today ".$receiver_row['totalcrushes'];
        }
		

?>