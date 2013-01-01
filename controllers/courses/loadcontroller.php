<?php
// This loads the course posts on the courses pages


	include_once('../../dbconnect.php');
	$counter = mysql_real_escape_string($_GET["c"]); //initial load has counter =0
	$first = mysql_real_escape_string($_GET["d"]); //starts from 0, first time loading a set of posts, then adds minimum row value
	
//If not the first post
	if($first != '0') {
		$query = mysql_query("SELECT * FROM courses WHERE id BETWEEN $counter-26 AND $counter-1 ORDER BY id DESC LIMIT 25");

		$min = array();
		while($row = mysql_fetch_array($query)){
			$redirect = "'courses/view/".$row["id"]."'";
		    	if($row['poster_name'] == '') {
				echo '<tr height="40px" class="threadlist" onclick="document.location='.$redirect.'" valign="top"><td style="border-bottom: 1px solid #fff;"><span id="chilirefresh'.$row['id'].'">'.$row['chilis'].'</span><br /><form id="ivychili" name="form" method="post"><input id="ivychili" title="Hotness Factor: '.$row['chilis'].' Chilis" type="button" onclick="addChili('.$row['id'].')" /></form></td><td  style="border-bottom: 1px solid #fff;"><a href="courses/view/'.$row["id"].'" class="threadlist">'.$row["course_name"].'<br /><span style="color:#777;font-size:12px;">'.substr($row["description"], 0, 100).'</span></a></td><td  style="border-bottom: 1px solid #fff;"><a href="profile/view/'.$row["poster_id"].'">'.$row["poster_name"].'</a></td><td  style="border-bottom: 1px solid #fff;">'.$row["when_added"].'</td></tr>';
			}
			else {
				echo '<tr height="40px" class="threadlist" onclick="document.location='.$redirect.'" valign="top"><td style="border-bottom: 1px solid #fff;"><span id="chilirefresh'.$row['id'].'">'.$row['chilis'].'</span><br /><form id="ivychili" name="form" method="post"><input id="ivychili" title="Hotness Factor: '.$row['chilis'].' Chilis" type="button" onclick="addChili('.$row['id'].')" /></form></td><td  style="border-bottom: 1px solid #fff;"><a href="courses/view/'.$row["id"].'" class="threadlist">'.$row["course_name"].'<br /><span style="color:#777;font-size:12px;">'.substr($row["description"], 0, 100).'</span></a></td><td  style="border-bottom: 1px solid #fff;"><a href="profile/view/'.$row["poster_id"].'">'.$row["poster_name"].'</a></td><td  style="border-bottom: 1px solid #fff;">'.$row["when_added"].'</td></tr>';
			}
			$min[] = $row['id'];
		}
		echo "<center><button id='count' type='button' onclick='loadposts(".min($min).",1)'>Load Old Posts</button></center>";
	}
// if the first set of posts - mark it
	else {
		$query = mysql_query("SELECT * FROM courses ORDER BY id DESC LIMIT 25");
		
		$min = array();
		
		while($row = mysql_fetch_array($query)){
			$redirect = "'courses/view/".$row["id"]."'";
			// if no name = anonymous
		    	if($row['poster_name'] == '') {
				echo '<tr height="40px" class="threadlist" onclick="document.location='.$redirect.'" valign="top">
					<td style="border-bottom: 1px solid #fff;"><span id="chilirefresh'.$row['id'].'">'.$row['chilis'].'</span><br /><form id="ivychili" name="form" method="post"><input id="ivychili" title="Hotness Factor: '.$row['chilis'].' Chilis" type="button" onclick="addChili('.$row['id'].')" /></form></td>
					<td  style="border-bottom: 1px solid #fff;"><a href="courses/view/'.$row["id"].'" class="threadlist">'.$row["course_name"].'<br /><span style="color:#777;font-size:12px;">'.substr($row["description"], 0, 100).'</span></a></td>
					<td  style="border-bottom: 1px solid #fff;"><a href="profile/view/'.$row["poster_id"].'">'.$row["poster_name"].'</a></td>
					<td  style="border-bottom: 1px solid #fff;">'.$row["when_added"].'</td>
				</tr>';
			}
			// not anonymous post
			else {
				echo '<tr height="40px" class="threadlist" valign="top"><td style="border-bottom: 1px solid #fff;" name="'.$row['id'].'"><span id="chilirefresh'.$row['id'].'" name="'.$row['id'].'">'.$row['chilis'].'</span><br /><form id="ivychili" name="form" method="post"><input id="ivychili" title="Hotness Factor: '.$row['chilis'].' Chilis" type="button" onclick="addChili('.$row['id'].')" /></form></td><td onclick="document.location='.$redirect.'" style="border-bottom: 1px solid #fff;"><a href="courses/view/'.$row["id"].'" class="threadlist">'.$row["course_name"].'<br /><span style="color:#777;font-size:12px;">'.substr($row["description"], 0, 100).'...</span></a></td><td onclick="document.location='.$redirect.'" style="border-bottom: 1px solid #fff;"><a href="profile/view/'.$row["poster_id"].'">'.$row["poster_name"].'</a></td><td onclick="document.location='.$redirect.'" style="border-bottom: 1px solid #fff;" name="'.$row['id'].'">'.$row["when_added"].'</td></tr>';
			}
			$min[] = $row['id'];
		}
		
		if($min == '') {
			echo "<input id='firstreference' type='hidden' value='".max($min)."'>";
			echo "<center><button id='count' type='button' onclick='loadcourses(".min($min).",1)'>Load More Courses</button></center>";
		}
		else {
			echo "";
		}
	}

?>