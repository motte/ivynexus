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
			 			<select id="school" name="school" class="dropdown"></span>
				 			<option value="{p_school}">Select School</option>
							<option value="Brown">Brown</option>
							<option value="Columbia">Columbia</option>
							<option value="Cornell">Cornell</option>
							<option value="Dartmouth">Dartmouth</option>
							<option value="Harvard">Harvard</option>
							<option value="Penn">Penn</option>
							<option value="Princeton">Princeton</option>
							<option value="Yale">Yale</option>
						</select><br /><br />
		            <!--<input type="text" id="school" name="school" value="{p_school}" /><br /><br />-->
		            <label for="class">Class Year</label><br />
		            <input type="text" id="class" name="class" value="{p_class}" /><br /><br />
		            
		            <label for="class">Graduation Month & Year</label><br />
		            <input type="text" id="graduation" name="graduation" value="{p_graduation}" /><br /><br />
		            
		            <label for="internship">Company 1</label><br />
		            <input type="text" id="company1" name="company1" value="{p_company1}" /><br />
		            <label for="internship">Company Location</label><br />
		            <input type="text" id="companylocation1" name="companylocation1" value="{p_companylocation1}" /><br />
		            <label for="internship">Internship/Position</label><br />
		            <input type="text" id="internship1" name="internship1" value="{p_internship1}" /><br />
		            <label for="internship">Description</label><br />
		            <input type="text" id="internshipdescription1" name="internshipdescription1" value="{p_internshipdescription1}" /><br /><br />
		            
		            <label for="internship">Company 2</label><br />
		            <input type="text" id="company2" name="company2" value="{p_company2}" /><br />
		            <label for="internship">Company Location</label><br />
		            <input type="text" id="companylocation2" name="companylocation2" value="{p_companylocation2}" /><br />
		            <label for="internship">Internship/Position</label><br />
		            <input type="text" id="internship2" name="internship2" value="{p_internship2}" /><br />
		            <label for="internship">Description</label><br />
		            <input type="text" id="internshipdescription2" name="internshipdescription2" value="{p_internshipdescription2}" /><br /><br />
		            
		            <label for="internship">Company 3</label><br />
		            <input type="text" id="company3" name="company3" value="{p_company3}" /><br />
		            <label for="internship">Company Location</label><br />
		            <input type="text" id="companylocation3" name="companylocation3" value="{p_companylocation3}" /><br />
		            <label for="internship">Internship/Position</label><br />
		            <input type="text" id="internship3" name="internship3" value="{p_internship3}" /><br />
		            <label for="internship">Description</label><br />
		            <input type="text" id="internshipdescription3" name="internshipdescription3" value="{p_internshipdescription3}" /><br /><br />
		            
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