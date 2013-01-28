<?php
	include_once('../../../dbconnecti.php');
	$post_id = mysqli_real_escape_string($link,$_GET["a"]);
	$username = mysqli_real_escape_string($link,$_GET["b"]);
	$post_to_team = mysqli_real_escape_string($link,$_GET["c"]);
	$team = mysqli_real_escape_string($link,$_GET["d"]);
	if($team=='Brown'){
		$team_id='1';
	}
	elseif($team=='Columbia'){
		$team_id='2';
	}
	elseif($team=='Cornell'){
		$team_id='3';
	}
	elseif($team=='Dartmouth'){
		$team_id='4';
	}
	elseif($team=='Harvard'){
		$team_id='5';
	}
	elseif($team=='Princeton'){
		$team_id='6';
	}
	elseif($team=='Penn'){
		$team_id='7';
	}
	elseif($team=='Yale'){
		$team_id='8';
	}
	$post_to_team = preg_replace('#\b(([\w-]+://)[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#', '<a href="$1">$1</a>', $post_to_team);
	
	$query = mysqli_query($link,"INSERT INTO srmp_ivy_chat (user_id, username, message, team_id) VALUES ('$post_id', '$username', '$post_to_team', '$team_id')");
    
	return $post_to_team;
?>