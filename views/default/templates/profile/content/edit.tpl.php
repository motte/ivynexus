<center>
<div id="main">

   	<table>
   		<td valign="top" width="auto" height="100px" style="padding-right: 20px; padding-top: 15px;">
			<center><div id="content"><a href="profile/view/{profile_user_id}" id="profilename">{profile_name}</a><br /><br />
		    <img class="shadow" src="uploads/profile/{profile_photo}" /></center>
		</td>
		
		<td width="1px" bgcolor="#fff" height="100px">
		</td>
		
		<td width="300px" height="100px">
			<div style="padding-left: 20px;" />
			<div id="content" class="adjustcenter"><br />
				<form action="profile/view/{p_user_id}/edit" method="post" enctype="multipart/form-data">
					<label for="name">Name</label><br />
		        	<input type="text" name="name" value="{firstname} {lastname}" /><br /><br />
		            <label for="profile_picture">Profile Pic</label> <br />
		            <input type="file" id="profile_picture" name="profile_picture" /><br /><br />
		            <label for="interest">Interested In</label><br />
		        	<input type="text" name="interest" value="{p_interest}" /><br /><br />
		            <label for="bio">Biography</label><br />
		            <textarea id="bio" name="bio" cols="40" rows="6">{p_bio}</textarea><br /><br />
		            <label for="relationship">Relationship Status</label><br />
		        	<input type="text" id="relationship" name="relationship" value="{p_relationship}" /><br /><br />
		            <label for="school">Alma Mater</label><br />
		            <input type="text" id="school" name="school" value="{p_school}" /><br /><br />
		            <label for="class">Class Year</label><br />
		            <input type="text" id="class" name="class" value="{p_class}" /><br /><br />
		            <label for="internship">Internship</label><br />
		            <input type="text" id="internship" name="internship" value="{p_internship}" /><br /><br />
		            <label for="home">Home</label><br />
		            <input type="text" id="home" name="home" value="{p_home}" /><br /><br />
		            <label for="hall">Hall</label><br />
		            <input type="text" id="hall" name="hall" value="{p_hall}" /><br /><br />
		            
		            <button type="submit" class="btn3" name="">Save Profile</button>
				</form>
		
			</div>
		</td>
	</table>

</div>
</center>