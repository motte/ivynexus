<link rel="stylesheet" href="external/css/mycontentflow.css" type="text/css" />
<script language="JavaScript" type="text/javascript" src="external/cf/contentflow.js"></script>
<script language="JavaScript" type="text/javascript" src="external/cf/ContentflowAddOn_DEFAULT.js"></script>


<script type="text/javascript">
	$(document).ready(function() {
		$("div.hproducts").coverflow();

	});	
		function getChili(gint, int) {
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
	<h2 style="color: #444; padding-bottom: 10px;">{connecting_name}'s Connections</h2>
	<div id="myFantasticFlow" class="ContentFlow">
            <div class="loadIndicator"><div class="indicator"></div></div>
            <div class="flow">
		<!-- START all -->
     
			<div class="item" href="#" target="TARGET" >
                    <img class="content" src="uploads/profile/{photo}" href="profile/view/{ID}" target="TARGET" /> 
                    <span id="chilirefresh{ID}">{chili}</span>
			<form id="chili" name="form" method="post">
				<input type="button" title="Hotness Factor: {chili} Chilis" id="chili" name="chili" onclick="getChili({pID}, {ID})"></input>
			</form>
                    <div class="caption">
			<p><strong><a href="profile/view/{ID}">{users_name}</a></strong></p>
			<p class="fontcolor">Class of <strong>{class}<br />
			{plural_name}</strong></p>
                    </div>
                    <div class="label"></div>
                    
                </div>
		<!-- END all -->
	    </div>

            <div class="globalCaption"></div><br />
            <div class="scrollbar">
                <div class="preButton"></div>
                <div class="nextButton"></div>
                <div class="slider"><div class="position"></div></div>
            </div>
        </div>
</div>
</center>