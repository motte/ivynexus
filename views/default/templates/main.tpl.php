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
});

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
			<div class="slide"><a href="/crush"><img src="views/default/images/announcements/current/crushslide.png" width="820" height="400" alt="side" /></a></div>
			<div class="slide"><a href="/ivies/Dartmouth"><img src="views/default/images/announcements/current/connectionslide.png" width="820" height="400" alt="side" /></a></div>
			<div class="slide"><a href="/academics/edit"><img src="views/default/images/announcements/current/jobslide.png" width="820" height="400" alt="side" /></a></div>
			<div class="slide"><a href="/security_terms.php"><img src="views/default/images/announcements/current/securityslide.png" width="820" height="400" alt="side" /></a></div>
			<div class="slide"><a href="/ivies/Dartmouth"><img src="views/default/images/announcements/current/eventslide.png" width="820" height="400" alt="side" /></a></div>
			
		</div>
    
    		<div id="slidemenu">
			<ul id="thumbs">
				<li class="fbar">&nbsp;</li>
				<li class="menuItem" id="slide"><a href=""><img class="thumb" src="views/default/images/announcements/crushthumb.png" alt="thumbnail" /></a></li>
				<li class="menuItem" id="slide"><a href=""><img class="thumb" src="views/default/images/announcements/missthumb.png" alt="thumbnail" /></a></li>
				<li class="menuItem" id="slide"><a href=""><img class="thumb" src="views/default/images/announcements/ivythumb.png" alt="thumbnail" /></a></li>
				<li class="menuItem" id="slide"><a href=""><img class="thumb" src="views/default/images/announcements/securitythumb.png" alt="thumbnail" /></a></li>
				<li class="menuItem" id="slide"><a href=""><img class="thumb" src="views/default/images/announcements/eventsthumb.png" alt="thumbnail" /></a></li>
				
				<!--<li class="fbar">&nbsp;</li><li class="menuItem" id="slide"><a href=""><img src="img/sample_slides/thumb_macbook.png" alt="thumbnail" /></a></li><li class="menuItem" id="slide"><a href=""><img src="img/sample_slides/thumb_iphone.png" alt="thumbnail" /></a></li><li class="menuItem" id="slide"><a href=""><img src="img/sample_slides/thumb_imac.png" alt="thumbnail" /></a></li><li class="menuItem" id="slide"><a href=""><img src="img/sample_slides/thumb_about.png" alt="thumbnail" /></a></li>-->
			</ul>
    		</div>
	</div>
</div>
<br />
<table width="100%" align="left">	
	<tr class="helvfontbig" align="left" valign="top">
		<td id="halfwidth" width="65%">
			Updates
		</td>

		<td id="halfwidth" width="35%">
			Events
		</td>
	</tr>
	<tr align="center" valign="top" >
		<td id="halfwidth" width="65%" align="left">
			<p class="padding"id="shadebg">At least 50% student participation is required for exclusive job and internship notifications.</p>
			<!--<div id="featureslist">
			   <ol>
			      <div class="expand" id="expand1"><li value="6"><p><a href="profile"><em style="" id="6">School Vent</em><img src="views/default/images/profilebutton.png" class="moo"></img> &nbsp post messages, photos, videos...anonymously</a></p></li></div>
			      <div class="expand" id="expand2"><li value="5"><p><a href="profile"><em style="" id="5">Promote</em><img src="views/default/images/academicbutton.png" class="moo"> &nbsp your school specific events in one place</a></p></li></div>
			      <div class="expand" id="expand3"><li value="4"><p><a href="profile"><em style="" id="4">Connect</em><img src="views/default/images/profilebutton.png" class="moo"> &nbsp with friends and meet new students</a></p></li></div>
			      <div class="expand" id="expand4"><li value="3"><p><a href="profile"><em style="" id="3">Crush</em><img src="views/default/images/profilebutton.png" class="moo"> &nbsp see if he/she likes you too</a></p></li></div>
			      <div class="expand" id="expand5"><li value="2"><p><a href="profile"><em style="" id="2">Recall</em><img src="views/default/images/profilebutton.png" class="moo"> &nbsp for those nights you forget everything.<br /> &nbsp Try typing a letter in search to find that person.</a></p></li></div>
			      <div class="expand" id="expand6"><li value="1"><p><a href="academics"><em style="" id="1">Match</em><img src="views/default/images/profilebutton.png" class="moo"> &nbsp fill out your information and our algorithm will <br /> &nbsp match you with exclusive internships and jobs.</a></p></li></div>
			   </ol>
			</div>-->
		</td>

		<td id="halfwidth" width="35%" align="left">
			<p class="padding" id="shadebg">This site is in beta</p>
			<!--<div><img src="views/default/images/profilebutton.png" class="moo"></img></div>
			<div id="5"></div>
			<div id="4"></div>
			<div id="3"></div>
			<div id="2"></div>
			<div id="1"></div>-->
		</td>
	</tr>
</table>
</center>
</p>