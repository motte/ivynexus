<?php
	include_once('../../dbconnect.php');
	$id = mysql_real_escape_string($_GET["a"]);
	$poster_name = mysql_real_escape_string($_GET["b"]);
	$idea_name = mysql_real_escape_string($_GET["c"]);
	$idea_details = mysql_real_escape_string($_GET["d"]);

	mysql_query("INSERT INTO ideas (poster_id, poster_name, idea_name, description) VALUES('$id', '$poster_name', '$idea_name', '$idea_details')");
	//echo $id.$poster_name.$idea_name.$idea_details;
	//echo '<tr height="40px" class="threadlist"><td><a class="chili">'.$id.'</a></td><td>&nbsp&nbsp<a href="ideas/view/'.$id.'" class="threadlist">'.$idea_name.'<br />'.$idea_details.'</a></td><td>'.$poster_name.'</td><td>&nbsp Posted just now</td></tr>';
	$row_id = mysql_insert_id();
	echo $row_id;
 

?>