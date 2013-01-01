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
                // this resets the userbar
 	                $('.shadebg').css({'background':'none', 'opacity':'1'});
 	                $('#parent').css({'opacity':'0','display':'none'});
 	                document.getElementById('parent').innerHTML = '';
 	                $('.fieldheight').css({'box-shadow':'1px 0px 5px 1px #777', '-webkit-box-shadow':'1px 0px 5px 1px #777', '-moz-box-shadow':'1px 0px 5px 1px #777', 'border-bottom':'1px solid #A9ACAB'}); 
 	                
 	                // conditionals for the various dropdowns so different links
 	                if(a == '3'){
 	                	var three = '<a href="authenticate/reset-password/{pID}" class="logout"><img class="opaquethumb" style="height: 13px; vertical-align: -2px;" src="views/default/images/icons/locked.png"></img> Password</a>&nbsp&bull;&nbsp<a href="authenticate/logout" class="logout"><img class="opaquethumb" style="height: 13px; vertical-align: -2px;" src="views/default/images/icons/lastpage.png"></img> Logout</a><span class="fifteen"></span>';
	 	                document.getElementById('parent').innerHTML = three;
	 	                $('#parent').css({'opacity':'.9','display':'block'});
	 	                $('.fieldheight').css({'box-shadow':'none', '-webkit-box-shadow':'none', '-moz-box-shadow':'none', 'border-bottom':'none'});
 	                }
 	                else if(a == '2'){
	 	            	var two = '<a href="courses"><img class="opaquethumb" style="height: 15px; vertical-align: -4px;" src="views/default/images/icons/bell.png"></img>&nbspCourses</a> &nbsp&bullet;&nbsp<a href="calendar" class="calendar" title="School Events Calendar"><img class="opaquethumb" style="height: 14px; vertical-align: -2px;" src="views/default/images/icons/calendargreen.png"></img>&nbspCalendar</a> &nbsp&bullet;&nbsp<a href="ideas"><img class="opaquethumb" style="height: 15px; vertical-align: -2px;" src="views/default/images/icons/lightbulb.png"></img>&nbspIdeas</a> &nbsp&bullet;&nbsp<a href="members/{p_id}" class="members" title="All Members"><img class="opaquethumb" style="height: 13px; vertical-align: -2px;" src="views/default/images/icons/membersgreen.png"></img>&nbspMembers</a> &nbsp&bullet;&nbsp<a href="ivies/list" class="logout"><img class="opaquethumb" style="height: 13px; vertical-align: -2px;" src="views/default/images/ivyblack.png"></img> Schools</a><span class="fifteen"></span>';
	 	                document.getElementById('parent').innerHTML = two;
	 	                $('#parent').css({'opacity':'.9','display':'block'});
	 	                $('.fieldheight').css({'box-shadow':'none', '-webkit-box-shadow':'none', '-moz-box-shadow':'none', 'border-bottom':'none'});
 	                }
 	             	else if(a=='1') {
	 	             	var one = '<a href="crush"><img class="opaquethumb" style="height: 13px; vertical-align: -2px;" src="views/default/images/icons/heart.png"></img>&nbspCrushes</a> &nbsp&bullet;&nbsp<a href="profile/edit" class="logout"><img class="opaquethumb" style="height: 13px; vertical-align: -2px;" src="views/default/images/icons/write.png"></img> Edit</a> &nbsp&bullet;&nbsp<a href="/academics"><img class="opaquethumb" style="height: 15px; vertical-align: -3px;" src="views/default/images/icons/archive.png"></img>&nbspPortfolio</a><span class="fifteen"></span>';
	 	                document.getElementById('parent').innerHTML = one;
	 	                $('#parent').css({'opacity':'.9','display':'block'});
	 	                $('.fieldheight').css({'box-shadow':'none', '-webkit-box-shadow':'none', '-moz-box-shadow':'none', 'border-bottom':'none'});
 	             	}  

 	                // modify on hover and make sure selected one stays shaded
 	                var specific = '#this'.concat(a);
 	                $(specific).css({'background':'#4AAF43', 'opacity':'.75'});               	
                	
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
<td class="shadebg" id="this2" onclick="location.href='http://www.ivynexus.com/ivies/{p_school}'" onmouseover="hoverdropdown(2)">&nbsp
		<a href="ivies/{p_school}" title="School Vent"><img class="opaquethumb" style="height: 14px; vertical-align: -2px;" src="views/default/images/icons/ivygreen.png"></img>&nbsp{p_school}</a>&nbsp
</td>
<td style="border-right: 1px solid #ddd; height: 30px;"></td>
<td class="shadebg" id="this1" onclick="location.href='http://www.ivynexus.com/profile/personal'" onmouseover="hoverdropdown(1)">&nbsp
		<a href="profile/personal" title="Your Profile" class="profile"><img id="thumb" src="uploads/profile/thumb{pPhoto}" onerror="this.src='views/default/images/icons/user.png';"></img><span style="padding-left: 1px;"></span> {firstname} {lastname}</a>&nbsp
</td>
<td style="border-right: 1px solid #ddd; height: 30px;"></td>
<td class="shadebg" id="this4" onclick="location.href='http://www.ivynexus.com/messages'" onmouseover="hoverdropdown(4)">&nbsp
	<a href="messages"><span id="barnumber"><img height="12px" src="views/default/images/load.gif"></img></span>&nbsp<img class="opaquethumb" style="height: 12px; vertical-align: -2px;" src="views/default/images/icons/email.png"></img>&nbsp&nbsp</a>
</td>
<td style="border-right: 1px solid #ddd; height: 30px;"></td>
<td class="shadebg" id="this3" onmouseover="hoverdropdown(3)">&nbsp
		<a class="Logout" title="Extra" style="cursor: pointer;">&nabla;</a>&nbsp&nbsp
</td>
</tr>
</table>
		
		
	</div>
</div>
<div id="noise"><div class="greenbar" id="parent">
	
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