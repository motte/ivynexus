<?php
	include_once('../../../dbconnect.php');
	/* this hides all php errors that occur from mysql queries that happen to fail for one reason or another */
	ini_set( "display_errors", 0);
	$side = mysql_real_escape_string($_GET["a"]);
        $id = mysql_real_escape_string($_GET["b"]);
        $row = mysql_real_escape_string($_GET["c"]);
        $table = mysql_real_escape_string($_GET["d"]);
        $table = $table."_events";

	/* for some reason the selecting of max user_id would not work reliably so need to add number to $manualmax*/
	$query = "SELECT MAX(id) FROM $table";
	$moo = mysql_query($query);
	$max = mysql_result($moo,0);
	$random = mt_rand(1, $max);
	$event_query = "SELECT * FROM $table WHERE id=$random";
	$event_row = mysql_fetch_array(mysql_query($event_query));
	//$foo = "SELECT photo FROM $table WHERE id=$random";
	//$coo = mysql_query($foo);
	//$randomphoto = mysql_result($coo,0);
	$randomphoto = $event_row['photo'];
	$randomchili = $event_row['chili'];
	$info = '<div style="background: #000; opacity: 0.5; color: #fff; font-size: 14px; font-family: helvetica neue; overflow: wrap; line-height: 20px;"><strong>'.$event_row['event_name'].'</strong><br />From '.$event_row['event_start'].' '.$event_row['event_starttime'].'<br />To '.$event_row['event_end'].' '.$event_row['event_endtime'].'<br /><em>'.$event_row['event_description'].'</em></div>';

$info2 = $event_row['event_name'].': From '.$event_row['event_start'].' '.$event_row['event_starttime'].' to '.$event_row['event_end'].' '.$event_row['event_endtime'].' - '.$event_row['event_description'];
	//$chiliquery = "SELECT chili FROM $table WHERE id=$random";
	//$chiliquerydo = mysql_query($chiliquery);
	//$randomchili = mysql_result($chiliquerydo,0);

	if($randomphoto != ''){
		if($side == 1) {
			echo "<ul id='zoomleftevent'><li tabindex='0'><div title='".$info2."'><img id='eveleft".$row."' onmouseover='flipEvent(1)' onmouseout='revert(1)' width='99%' height='auto' src='uploads/events/sqr".$randomphoto."' /></div></li></ul><div style='height:10px;'></div><center><strong id='chilieventleft'>".$randomchili."</strong>&nbsp<form id='profilechili' name='form' method='post'><input id='profilechili' title='Hotness Factor: ".$randomchili." Chilis' type='button' onclick='getEventChiliLeft(".$id.", ".$random.")' /></form></center>";
	
/* this allows hover
echo "<ul id='zoomleftevent'><li tabindex='0'><div title='".$info2."'><img id='eveleft".$row."' onmouseover='flipEvent(1)' onmouseout='revert(1)' width='99%' height='auto' border='1px' src='uploads/events/".$randomphoto."'><div class='info1' style='opacity: 0; display:inline-block; margin-top: -100%; '>".$info."</div></img></div></li></ul><div style='height:10px;'></div><center><strong id='chilieventleft'>".$randomchili."</strong>&nbsp<form id='profilechili' name='form' method='post'><input id='profilechili' title='Hotness Factor: ".$randomchili." Chilis' type='button' onclick='getEventChiliLeft(".$id.", ".$random.")' /></form></center>";*/
		}
		else {
			echo "<ul id='zoomrightevent'><li tabindex='0'><div title='".$info2."'><img id='everight".$row."' onmouseover='flipEvent(2)' onmouseout='revert(2)' width='99%' height='auto' src='uploads/events/sqr".$randomphoto."' /></div></li></ul><div style='height:10px;'></div><center><strong id='chilieventright'>".$randomchili."</strong>&nbsp<form id='profilechili' name='form' method='post'><input id='profilechili' title='Hotness Factor: ".$randomchili." Chilis' type='button' onclick='getEventChiliRight(".$id.", ".$random.")' /></form></center>";

/* this allows hover
echo "<ul id='zoomrightevent'><li tabindex='0'><div title='".$info2."'><img id='everight".$row."' onmouseover='flipEvent(2)' onmouseout='revert(2)' width='99%' height='auto' border='1px' src='uploads/events/".$randomphoto."'><div class='info2' style='opacity: 0; display: inline-block; margin-top: -100%;'>".$info."</div></img></div></li></ul><div style='height:10px;'></div><center><strong id='chilieventright'>".$randomchili."</strong>&nbsp<form id='profilechili' name='form' method='post'><input id='profilechili' title='Hotness Factor: ".$randomchili." Chilis' type='button' onclick='getEventChiliRight(".$id.", ".$random.")' /></form></center>";*/
		}
	}
	else {
		echo "<img style='display:none;' id='phleft' width='99%' height='auto' src='uploads/profile/sqr132660203345453_427650983348_578388348_4860289_7538459_n.jpg'></img>";
	}

?>