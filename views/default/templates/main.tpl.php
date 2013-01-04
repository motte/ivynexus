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
        }, 1000);
        
});

function iniloadevents() {
        var a = '{pID}';
        var b = '{p_school}'.toLowerCase();
        if(b == 'Welcome') {
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
        if(c == 'Welcome') {
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

</p>