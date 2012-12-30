<head>
	<title>IvyNexus - The Social Network For Students By Students</title>
	<meta name="viewport" content="width=600;">
	<script type="text/javascript" src="external/jquery-1.7.2.min.js"></script><!-- need this and this script order -->
	<script src="external/jquery.tabSlideOut.v1.3.js"></script>
	<!--Entypo pictograms by Daniel Bruce — www.entypo.com-->
	<link rel="stylesheet" type="text/css" href="external/css/userbar_style.css" />
	<link rel="stylesheet" type="text/css" href="external/css/userbar.css" />
	<script>
	 $(function(){
	 	$('.slide-out-div').css('opacity', '1');

	        $('.slide-out-div').tabSlideOut({
	            tabHandle: '.contacttab',                     
	            pathToTabImage: 'views/default/images/contact.png', 
	            imageHeight: '120px',                     
	            imageWidth: '40px',                       
	            tabLocation: 'left',                      
	            speed: 150,                               
	            action: 'click',                          
	            topPos: '130px',                          
	            leftPos: '20px',                          
	            fixedPosition: true                      
	        });
	
	    });
    		setTimeout(function () {
    			check({pID});
  		}, 3000);
		setInterval(function() {
			check({pID});
		}, 60000);

                function check(a) {
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
			 	var res = xmlhttp.responseText;
			 	switch (res){
			 		case "":
			 			$('#barnumber').css('display','none');
			 			break;
			 		case "0":
			 			$('#barnumber').css('display','none');
			 			break;
			 		default:
			 			$('#barnumber').css('display','inline');
			 			document.getElementById("barnumber").innerHTML=res;
			 			break;
			 	}	
			 	
			  }
			}
			xmlhttp.open("GET","controllers/check/mailcontroller.php?a="+a,true);
			xmlhttp.send();
                }
                
                function dropdown() {
                	var click = $('#dropped').css('opacity');
                	switch(click){
	                	case '0':
	                		$('#dropped').animate({'opacity':'1'},500);
	                		break;
	                	case '1':
	                		$('#dropped').animate({'opacity':'0'},500);
	                		break;
                	}
                }

                function hoverdropdown(a) {
 	                $('.shadebg').css({'background':'none', 'opacity':'1'});
 	                $('#parent').css({'opacity':'0','display':'none'});

 	                var specific = '#this'.concat(a);
 	                $('.fieldheight').css({'box-shadow':'none', '-webkit-box-shadow':'none', '-moz-box-shadow':'none', 'border-bottom':'none'});
 	                $(specific).css({'background':'#4AAF43', 'opacity':'.75'});               	
	                $('#parent').css({'opacity':'.9','display':'block'});
                	
                }
 	        function hoverdropup() {

 	                $('.fieldheight').css({'box-shadow':'1px 0px 5px 1px #777', '-webkit-box-shadow':'1px 0px 5px 1px #777', '-moz-box-shadow':'1px 0px 5px 1px #777', 'border-bottom':'1px solid #A9ACAB'}); 
 	                $('#parent').css({'opacity':'0','display':'none'});
 	                $('.shadebg').css({'background':'none', 'opacity':'1'});
 	        }
             	        
	</script>
	
	
    <style type="text/css">
      .slide-out-div {
      	z-index: 1000;
          padding: 20px;
          width: 220px;
          background: #eee;
          border: 1px solid #ccc;
          height: 80px;
          opacity: 0;
      }      
      </style>

</head>
<base href="{siteurl}" />
<body>
<a href="" class="logo"></a>
<div class="fieldheight">
	<div class="ubar">
<table top="50px" align="right">
<tr valign="top">
<td class="shadebg" id="this1" onclick="location.href='http://www.ivynexus.com/profile/personal'" onmouseover="hoverdropdown(1)">&nbsp
		<a href="profile/personal" title="Your Profile" class="profile"><img id="thumb" src="uploads/profile/thumb{pPhoto}" onerror="this.src='views/default/images/icons/user.png';"></img><span style="padding-left: 1px;"></span> {firstname} {lastname}</a>&nbsp
</td>
<td style="border-right: 1px solid #ddd; height: 30px;"></td>
<td class="shadebg" id="this2" onclick="location.href='http://www.ivynexus.com/ivies/{p_school}'" onmouseover="hoverdropdown(2)">&nbsp
		<a href="ivies/{p_school}" title="School Vent"><img class="opaquethumb" style="height: 14px; vertical-align: -2px;" src="views/default/images/icons/ivygreen.png"></img>&nbsp{p_school}</a>&nbsp
</td>
<td style="border-right: 1px solid #ddd; height: 30px;"></td>
<td class="shadebg" id="this3" onclick="location.href='http://www.ivynexus.com/calendar'" onmouseover="hoverdropdown(3)">&nbsp
		<a href="calendar" class="calendar" title="School Events Calendar"><img class="opaquethumb" style="height: 14px; vertical-align: -2px;" src="views/default/images/icons/calendargreen.png"></img>&nbspCalendar</a>&nbsp
</td>
<td style="border-right: 1px solid #ddd; height: 30px;"></td>
<td class="shadebg" id="this4" onclick="location.href='http://www.ivynexus.com/members/{p_id}'" onmouseover="hoverdropdown(4)">&nbsp
		<a href="members/{p_id}" class="members" title="All Members"><img class="opaquethumb" style="height: 13px;" src="views/default/images/icons/membersgreen.png"></img>&nbspMembers</a>&nbsp
</td>
<td style="border-right: 1px solid #ddd; height: 30px;"></td>
<td class="shadebg" id="this5" onmouseover="hoverdropdown(5)">&nbsp
		<a class="Logout" title="Extra" style="cursor: pointer;">&nabla;</a>&nbsp&nbsp
</td>
</tr>
</table>

		<!--<div id="profiledrop" style="display:none; opacity: 0; margin-right: 359px;">
			 &bull;&nbsp<a href="authenticate/reset-password/{pID}" class="logout"><img class="opaquethumb" style="height: 13px; vertical-align: -2px;" src="views/default/images/icons/write.png"></img> Edit</a>&nbsp&bull;
		</div>-->

		<!--<div style="display:block;">
			 <span id="profiledrop" style="opacity:0; margin-right: 29px;">
			 <a href="profile/edit" class="logout"><img class="opaquethumb" style="height: 13px; vertical-align: -2px;" src="views/default/images/icons/write.png"></img> Edit</a>&nbsp&bull;
		         </span>
			 <span id="ivydrop" style="opacity:0; margin-right: 74px;">
			 <a href="ivies/list" class="logout"><img class="opaquethumb" style="height: 13px; vertical-align: -2px;" src="views/default/images/ivyblack.png"></img> Schools</a>&nbsp&bull;
		         </span>
			 <span id="dropped" style="opacity:0">&nbsp<a href="authenticate/reset-password/{pID}" class="logout"><img class="opaquethumb" style="height: 13px; vertical-align: -2px;" src="views/default/images/icons/locked.png"></img> Password</a>&nbsp&bull;&nbsp<a href="authenticate/logout" class="logout"><img class="opaquethumb" style="height: 13px; vertical-align: -2px;" src="views/default/images/icons/lastpage.png"></img> Logout</a>
			 </span>
		</div>-->
		
		<!--| <a href="calendar" class="calendar" title="Calendar">Calendar</a> | </span><a href="ivies/{p_school}" class="ivy" title="College Shout Out">{p_school}</a> | <a href="members/{p_id}" class="members" title="All Members">Members</a> |</span>
		<form id="searchfield" action="members/search" method="post">
				<input type="text" id="name" name="name" value="Search Classmates" onFocus="if(this.value=='Search Classmates') {this.value=''}; this.style.color='#000000';" onBlur="if(this.value=='') {this.value='Search Classmates'; this.style.color='#c0d5c0';}" />
				<button type="submit" id="search" name="search" value="Search" title="Search for Classmates"></button>
		</form>
		<p id="ubarlinks"><span style="padding-left: 26px;"> | </span> <a href="academics" class="apple" title="Academic Information"></a>  <span style="padding-left: 26px;">|</span> <a href="profile" title="Your Profile"><img id="thumb" src="uploads/profile/{pPhoto}" onerror="this.src='views/default/images/icons/user.png';"></img><span style="padding-left: 1px;"></span> {firstname} {lastname}</a> | <a href="profile/edit" title="Edit Your Profile">Edit Account</a> | <a href="authenticate/logout">Logout</a> | </p>-->
	</div>
</div>
<div id="noise"><div class="greenbar" id="parent">
	<a href=""><img class="opaquethumb" style="height: 14px; vertical-align: -2px;" src="views/default/images/icons/home.png"></img>&nbspHome</a> &nbsp&bullet;&nbsp <a href="/ideas"><img class="opaquethumb" style="height: 15px; vertical-align: -2px;" src="views/default/images/icons/lightbulb.png"></img>&nbspIdeas</a> &nbsp&bullet;&nbsp <a href="/academics"><img class="opaquethumb" style="height: 15px; vertical-align: -3px;" src="views/default/images/icons/archive.png"></img>&nbspPortfolio</a> &nbsp&bullet;&nbsp <a href="/crush"><img class="opaquethumb" style="height: 13px; vertical-align: -2px;" src="views/default/images/icons/heart.png"></img>&nbspCrushes</a> &nbsp&bullet;&nbsp <a href="/messages"><img class="opaquethumb" style="height: 12px; vertical-align: -2px;" src="views/default/images/icons/email.png"></img>&nbsp<strong id="barnumber"> </strong>Colloquies</a><span class="fifteen"></span>
</div></div>

</body>
<div onmouseover="hoverdropup()">
<div class="slide-out-div">
            <a class="contacttab" href=""></a>
            <h3>Contact me</h3>
            <p>Suggestions, comments, questions, requests?  Send them right over!</p>
            <p>We are here to help!</p>
            <p><a href="javascript:location.href = '%62eta%63o%6dme%6e%74' + '%73%40%69v' + '%79%6e%65xu' + 's.c' + 'om'">Send an email (or a blitz)</a></p>
</div>
<div>