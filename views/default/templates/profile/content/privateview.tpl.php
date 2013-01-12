<script src="external/jquery.livequery.js" type="text/javascript"></script>

<script type="text/javascript">	
    $(document).ready(function(){
    	var refreshId = setInterval(function() {
            $('#chilirefresh').load('{siteurl}/profile/view/{p_id} #chilirefresh');
        }, 10000);      
        setTimeout(function() {
                iniloadevents();
        }, 1500);
	})

function iniloadevents() {
        var a = '{pID}';
        var b = '{p_school}'.toLowerCase();
        if(b == 'welcome') {
	        b = 'dartmouth';
        }
        $("#liveEvents").animate({'opacity':'0'}, 1000);
        
        setTimeout(function() {
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
				document.getElementById('liveEvents').innerHTML=xmlhttp.responseText;	
				$("#liveEvents").animate({'opacity':'1'}, 1800);
			  }
			}
			xmlhttp.open("GET","controllers/event/event_load/alleveloadcontroller.php?a="+a+"&b="+b,true);
			xmlhttp.send();
		}, 1000)
}

setInterval(function() {
		loadevent(5);
}, 10000);

setInterval(function() {
		loadevent(2);
}, 13000);

setInterval(function() {
		loadevent(4);
}, 16000);
setInterval(function() {
		loadevent(1);
}, 19000);

setInterval(function() {
		loadevent(6);
}, 22000);

setInterval(function() {
		loadevent(3);
}, 25000);

function loadevent(a) {
		var b = '{pID}';
        var c = '{p_school}'.toLowerCase();
        if(c == 'welcome') {
	        c = 'dartmouth';
        }
        
        var eventId = 'span#event'+a;
        var e = 'event'+a;
        $(eventId).animate({'opacity':'0'}, 1000);
        setTimeout(function() {
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
				document.getElementById(e).innerHTML=xmlhttp.responseText;	
				$(eventId).animate({'opacity':'1'}, 1800);
			  }
			}
			xmlhttp.open("GET","controllers/event/event_load/singeveloadcontroller.php?a="+a+"&b="+b+"&c="+c,true);
			xmlhttp.send();
		}, 1000)
}

	
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
	
	function removeCrush(a,b,c){
		
		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		}
		else {
			xmlhttp = ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if(xmlhttp.readyState==4 && xmlhttp.status == 200) {

				if(xmlhttp.responseText=='moo'){

					$("div."+c).replaceWith('<div class="'+c+'"><em style="color: #ddd;">nobody</em></div>');
				}
			}
		}
		xmlhttp.open("GET", "controllers/crush/crushpage.php?a="+a+"&b="+b,true);
		xmlhttp.send();
	}

</script>

<center>
<div id="main">

        | &nbsp<h4>Friends</h4>
		
	        <ul>
	        	<!-- START profile_friends_sample -->
	        	&bullet; <li><img id="thumb" class="content" src="uploads/profile/thumb{photo}" href="URL" target="TARGET"  onerror="this.src='views/default/images/icons/user.png';" /> <a href="profile/view/{ID}" id="sample">{users_name}</a></li>&nbsp
	        	<!-- END profile_friends_sample -->
	        	&nbsp|<li><a href="relationships/all/{profile_user_id}" id="sample">More</a></li>
	        	|<li><a href="relationships/pending" id="sample">Pending</a></li>&nbsp|
	        </ul>
	        <!--<h4>Rest of Profile</h4>
	        <ul>
	        	<li><a href="profile/statuses/{profile_user_id}">Status Journal</a></li>
	        </ul>&nbsp |-->

	<div style="width: 70%; border-top: 1px solid #fff; margin-top: 10px; margin-bottom: 12px;"></div>

       
	<table class="text" min-width="680px">
		<tr height="1px">
			<th align="left"  rowspan="12" valign="top">
				<br />
				
				
			</th>
			<th rowspan="12" valign="top">
				<div id="frame"></div><img width="150px" class="shadow" src="uploads/profile/{profile_photo}"></img>
				<div style="padding-top: 10px"></div>
				<strong id="chilirefresh">{p_chili}</strong>
           		<form id="profilechili" name="form" method="post">
					<input id="profilechili" title="Hotness Factor: {p_chili} Chilis" type="button" onclick="getChili({pID}, {p_id})" style="opacity:1;" /> 
				</form>
				<span style="padding-left: 40px;"></span>
				<strong id="crushrefresh">{p_totalcrushes}</strong>
           		<form id="profilecrush" name="form" method="post">
					<input id="profilecrush" title="{p_totalcrushes} Crushes" type="button" onclick="getCrush({pID}, {p_id})" /> 
				</form><br />
				&nbsp &nbsp<div class="1">{crush1}</div>
				&nbsp &nbsp<div class="2">{crush2}</div>
				&nbsp &nbsp<div class="3">{crush3}</div>
			</th>
			<th width="5px" rowspan="12"></th>
			<th rowspan="12" align="left" width="1px" bgcolor="#fff"></th>

		</tr>
        <tr>
			
			<th id="clines" align="left" width="500px"><a href="profile/view/{profile_user_id}" id="profilename">{profile_name}</a></th>
                        <td id="clines" width="30%" align="left" style="display: block;">
                        	<a href="ivies/{p_school}"><img style="float: center; position: absolute; width: 200px; margin-left: 15px;" src="views/default/images/schools/{p_school}.png" /></a>
                        </td>
		</tr>
		
				<tr>
					
					<th id="plines" align="left">RELATIONSHIP STATUS
						<div id="plines">{p_relationship} {p_gender}, Interested in {p_interest}</div>
					</th>
                    <td id="plines" valign="top" rowspan="12"><span style="color: #999; margin-top: 6px;float: left; margin-left: 110px; white-space: nowrap">Class of {p_class}</span><br /><br />
                    	<center><div id="liveEvents" style="padding-top: 5px;">
							<span id="event1"><img src="uploads/events/event1.png" class="sqrResize100" /></span>&nbsp
							<span id="event2"><img src="uploads/events/event2.png" class="sqrResize100" /></span>&nbsp
							<span id="event3"><img src="uploads/events/event3.png" class="sqrResize100" /></span>&nbsp
							<span id="event4"><img src="uploads/events/event4.png" class="sqrResize100" /></span>&nbsp
							<span id="event5"><img src="uploads/events/event5.png" class="sqrResize100" /></span>&nbsp
							<span id="event6" style="padding-right: 3px;"><img class="sqrResize100" src="uploads/events/event6.png" /></span>
						</div></center>

                    </td>
                </tr>
                        
                <tr>
                	
                        <th id="plines" align="left">CONTACT INFORMATION
                        	
                        	<div id="splines" style="padding-left: 50px; ">Home:&nbsp&nbsp&nbsp{p_home}</div>
                        	<div id="splines" style="padding-left: 0px; ">Residence Hall:&nbsp&nbsp&nbsp{p_hall}</div>
                        	
                        </th>
                        <td id="plines"></td>
                </tr>
                
                <tr>
                	
                        <th id="plines" align="left">EDUCATION
                        	<div id="plines" style="padding-left: 47px;">School:&nbsp&nbsp&nbsp{p_school}, Class of {p_class}</div>
                        	<div id="splines" style="padding-left: 21px; ">Graduation:&nbsp&nbsp&nbsp{p_graduation}</div>
	                        <div id="splines" style="padding-left: 52px; ">Major:&nbsp&nbsp&nbsp<p style="display: inline-block; margin: 0px;">{p_major}</p></div>
	                        
	                        <div id="splines" style="padding-left: 39px; ">Courses:&nbsp&nbsp&nbsp{p_classes}</div>
	                    </th>
                        <td id="plines"></td>
                </tr>
                        
                <tr>
                	
                        <th id="plines" align="left">PROFESSIONAL EXPERIENCE
	                        <div id="plines" style="padding-left: 31px; ">Company:&nbsp&nbsp&nbsp<p style="display: inline-block; margin: 0px;"><strong>{p_company1}</strong>, {p_companylocation1}</p></div>
	                        <div id="splines" style="padding-left: 39px; ">Position:&nbsp&nbsp&nbsp<p style="display: inline-block; margin: 0px;"><em>{p_internship1}</em></p></div>
	                        <div id="splines" style="padding-left:20px;">Description:&nbsp&nbsp&nbsp<p style="display: inline-block; margin: 0px;">{p_internshipdescription1}</p></div>
	                        <br />
	                        <div id="splines" style="padding-left: 31px; ">Company:&nbsp&nbsp&nbsp<p style="display: inline-block; margin: 0px;"><strong>{p_company2}</strong>, {p_companylocation2}</p></div>
	                        <div id="splines" style="padding-left: 39px; ">Position:&nbsp&nbsp&nbsp<p style="display: inline-block; margin: 0px;"><em>{p_internship2}</em></p></div>
	                        <div id="splines" style="padding-left:20px;">Description:&nbsp&nbsp&nbsp<p style="display: inline-block; margin: 0px;">{p_internshipdescription2}</p></div>
	                        <br />
	                        <div id="splines" style="padding-left: 31px; ">Company:&nbsp&nbsp&nbsp<p style="display: inline-block; margin: 0px;"><strong>{p_company3}</strong>, {p_companylocation3}</p></div>
	                        <div id="splines" style="padding-left: 39px; ">Position:&nbsp&nbsp&nbsp<p style="display: inline-block; margin: 0px;"><em>{p_internship3}</em></p></div>
	                        <div id="splines" style="padding-left:20px;">Description:&nbsp&nbsp&nbsp<p style="display: inline-block; margin: 0px;">{p_internshipdescription3}</p></div>
	                        
	                        
                        </th>
                        <td id="plines"></td>
                </tr>

                </tr>
                
                        
                <tr>
                	
                        <th id="plines" align="left">Clubs
                        	<div id="plines">{p_clubs}</div>
                        </th>
                        <td id="plines"></td>
                </tr>
                        
		
	</table>
	
    	
 	<table>
 		<tr height="5px"></tr>
 		<tr>
 			
 			<td class="biolines" width="100%" style="line-height: 150%;">
 				<div id="lines">Know This</div>
<div style="color: #bbb; font-size: 12px; margin-top: -5px; margin-bottom: 5px;">About Me, What I've Been Up To, What I am doing, What I plan to do</div>
 				<span >{p_bio}</span>
 			</td>
 		</tr>
 	</table>	
</div>


<div id="main" style="margin-top: 15px;">
<center style="color: #ccc; font-size: 12px;">Employers only see below the line</center><hr style="width: 70%;border-top: 1px solid #eee; background: none; border-bottom: none; border-left: none;" />
 	<table>
		<tr>
			<th rowspan="12" valign="top"><div id="frame" style="padding-top: 10px;"></div><img class="shadow" src="uploads/academicportraits/{p_portrait}"></img>
           		
			</th>
			<th width="5px" rowspan="12"></th>
			

		</tr>	
 		<tr>
 		
			<th align="left"  rowspan="12" valign="top">
			<th id="clines" align="left"><a href="profile/view/{profile_user_id}" id="profilename">{profile_name}</a></th>
			
                        
		</tr>
 		
 		<tr>
                	
                        <th id="plines" align="left" style="border-right: none;">CONTACT INFORMATION
                        	<div id="plines" style="padding-left: 22px; ">Address:&nbsp&nbsp&nbsp{p_home}</div>
                        	<div id="splines" style="padding-left: 35px; ">Home:&nbsp&nbsp&nbsp{p_homephone}</div>
                        	<div id="splines" style="padding-left: 48px; ">Cell:&nbsp&nbsp&nbsp{p_cell}</div>
                        	<div id="splines" style="padding-left: 39px; ">Email:&nbsp&nbsp&nbsp{pEmail}</div>
                        </th>
                        
                </tr>
                
                <tr>
                	
                        <th id="plines" align="left" style="border-right: none;">EDUCATION
                        	<div id="plines" style="padding-left: 32px;">School:&nbsp&nbsp&nbsp{p_school}, Class of {p_class}</div>
                        	<div id="splines" style="padding-left: 6px; ">Graduation:&nbsp&nbsp&nbsp{p_graduation}</div>
	                        <div id="splines" style="padding-left: 37px; ">Major:&nbsp&nbsp&nbsp{p_major}</div>
	                        <div id="splines" style="padding-left: 47px; ">GPA:&nbsp&nbsp&nbsp{p_gpa}</div>
	                        <div id="splines" style="padding-left: 24px; ">Courses:&nbsp&nbsp&nbsp{p_classes}</div>
	                    </th>
                        
                </tr>
                        
                <tr>
                	
                        <th id="plines" align="left" style="border-right: none;">PROFESSIONAL EXPERIENCE
	                        <div id="plines" style="padding-left: 16px; ">Company:&nbsp&nbsp&nbsp<strong>{p_company1}</strong>, {p_companylocation1}</div>
	                        <div id="splines" style="padding-left: 24px; ">Position:&nbsp&nbsp&nbsp<p style="display: inline-block; margin: 0px;"<em>{p_internship1}</em></p></div>
	                        <div id="splines" style="padding-left:5px;">Description:&nbsp&nbsp&nbsp<p style="display: inline-block; margin: 0px;">{p_internshipdescription1}</p></div>
	                        <br />
	                        <div id="splines" style="padding-left: 16px; ">Company:&nbsp&nbsp&nbsp<strong>{p_company2}</strong>, {p_companylocation2}</div>
	                        <div id="splines" style="padding-left: 24px; ">Position:&nbsp&nbsp&nbsp<p style="display: inline-block; margin: 0px;"<em>{p_internship2}</em></p></div>
	                        <div id="splines" style="padding-left:5px;">Description:&nbsp&nbsp&nbsp<p style="display: inline-block; margin: 0px;">{p_internshipdescription2}</p></div>
	                        <br />
	                        <div id="splines" style="padding-left: 16px; ">Company:&nbsp&nbsp&nbsp<strong>{p_company3}</strong>, {p_companylocation3}</div>
	                        <div id="splines" style="padding-left: 24px; ">Position:&nbsp&nbsp&nbsp<p style="display: inline-block; margin: 0px;"<em>{p_internship3}</em></p></div>
	                        <div id="splines" style="padding-left:5px;">Description:&nbsp&nbsp&nbsp<p style="display: inline-block; margin: 0px;">{p_internshipdescription3}</p></div>
	                        
	                        
                        </th>
                        
                </tr>
                        
                <tr>
                	
                        <th id="plines" align="left" style="border-right: none;">SKILLS
	                        <div id="plines">{p_autobio}</div>
                        </th>
                        
                </tr>
                
                
                
                
                
                </tr>
                
                <tr>
                	
                	<th id="plines" align="left" style="border-right: none;">Awards & Leadership
	                	<div id="plines">{p_awards}</div>
                	</th>
                        
                </tr>
                        
                <tr>
                	
                        <th id="plines" align="left" style="border-right: none;">Clubs
                        	<div id="plines">{p_clubs}</div>
                        </th>
                        
                </tr>
    </table><br />
    
    {form_relationship}

</div>
</center>