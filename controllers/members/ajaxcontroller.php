<?php

// profile load in school vents
	include_once('../../dbconnect.php');
	/* this hides all php errors that occur from mysql queries that happen to fail for one reason or another */
	ini_set( "display_errors", 0);
	$a = mysqli_real_escape_string($_GET["a"]);
        $b = mysqli_real_escape_string($_GET["b"]);
        $row = mysqli_real_escape_string($_GET["c"]);

	/* for some reason the selecting of max user_id would not work reliably so need to add number to $manualmax*/
	$query = "SELECT MAX(user_id) FROM profile";
	$moo = mysqli_query($query);
	$max = mysqli_result($moo,0);
	$random = mt_rand(1000, $max);
	$foo = "SELECT photo FROM profile WHERE user_id=$random";
	$coo = mysqli_query($foo);
	$randomphoto = mysqli_result($coo,0);

	$chiliquery = "SELECT chili FROM profile WHERE user_id=$random";
	$chiliquerydo = mysqli_query($chiliquery);
	$randomchili = mysqli_result($chiliquerydo,0);

	if($randomphoto != ''){
		if($a == 1) {
			echo "<a href='http://www.ivynexus.com/profile/view/".$random."'><img style='display:none;' id='pleft".$row."' width='99%' height='auto' border='1px' src='uploads/profile/".$randomphoto."'></img><div style='height:10px;'></div></a><center><strong id='chilirefreshleft'>".$randomchili."</strong>&nbsp<form id='profilechili' name='form' method='post'><input id='profilechili' title='Hotness Factor: ".$randomchili." Chilis' type='button' onclick='getChiliLeft(".$b.", ".$random.")' /></form></center>";
	
		}
		else {
			echo "<a href='http://www.ivynexus.com/profile/view/".$random."'><img style='display:none;' id='pright".$row."' width='99%' height='auto' border='1px' src='uploads/profile/".$randomphoto."'></img><div style='height:10px;'></div></a><center><strong id='chilirefreshright'>".$randomchili."</strong>&nbsp<form id='profilechili' name='form' method='post'><input id='profilechili' title='Hotness Factor: ".$randomchili." Chilis' type='button' onclick='getChiliRight(".$b.", ".$random.")' /></form></center>";
		}
	}
	else {
		echo "<img style='display:none;' id='pleft' width='99%' height='auto' border='1px' src='uploads/profile/132660203345453_427650983348_578388348_4860289_7538459_n.jpg'></img>";
	}

?>