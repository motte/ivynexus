<link rel="stylesheet" type="text/css" href="external/css/userbar_style.css" />
<div id="mainprint">
	<center>
	
	<table>
		<tr width="100%" valign="top" align="left">
			<td colspan="3">
				<div>
				<div id="content"><a href="profile/view/{p_user_id}" style="text-align:left; font-size: 55px; text-decoration: none; line-height: 0px;">{p_name}</a>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div style="font-size: 18px; line-height: 0px; padding-top: 20px; text-align:center; padding-right: 10px; letter-spacing: 1px;">
					<h4>| <a href="ivies/{p_school}">{p_school}</a> | Class of {p_class} |</h4>
				</div>
	
			</td>
		</tr>
		<tr height="12px"></tr>
		<tr>
			<td width="auto" valign="top" style="padding-top:1px; padding-right: 10px;">
				<div>
					<center><img class="shadow" src="uploads/academicportraits/{a_portrait}" /></center>
				</div>       
				<div align="center">
       					<div title="{p_chili} people think you are hot"><strong>{p_chili}</strong> &nbsp<img src="/views/default/images/chili.png" height="20px" width="40px" style="display: inline-block; margin-top:5px;" /></div>
       					<div id="clines" valign="top">&nbsp</th>
       				</div>
				
			</td>
			
			<td align="left" width="1" bgcolor="#eee"></td>
			
			<td width="300" style="padding-left: 10px; top: -100p;x" valign="top">
	       
       		<table valign="top">
		
       				
       				<tr>
                            <th align="left" valign="top" id="lines2">Born on</th>
                            <td id="lines2">{birth_month} {birth_day}, {birth_year}</td>
                    </tr>                   
       				<tr>
                            <th align="left" valign="top" id="lines2">Major</th>
                            <td id="lines2">{a_major}</td>
                    </tr>
                    <tr>
                            <th align="left" valign="top" id="lines2" width="90">Experiences</th>
                            <td id="lines2">{a_experiences}</td>
                    </tr>
                    <tr>
                            <th align="left" valign="top" id="lines2">Interests</th>
                            <td id="lines2">{a_interests}</td>
                    </tr>
                    <tr>
                            <th align="left" valign="top" id="lines2">Awards</th>
                            <td id="lines2">{a_awards}</td>
                    </tr>
                    <tr>
                            <th align="left" valign="top" id="lines2">Clubs</th>
                            <td id="lines2">{a_clubs}</td>
                    </tr>
                    <tr>
                            <th align="left" valign="top" valign="top" id="lines2">Classes</th>
                            <td id="lines2">{a_classes}</td>
                    </tr>
                    <tr>
                            <th align="left" valign="top" id="lines2">Internship</th>
                            <td id="lines2">{p_internship}</td>
                    </tr>
                    <tr>
                            <th align="left" valign="top" id="lines2">Home</th>
                            <td id="lines2">{p_home}</td>
                    </tr>
                    <tr>
                            <th align="left" valign="top" id="lines2">GPA</th>
                            <td id="lines2">{a_gpa} <i>/4.00</i><br />
                            	<span id="glines">F:{a_fgpa}</span><span id="glines">S:{a_sgpa}</span><span id="glines">J:{a_jgpa}</span><span id="glines">S:{a_segpa}</span><span id="glines">SS:{a_ssgpa}</span>
                            </td>
                    </tr>
                 
        		</table>
			</td>
			</tr>
	</table>
			
	<table>
		<tr width="600px">
			<td class="biolines" style="font-size: 16px;" width="700px"><strong>Personal Statement</strong><br />		
				<p style="font-size: 14px;line-height: 25px;">{a_autobio}</p>
			</td>
		</tr>
	</table>
	</center>
</div>