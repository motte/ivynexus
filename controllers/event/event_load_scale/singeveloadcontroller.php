<?php
	include_once('../../../dbconnect.php');
	/* this hides all php errors that occur from mysql queries that happen to fail for one reason or another */
	ini_set( "display_errors", 0);
	$eventSetNumber = mysql_real_escape_string($_GET["a"]);
		$id = mysql_real_escape_string($_GET["b"]);
        $school = mysql_real_escape_string($_GET["c"]);
        $table = $school."_events";

	/* for some reason the selecting of max user_id would not work reliably so need to add number to $manualmax*/
	$query = "SELECT MAX(id) FROM $table";
	$moo = mysql_query($query);
	$max = mysql_result($moo,0);
	$random = mt_rand(1, $max);
	//$random = 1;
	$event_query = "SELECT * FROM $table WHERE id=$random";
	$result = mysql_query($event_query);
	$event_row = mysql_fetch_array($result);
	//$info = '<div style="background: #000; opacity: 0.5; color: #fff; font-size: 14px; font-family: helvetica neue; overflow: wrap; line-height: 20px;"><strong>'.$event_row['event_name'].'</strong><br />From '.$event_row['event_start'].' '.$event_row['event_starttime'].'<br />To '.$event_row['event_end'].' '.$event_row['event_endtime'].'<br /><em>'.$event_row['event_description'].'</em></div>';
		//$singleRandom = array_slice($randomNums, $counter, 1);
$info = $event_row['event_name'].': From '.$event_row['event_start'].' '.$event_row['event_starttime'].' to '.$event_row['event_end'].' '.$event_row['event_endtime'].' - '.$event_row['event_description'];

			//echo "<ul id='zoomevent'><li tabindex='0'><div title='".$info."'><img id='eveleft".$row."' onmouseover='flipEvent(1)' onmouseout='revert(1)' width='99%' height='auto' src='uploads/events/".$event_row['photo']."' /></div></li></ul><div style='height:10px;'></div><center><strong id='chilieventleft'>".$event_row['chili']."</strong>&nbsp<form id='profilechili' name='form' method='post'><input id='profilechili' title='Hotness Factor: ".$event_row['chili']." Chilis' type='button' onclick='getEventChiliLeft(".$id.", ".$singleRandom.")' /></form></center>";
;
			//echo '<span id="event'.$num.'" style="display: inline-block;"><div title="'.$info.'"><img onmouseover="flipEvent('.$num.')" onmouseout="revert('.$num.')" class="sqrResize100" src="uploads/events/sqr'.$event_row['photo'].'" style="width:100px; height:100px;" /></div><center><strong id="chilievent'.$singleRandom.'">'.$event_row['chili'].'</strong>&nbsp<form id="profilechili" name="form" method="post"><input id="profilechili" title="Hotness Factor: '.$event_row['chili'].' Chilis" type="button" onclick="getEventChiliLeft('.$id.', '.$singleRandom.')" /></form></center></span>&nbsp';
			echo '<div title="'.$info.'"><img onclick="loadevent('.$eventSetNumber.')" onmouseover="flipEvent('.$eventSetNumber.')" onmouseout="revert('.$eventSetNumber.')" src="uploads/events/sqr'.$event_row['photo'].'" /></div>';
	
?>