<script type="text/javascript" src="external/news.js"></script>
<script>
function checkFunction(){
	var a = "{p_id}";
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
		    document.getElementById("none").innerHTML=xmlhttp.responseText;
		            if($('#firsttime').val() =='0') {
        			$('.banner').css('display', 'block');
        			$('.bar').css('opacity', '.9');
        			}
		  }
		}
		
		xmlhttp.open("GET","controllers/check/controller.php?a="+a,true);
		xmlhttp.send();
}

$(document).ready(function(){
        checkFunction();
        setTimeout(function() {
                iniloadevents();
        }, 1500);
        
});

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

function viewed() {
	var a = "{p_id}";
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
		    
		  }
		}
		
		xmlhttp.open("GET","controllers/check/controller2.php?a="+a,true);
		xmlhttp.send();
}
</script>

<body id="mainpage">
<base href="{siteurl}" />
<br /><br />
<p>
<div class="banner" width="100%"><div class="alignment">Welcome!<br />Social Network<br />For Students By Students</div><br /><div class="helvfont">Connect, Promote, Match, in an exclusive network of students</div>
	<div class="bar"><a href="">Home</a> &nbsp&bullet;&nbsp <strong id="mainbarnumber"></strong><a href="/messages">Colloquies</a> &nbsp&bullet;&nbsp <a href="/crush">Crushes</a> &nbsp&bullet;&nbsp <a href="/academics">Portfolio</a></div>
</div>

<br />

<table align="left" width="100%">
	<div id="none"></div>
	<tr height="10px"></tr>
</table>
<center>
<br /><br /><br />
<div id="slidemain">
	<div id="gallery">
		<div id="slides">
			<div class="slide"><a href="/crush"><img src="views/default/images/announcements/current/simplifyslide.png" width="820" height="400" alt="side" /></a></div>
			<div class="slide"><a href="/crush"><img src="views/default/images/announcements/current/crushslide.png" width="820" height="400" alt="side" /></a></div>
			<div class="slide"><a href="/ivies/Dartmouth"><img src="views/default/images/announcements/current/missedslide.png" width="820" height="400" alt="side" /></a></div>
			<div class="slide"><a href="/academics/edit"><img src="views/default/images/announcements/current/jobslide.png" width="820" height="400" alt="side" /></a></div>
			<div class="slide"><a href="/security_terms.php"><img src="views/default/images/announcements/current/intelligentslide.png" width="820" height="400" alt="side" /></a></div>
			<div class="slide"><a href="/ivies/Dartmouth"><img src="views/default/images/announcements/current/ventslide.png" width="820" height="400" alt="side" /></a></div>
			
		</div>
    
    		<div id="slidemenu">
			<ul id="thumbs">
				<li class="fbar">&nbsp;</li>
				<li class="menuItem" id="slide"><a href=""><img class="thumb" src="views/default/images/cf/ellipse.png" alt="thumbnail" /></a></li>
				<li class="menuItem" id="slide"><a href=""><img class="thumb" src="views/default/images/cf/ellipse.png" alt="thumbnail" /></a></li>
				<li class="menuItem" id="slide"><a href=""><img class="thumb" src="views/default/images/cf/ellipse.png" alt="thumbnail" /></a></li>
				<li class="menuItem" id="slide"><a href=""><img class="thumb" src="views/default/images/cf/ellipse.png" alt="thumbnail" /></a></li>
				<li class="menuItem" id="slide"><a href=""><img class="thumb" src="views/default/images/cf/ellipse.png" alt="thumbnail" /></a></li>
				<li class="menuItem" id="slide"><a href=""><img class="thumb" src="views/default/images/cf/ellipse.png" alt="thumbnail" /></a></li>
				
				<!--<li class="fbar">&nbsp;</li><li class="menuItem" id="slide"><a href=""><img src="img/sample_slides/thumb_macbook.png" alt="thumbnail" /></a></li><li class="menuItem" id="slide"><a href=""><img src="img/sample_slides/thumb_iphone.png" alt="thumbnail" /></a></li><li class="menuItem" id="slide"><a href=""><img src="img/sample_slides/thumb_imac.png" alt="thumbnail" /></a></li><li class="menuItem" id="slide"><a href=""><img src="img/sample_slides/thumb_about.png" alt="thumbnail" /></a></li>-->
			</ul>
    		</div>
	</div>
</div>
</center>

<br />
	<center><table style="font-size: 14px; font-family: helvetica neue; color: #5b5b5b;">
		<tr><td><div style="text-align: left; font-size: 14px; font-family: helvetica neue; color: #5b5b5b;" ><strong>Updates</strong></div></td></tr>
		<tr><td><center><div style="text-align: left; font-weight: lighter; padding-left: 3px; padding-top: 5px;">At least 50% student participation is required for exclusive job internship notifications.
		</div></center></td></tr>
		<tr><td><div style="margin-top: 20px; font-size: 14px; font-family: helvetica neue; color: #5b5b5b;" >
		<strong>Events</strong></td></tr>
		<tr><td><center><div id="liveEvents" style="padding-top: 5px;">
			<span id="event1"><img class="sqrResize100" src="uploads/events/event1.png" /></span>&nbsp
			<span id="event2"><img class="sqrResize100" src="uploads/events/event2.png" /></span>&nbsp
			<span id="event3"><img class="sqrResize100" src="uploads/events/event3.png" /></span>&nbsp
			<span id="event4"><img class="sqrResize100" src="uploads/events/event4.png" /></span>&nbsp
			<span id="event5"><img class="sqrResize100" src="uploads/events/event5.png" /></span>&nbsp
			<span id="event6"><img class="sqrResize100" src="uploads/events/event6.png" /></span>
		</div></center></td></tr>
	</table></center>

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

	
   
</script>

<center>
<div id="main" style="margin-top: 0px;">

       
	<table class="text" min-width="680px">
		<tr height="1px">
			<th align="left"  rowspan="12" valign="top">
				<br />
				
				
			</th>
			<th rowspan="12" valign="top">
				<div id="frame"></div><img width="150px" class="shadow" src="uploads/profile/{p_photo}"></img>
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
			
			<th id="clines" align="left" width="500px"><a id="profilename">{firstname} {lastname}</a></th>
                        <td id="clines" width="30%" align="center" style="display: block;">
                        	<a href="ivies/{p_school}"><img style="float: center; position: absolute; width: 200px; margin-left: 15px;" src="views/default/images/schools/{p_school}.png" /></a>
                        </td>
		</tr>
		
				<tr>
					
					<th id="plines" align="left">RELATIONSHIP STATUS
						<div id="plines">{p_relationship} {p_gender}, Interested in {p_interest}</div>
					</th>
                    <td id="plines" valign="top" rowspan="12"><span style="color: #999; margin-top: 6px;float: left; margin-left: 110px; white-space: nowrap;">Class of {p_class}</span><br /><br />
                    	
                    		<a href="calendar" style="margin-left: 7%;" class="sidebarlinks">Events
                    			<center>
                    				<div id="liveEvents" style="padding-top: 5px;">
                    					<span id="event1"><img src="uploads/events/event4.png" class="sqrResize100" /></span>&nbsp
                    					<span id="event2"><img src="uploads/events/event5.png" class="sqrResize100" /></span>
                    					</div>
                    			</center>
                    		</a>
                    		<br /><br />
                    		
                    		<a href="courses" style="margin-left: 7%;" class="sidebarlinks">Courses
                    			<center>
                    				<div id="liveEvents" style="padding-top: 5px;">
                    					<span id="event3"><img src="uploads/events/event3.png" class="sqrResize100" /></span>&nbsp
                    					<span id="event4"><img src="uploads/events/event6.png" class="sqrResize100" /></span>
                    					</div>
                    			</center>
                    		</a>
                    		<br /><br />
                    		<a href="ideas" style="margin-left: 7%;" class="sidebarlinks">Ideas
                    			<center>
                    				<div id="liveEvents" style="padding-top: 5px;">
                    					<span id="event5"><img src="uploads/events/event2.png" class="sqrResize100" /></span>&nbsp
                    					<span id="event6"><img src="uploads/events/event1.png" class="sqrResize100" /></span>
                    					</div>
                    			</center>
                    		</a>
                    	

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

</center>
</p>