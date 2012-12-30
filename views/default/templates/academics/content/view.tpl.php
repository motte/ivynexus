<center>
<div id="main">
	<div class="engraved">
		<span>This page is NOT visible to other IvyNexus members but helps you match with jobs, internships, and interviews!</span>
	</div>
		<span style="color: #bbb; font-size: 13px;">The objective is to match you with a profession you will enjoy, so be yourself.</span>
	<hr id="bar" />
	
    <!--<table class="text">-->
<table align="center">
    	<tr height="20px"></tr>
    	<!--<tr width="100%" valign="top" align="left">-->
    	<tr valign="top" align="center">
    		<td colspan="3">
    			<div>
    			<div id="content"><a href="profile/view/{p_user_id}" id="profilename">{p_name}</a>
    			&nbsp | &nbsp<a href="academics/edit">Edit</a>&nbsp | &nbsp<a href="academics/print">Print</a>&nbsp | &nbsp</div>
    		</td>
    	</tr>
    	<tr align="center">
		<td>
 			<div id="schoolclass">
    				<h4>| <a href="ivies/{p_school}">{p_school}</a> | Class of {p_class} |</h4>
    			</div>
</div>

    		</td>
	</tr>
    	<tr height="12px"></tr>
</table>

	<table class="text">

		<tr>
		
	
			<th rowspan="13"></th>
			<th rowspan="13"></th>
			
	</tr>
    	<tr>
    		<th rowspan="13" valign="top">
    			<div id="frame"></div>
    				<img class="shadow" src="uploads/academicportraits/{a_portrait}" />      	
    		</th>
    		<th width="5px" rowspan="13"></th>
    		<th rowspan="13" align="left" width="1px" bgcolor="#fff"></th>
    	</tr>
   
           		<tr>
                               <th width="5px"></th>
                                <th id="clines" title="{p_chili} people think you are hot"><strong>{p_chili}</strong> &nbsp<img src="/views/default/images/chili.png" height="20px" width="40px" style="display: inline-block; margin-bottom: -2px;" /></th>
           			<th id="clines" align="left" title="{p_totalcrushes} Crushes" >&nbsp</th>
           		</tr>
           		<tr>
                               <th width="5px"></th>
                                <th align="left" valign="top" id="lines">Born on</th>
                                <td id="lines">{birth_month} {birth_day}, {birth_year}</td>
                        </tr>
                        <tr>
                               <th width="5px"></th>
                                <th align="left" valign="top" id="lines">Major</th>
                                <td id="lines">{a_major}</td>
                        </tr>
                        <tr>
                               <th width="5px"></th>
                                <th align="left" valign="top" id="lines">Experiences</th>
                                <td id="lines">{a_experiences}</td>
                        </tr>
                        <tr>
                               <th width="5px"></th>
                                <th align="left" valign="top" id="lines">Interests</th>
                                <td id="lines">{a_interests}</td>
                        </tr>
                        <tr>
                               <th width="5px"></th>
                                <th align="left" valign="top" id="lines">Awards</th>
                                <td id="lines">{a_awards}</td>
                        </tr>
                        <tr>
                               <th width="5px"></th>
                                <th align="left" valign="top" id="lines">Clubs<div style="color: #bbb; font-size: 12px; font-weight: normal;">Most committed and enjoyable</div></th>
                                <td id="lines">{a_clubs}</td>
                        </tr>
                        <tr>
                               <th width="5px"></th>
                                <th align="left" valign="top" valign="top" id="lines">Classes<br /><div style="color: #bbb; font-size: 12px; font-weight: normal;">Most important, valuable, & interesting</div></th>
                                <td id="lines">{a_classes}</td>
                        </tr>
                        <tr>
                               <th width="5px"></th>
                                <th align="left" valign="top" id="lines">Internship</th>
                                <td id="lines">{p_internship}</td>
                        </tr>
                        <tr>
                               <th width="5px"></th>
                                <th align="left" valign="top" id="lines">Home</th>
                                <td id="lines">{p_home}</td>
                        </tr>
                        <tr>
                               <th width="5px"></th>
                                <th align="left" valign="top" id="lines">GPA<div style="color: #bbb; font-size: 12px; font-weight: normal;">They only say so much</div></th>
                                
                            <td id="lines2">{a_gpa} <i>/4.00</i><br />
                            	<span id="glines">F:{a_fgpa} S:{a_sgpa} J:{a_jgpa} S:{a_segpa} SS:{a_ssgpa}</span>
                            </td>
                        </tr>
                        
            		

    		
 		</table>
 		
 		<table>
 		<tr height="5px"></tr>
 		<tr>
 			<td width="600"><strong>Personal Statement</strong><br />
<div style="color: #bbb; font-size: 12px; margin-bottom: 5px;">Suggestions: What makes you unique?  What can you contribute?  What are your talents?  Who are you?</div>
 				<p>{a_autobio}</p>
 			</td>
 		</tr>
    </table>
		
</div>
</center>