<?php
// This sets how far the user has gone in his turn and conveniently allows user to return to the step
	include_once('../../../dbconnecti.php');
	$id = mysql_real_escape_string($_GET["a"]);
	$turn = mysql_real_escape_string($_GET["b"]);

    mysqli_query($link, "UPDATE sandrm_users SET committed=$turn WHERE id=$id");
    return true;    

?>