<script src="external/rfc/rfc2.js" type="text/javascript"></script>
<script>
	$(document).ready(function(){
		loadCourses(0,0);
	});

	function loadCourses(c,d) {
		$('<img src="views/default/images/tiny_loader.gif" id="temp" alt="Loading..."/>').replaceAll('button#coursecount');
		var e = '{p_school}';

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
			 	$(xmlhttp.responseText).insertAfter(document.getElementById("listCourses"));
			 	$('img#temp').remove();
				}
			}
			xmlhttp.open("GET","controllers/courses/loadcontroller.php?c="+c+"&d="+d+"&e="+e,true);
			xmlhttp.send();
	
	}
	
	function addCourse() {
		var a = "{pID}";
		var b = "{p_name}";
		var c = document.getElementById('course').value;
		var d = document.getElementById('courseno').value;
		var e = document.getElementById('description').value;
		e=e.replace(/\r\n|\r|\n/g, "<br />");
		var short = e.substr(0, 100);
//var f = '<tr height="40px" class="threadlist"><td><div id="chili">0</div></td><td>&nbsp&nbsp<a href="courses/view/'+a+'" class="threadlist">'+c+'<br />&nbsp&nbsp'+d+'</a></td><td>&nbsp&nbspYou</td><td>&nbsp Posted just now</td></tr>';

		if(window.XMLHttpRequest) {
			xmlhttp=new XMLHttpRequest();
		}
		else {
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.onreadystatechange=function() {
			if(xmlhttp.readyState==4 && xmlhttp.status==200) {
				var returned = xmlhttp.responseText;
				var redirect = "'courses/view/"+returned+"'";
				var f = '<tr height="40px" class="threadlist" valign="top"><td style="border-bottom: 1px solid #fff;" name="'+returned+'"><span id="chilirefresh'+returned+'" name="'+returned+'">0</span><br /><form id="ivychili" name="form" method="post"><input id="ivychili" title="Hotness Factor: 0 Chilis" type="button" onclick="addChili('+returned+')" /></form></td><td onclick="document.location='+redirect+'" style="border-bottom: 1px solid #fff;"><a href="courses/view/'+returned+'" class="threadlist">'+c+'<br /><span style="color:#777;font-size:12px;">'+short+'...</span></a></td><td onclick="document.location='+redirect+'" style="border-bottom: 1px solid #fff;"><a href="profile/view/'+a+'">'+b+'</a></td><td onclick="document.location='+redirect+'" style="border-bottom: 1px solid #fff;" name="'+returned+'">Posted just now</td></tr>';
				$(f).insertAfter(document.getElementById("listCourses"));
				$('#rfcWindowX').trigger('click');

//alert(xmlhttp.responseText);$(xmlhttp.responseText).insertAfter(document.getElementById("listIdeas"));
			}
		}
		xmlhttp.open("GET", "controllers/courses/addCourse.php?a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e, true);
		xmlhttp.send();
	}
	
	function addChili(a) {
		var b = "{pID}";
		$refresh = "chilirefresh"+a;
		document.getElementById($refresh).innerHTML='<img src="views/default/images/tiny_loader.gif" />';
		if(window.XMLHttpRequest) {
			xmlhttp=new XMLHttpRequest();
		}
		else {
			xmlhttp=new ActiveXObject("Microsoft.xmlhttp");
		}
		
		xmlhttp.onreadystatechange=function() {
			if(xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById($refresh).innerHTML=xmlhttp.responseText;
			}
		}
		
		xmlhttp.open("GET", "controllers/courses/addchilicontroller.php?a="+a+"&b="+b, true);
		xmlhttp.send();
	}
		
		
</script>

<center>
<div id="main">
	<p><div id="rfcbutton"><div id="plus_sign" style="width: 105px;">Add a course</div></div></p>

	<table cellpadding="10">
		<tr height="40px" id="listCourses">
			<th width="20px" bgcolor="#e7e7e7"></th>
			<th width="50%" bgcolor="#e7e7e7" align="left">Course</th>
			<th width="30%" bgcolor="#e7e7e7" align="left">Students</th>
			<th width="20%" bgcolor="#e7e7e7" align="left" onclick="">Date Added</th>
		</tr>

		<tr><button id="coursecount"></button></tr>
	</table>
	<div></div>
<p></p>

</div>
</center>

<div id="rfcWindow" align="left"style="z-index: 10000; margin-top: 20%; margin-left: 47%; background: #eee; background: -webkit-linear-gradient(top,  #e7e7e7 0%, #eee 100%); box-shadow: 0px 0px 15px #999;">

	<a id="rfcWindowX"></a>
<br />
		<div style="margin:10px"></div>
		<label style="font-size:16px; color: #555; font-family: lucida grande;">Course</label><br /><input name="course" id="course" type="text" style="width:565px; margin-top: 5px; font-size: 15px;"></input><div style="margin:10px"></div>
		<label style="font-size:16px; color: #555; font-family: lucida grande;">Course Id #</label><br /><input name="courseno" id="courseno" type="text" style="width:565px; margin-top: 5px; font-size: 15px;"></input><div style="margin:40px"></div>
		<label style="font-size:16px; color: #555; font-family: lucida grande;">Description</label><br /><textarea name="description" id="description" style="font-size:15px; margin-top: 10px; width:565px; height:160px; border: 1px solid #ccc;"></textarea><div style="margin:20px"></div>
		<center><button type="submit" class="btn3" onclick="addCourse()">Add Course</button></center>
	
</div>
<div id="backdrop" style="opacity: 0;"></div>
