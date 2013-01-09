<?php
	include_once('../../dbconnect.php');
	$user_id = mysql_real_escape_string($_GET["a"]);
	$crush_id = mysql_real_escape_string($_GET["b"]);
	
	
	//remove specific crush
	mysql_query("DELETE FROM crushes WHERE c_id = '$user_id' AND crush = '$crush_id'");
	mysql_query("UPDATE profile SET totalcrushes = totalcrushes-1 WHERE user_id = '$crush_id'");
	
	echo 'moo';
	
		

?>