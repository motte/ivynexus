<?php
	include_once('../../../dbconnect.php');
	/* this hides all php errors that occur from mysql queries that happen to fail for one reason or another */
	ini_set( "display_errors", 0);
	$a = mysql_real_escape_string($_GET["a"]);
        $b = mysql_real_escape_string($_GET["b"]);
        $row = mysql_real_escape_string($_GET["c"]);

	/* for some reason the selecting of max user_id would not work reliably so need to add number to $manualmax*/
	$query = "SELECT MAX(id) FROM photos";
	$moo = mysql_query($query);
	$max = mysql_result($moo,0);
	$random = mt_rand(1, $max);
	$foo = "SELECT * FROM photos WHERE id=$random";
	$event_row = mysql_fetch_array(mysql_query($foo));
	$randomphoto = $event_row['photo'];
	$randomchili = $event_row['chili'];
	$randomblurb = '<div class="info3" style="opacity: 0; display:inline-block; position: absolute;"><center>'.$event_row['blurb'].'</center></div>';
        $randomblurb2 = '<div class="info6" style="opacity: 0; display:inline-block; position: absolute;"><center>'.$event_row['blurb'].'</center></div>';

	if($randomphoto != ''){
		if($a == 1) {
			echo $randomblurb."<ul id='zoomleftevent'><li tabindex='0' style='margin-top: -15px;'><img onmouseover='flipEvent(3)' onmouseout='revert(3)' id='phleft".$row."' width='99%' src='uploads/photos/".$randomphoto."'></img></div></li></ul><div style='height:10px;'><center><strong id='chiliphotorefreshleft'>".$randomchili."</strong>&nbsp<form id='profilechili' name='form' method='post'><input id='profilechili' title='Hotness Factor: ".$randomchili." Chilis' type='button' onclick='getPhotoChiliLeft(".$b.", ".$random.")' /></form></center>";
	
		}
		else {
			echo $randomblurb2."<ul id='zoomrightevent'><li tabindex='0' style='margin-top: -15px;'><img onmouseover='flipEvent(6)' onmouseout='revert(6)' id='phright".$row."' width='99%' src='uploads/photos/".$randomphoto."'></img></div></li></ul><div style='height:10px;'><center><strong id='chiliphotorefreshright'>".$randomchili."</strong>&nbsp<form id='profilechili' name='form' method='post'><input id='profilechili' title='Hotness Factor: ".$randomchili." Chilis' type='button' onclick='getPhotoChiliRight(".$b.", ".$random.")' /></form></center>";
		}
	}
	else {
		echo $randomblurb."<img style='display:none;' id='phleft' width='99%' height='200px' src='uploads/profile/132660203345453_427650983348_578388348_4860289_7538459_n.jpg'></img>";
	}

?>