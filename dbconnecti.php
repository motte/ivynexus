<?php
$link = mysqli_connect('localhost', 'root', 'G3n3212R3y32', 'ivynex5_nexus') or die('error');

if (mysqli_connect_error()) {
	$logMessage = 'MySQL Error: ' . mysqli_connect_error();
	// Call your logger here.
	die('Could not connect to the database');
}

?>