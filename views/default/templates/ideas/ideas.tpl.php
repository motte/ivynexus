<script src="external/rfc/rfc2.js" type="text/javascript"></script>
<script>
	$(document).ready(function(){
		loadIdeas(0,0);
	});

	function loadIdeas(c,d) {
		$('<img src="views/default/images/tiny_loader.gif" id="temp" alt="Loading..."/>').replaceAll('button#ideacount');

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
			 	$(xmlhttp.responseText).insertAfter(document.getElementById("listIdeas"));
			 	$('img#temp').remove();
				}
			}
			xmlhttp.open("GET","controllers/ideas/loadcontroller.php?c="+c+"&d="+d,true);
			xmlhttp.send();
	
	}
	
	function addIdea() {
		var a = "{pID}";
		var b = "{p_name}";
		var c = document.getElementById('idea').value;
		var d = document.getElementById('details').value;
var e = '<tr height="40px" class="threadlist"><td><div id="chili">0</div></td><td>&nbsp&nbsp<a href="ideas/view/'+a+'" class="threadlist">'+c+'<br />&nbsp&nbsp'+d+'</a></td><td>&nbsp&nbspYou</td><td>&nbsp Posted just now</td></tr>';

		if(window.XMLHttpRequest) {
			xmlhttp=new XMLHttpRequest();
		}
		else {
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.onreadystatechange=function() {
			if(xmlhttp.readyState==4 && xmlhttp.status==200) {
				//var returned = xmlhttp.responseText;
				//returned = 
				$(e).insertAfter(document.getElementById("listIdeas"));
				$('#rfcWindowX').trigger('click');

//alert(xmlhttp.responseText);$(xmlhttp.responseText).insertAfter(document.getElementById("listIdeas"));
			}
		}
		xmlhttp.open("GET", "controllers/ideas/addIdea.php?a="+a+"&b="+b+"&c="+c+"&d="+d, true);
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
		
		xmlhttp.open("GET", "controllers/ideas/addchilicontroller.php?a="+a+"&b="+b, true);
		xmlhttp.send();
	}
		
		
</script>

<center>
<div id="main">
	<p><div id="rfcbutton"><div id="plus_sign">Add an idea to share</div></div></p>

	<table cellpadding="10">
		<tr height="40px" id="listIdeas">
			<th width="20px" bgcolor="#e7e7e7"></th>
			<th width="50%" bgcolor="#e7e7e7" align="left">Idea</th>
			<th width="30%" bgcolor="#e7e7e7" align="left">Participants</th>
			<th width="20%" bgcolor="#e7e7e7" align="left" onclick="">Date Shared</th>
		</tr>

		<tr><button id="ideacount"></button></tr>
	</table>
	<div></div>
<p></p>

</div>
</center>

<div id="rfcWindow" style="margin-top: 20%; margin-left: 47%; background: #f3fc9a; background: -webkit-linear-gradient(top,  #FBFFD8 0%, #f3fc9a 100%);">
<!--<div id="rfcWindow" style="margin-top: 20%; margin-left: 47%; background: #f3fc9a; background: -webkit-linear-gradient(top,  #FBFFD8 0%, #f3fc9a 100%); background: -o-linear-gradient(top,  #309C27 0%, #4AB240 50%, #4AB240 50%, #309C27 100%); background: -ms-linear-gradient(top,  #309C27 0%, #4AB240 50%, #4AB240 50%, #309C27 100%); background: linear-gradient(top,  #309C27 0%, #4AB240 50%, #4AB240 50%, #309C27 100%); box-shadow: 1px 1px 15px #777;">-->
	<a id="rfcWindowX"></a>
<br />
	
		<label style="font-size:20px;">Idea</label><br /><input name="idea" id="idea" type="text" style="width:565px; font-size: 20px;"></input><div style="margin:40px"></div>
		<label style="font-size:20px;">Details</label><br /><textarea name="details" id="details" style="font-size:20px; width:565px; height:215px"></textarea><div style="margin:30px"></div>
		<center><button type="submit" class="btn3" onclick="addIdea()">Share Idea</button></center>
	
</div>
<div id="backdrop" style="opacity: 0;"></div>
