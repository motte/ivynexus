<?php
	include_once('../../../dbconnect.php');
	$id = mysqli_real_escape_string($_GET["a"]);
	$event_name = mysqli_real_escape_string($_GET["g"]);
	$event_start = mysqli_real_escape_string($_GET["h"]);
	$event_starttime = mysqli_real_escape_string($_GET["i"]);
	$event_end = mysqli_real_escape_string($_GET["j"]);
	$event_endtime = mysqli_real_escape_string($_GET["k"]);
	$event_description = mysqli_real_escape_string($_GET["l"]);
	$post = mysqli_real_escape_string($_GET["b"]);
	$post = $post.'<br /><center><span style="font-size: 15px; line-height: 30px;">'.$event_name.'</span><br /><div style="font-size: 12px; line-height: 17px;">From '.$event_start.' at '.$event_starttime.' to '.$event_end.' at '.$event_endtime.'<br /><div style="color:#555;">'.$event_description.'</div></div></center>';
//$post = $post.'<br /><center><a href="events/'.$event_name.'" style="font-size: 15px;">'.$event_name.'</a><br /><div style="font-size: 12px">From '.$event_start.' at '.$event_starttime.' to '.$event_end.' at '.$event_endtime.'<br /><div style="color:#555;">'.$event_description.'</div></div></center>';
	$anonymous = mysqli_real_escape_string($_GET["c"]);
	$poster = mysqli_real_escape_string($_GET["d"]);
	$school = mysqli_real_escape_string($_GET["e"]);

	if($anonymous == 1) {
        mysqli_query("INSERT INTO $school (poster_id, post, type, anonymous, name) VALUES('$id', '$post', '2', '1', '')");
        echo '<p>'.$post.'</p>
					<hr color="#fff" size="1" />';
     }   
    else {

		mysqli_query("INSERT INTO $school (poster_id, post, type, anonymous, name) VALUES('$id', '$post', '2', '0', '$poster')") 
or die(mysqli_error());
		echo '<p><strong><span class="name">'.$poster.'</span></strong>: '.$post.'</p><hr color="#fff" size="1" />';
//echo '<p><strong><a class="name" href="profile/view/'.$id.'">'.$poster.'</a></strong>: '.$post.'</p>
    }	

?>