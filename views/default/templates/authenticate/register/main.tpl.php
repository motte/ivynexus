<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<base href="{siteurl}" />
<head>
	<link rel="stylesheet" type="text/css" href="external/css/userbar_style.css" />
	<!--<script src="external/jquery-1.2.6.min.js" type="text/javascript"></script>-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<!--<link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>-->
<script src="external/rfc/rfc2.js" type="text/javascript"></script>
</head>
<meta name="viewport" content="width=505; height=645;" initial-scale= 2.0;/>

<body id="login">

<!--<div id="back">	-->
	<center><br />
	<table width="505px">
		<!--<tr>
			<a id="arrow" href=""></a><!--<img src="views/default/images/back.png" style="margin-left: 174px;" width="40px" height="auto"></img><a id="register" href=""><img src="views/default/images/back.png" width="40px" height="auto"> Return to Login</img></a><br /><br />
		</tr>-->

		<!--<tr height="30px" valign="bottom"><div id="helv"><span style="color:#196543;">Sign Up with <img src="views/default/images/newlogo.png" /> - <span style="color:#fff;">Its free.</span></div></tr>-->

		<tr valign="bottom">
			<div id="helv" style="margin:none;"><span style="color:#fff;">Sign Up <a href=""><img src="views/default/images/newlogo.png" style="vertical-align:-60px; margin-left: -38px; margin-right: -105px;" /></a></span><span style="color:#13c213; vertical-align: -80px;">- It's free.</span></div>
		</tr>
		<tr valign="top" align="center">
		<!--<td width="35%">
			<span id="rfcbutton2"><div style="margin-top: 120px; color: #333;"><div id="helv"><a id="rfc2" type="submit" style="text-decoration: none;"><em>Register through</em><br /><br /><img src="views/default/images/facebook.png" width="auto" height="120px" style="margin-bottom:-7px;" /></a></div></div></span><div style="padding: 8px;" />
		</td>-->
		
		<td  style="border-left: 2px dashed #eee; border-right: 2px dashed #eee; padding-top:15px;">

		<!--<div id="helv"><span style="color:#196543;">Register through Ivy</span><span style="color:#fff;"><em>Nexus</em></span></div><br />-->
		
		<span id="error">{error}</span>	
	 
		<form action="" method="post" enctype="multipart/form-data"> 

 			<label for="register_firstname"><font size="4px" color="#ffffff"><span class="reglabel">First Name:</span></font></label> 
			<span id="nudge0"><input type="text" id="register_firstname" name="register_firstname" class="first" /><br /><br /></span>
			<label for="register_lastname"><font size="4px" color="#ffffff"><span class="reglabel">Last Name:</span></font></label>
			<span id="nudge1"><input type="text" id="register_lastname" name="register_lastname" class="last" /><br /><br /></span>
 
 			<label for="register_school"><font size="4px" color="#ffffff"><span class="reglabel">Your School:</span></font></label>
 			<select id="register_school" name="register_school" class="dropdown"></span>
 			<option value="">Select School</option>
			<option value="Brown">Brown</option>
			<option value="Columbia">Columbia</option>
			<option value="Cornell">Cornell</option>
			<option value="Dartmouth">Dartmouth</option>
			<option value="Harvard">Harvard</option>
			<option value="Penn">Penn</option>
			<option value="Princeton">Princeton</option>
			<option value="Yale">Yale</option>
			</select><br /><br />
			
			<label for="register_class"><font size="4px" color="#ffffff"><span class="reglabel">Class Year:</span></font></label>
			<span id="nudge1"><input type="text" id="register_class" name="register_class" class="classyear" /><br /><br /></span>
			
			<label for="register_photo"><font size="4px" color="#ffffff"><span class="reglabel"  style="padding-left:76px;">Portrait Photo:</span></font></label>
			<input type="file" id="register_photo" name="register_photo" /><div class="spaceten" />
 
 			<label for="register_email"><font size="4px" color="#ffffff"><span class="reglabel">Your Email:</span></font></label>
			<span id="nudge2"><input type="text" id="register_email" name="register_email" class="email" /><br /><br /></span>
 
			<label for="register_password"><font size="4px" color="#ffffff"><span class="reglabel">Password:</span></font></label> 
			<span id="nudge3"><input type="password" id="register_password" name="register_password" class="passwd" /><br /><br /></span>
 
			<!--<label for="register_password_confirm"><font size="4px" color="#ffffff">Confirm password:</font></label>
			<input type="password" id="register_password_confirm" name="register_password_confirm" value="" /><br /><br />-->

			<label for="register_gender"><font size="4px" color="#ffffff"><span class="reglabel">I am:</span></font></label>

			<span id="nudge4"><select id="register_gender" name="register_gender" class="dropdown"></span>
			<option value="">Select Sex</option>
			<option value="Male">Male</option>
			<option value="Female">Female</option>
			</select><br /><br />

			<label for="register_dob"><font size="4px" color="#ffffff"><span class="reglabeldob">Birthday:</span></font></label>
			<span id="nudge5"><select id="register_birth_month" name="register_birth_month" class="dropdownmonth"></span>
			<option value="">Month</option><option value="January">January</option><option value="February">February</option><option value="March">March</option><option value="April">April</option><option value="May">May</option><option value="June">June</option><option value="July">July</option><option value="August">August</option><option value="September">September</option><option value="October">October</option><option value="November">November</option><option value="December">December</option>
			</select>
			<span id="nudge5"><select id="register_birth_day" name="register_birth_day" class="dropdownday"></span>
			<option value="">Day</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
			</select>
			<span id="nudge5"><select id="register_birth_year" name="register_birth_year" class="dropdownyear"></span>
			<option value="">Year</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option><option value="2009">2009</option><option value="2010">2010</option>
			</select><br /><br />
 			<font size="2px" color="#555" style="">By clicking "Create Account" you are agreeing to the <span id="rfcbutton"><a id="rfc2" type="submit" style="cursor: pointer; z-index:1000;">terms and conditions</a></span></font><br /><br />
 			<input type="submit" id="process_registration" name="process_registration" value="Create Account" class="btn" /> <br /><br />
 		</td>
 		
 		</tr>
 	</table>		
      		
 			
 			
	</form> 	
	</center>

	<div style="margin-top: 0px">
      	<div id="rfcWindow" style="height: 250px;">
      		<a id="rfcWindowX"></a>
      		
      		<center><h2 style="color: #888; font-family: lucida grande; padding-bottom: 10px;"><img valign="bottom" src="favicon.png" height="26px" />&nbsp Terms and Conditions</h2></center>
      		<p style="font: 14px helvetica; line-height: 20px; font-weight: lighter; text-align: left;">
			<center><span id="divide"><i>Click outside this window or press the "x" in the upper right to exit.</i></span></center><br />
			<div style="font: 14px helvetica; line-height: 20px; font-weight: lighter; ">
				
						<center><br /><hr width="80%" style="height: 1px; border: none; background: #eee;" /><br /><img src="views/default/images/ivy.png" />
					
						&nbsp You must be a current college student.<br /><br /><hr width="80%" style="height: 1px; border: none; background: #eee;" /></center>
				

				
			</div>
		</p>
      	</div>
      	<div id="backdrop"></div>
		
	</div>


</body>
			<!--<label for=""><font size="4px" color="#ffffff">Do you accept the terms and conditions?</font></label>
			<input type="checkbox" id="register_terms" name="register_terms" value="1" /> <br /><br />-->

		