<?php
	include_once('../../dbconnect.php');
	$school = mysql_real_escape_string($_GET["a"]);
	$counter = mysql_real_escape_string($_GET["b"]);

	/*if($first != '0') {
		$query = mysql_query("SELECT * FROM $school WHERE id>$counter ORDER BY id DESC LIMIT 25");
		$max = array();
		while($row = mysql_fetch_array($query)){
		    	if($row['name'] == '') {
		    		echo "<p>".$row['post']."</p>";
				echo "<hr color='#eee' size='1' />";
			}
			else {
				echo "<p><strong><a class='name' style='color: #000;' href='profile/view/".$row['poster_id']."'>".$row['name']."</a></strong>: ". $row['post']."<br /><div class='unformattedtime' style='padding-left: 10px; font-size: 12px; font-style: italic; color: #aaa;'>".$row['time']."</div></p>";
				echo "<hr color='#eee' size='1' />";
			}
			$max[] = $row['id'];
		}
		echo "<input id='reference' type='hidden' value='".max($max)."'>";
	}*/
	
	$query = mysql_query("SELECT * FROM $school WHERE id>$counter ORDER BY id DESC LIMIT 25");
	$max = array();
	if(mysql_num_rows($query) > 0) {	
		while($row = mysql_fetch_array($query)){
		    	if($row['name'] == '') {
		    		echo nl2br("<p>".$row['post']."</p>");
				echo "<hr color='#fff' size='1' />";
			}
			else {
				echo nl2br("<p><strong><a class='name' style='color: #000;' href='profile/view/".$row['poster_id']."'>".$row['name']."</a></strong>: ". $row['post']."<br /><div class='unformattedtime' style='padding-left: 10px; font-size: 12px; font-style: italic; color: #aaa;'>".$row['time']."</div></p>");
				echo "<hr color='#fff' size='1' />";
			}
			$max[] = $row['id'];
		}
		echo "<input id='reference' type='hidden' value='".max($max)."'>";
	}
	
	else {
		echo '';
	}
?>