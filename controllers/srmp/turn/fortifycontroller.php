<?php
/*** This is the fortify command that allows user to place some soldiers into one of his states ***/
	include_once('../../../dbconnecti.php');
	
	// get total personal troops inta, troops that are being placed intb, personal id int, where the intb is being placed.
	$id = mysqli_real_escape_string($link,$_GET["a"]);
	$fortifystatefrom = mysqli_real_escape_string($link,$_GET["b"]);
	$fortifystateto = mysqli_real_escape_string($link,$_GET["c"]);
	$number_fortifying_troops = mysqli_real_escape_string($link,$_GET["d"]);
	$turn = mysqli_real_escape_string($link, $_GET["e"]);
	
	
	//$test = "SELECT new_troops FROM sandrm_users WHERE id='".$id."' AND total_troops='".$personaltroops."'";
   $query = mysqli_query($link,"SELECT * FROM sandrm_users WHERE id=$id AND new_troops=$personaltroops");
   	//$query = mysqli_query($link,"SELECT * FROM sandrm_users WHERE id=$id");
    $result = mysqli_fetch_array($query);
    $new_troops_left = $result['new_troops']-$placingtroops;
    $team = $result['team'];
    //$whereplacing = ;do strpos for ( then strpos for ) then remove the substr and preg_replace
    $state = substr($whereplacing, -4); 
    $state = preg_replace('/\s+/', '', $state);
    
    if($new_troops_left == '0') {
    	$new_total_troops = $result['total_troops']+$placingtroops;
    	mysqli_query($link,"UPDATE sandrm_users SET total_troops='$new_total_troops', new_troops='$new_troops_left', committed='1' WHERE id=$id") or die('error');
    	mysqli_query($link,"UPDATE sandrm_partials SET troops=troops + $placingtroops WHERE partial_name='$state'") or die('error');
    	$command = $whereplacing.' + '.$placingtroops;
    	mysqli_query($link,"INSERT INTO srmp_ivy_commits (turn, team_id, user_id, commands) VALUES ('$turn', '$team', '$id', '$command')") or die('error');
        echo $new_troops_left;
        mysqli_free_result($query);
    } 
    elseif($new_troops_left > '0'){
    	$new_total_troops = $result['total_troops']+$placingtroops;
    	mysqli_query($link,"UPDATE sandrm_users SET total_troops='$new_total_troops', new_troops='$new_troops_left' WHERE id='$id'") or die('error');
    	mysqli_query($link,"UPDATE sandrm_partials SET troops=troops + $placingtroops WHERE partial_name='$state'") or die('error');
    	$command = $whereplacing.' + '.$placingtroops;
    	mysqli_query($link,"INSERT INTO srmp_ivy_commits (turn, team_id, user_id, commands) VALUES ('$turn', '$team', '$id', '$command')") or die('error');
	    echo $new_troops_left;
        mysqli_free_result($query);
    }  
    else {

		//$update_query = mysqli_query($link,"UPDATE sandrm_users SET total_troops=total_troops+$newtroopsleft, new_troops=$new_troops_left WHERE id=$id") or die('error');
		echo $new_troops_left;
		mysqli_free_result($query);
    }
    mysqli_close($link);
?>