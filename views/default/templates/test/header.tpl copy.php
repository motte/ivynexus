<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head> 
	<base href="{siteurl}" />
	<title>IvyNexus - Social Network for Exceptional Students</title> 
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" /> 
	<meta name="description" content="The Social Network for Exceptional Students" /> 
	<meta name="keywords" content="student, social, network, ivy, nexus" /> 
	<!--<link type="text/css" href="external/ui-lightness/jquery-ui-1.7.1.custom.css" rel="stylesheet" />	
	<script type="text/javascript" src="external/jquery-1.3.2.min.js"></script> 
	<script type="text/javascript" src="external/jquery-ui-1.7.2.custom.min.js"></script> -->
	<script type="text/javascript"> 
		$(function() {
			$('.selectdate').datepicker({
				numberOfMonths: 1,
				showButtonPanel: false
			});
			$('.selectdate').datepicker('option', 'dateFormat', 'dd/mm/yy');
			
		});
		</script> 
	<!--<link rel="stylesheet" type="text/css" href="views/default/style.css" /> 
	<style type="text/css"> 
	.menu{menuselected} a{ background: #fff !important; color: #3D70A3 !important;}*/
	</style> -->
</head> 
<body bgcolor="000000"> 
	<div id="wrapper">
		<div id="sidepane">
			<center><img src="views/default/images/logo.png" /></center>
		</div>
		
		<div id="main">
				
			<div id="content">
			<form action="views/default/templates" method="post">
			<center><label for="sn_auth_user"><font size="4 px" color="#ffffff">Username:</font></label>
			<input type="text" id="sn_auth_user" name="sn_auth_user" /></center><br />
			<center><label for="sn_auth_pass"><font size="4 px"color="#ffffff">Password:</font></label>
			<input type="password" id="sn_auth_pass" name="sn_auth_pass" /><br /><br /></center>
			<input type="hidden" id="referer" name="referer" value="{referer}" />
			<center><input type="submit" id="login" name="login" value="Login" /></center>
			</form>			
			</div>
			
		</div>
		
		<!--<div id="contentwrapper">
			
			<div id="headerbar">
			{userbar}
				<p>Hi {username}! Why not <a href="profile">view your profile</a>, or <a href="account">edit your account</a> | <a href="authenticate/logout">logout</a></p>
			</div>-->