<?php

include_once('../../../dbconnect.php');
session_start();
$user_id=mysql_real_escape_string($_POST["a"]); // User session id
$anonymous = mysql_real_escape_string($_POST["c"]);
$poster = mysql_real_escape_string($_POST["d"]);
$school = mysql_real_escape_string($_POST["e"]);
$post = mysql_real_escape_string($_POST["b"]);
$event_name = mysql_real_escape_string($_POST["f"]);
$event_description = mysql_real_escape_string($_POST["g"]);
$event_start = mysql_real_escape_string($_POST["h"]);
$event_starttime = mysql_real_escape_string($_POST["i"]);
$event_end = mysql_real_escape_string($_POST["j"]);
$event_endtime = mysql_real_escape_string($_POST["k"]);

$path = "/home/ivynex5/public_html/uploads/events/";

$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
$name = strtolower($_FILES['event_file']['name']);
$size = $_FILES['event_file']['size'];
if(strlen($name))
{
list($txt, $ext) = explode(".", $name);
if(in_array($ext,$valid_formats))
{	
	
//if($size<(1024*1024)) // Image size max 1 MB{
$actual_image_name = time().$name.".".$ext;
$tmp = $_FILES['event_file']['tmp_name'];
if(move_uploaded_file($tmp, $path.$actual_image_name))
{

require_once('../../../library/images/imagemanager.class.php');
$im = new Imagemanager();
$im->loadFromFile($path.$actual_image_name);
$im->exifrotation($path.$actual_image_name);
$im->resizeScaleHeight(230);
$im->save($path.$actual_image_name);

$all = $event_name.': '.$event_description.' From '.$event_start.' at '.$event_starttime.' to '.$event_end.' at '.$event_endtime;

$post = $post.'<br /><div style="line-height: 22px; font-size: 12px;"><center><span style="font-size: 15px; font-weight: bold;">'.$event_name.'</span><br />From '.$event_start.' at '.$event_starttime.' to '.$event_end.' at '.$event_endtime.'<br /><ul id="exhibition"><li tabindex="0"><div title="'.$all.'"><img src="uploads/events/'.$actual_image_name.'" alt="'.$all.'"  /></li></ul><br /><div style="color:#555;">'.$event_description.'</div></center></div>';

//$post = $post.'<br /><div style="line-height: 22px; font-size: 12px;"><center><span style="font-size: 15px; font-weight: bold;">'.$event_name.'</span><br />From '.$event_start.' at '.$event_starttime.' to '.$event_end.' at '.$event_endtime.'<br /><a href="uploads/events/'.$actual_image_name.'" rel="lightbox" title=""><img src="uploads/events/'.$actual_image_name.'" class="preview"></a><br /><div style="color:#555;">'.$event_description.'</div></center></div>';
//$post = $post.'<br /><div style="line-height: 22px; font-size: 13px;"><center><a href="'.$event_name.'" style="font-size: 16px;">'.$event_name.'</a><br />From '.$event_start.' at '.$event_starttime.' to '.$event_end.' at '.$event_endtime.'<br /><img src="uploads/events/'.$actual_image_name.'" class="preview" style="box-shadow: 0px 1px 3px #888; -moz-box-shadow: 0px 1px 3px #888; -webkit-box-shadow: 0px 1px 3px #888; padding: 7px 7px 7px 7px;"><br /><div style="color:#555;">'.$event_description.'</div></center></div>';
//mysql_query("UPDATE dartmouth SET profile_image='$actual_image_name' WHERE id='$user_id'");
if($anonymous == 1) {
mysql_query("INSERT INTO $school (poster_id, post, type, anonymous, name) VALUES('$user_id', '$post', '2', '1', '')");
echo '<p>'.$post.'</p><hr color="#fff" size="1" />';
}
else {
mysql_query("INSERT INTO $school (poster_id, post, type, anonymous, name) VALUES('$user_id', '$post', '2', '0', '$poster')");
echo '<p><strong><a class="name" href="profile/view/'.$user_id.'">'.$poster.'</a></strong>: '.$post.'</p><hr color="#fff" size="1" />';
}
$eventtable = $school.'_events';
mysql_query("INSERT INTO $eventtable (poster_id, event_name, event_description, event_start, event_starttime, event_end, event_endtime, photo) VALUES ('$user_id', '$event_name', '$event_description', '$event_start', '$event_starttime', '$event_end', '$event_endtime', '$actual_image_name')");
}
else
echo "failed";
}
//else
//echo "Image file size max 1 MB"; }
else
echo "Invalid file format.."; 
}
else
echo "Please select image..!";
exit;
}

?>