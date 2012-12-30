<link rel="stylesheet" type="text/css" href="external/css/userbar_style.css" />

<script type="text/javascript">
    $(document).ready(function() {
    var refreshId = setInterval(function(){
            $('#chilirefresh').load('{siteurl}/profile/statuses/{ID} #chilirefresh');
        }, 5000);
        
    });
</script>

<div id="main">
	<center>
	| &nbsp<h4>Friends</h4>
        <ul>
        	<!-- START profile_friends_sample -->
        	<li><a href="profile/view/{ID}">{users_name}</a></li>
        	<!-- END profile_friends_sample -->
        	&nbsp|<li><a href="relationships/all/{profile_user_id}">More</a></li>
        	|<li><a href="relationships/pending">Pending</a></li>
        </ul>| &nbsp
        <h4>Rest of Profile</h4>
        <ul>
        	<li><a href="profile/statuses/{profile_user_id}">Status Journal</a></li>
        </ul>&nbsp |
        <hr id="bar" />
    
   	<table>
   		<td align="center" valign="top" width="220px">
			<div style="padding: -10px;">
			<div id="content"><h1 style="margin-top: 5px;">{profile_name}</h1>	
			</div>
			</div>

				<div style="padding-right: 15px;">
					<img src="uploads/profile/{profile_photo}" />
				</div>
		</td>
		<td width="1px" bgcolor="#eeeeee" height="100px">
		</td>
		<td width="450px" valign="top">
			<div style="padding-left: 20px;" />
			<div id="content">
			<span id="chilirefresh">
				<h1 style="margin-top: 5px">Recent Updates</h1>
				{status_update}
				
				<!-- {status_update_message} -->
				<span id="chilirefresh">
					<!-- START updates -->
					{update-{ID}}
					<hr color="#eee" size="1" />
					<!-- END updates -->
				</span>
					<div style="padding-bottom: 10x;"></div>
			</div>
		</td>
	</table>