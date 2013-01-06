<script src="external/jquery.livequery.js" type="text/javascript"></script>

<script type="text/javascript">	
    $(document).ready(function(){
    	var refreshId = setInterval(function() {
            $('#chilirefresh').load('{siteurl}/profile/view/{p_id} #chilirefresh');
        }, 10000);      
	})
	
    function getChili(int, gint) {
    	document.getElementById("chilirefresh").innerHTML='<img src="views/default/images/tiny_loader.gif" />';
 		if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			}
		else {
		  // code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		    document.getElementById("chilirefresh").innerHTML=xmlhttp.responseText;
		   
		  }
		}
		
		xmlhttp.open("GET","controllers/chot/ajaxcontroller.php?a="+int+"&b="+gint,true);
		xmlhttp.send();
	}
	
	function getCrush(int, gint) {
		c = '{profile_name}';
		d = '{firstname} {lastname}';
		
		document.getElementById("crushrefresh").innerHTML='<img src="views/default/images/tiny_loader.gif" />';
 		if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			}
		else {
		  // code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		    document.getElementById("crushrefresh").innerHTML=xmlhttp.responseText;
		   
		  }
		}
		
		xmlhttp.open("GET","controllers/crush/ajaxcontroller.php?a="+int+"&b="+gint+"&c="+c+"&d="+d,true);
		xmlhttp.send();
	}	

	/*function hoverchat() {
		var icon = $("#chat").css("background-position");
		switch(icon){
			case "right 0":
				$("#chat").animate({"background-position":"-100 -7px"},10000);
				break;
			case "left -7px":
				$("#chat").animate({"background-position":"0 0"},10000);
				break;
		}
	}*/
	
	function clickchat() {
		if(window.XMLHttpRequest) {
			xmlhttp=new XMLHttpRequest();
		}
		else {
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if(xmlhttp.readystate==4 && xmlhttp.status==200) {
				document.getElementById("").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET", "controllers/chat/controller.php",true);
		xmlhttp.send();
	}
</script>

<center>
<div id="main">
		
	        <ul>
	        	<!-- START profile_friends_sample -->
	        	&bullet; <li><img id="thumb" class="content" src="uploads/profile/thumb{photo}" href="URL" target="TARGET"  onerror="this.src='views/default/images/icons/user.png';" /> <a href="profile/view/{ID}" id="sample">{users_name}</a></li>&nbsp
	        	<!-- END profile_friends_sample -->
	        	
	        </ul>
	        <!--<h4>Rest of Profile</h4>
	        <ul>
	        	<li><a href="profile/statuses/{profile_user_id}">Status Journal</a></li>
	        </ul>&nbsp |-->

	<div style="width: 70%; border-top: 1px solid #fff; margin-top: 10px; margin-bottom: 12px;"></div>
        

	<table class="text" min-width="680px">
		<tr height="1px">
			<th align="left" width="90px" rowspan="10" valign="top">
				<br />
				<form action="controllers/chat/controller.php" method="post">
					<input name="1" type="hidden" value="{pID}"></input>
					<input name="2" type="hidden" value="{p_id}"></input>
					<input name="3" type="hidden" value="{profile_name}"></input>
					<input name="4" type="hidden" value="{firstname} {lastname}"></input>
					<input id="chat" name="Message" onclick="clickchat" type="submit" value=""></input>
				</form>
				
			</th>
			<th rowspan="9" valign="top"><div id="frame"></div><img class="shadow" src="uploads/profile/{profile_photo}"></img><div style="padding-top: 10px"></div><strong id="chilirefresh">{p_chili}</strong>
           			<form id="profilechili" name="form" method="post">
					<input id="profilechili" title="Hotness Factor: {p_chili} Chilis" type="button" onclick="getChili({pID}, {p_id})" style="opacity:1;" /> 
				</form><span style="padding-left: 40px;"></span>
				<strong id="crushrefresh">{p_totalcrushes}</strong>
           			<form id="profilecrush" name="form" method="post">
					<input id="profilecrush" title="{p_totalcrushes} Crushes" type="button" onclick="getCrush({pID}, {p_id})" /> 
				</form>
			</th>
			<th width="5px" rowspan="9"></th>
			<th rowspan="9" align="left" width="1px" bgcolor="#fff"></th>

		</tr>
                <tr>
			<th width="5px"></th>
			<th id="clines" align="left"><a href="profile/view/{profile_user_id}" id="profilename">{profile_name}</a><div style="font-size: 13px;"> <a href="ivies/{p_school}">{p_school}</a> <span style="font-size: 12px;">&bull;</span> {p_class} </div></th>
                        <td id="clines"></td>
		</tr>
		
		
		<tr>
			<th width="5px"></th>
			<th id="lines" align="left">Gender</th>
                        <td id="lines">{p_gender}</td>
		</tr>
		
		<tr>
			<th width="5px"></th>
			<th id="lines" align="left">Relationship Status</th>
                        <td id="lines">{p_relationship}</td>
                </tr>
                
                <tr>
                	<th width="5px"></th>
                	<th id="lines" align="left">Interested In</th>
                        <td id="lines">{p_interest}</td>
                </tr>
                        
                <tr>
                	<th width="5px"></th>
                        <th id="lines" align="left">Internship</th>
                        <td id="lines">{p_internship}</td>
                </tr>
                
                <tr>
                	<th width="5px"></th>
                        <th id="lines" align="left">Home</th>
                        <td id="lines">{p_home}</td>
                </tr>
                        
                <tr>
                	<th width="5px"></th>
                        <th id="lines" align="left">Born On</th>
                        <td id="lines">{p_birth_month} {p_birth_day}</td>
                </tr>
                        
                <tr>
                	<th width="5px"></th>
                        <th id="lines" align="left">Residence Hall</th>
                        <td id="lines">{p_hall}</td>
		</tr>
		
	</table>
	
    	
 	<table>
 		<tr height="5px"></tr>
 		<tr>
 			
 			<td class="biolines" width="560" style="line-height: 150%;">
 				<div id="lines">Know This</div>
<div style="color: #bbb; font-size: 12px; margin-top: -5px; margin-bottom: 5px;">About Me, What I've Been Up To, What I am doing, What I plan to do</div>
 				<span >{p_bio}</span>
 			</td>
 		</tr>
    </table><br />
    
    {form_relationship}

</div>
</center>