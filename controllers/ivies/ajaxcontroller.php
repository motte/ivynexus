// This loads the posts on the ivy pages

<?php
	include_once('../../dbconnect.php');
	$school = mysql_real_escape_string($_GET["a"]);
	$counter = mysql_real_escape_string($_GET["b"]); //initial load has counter =0
	$first = mysql_real_escape_string($_GET["c"]); //starts from 0, first time loading a set of posts, then adds minimum row value
	$user_id = mysql_real_escape_string($_GET["d"]);

//If not the first post
	if($first != '0') {
		$query = mysql_query("SELECT * FROM $school WHERE id BETWEEN $counter-26 AND $counter-1 ORDER BY id DESC LIMIT 25");
		//$query = mysql_query("SELECT $school.*, profile.school, profile.photo FROM $school, profile WHERE $school.id BETWEEN $counter-26 AND $counter-1 ORDER BY $school.id DESC LIMIT 25 AND $school.id=profile.user_id");
		$min = array();
		while($row = mysql_fetch_array($query)){
		    	if($row['name'] == '') {
		    		echo nl2br("<p>".$row['post']."</p>");
		    		//echo "<center><strong id='chilirefresh".$row['id']."'>".$row['chili']."</strong>&nbsp<form id='ivychili' name='form' method='post'><input id='ivychili' title='Hotness Factor: ".$row['chili']." Chilis' type='button' onclick='addChili(".$user_id.", ".$row['id'].")' /></form></center>";
		    		echo "<div class='unformattedtime' style='padding-left: 10px; font-size: 11px; font-style: italic; color: #aaa; display:inline;'>".$row['time']."</div><div align='right' style='margin-top: -20px;'><strong id='chilirefresh".$row['id']."'>".$row['chili']."</strong>&nbsp<form id='ivychili' name='form' method='post'><input id='ivychili' title='Hotness Factor: ".$row['chili']." Chilis' type='button' onclick='addChili(".$user_id.", ".$row['id'].")' /></form><button class='comment' id='comment".$row['id']."' onclick='toggleComment(".$row['id'].",0)'>Comment</button></div>";
		    		//echo "<p><div class='unformattedtime' style='padding-left: 10px; font-size: 11px; font-style: italic; color: #aaa;'>".$row['time']."</div></p>";
				echo "<hr color='#fff' size='1' />";
			}
			else {
				echo nl2br("<p><strong><a class='name' style='color: #3bb000;' href='profile/view/".$row['poster_id']."'>".$row['name']."</a></strong>&nbsp&nbsp". $row['post']."</p>");
				echo "<div class='unformattedtime' style='padding-left: 10px; font-size: 11px; font-style: italic; color: #aaa; display:inline;'>".$row['time']."</div><div align='right' style='margin-top: -20px;'><strong id='chilirefresh".$row['id']."'>".$row['chili']."</strong>&nbsp<form id='ivychili' name='form' method='post'><input id='ivychili' title='Hotness Factor: ".$row['chili']." Chilis' type='button' onclick='addChili(".$user_id.", ".$row['id'].")' /></form><button class='comment' id='comment".$row['id']."' onclick='toggleComment(".$row['id'].",0)'>Comment</button></div>";
				//echo "<center><strong id='chilirefresh".$row['id']."'>".$row['chili']."</strong>&nbsp<form id='ivychili' name='form' method='post'><input id='ivychili' title='Hotness Factor: ".$row['chili']." Chilis' type='button' onclick='addChili(".$user_id.", ".$row['id'].")' /></form></center>";
				//echo "<p><div class='unformattedtime' style='padding-left: 10px; font-size: 11px; font-style: italic; color: #aaa;'>".$row['time']."</div></p>";
				echo "<hr color='#fff' size='1' />";
			}
			$min[] = $row['id'];
		}
		echo "<center><button id='count' type='button' onclick='loadposts(".min($min).",1)'>Load Old Posts</button></center>";
	}
// if the first set of posts - mark it
	else {
		$query = mysql_query("SELECT * FROM $school ORDER BY id DESC LIMIT 25");
		//$query = mysql_query("SELECT $school.*, profile.school, profile.photo FROM $school, profile WHERE $school.id DESC LIMIT 25 AND profile.user_id=$school.id");
		
		$min = array();
		
		while($row = mysql_fetch_array($query)){
			// if no name = anonymous
		    	if($row['name'] == '') {
		    		echo nl2br("<p>".$row['post']."</p>");
				echo "<div class='unformattedtime' style='padding-left: 10px; font-size: 11px; font-style: italic; color: #aaa; display:inline;'>".$row['time']."</div><div align='right' style='margin-top:-20px;'><strong id='chilirefresh".$row['id']."'>".$row['chili']."</strong>&nbsp<form id='ivychili' name='form' method='post'><input id='ivychili' title='Hotness Factor: ".$row['chili']." Chilis' type='button' onclick='addChili(".$user_id.", ".$row['id'].")' /></form><button class='comment' id='comment".$row['id']."' onclick='toggleComment(".$row['id'].",0)'>Comment</button></div>";
				//echo "<center><strong id='chilirefresh".$row['id']."'>".$row['chili']."</strong>&nbsp<form id='ivychili' name='form' method='post'><input id='ivychili' title='Hotness Factor: ".$row['chili']." Chilis' type='button' onclick='addChili(".$user_id.", ".$row['id'].")' /></form></center>";
				//echo "<p><div class='unformattedtime' style='padding-left: 10px; font-size: 11px; font-style: italic; color: #aaa;'>".$row['time']."</div></p>";
				echo "<hr color='#eee' size='1' />";
			}
			// not anonymous post
			else {
				echo nl2br("<p><strong><a class='name' style='color: #3bb000;' href='profile/view/".$row['poster_id']."'>&nbsp".$row['name']."</a></strong>&nbsp&nbsp ". $row['post']."</p>");
				echo "<div class='unformattedtime' style='padding-left: 10px; font-size: 11px; font-style: italic; color: #aaa; display:inline;'>".$row['time']."</div><div align='right' style='margin-top: -20px;'><strong id='chilirefresh".$row['id']."'>".$row['chili']."</strong>&nbsp<form id='ivychili' name='form' method='post'><input id='ivychili' title='Hotness Factor: ".$row['chili']." Chilis' type='button' onclick='addChili(".$user_id.", ".$row['id'].")' /></form><button class='comment' id='comment".$row['id']."' onclick='toggleComment(".$row['id'].",0)'>Comment</button></div>";
				//echo "<center><strong id='chilirefresh".$row['id']."'>".$row['chili']."</strong>&nbsp<form id='ivychili' name='form' method='post'><input id='ivychili' title='Hotness Factor: ".$row['chili']." Chilis' type='button' onclick='addChili(".$user_id.", ".$row['id'].")' /></form></center>";
				//echo "<p><div class='unformattedtime' style='padding-left: 10px; font-size: 11px; font-style: italic; color: #aaa;'>".$row['time']."</div></p>";
				echo "<hr color='#eee' size='1' />";
			}
			$min[] = $row['id'];
		}
		echo "<input id='firstreference' type='hidden' value='".max($min)."'>";
		echo "<center><button id='count' type='button' onclick='loadposts(".min($min).",1)'>Load Old Posts</button></center>";
	}

?>