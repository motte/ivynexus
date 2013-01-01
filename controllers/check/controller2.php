<?php
	include_once('../../dbconnect.php');
	$user = mysql_real_escape_string($_GET["a"]);

	$update = "UPDATE users SET crush_counter=0, job_counter=0 WHERE ID='$user'";
	$result = mysql_query($update);

?>