<center>
<div id="main">
	<div class="engraved"><span>This page is NOT accessible to other IvyNexus members.</span></div>
    <hr id="bar" />	
   	<table>
   		<td valign="top" width="auto" height="100px" style="padding-right: 20px; padding-top: 25px;">
			<center><div id="content"><a href="profile/view/{p_user_id}" id="profilename">{p_name}</a><br /><br /></center>
   		
		    <center><img class="shadow" src="uploads/academicportraits/{a_portrait}" /></center></center>
		</td>
		
		<td width="1px" bgcolor="#fff" height="100px">
		</td>
		
		<td width="300px" height="100px">
			<div style="padding-left: 20px;" />
			<!--<div id="content" class="adjustcenter"><h1 style="margin-top:5px;">Edit Academics</h1>-->
				<form action="academics/edit" method="post" enctype="multipart/form-data">
				<div class="adjustcenter">
					<label for="major">Major</label><br />
		        	<input type="text" name="major" value="{a_major}" /><div class="spaceten" />
		            <label for="portrait">Portrait</label> <br />
		            <input type="file" id="portrait" name="portrait" /><div class="spaceten" />
		            <label for="experiences">Experiences</label> <br />
		            <input type="text" id="experiences" name="experiences" value="{a_experiences}" /><div class="spaceten" />
		            <label for="autobio">Academic Biography</label><br />
		            <textarea id="autobio" name="autobio" cols="40" rows="6">{a_autobio}</textarea><div class="spaceten" />
		            <label for="awards">Awards</label><br />
		        	<input type="text" id="awards" name="awards" value="{a_awards}" /><div class="spaceten" />
		            <label for="clubs">Clubs</label><br />
		            <input type="text" id="clubs" name="clubs" value="{a_clubs}" /><div class="spaceten" />
		            <label for="classes">Classes</label><br />
		            <input type="text" id="classes" name="classes" value="{a_classes}" /><div class="spaceten" />
		            <label for="interests">Interests</label><br />
		            <input type="text" id="interests" name="interests" value="{a_interests}" /><div class="spaceten" />
		            </div>
		            <label for="gpa">Overall GPA</label><br />
		            <input type="text" id="gpa" name="gpa" value="{a_gpa}" style="width: 25%;" />/4.0<br /><br />
		            <label for="fgpa">Freshman</label><br />
		            <input type="text" id="fgpa" name="fgpa" value="{a_fgpa}" style="width: 25%;" />/4.0<br /><br />
		            <label for="sgpa">Sophomore</label><br />
		            <input type="text" id="sgpa" name="sgpa" value="{a_sgpa}" style="width: 25%;" />/4.0<br /><br />
		            <label for="jgpa">Junior</label><br />
		            <input type="text" id="jgpa" name="jgpa" value="{a_jgpa}" style="width: 25%;" />/4.0<br /><br />
		            <label for="segpa">Senior</label><br />
		            <input type="text" id="segpa" name="segpa" value="{a_segpa}" style="width: 25%;" />/4.0<br /><br />
		            <label for="ssgpa">Super Senior</label><br />
		            <input type="text" id="ssgpa" name="ssgpa" value="{a_ssgpa}" style="width: 25%;" />/4.0<br /><br />
		           
		            <button type="submit" id="" class="btn3" name="">Save Profile</button>
				</form>
		
			</div>
		</td>
	</table>

</div>
</center>