<?php
	include_once('../../dbconnect.php');
	$giverid = mysql_real_escape_string($_GET["a"]);
	$receiverid = mysql_real_escape_string($_GET["b"]);
	$receivername = mysql_real_escape_string($_GET["c"]);
	$givername = mysql_real_escape_string($_GET["d"]);

	$giver_query = "SELECT * FROM profile WHERE user_id='$giverid'";
	//$giver_result = mysql_query($giver_query);
	$giver_row = mysql_fetch_array(mysql_query($giver_query));
	$receiver_query = "SELECT * FROM profile WHERE user_id='$receiverid'";
	$receiver_row = mysql_fetch_array(mysql_query($receiver_query));
	if($giver_row['can_crush'] > 0) {
	        $query = "SELECT * FROM crushes WHERE c_id='$giverid' AND crush='$receiverid'";
	        //$result = mysql_query($query);
	        // This limits the number of crushes to three total
        	$totalquery = "SELECT * FROM crushes WHERE c_id='$giverid' LIMIT 3";
	        //$totalresult = mysql_query($totalquery);
	        //remove a crush
	        if(mysql_num_rows(mysql_query($query)) > 0) {
	   
	        	mysql_query("DELETE FROM crushes WHERE c_id = '$giverid' AND crush = '$receiverid'");
	        	mysql_query("UPDATE profile SET totalcrushes = totalcrushes-1 WHERE user_id = '$receiverid'");
	        	//mysql_query("UPDATE profile SET totalcrushes = totalcrushes-1, can_crush = can_crush+1 WHERE user_id = '$receiverid'");
			echo $receiver_row['totalcrushes']-1;
			
	        }
	        //if trying to add a crush but already has three crushes
	        elseif(mysql_num_rows(mysql_query($query)) <= 0 && mysql_num_rows(mysql_query($totalquery)) > 2) { 
	        	echo 'You already have three crushes.  If your interest has changed remove one of them by pressing their crush button and then adding your new crush. '.$receiver_row['totalcrushes'];
	        	
	        	}
	        // add a crush
	        else {
	        	// Insert a row of information into the table crush
			mysql_query("INSERT INTO crushes (crush, c_id) VALUES('$receiverid', '$giverid')") 
	or die(mysql_error());
			mysql_query("UPDATE profile SET can_crush = can_crush-1 WHERE user_id = '$giverid'");
			mysql_query("UPDATE profile SET totalcrushes = totalcrushes+1 WHERE user_id = '$receiverid'");
			mysql_query("UPDATE users SET crush_counter=crush_counter+1 WHERE ID='$receiverid'");
			if($giverid != $receiverid) {
				$mutualquery="SELECT COUNT(*) as $count FROM crushes WHERE c_id = '$receiverid' AND crush = '$giverid'";
				$ifmutual = mysql_query($mutualquery);
				if ($ifmutual > 0) {
					$receivername .= ' (Mutual Crush)';
					$givername .=  ' (Mutual Crush)';
					mysql_query("INSERT INTO thread_participants (viewerId, participantIds) VALUES ('$giverid', '$receiverid')");
					$t_id=mysql_insert_id();
					mysql_query("DELETE FROM thread_participants WHERE threadId='$t_id'");
					mysql_query("INSERT INTO thread_participants (threadId, viewerId, participantIds, viewerName, participantNames) VALUES ('$t_id', '$giverid', '$receiverid', '$givername', '$receivername'), ('$t_id', '$receiverid', '$giverid', '$receivername', '$givername')");
					
				}
			
				else{
					$receivername .= ' (Crush)';
					$givername .= ' (Crush)';
					mysql_query("INSERT INTO thread_participants (viewerId, participantIds) VALUES ('$giverid', '$receiverid')");
						$t_id=mysql_insert_id();
						mysql_query("DELETE FROM thread_participants WHERE threadId='$t_id'");
						mysql_query("INSERT INTO thread_participants (threadId, viewerId, participantIds, viewerName, participantNames) VALUES ('$t_id', '$giverid', '$receiverid', '$givername', '$receivername'), ('$t_id', '$receiverid', '$giverid', '$receivername', 'A Crush!')");
				}
			}
			//mysql_query("UPDATE profile SET can_crush = can_crush-1 WHERE user_id = '$giverid'");
			echo $receiver_row['totalcrushes']+1;
			
	        }
	        
	}	
        else {
        	// do "this" if the user has used the quota of crush changes for the day
        	echo "Already changed your crushes three times today ".$receiver_row['totalcrushes'];
        }
		

?>