<script>
	function addChili(a) {
		var b = "{pID}";
		$refresh = "chilirefresh"+a;
		document.getElementById($refresh).innerHTML='<img src="views/default/images/tiny_loader.gif" />';
		if(window.XMLHttpRequest) {
			xmlhttp=new XMLHttpRequest();
		}
		else {
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange=function() {
			if(xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById($refresh).innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET", "controllers/courses/addchilicontroller.php?a="+a+"&b="+b, true);
		xmlhttp.send();
	}

	function addSupport() {
		var a="{course_id}";
		var b ="{pID}";
		document.getElementById('supportCount').innerHTML='<img src="views/default/images/tiny_loader.gif" />';

		if(window.XMLHttpRequest) {
			xmlhttp=new XMLHttpRequest();
		}
		else {
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange=function() {
			if(xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById('supportCount').innerHTML=xmlhttp.responseText;
			}
		}
		
		xmlhttp.open("GET", "controllers/courses/specific/support.php?a="+a+"&b="+b, true);
		xmlhttp.send();
	}	
	
	function shareToSchool() {
		var a="{course_id}";
		var b="{p_school}";
		var c="{pID}";
		var d="{firstname} {lastname}";
		var e="{course_name}";
		var f="{course_description}";
		if(window.XMLHttpRequest) {
			xmlhttp=new XMLHttpRequest();
		}
		else {
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange=function() {
			if(xmlhttp.readyState==4 && xmlhttp.status==200) {
				if(xmlhttp.responseText=='Shared!') {
					$('#alertmessage').animate({'opacity':'1'}, 300).delay(10000).animate({'opacity':'0'}, 2000);
				}
				
			}
		}
		
		xmlhttp.open("GET", "controllers/courses/specific/sharecourse.php?a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&f="+f, true);
		xmlhttp.send();
	}
</script>

<center>
<div id="main">
	<div align="left" style="color:#196543; font-size:25px; margin-top: 20px;">{course_name}
		<span style="color: #444; margin-left:15px; font-size:17px;"><span id="chilirefresh{course_id}">{chilis}</span>&nbsp<form id="ivychili" name="form" method="post"><input id="ivychili" title="Hotness Factor: {chilis} Chilis" type="button" onclick="addChili({course_id})" ></form></span>
		<span style="margin-left: 50px;" class="engraved">&bullet;</span>
		<span style="font-size: 16px; color:#444;"><span id="supportCount">{supporters}</span> Enrollees</span>
		<span class="engraved">&bullet;</span>
		<span id="share" class="support"  onclick="shareToSchool()"><span style="vertical-align:3px;">Share with {p_school}</span></span>
		<span id="alertmessage">Shared</span>
	</div>
	<div align="left" style="margin-left: 5px; margin-bottom:20px;">Added on {when_added}</div>
	<hr style="height: 1px; width: 80%; margin-top:20px; background: #fff; border: none; margin-bottom:20px;" />
	<div align="left" style="font-size:25px;">Description</div>
	<div align="left" style="margin-left: 10px; margin-top:5px;">{course_description}</div>
	<hr style="height: 1px; width: 80%; margin-top:20px; background: #fff; border: none; margin-bottom:20px;" />
	<div align="left" style="font-size:25px;">Students Enrolled</div>
	<div align="left" style="margin-left: 10px; margin-top:5px;">{poster_name}</div>
	<hr style="height: 1px; width: 80%; margin-top:20px; background: #fff; border: none; margin-bottom:20px;" />
	<div id="plus_sign" class="support" style="text-align:center;padding-left: 15px;" onclick="addSupport()">Enroll</div>
</div>

</center>