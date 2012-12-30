<body>

<center>
<div id="main" style="font-size: 20px; font-weight: lighter; color: #888;">

	<h3 style="color: #aaa; font-weight: lighter; margin-top: 0px;"><span id="lock"></span>Change Password</h3><div style="padding-bottom: 5px;"></div>
	<p style="margin-top: 5px; line-height: 24px;">IvyNexus has great, modern security<br /> and we take extra precautions to protect your information.<br />
		But your information is only as strong as your personal password.<br />
		When entered, your password is automatically encrypted so even we can't read it.<br />
		<hr width="35%" class="subtle" />
	</p>
	<p style="margin-top: 5px; line-height: 24px;">
		Did you know most online accounts are broken using a brute force hack, aka guessing?<br />
		So, choose your password carefully!<br />
		But if for any reason you think your account is compromised, let us know!
	</p>
	<hr width="75%" class="subtle" />
	<p style="font-size: 14px; margin-bottom: 10px; color: #196543;">{error}</p>
	<form action="authenticate/reset-password/{pID}" method="post" enctype="multipart/form-data">
		&nbsp&nbsp<label>Current Password</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<input type="password" name="current_password" id="pfield"> </input><br /><br />
		<span id="lock2"></span><label>New Password</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<input type="password" name="password" id="pfield"> </input><br />
		<span id="lock2"></span><label>Confirm New Password </label>&nbsp
		<input type="password" name="confirm_password" id="pfield"> </input><br /><br />
		<button type="submit" class="btn3">Change Password</button>
	</post>
</div>
</center>