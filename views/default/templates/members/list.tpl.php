<link rel="stylesheet" href="external/css/mycontentflow.css" type="text/css" />
<script language="JavaScript" type="text/javascript" src="external/cf/contentflow.js" load="slideshow"></script>
<script language="JavaScript" type="text/javascript" src="external/cf/ContentFlowAddOn_slideshow.js"></script>
					
	<script type="text/javascript">
		$(document).ready(function() {
			$("div.hproducts").coverflow();
		});
		
		function getChili(gint, int) {
	 		document.getElementById("chilirefresh"+int).innerHTML='<img src="views/default/images/tiny_loader.gif" />';
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
			    document.getElementById("chilirefresh"+int).innerHTML=xmlhttp.responseText;
			  }
			}
			xmlhttp.open("GET","controllers/chot/ajaxcontroller.php?a="+gint+"&b="+int,true);
			xmlhttp.send();
		}
	</script>
	<center>
<div id="mainblack">
	<div id="content" style>
	<!--<p>To use keyboard arrows, first place the mouse over the photos</p><br />-->
	<p>To pause, place mouse over photos and press space</p><br />
		<!--<h1><div id="transbar">Nexus Members {letter}</div></h1><br /><br />-->
		
	<div id="myFantasticFlow" class="ContentFlow">
            <div class="loadIndicator"><div class="indicator"></div></div>
            <div class="flow">

		<!-- START members -->
                <div class="item" href="#" target="TARGET" >
                    <img class="content" src="uploads/profile/{photo}" href="profile/view/{ID}" target="TARGET" /> 
                    	<span id="chilirefresh{ID}">{chili}</span>
       			<form id="chilimem" name="form" method="post">
				<input type="button" title="Hotness Factor: {chili} Chilis" id="chilimem" name="chili" onclick="getChili({pID}, {ID})"></input>
			</form>

                    <div class="caption">
			<p><strong><a href="profile/view/{ID}">{name}</a></strong></p>
			<p class="fontcolor">Class of <strong>{class}</strong></p>
                    </div>
                    <div class="label">{letter}</div>
                    
                </div>
		<!-- END members -->		
            </div>
	<div class="globalCaption"></div><br />
            <div class="scrollbar">
                <div class="preButton"></div>
                <div class="nextButton"></div>
                <div class="slider"><div class="position"></div></div>
            </div>
        </div>
		
		<p>
			{first} &bullet; {previous} &bullet; Page {page_number} of {num_pages} &bullet; {next} &bullet; {last}
			<br/><hr style="background: #ddd; border: none; height: 1px; width: 75%;" />
		
			<form action="members/search" method="post">
				<h4>Search for Member </h4>
				<input type="text" id="name" name="name" value="By Name" onFocus="if(this.value=='By Name') {this.value=''; this.style.color='#888';}" onBlur="if(this.value=='') {this.value='By Name'; this.style.color='#888';}" />&nbsp
				<button type="submit" id="search" name="search" value="Search"></button>
			</form>
		
			<label>Sort By Last Name &nbsp</label>
			<a href="members/letter/A/">A</a>&nbsp&nbsp
			<a href="members/letter/B/">B</a>&nbsp&nbsp
			<a href="members/letter/C/">C</a>&nbsp&nbsp
			<a href="members/letter/D/">D</a>&nbsp&nbsp
			<a href="members/letter/E/">E</a>&nbsp&nbsp
			<a href="members/letter/F/">F</a>&nbsp&nbsp
			<a href="members/letter/G/">G</a>&nbsp&nbsp
			<a href="members/letter/H/">H</a>&nbsp&nbsp
			<a href="members/letter/I/">I</a>&nbsp&nbsp
			<a href="members/letter/J/">J</a>&nbsp&nbsp
			<a href="members/letter/K/">K</a>&nbsp&nbsp
			<a href="members/letter/L/">L</a>&nbsp&nbsp
			<a href="members/letter/M/">M</a>&nbsp&nbsp
			<a href="members/letter/N/">N</a>&nbsp&nbsp
			<a href="members/letter/O/">O</a>&nbsp&nbsp
			<a href="members/letter/P/">P</a>&nbsp&nbsp
			<a href="members/letter/Q/">Q</a>&nbsp&nbsp
			<a href="members/letter/R/">R</a>&nbsp&nbsp
			<a href="members/letter/S/">S</a>&nbsp&nbsp
			<a href="members/letter/T/">T</a>&nbsp&nbsp
			<a href="members/letter/U/">U</a>&nbsp&nbsp
			<a href="members/letter/V/">V</a>&nbsp&nbsp
			<a href="members/letter/W/">W</a>&nbsp&nbsp
			<a href="members/letter/X/">X</a>&nbsp&nbsp
			<a href="members/letter/Y/">Y</a>&nbsp&nbsp
			<a href="members/letter/Z/">Z</a>
		
		</p>
		
	</center>	
          
		
		</div>
	</div>