<link rel="stylesheet" type="text/css" href="external/css/userbar_style.css" />
<div id="main">
	<center>
		| &nbsp<h4>Friends</h4>
        <ul>
        	<!-- START profile_friends_sample -->
        	<li><a href="profile/view/{ID}">{users_name}</a></li>
        	<!-- END profile_friends_sample -->
        	&nbsp|<li><a href="relationships/all/{profile_user_id}">View All</a></li>
        </ul>| &nbsp
        <h4>Rest of Profile</h4>
        <ul>
        	<li><a href="profile/statuses/{profile_user_id}">Status Journal</a></li>
        </ul>&nbsp |
        <hr id="bar" />
    
   	<table>
   		<td align="center" valign="top" width="230px">
			<div style="padding: -10px;">
			<div id="content"><h1 style="margin-top: 5px;">{profile_name}</h1>	
			</div>
			</div>

				<div>
					<img src="uploads/profile/{profile_photo}" />
				</div>
		</td>
		<td width="1px" bgcolor="#eeeeee" height="100px">
		</td>
		<td width="500px">
			<div style="padding-left: 20px;" />
			<div id="content">
				<h1 style="margin-top: 5px">Recent Updates</h1>
				{status_update}
				<!-- {status_update_message} -->
					<!-- START updates -->
					{update-{ID}}
					<!-- END updates -->
					<div style="padding-bottom: 10x;"></div>
			</div>
		</td>
	</table>