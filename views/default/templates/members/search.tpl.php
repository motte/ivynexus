<link rel="stylesheet" href="external/css/mycontentflow.css" type="text/css" />
<script language="JavaScript" type="text/javascript" src="external/cf/contentflow.js"></script>
<script language="JavaScript" type="text/javascript" src="external/cf/ContentflowAddOn_DEFAULT.js"></script>
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
<div id="main">

    <!--<h1>IvyNexus Members List</h1>-->
    <p>Search results for "{public_name}"</p><br />
 
        <div id="myFantasticFlow" class="ContentFlow">
            <div class="loadIndicator"><div class="indicator"></div></div>
            <div class="flow">
		<!-- START members -->
  
                <div class="item" href="#" target="TARGET" >
                    <img class="content" src="uploads/profile/{photo}" href="profile/view/{ID}" target="TARGET" /><br />
                    <span id="chilirefresh{ID}">{chili}</span>
			<form id="chilimem" name="form" method="post">
				<input type="button" title="Hotness Factor: {chili} Chilis" id="chilimem" name="chili" onclick="getChili({pID}, {ID})" />
			</form>
                    <div class="caption">
			<p><strong><a href="profile/view/{ID}">{name}</a></strong></p>
			<p class="fontcolor">Class of <strong>{class}</strong></p>
			<p><strong>&nbsp&nbsp{internship}</strong></p>
			<p><strong>&nbsp&nbsp{school}</strong></p>
                    </div>
                    
                </div>
		<!-- END members -->		
            </div>

            <div class="globalCaption"></div><br /><br />
            <div class="scrollbar">
                <div class="preButton"></div>
                <div class="nextButton"></div>
                <!--<div class="slider"><div class="position"></div></div>-->
            </div>
        </div>
        <td>

	
	<p>{first} &bullet; {previous} &bullet; Viewing page {page_number} of {num_pages} &bullet; {next} &bullet; {last}</p>

        <form action="members/search" method="post"><br />
            <h4>&nbsp Search for Another Member?</h4>
            <div style="padding-left:20px;">
            <input type="text" id="name" name="name" value="By Name" onFocus="if(this.value=='By Name') {this.value=''; this.style.color='#888';}" onBlur="if(this.value=='') {this.value='By Name'; this.style.color='#888';}" size="37" />&nbsp
            <button type="submit" id="search" name="search" value="Search"></button>
            
            </div>
        </form>	
</div>
</center>