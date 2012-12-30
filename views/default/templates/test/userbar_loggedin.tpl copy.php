<link rel="stylesheet" type="text/css" href="external/css/userbar_style.css" />
<base href="{siteurl}" />
<body>
<a href="" class="logo"></a>
<div class="fieldheight">
	<div class="ubar">
		<!--<a href="members" class="icon"></a>-->
		| <a href="ivies/ivies" class="ivy"></a><span style="padding-left: 21px;">|</span> <a href="ivies/{p_school}">{p_school}</a> | <a href="stream/{p_id}">Stream</a> |<form id="searchfield" action="members/search" method="post">
				<input type="text" id="name" name="name" value="Members By Name" onFocus="if(this.value=='Members By Name') {this.value=''}; this.style.color='#000000';" onBlur="if(this.value=='') {this.value='Members By Name'; this.style.color='#c0d5c0';}" />&nbsp
				<input type="submit" id="search" name="search" value="Search" />
		</form>
		<p id="ubarlinks"> | <a href="members/{p_id}" class="members"></a> <span style="padding-left: 21px;">|</span> <a href="groups">Groups</a> | <a href="calendar">Calendar</a> | <a href="profile">{firstname} {lastname}</a> | <a href="profile/edit">Edit Account</a> | <a href="authenticate/logout">Logout</a> | </p>
	</div>
</div>
</body>