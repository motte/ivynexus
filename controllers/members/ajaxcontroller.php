<?php

// profile load in school vents
	include_once('../../dbconnect.php');
	/* this hides all php errors that occur from mysql queries that happen to fail for one reason or another */
	ini_set( "display_errors", 0);
	$a = mysql_real_escape_string($_GET["a"]);
        $b = mysql_real_escape_string($_GET["b"]);
        $row = mysql_real_escape_string($_GET["c"]);

	/* for some reason the selecting of max user_id would not work reliably so need to add number to $manualmax*/
	$query = "SELECT MAX(user_id) FROM profile";
	$moo = mysql_query($query);
	$max = mysql_result($moo,0);
	$random = mt_rand(1000, $max);
	$foo = "SELECT photo FROM profile WHERE user_id=$random";
	$coo = mysql_query($foo);
	$randomphoto = mysql_result($coo,0);

	$chiliquery = "SELECT chili FROM profile WHERE user_id=$random";
	$chiliquerydo = mysql_query($chiliquery);
	$randomchili = mysql_result($chiliquerydo,0);

	if($randomphoto != ''){
		if($a % 2) {
			echo "<a href='http://www.ivynexus.com/profile/view/".$random."'><img style='display:none;' id='pleft".$row."' class='info".$row."' onmouseover='flipEvent(".$row.")' onmouseout='revert(".$row.")' width='99%' height='auto' src='uploads/profile/sqr".$randomphoto."'></img></a><center id='loadChili'><strong id='chilirefreshleft'>".$randomchili."</strong>&nbsp<form id='whiteprofilechili' name='form' method='post'><input id='whiteprofilechili' title='Hotness Factor: ".$randomchili." Chilis' type='button' onclick='getChiliRight(".$b.", ".$random.")' /></form></center>";
	
		}
		else {
			echo "<a href='http://www.ivynexus.com/profile/view/".$random."'><img style='display:none;' id='pright".$row."' class='info".$row."' onmouseover='flipEvent(".$row.")' onmouseout='revert(".$row.")' width='99%' height='auto' src='uploads/profile/sqr".$randomphoto."'></img></a><center id='loadChili'><strong id='chilirefreshright'>".$randomchili."</strong>&nbsp<form id='whiteprofilechili' name='form' method='post'><input id='whiteprofilechili' title='Hotness Factor: ".$randomchili." Chilis' type='button' onclick='getChiliLeft(".$b.", ".$random.")' /></form></center>";
			
		}
	}
	else {
		echo "<img style='display:none;' id='pleft' width='99%' height='auto' src='uploads/profile/sqr132660203345453_427650983348_578388348_4860289_7538459_n.jpg'></img>";
	}

?>