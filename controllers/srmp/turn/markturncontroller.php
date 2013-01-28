<?php
// This sets how far the user has gone in his turn and conveniently allows user to return to the step
	include_once('../../../dbconnecti.php');
	$id = mysqli_real_escape_string($link,$_GET["a"]);
	$turn = mysqli_real_escape_string($link,$_GET["b"]);

    mysqli_query($link, "UPDATE sandrm_users SET committed=$turn WHERE id=$id");
    return true;    

?>