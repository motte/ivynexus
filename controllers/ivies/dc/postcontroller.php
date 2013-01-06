<?php
	include_once('../../../dbconnect.php');
	$id = mysql_real_escape_string($_GET["a"]);
	$post = mysql_real_escape_string($_GET["b"]);
	$anonymous = mysql_real_escape_string($_GET["c"]);
	$poster = mysql_real_escape_string($_GET["d"]);
	$school = mysql_real_escape_string($_GET["e"]);

	if($anonymous == 1) {
        mysql_query("INSERT INTO $school (poster_id, post, type, anonymous, name) VALUES('$id', '$post', '1', '1', '')");
        echo '<p>'.$post.'</p>
					<hr color="#eee" size="1" />';
     }   
    else {

		mysql_query("INSERT INTO $school (poster_id, post, type, anonymous, name) VALUES('$id', '$post', '1', '0', '$poster')") 
or die(mysql_error());
		echo '<p><strong><a class="name" href="profile/view/'.$id.'">'.$poster.'</a></strong>&nbps&nbsp'.$post.'</p>
					<hr color="#eee" size="1" />';
    }	

?>