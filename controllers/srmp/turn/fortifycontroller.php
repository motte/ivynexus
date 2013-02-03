<?php
/*** This is the fortify command that allows user to send soldiers into one of the surrounding enemy states ***/
	include_once('../../../dbconnecti.php');

	// get total personal troops inta, troops that are being placed intb, personal id int, where the intb is being placed.
	$id = mysqli_real_escape_string($link,$_GET["a"]);
	$fortifystatefrom = mysqli_real_escape_string($link,$_GET["b"]);
	$fortifystateto = mysqli_real_escape_string($link,$_GET["c"]);
	$number_fortifying_troops = mysqli_real_escape_string($link,$_GET["d"]);
	$turn = mysqli_real_escape_string($link, $_GET["e"]);
	$team_id = mysqli_real_escape_string($link,$_GET["f"]);
	
	$fromstate = substr($fortifystatefrom, -4); 
    $fromstate = preg_replace('/\s+/', '', $fromstate);

    $tostate = substr($fortifystateto, -4); 
    $tostate = preg_replace('/\s+/', '', $tostate);

    $search = array('ct1', 'ct2', 'ct3', 'ct4', 'ct5', 'ct6', 'ct7', 'ct8', 'ma10', 'ma11', 'ma12', 'ma13', 'ma1', 'ma2', 'ma3', 'ma4', 'ma5', 'ma6', 'ma7', 'ma8', 'ma9', 'nh1', 'nh2', 'nh3', 'nh4', 'nh5', 'nh6', 'nh7', 'nj10', 'nj1', 'nj2', 'nj3', 'nj4', 'nj5', 'nj6', 'nj7', 'nj8', 'nj9', 'ny10', 'ny11', 'ny1', 'ny2', 'ny3', 'ny4', 'ny7', 'ny8', 'ny5', 'ny6', 'ny9', 'pa10', 'pa1', 'pa2', 'pa3', 'pa4', 'pa5', 'pa6', 'pa7', 'pa8', 'pa9', 'ri1', 'ri2', 'ri3', 'ri4', 'ri5');
    $replace = array('1','2','3','4','5','6','7','8','18','19','20','21','9','10','11','12','13','14','15','16','17','22','23','24','25','26','27','28','38','29','30','31','32','33','34','35','36','37','48','49','39','40','41','42','43','44','45','46','47','59','50','51','52','53','54','55','56','57','58','60','61','62','63','64');
    $state_primary_id = str_replace($search, $replace, $fromstate);

        
	//$test = "SELECT new_troops FROM sandrm_users WHERE id='".$id."' AND total_troops='".$personaltroops."'";
	$query = mysqli_query($link,"SELECT * FROM sandrm_partials WHERE owner_id='$team_id' AND partial_id='$state_primary_id'");
    $result = mysqli_fetch_array($query);
    $query_user = mysqli_query($link,"SELECT * FROM sandrm_users WHERE id='$id'");
    $result_user = mysqli_fetch_array($query_user);
    $personal_states_array = $result_user['states'];
    // This extracts the troop number from database on the user's fortify origin state
    $personal_states_array = explode(',',$personal_states_array);
    // array_search with partial matches
    //awesome function to find a partial search of string in array
	/*function array_find($needle, $haystack) {
		if(!is_array($haystack)) return false;
		foreach ($haystack as $key=>$item) {
		$a =strpos($item, $needle);
			if ($a !== false) return $key;
		}
		return false;
	}*/
    //$array_key = array_find($fromstate, $personal_states_array);
    foreach ($personal_states_array as $key=>$item) {
		if (strpos($item, $fromstate) !== false){
			$array_key = $key;
		} 
	}
		
    $string_needle = $personal_states_array[$array_key];
    //preg_match_all('!\d+!', $string_needle, $matches);
    $string_needle = substr($string_needle, 0, -3);
    $specific_troops = filter_var($string_needle, FILTER_SANITIZE_NUMBER_INT);
    //$me = preg_match_all('!\d+!', $string_needle, $matches);
    //$specific_troops = $matches[$array_key];

    if($specific_troops>$number_fortifying_troops){
    	$command = $number_fortifying_troops.','.$fortifystatefrom.','.$fortifystateto;
    	mysqli_query($link, "INSERT INTO srmp_ivy_commits (turn, type, team_id, user_id, commands, troops, fromstate, tostate) VALUES ('$turn', '3', '$team_id', '$id', '$command', '$number_attacking_troops', '$fromstate', '$tostate')") or die('error');
	    echo 'true';
	    //echo 'true';
	    mysqli_free_result($query);
	    mysqli_free_result($query_user);
	}
	elseif($specific_troops<=$number_fortifying_troops){
		echo 'not';
		//echo 'not';
		mysqli_free_result($query);
		mysqli_free_result($query_user);
	}
	else{
		echo 'false';
		mysqli_free_result($query);
		mysqli_free_result($query_user);
	}
    mysqli_close($link);
?>