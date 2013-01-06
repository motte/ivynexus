<?php
// Comment load when comment button pressed.

	include_once('../../../dbconnect.php');
	$post_id = mysql_real_escape_string($_GET["a"]);
	$poster_id = mysql_real_escape_string($_GET["d"]);
	$school = mysql_real_escape_string($_GET["e"]);
	$school_comments = $school."_comments";

	$query = mysql_query("SELECT * FROM $school_comments WHERE ventpost_id=$post_id ORDER BY id ASC") or die(mysql_error());
	if($query == "false") {echo 'none';}
	else {
	while($row = mysql_fetch_array($query)){
		echo "<div align='right' name='loadedcomments".$row[ventpost_id]."' style='background: #eee;'><hr color='#fff' size='1' style='margin-top:0px; margin-bottom:3px;' /><div style='padding-right:10px;'><strong><a class='name' style='color: #000;' href='profile/view/".$row['poster_id']."'>".$row['poster']."</a></strong><span style='font-size:12px;'>: ". $row['comment']."</span></div><div align='right' class='unformattedtime' style='padding-right: 10px; font-size: 12px; padding-top: 5px; padding-bottom: 7px; font-style: italic; color: #aaa;'>Commented on ".$row['when_created']."</div></div>";
		//echo "<div align='right' name='loadedcomments".$row[ventpost_id]."' style='background: #E2FFDF;'><hr color='#fff' size='1' style='margin-top:0px; margin-bottom:3px;' /><div style='padding-right:10px;'><strong><a class='name' style='color: #000;' href='profile/view/".$row['poster_id']."'>".$row['poster']."</a></strong><span style='font-size:12px;'>: ". $row['comment']."</span></div><div align='right' class='unformattedtime' style='padding-right: 10px; font-size: 11px; padding-top: 5px; padding-bottom: 7px; font-style: italic; color: #aaa;'>Commented on ".$row['when_created']."</div></div>";
		//echo "<div name='loadedcomments' style='background: #E2FFDF;'><strong><a class='name' style='color: #000;' href='profile/view/".$row['poster_id']."'>".$row['poster']."</a></strong>: ". $row['comment']."<center><strong id='chilirefresh".$row['poster_id']."'>".$row['chili']."</strong>&nbsp<form id='ivychili' name='form' method='post'><input id='ivychili' title='Hotness Factor: ".$row['chili']." Chilis' type='button' onclick='addChili(".$com_id.", ".$row['poster_id'].")' /></form></center><div class='unformattedtime' style='padding-left: 10px; font-size: 11px; font-style: italic; color: #aaa;'>Commented on ".$row['when_created']."</div><hr color='#fff' size='1' style='margin-bottom: 0px' /></div>";
	}
	}
	
?>