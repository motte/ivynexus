<script>
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

					$("div."+c).replaceWith('<div id="crushlabel" class="'+c+'"><em style="color: #ddd;">nobody</em></div>');
				}
			}
		}
		xmlhttp.open("GET", "controllers/crush/crushpage.php?a="+a+"&b="+b,true);
		xmlhttp.send();
	}
</script>

<body>
<center>
<div id="main">
	<br />
	<div id="backredenvelope"></div>
	<p>Remember, you can only have three crushes at one time.</p>
	<p>You can change your crushes three times per day.</p>
	<p>If a mutual crush occurs, you and your crush will be notified!</p>
	<p>If you change your mind, click your crush's <span id="crushicon"></span> &nbsp&nbsp&nbsp&nbsp&nbsp heart again in his/her profile.</p>
	<hr width="75%" style="margin-top: 20px; margin-bottom: 25px; border: solid 1px #fff;" />
			<table>
			<tr>
				<td width="150px"><label id="heart" align="left">Crush #1 </label></td>
				<td id="crushlabel">&nbsp &nbsp<div id="crushlabel" class="1">{crush1}</div></td>
			</tr>
			<tr height="10px"></tr>
			<tr>
				<td width="150px"><label id="heart">Crush #2 </label></td>
				<td id="crushlabel">&nbsp &nbsp<div id="crushlabel" class="2">{crush2}</div></td>
			</tr>
			<tr height="10px"></tr>
			<tr>
				<td width="150px"><label id="heart">Crush #3 </label></td>
				<td id="crushlabel">&nbsp &nbsp<div id="crushlabel" class="3">{crush3}</div></td>	
			</tr>
			<tr height="15px"></tr>
			</table>
<!--<input type="text" class="extra" id="crushfield" value="{crush1}" /><br />-->
</div>
</center>
</body>