<?php

include_once('../../../dbconnect.php');
session_start();
$user_id=mysql_real_escape_string($_POST["a"]); // User session id
$post = mysql_real_escape_string($_POST["b"]);
$anonymous = mysql_real_escape_string($_POST["c"]);
$poster = mysql_real_escape_string($_POST["d"]);
$school = mysql_real_escape_string($_POST["e"]);
$path = "/home/ivynex5/public_html/uploads/photos/";

$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
$name = strtolower($_FILES['image_file']['name']);
$size = $_FILES['image_file']['size'];
if(strlen($name))
{
list($txt, $ext) = explode(".", $name);
if(in_array($ext,$valid_formats))
{	
	
//if($size<(1024*1024)) // Image size max 1 MB{
$actual_image_name = time().$name.".".$ext;
$tmp = $_FILES['image_file']['tmp_name'];
if(move_uploaded_file($tmp, $path.$actual_image_name))
{

require_once('../../../library/images/imagemanager.class.php');
$im = new Imagemanager();
$im->loadFromFile($path.$actual_image_name);
$im->exifrotation($path.$actual_image_name);
$im->resizeScaleHeight(230);
$im->save($path.$actual_image_name);
//$im->resizeSqr(200);
//$im->save($path.'sqr'.$actual_image_name);
$im->resize(200,200);
$im->save($path.'sqr'.$actual_image_name);

//$post = $post.'<br /><center><img src="uploads/photos/'.$actual_image_name.'" class="preview"style="box-shadow: 0px 1px 3px #888; -moz-box-shadow: 0px 1px 3px #888; -webkit-box-shadow: 0px 1px 3px #888; padding: 7px 7px 7px 7px;"></center>';
//mysql_query("UPDATE dartmouth SET profile_image='$actual_image_name' WHERE id='$user_id'");

$blurb = '<h2 class="blurb" align="center">'.$post.'</h2>';
$post = '<center><ul id="exhibition"><li tabindex="0"><div title="'.$all.'"><h2 class="blurb" align="center">'.$post.'</h2><img src="uploads/photos/'.$actual_image_name.'" /></li></ul><br /></center>';

if($anonymous == 1) {
$post = '<br /><p>'.$post.'</p>';
mysql_query("INSERT INTO $school (poster_id, post, type, anonymous, name) VALUES('$user_id', '$post', '4', '1', '')");
echo '<p>'.$post.'</p><hr color="#fff" size="1" />';
}
else {
mysql_query("INSERT INTO $school (poster_id, post, type, anonymous, name) VALUES('$user_id', '$post', '4', '0', '$poster')");
echo '<p><strong><a class="name" href="profile/view/'.$user_id.'">'.$poster.'</a></strong>: '.$post.'</p><hr color="#fff" size="1" />';
}
//$phototable = $school.'_photos';
mysql_query("INSERT INTO photos (poster_id, photo, blurb) VALUES ('$user_id', '$actual_image_name', '$blurb')");
}
else
echo "failed";
}
//else
//echo "Image file size max 1 MB"; }
else
echo "Invalid file format or name.."; 
}
else
echo "Please select image..!";
exit;
}
	
?>