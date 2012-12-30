<head>
<!--[if lt IE 7.]>

<script defer type="text/javascript" src="pngfix.js"></script>

<![endif]-->

<script src="external/jquery.form.js" type="text/javascript"></script>

<script>
	$(document).ready(function(){
                loadposts(0,0);
                setTimeout(function() {
                        load(1);
                }, 2000);
                setTimeout(function() {
                        sload(1);
                }, 4000);
                setTimeout(function() {
                        phload(2);
                }, 8000);
                setTimeout(function() {
                        seveload(2);
                }, 6000);
                setTimeout(function() {
                        eveload(3);
                }, 10000);
                setTimeout(function() {
                        sphload(3);
                }, 12000);
                $('#event_file').live('change', function(){ 
			$("#eventpreview").html('');
			$("#eventpreview").html('<img src="views/default/images/load.gif" alt="Uploading...."/>');
			//Get the data from all the fields
        		var a = document.getElementById('keepID').value;
        		var b = document.getElementById('postbox').value;
b=b.replace(/\n/g, "<br />");
        		var c = 1;
 			var d = document.getElementById('user').value;
 			var e = document.getElementById('school').value.toLowerCase();
        		var f = document.getElementById('event_url').value;
 			var g = document.getElementById('event_description').value;
        		var h = document.getElementById('event_start').value;
			var i = document.getElementById('event_starttime').value;
			var j = document.getElementById('event_end').value;
			var k = document.getElementById('event_endtime').value;
		
        		if(anonymous.checked == false) {
 				c = 0;
 			}
 
			$("#eventform").ajaxForm(
			{
				target: '#eventaddition',
				data: {a: a, b: b, c: c, d: d, e: e, f: f, g: g, h: h, i: i, j: j, k: k},
				success: function(){
					$('#eventpreview').html('');
					$('#postbox').val('');
				}
			}).submit();
			
		});
                $('#image_file').live('change', function(){ 
			$("#preview").html('');
			$("#preview").html('<img src="views/default/images/load.gif" alt="Uploading...."/>');
			//Get the data from all the fields
        		var a = document.getElementById('keepID').value;
        		var b = document.getElementById('postbox').value;
b=b.replace(/\n/g, "<br />");
        		var c = 1;
 			var d = document.getElementById('user').value;
 			var e = document.getElementById('school').value.toLowerCase();
 			
        		//var b = $('input[name=postbox]');
        		//var b = $('input#postbox');
        		
        		if(anonymous.checked == false) {
 				c = 0;
 			}
 			
			$("#imageform").ajaxForm(
			{
				target: '#postaddition',
				data: {a: a, b: b, c: c, d: d, e: e},
				//resetForm: 'true',
				success: function(){
					$('#preview').html('');
					$('#postbox').val('');
				}
			}).submit();
			
		});

		
		//$("#event_starttime").autocomplete({
			//source: ["10:00 AM", "10:15 AM", "10:30 AM", "10:45 AM", "11:00 AM", "11:15 AM", "11:30 AM", "11:45 AM", "12:00 PM", "12:15 PM", "12:30 PM", "12:45 PM", "01:00 PM", "01:15 PM", "01:30 PM", "01:45 PM", "02:00 PM", "02:15 PM", "02:30 PM", "02:45 PM", "03:00 PM", "03:15 PM", "03:30 PM", "03:45 PM", "04:00 PM", "04:15 PM", "04:30 PM", "04:45 PM", "05:00 PM", "05:15 PM", "05:30 PM", "05:45 PM", "06:00 PM", "06:15 PM", "06:30 PM", "06:45 PM", "07:00 PM", "07:15 PM", "07:30 PM", "07:45 PM", "08:00 PM", "08:15 PM", "08:30 PM", "08:45 PM", "09:00 PM", "09:15 PM", "09:30 PM", "09:45 PM", "10:00 PM", "10:15 PM", "10:30 PM", "10:45 PM", "11:00 PM", "11:15 PM", "11:30 PM", "11:45 PM", "12:00 AM", "12:15 AM", "12:30 AM", "12:45 AM", "01:00 AM", "01:15 AM", "01:30 AM", "01:45 AM", "02:00 AM", "02:15 AM", "02:30 AM", "02:45 AM", "03:00 AM", "03:15 AM", "03:30 AM", "03:45 AM", "04:00 AM", "04:15 AM", "04:30 AM", "04:45 AM", "05:00 AM", "05:15 AM", "05:30 AM", "05:45 AM", "06:00 AM", "06:15 AM", "06:30 AM", "06:45 AM", "07:00 AM", "07:15 AM", "07:30 AM", "07:45 AM", "08:00 AM", "08:15 AM", "08:30 AM", "08:45 AM", "09:00 AM", "09:15 AM", "09:30 AM", "09:45 AM"],
		//});
		
		$(".unformattedtime").each(function(index) {
		//$(this).attr("alt",$(this).html());
		//$(this).attr("title",$(this).html());
		$(this).html(toFormattedDate($(this).html()));
		});
        });

	function loadposts(counter,c) {
		var s = 'yale';
		var u = '{pID}';
		$('<img src="views/default/images/tiny_loader.gif" id="temp" alt="Loading..."/>').replaceAll('button#count');
	 	//$('button#count').remove();
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
			 	$(xmlhttp.responseText).insertBefore(document.getElementById("wallrefresh"));
			 	$('img#temp').remove();
			 	//$('button#count').replaceWith("<button id='count' type='button' onclick='loadposts("+counter+")'>Load Old Posts</button>");
			 	//document.getElementById("count").innerHTML="<input id='count' type='button' onclick='loadposts("counter")' value='Load Posts' />";
			  }
			}
			xmlhttp.open("GET","controllers/ivies/ajaxcontroller.php?a="+s+"&b="+counter+"&c="+c+"&d="+u,true);
			xmlhttp.send();
	}
	
	function loadnewposts(c) {
		$('<img src="views/default/images/tiny_loader.gif" id="temp" alt="Loading..."/>').replaceAll('button.count');
		var counter = '';
		var s = 'yale';
		if(c == '0') {
	 		counter = $('input#firstreference').val();
	 	}
	 	else {
	 		counter = $('input#reference').val();
	 		
	 	}
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
			 	switch (res) {
				            case "":
				                $('<button class="count" type="button" onclick="loadnewposts(0)">Load New Posts (No New Posts)</button>').replaceAll('img#temp');
				                break;
				            case "0":
				                $('<button class="count" type="button" onclick="loadnewposts(0)">Load New Posts (No New Posts)</button>').replaceAll('img#temp');
				                break;
				            default:
				                $('input#reference').remove();
			 			$(res).insertAfter(document.getElementById("postaddition"));
			 			$('<button class="count" type="button" onclick="loadnewposts(1)">Load New Posts</button>').replaceAll('img#temp');
				                break;
				 }
			  }
			 
			}
			xmlhttp.open("GET","controllers/ivies/newcontroller.php?a="+s+"&b="+counter,true);
			xmlhttp.send();
	}
	
	setInterval(function() {
		load(1);
	}, 61700);
	setInterval(function() {
		sload(1);
	}, 63500);
	setInterval(function() {
		phload(2);
	}, 69700);
	setInterval(function() {
		seveload(2);
	}, 66700);
	setInterval(function() {
		eveload(3);
	}, 71200);
	setInterval(function() {
		sphload(3);
	}, 73100);
   

	function load(c) {
                var a = "1";
                var b = document.getElementById('keepID').value;
                var f = "pleft" + c;
                var g = "img#pleft" + c;
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
			
			document.getElementById(f).innerHTML=xmlhttp.responseText;
			$(g).fadeIn(2000);
		  }
		}
		xmlhttp.open("GET","controllers/members/ajaxcontroller.php?a="+a+"&b="+b+"&c="+c,true);
		xmlhttp.send();
	}
	
	function sload(c) {
                /*if (c == '0') {
                        c = Math.floor(Math.random()*4);
                }*/
                var a = "2";
                var b = document.getElementById('keepID').value;
                var f = "pright" + c;
                var g = "img#pright" + c;
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
			
			document.getElementById(f).innerHTML=xmlhttp.responseText;
			$(g).fadeIn(2000);
		  }
		}
		xmlhttp.open("GET","controllers/members/ajaxcontroller.php?a="+a+"&b="+b+"&c="+c,true);
		xmlhttp.send();
	}
	
	function phload(c) {
                var a = "1";
                var b = document.getElementById('keepID').value;
                var d = document.getElementById('school').value.toLowerCase();
                var f = "phleft" + c;
                var g = "img#phleft" + c;
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
			
			document.getElementById(f).innerHTML=xmlhttp.responseText;
			$(g).fadeIn(2000);
		  }
		}
		xmlhttp.open("GET","controllers/ivies/dc/phloadcontroller.php?a="+a+"&b="+b+"&c="+c+"&d="+d,true);
		xmlhttp.send();
	}
	
	function sphload(c) {
                /*if (c == '0') {
                        c = Math.floor(Math.random()*4);
                }*/
                var a = "2";
                var b = document.getElementById('keepID').value;
                var d = document.getElementById('school').value.toLowerCase();
                var f = "phright" + c;
                var g = "img#phright" + c;
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
			
			document.getElementById(f).innerHTML=xmlhttp.responseText;
			$(g).fadeIn(2000);
		  }
		}
		xmlhttp.open("GET","controllers/ivies/dc/phloadcontroller.php?a="+a+"&b="+b+"&c="+c+"&d="+d,true);
		xmlhttp.send();
	}
	
	function eveload(c) {
                var a = "1";
                var b = document.getElementById('keepID').value;
                var d = document.getElementById('school').value.toLowerCase();
                var f = "eveleft" + c;
                var g = "img#eveleft" + c;
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
			
			document.getElementById(f).innerHTML=xmlhttp.responseText;
			$(g).fadeIn(2000);
		  }
		}
		xmlhttp.open("GET","controllers/ivies/dc/eveloadcontroller.php?a="+a+"&b="+b+"&c="+c+"&d="+d,true);
		xmlhttp.send();
	}
	
	function seveload(c) {
                var a = "2";
                var b = document.getElementById('keepID').value;
                var d = document.getElementById('school').value.toLowerCase();
                var f = "everight" + c;
                var g = "img#everight" + c;
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
			
			document.getElementById(f).innerHTML=xmlhttp.responseText;
			$(g).fadeIn(2000);
		  }
		}
		xmlhttp.open("GET","controllers/ivies/dc/eveloadcontroller.php?a="+a+"&b="+b+"&c="+c+"&d="+d,true);
		xmlhttp.send();
	}
	
	function shareThis(a) {
		var b = document.getElementById('postbox').value;
b=b.replace(/\n/g, "<br />");
 		var c = 1;
 		var d = document.getElementById('user').value;
 		var e = document.getElementById('school').value.toLowerCase();
 		var f = $('.extra').value;
 		
 		
 		if(f == '' && b == '') {
 			end();
 		}
 		if(anonymous.checked == false) {
 			c = 0;
 		}
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
			postbox.value = '';
			//document.getElementById("wallrefresh").innerHTML=xmlhttp.responseText;
		 	$(xmlhttp.responseText).insertAfter(document.getElementById("wallrefreshnew"));
		  }
		}
		
	if($('#radio_post').is(':checked')) {
		xmlhttp.open("GET","controllers/ivies/dc/postcontroller.php?a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&g="+g+"&h="+h,true);
	}
	else if($('#radio_event').is(':checked')) {
		var g = $('#event_url').val();
		var h = $('#event_start').val();
		var i = $('#event_starttime').val();
		var j = $('#event_end').val();
		var k = $('#event_endtime').val();
		var l = $('#event_description').val();
		xmlhttp.open("GET","controllers/ivies/dc/alteventcontroller.php?a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&g="+g+"&h="+h+"&i="+i+"&j="+j+"&k="+k+"&l="+l,true);
	}
	else if($('#radio_link').is(':checked')) {
		var g = $('#linkdescription').val();
		var h = $('#url').val();
		xmlhttp.open("GET","controllers/ivies/dc/linkcontroller.php?a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&g="+g+"&h="+h,true);
	}
	else if($('#radio_photo').is(':checked')) {
		//xmlhttp.open("POST","controllers/ivies/dc/photocontroller.php?file="+image_file+"&a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e,true);
		
	}
	else if($('#radio_video').is(':checked')) {
		var regex = /http\:\/\/www\.youtube\.com\/watch\?v=([\w-]{11})/;
		var url = $('#video_url').val();
		var vid = url.match(regex)[1];

		xmlhttp.open("GET","controllers/ivies/dc/videocontroller.php?a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&j="+vid,true);
	}
	xmlhttp.send();
	}
	
	function addChili(int, gint) {
		var c = document.getElementById('school').value.toLowerCase();
		$refresh = "chilirefresh"+gint;
		document.getElementById($refresh).innerHTML='<img src="views/default/images/tiny_loader.gif" />';
		
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
		    document.getElementById($refresh).innerHTML=xmlhttp.responseText;
		  }
		}
		
		xmlhttp.open("GET","controllers/ivies/dc/chilipostcontroller.php?a="+int+"&b="+gint+"&c="+c,true);
		xmlhttp.send();
	}
	 
        function getChiliLeft(int, gint) {
        	document.getElementById("chilirefreshleft").innerHTML='<img src="views/default/images/tiny_loader.gif" />';
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
		    document.getElementById("chilirefreshleft").innerHTML=xmlhttp.responseText;
		  }
		}
		
		xmlhttp.open("GET","controllers/chot/ajaxcontroller.php?a="+int+"&b="+gint,true);
		xmlhttp.send();
	}
	
	function getChiliRight(int, gint) {
	document.getElementById("chilirefreshright").innerHTML='<img src="views/default/images/tiny_loader.gif" />';
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
		    document.getElementById("chilirefreshright").innerHTML=xmlhttp.responseText;
		  }
		}
		
		xmlhttp.open("GET","controllers/chot/ajaxcontroller.php?a="+int+"&b="+gint,true);
		xmlhttp.send();
	}
	
	function getPhotoChiliLeft(int, gint) {
        	document.getElementById("chiliphotorefreshleft").innerHTML='<img src="views/default/images/tiny_loader.gif" />';
        	
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
		    document.getElementById("chiliphotorefreshleft").innerHTML=xmlhttp.responseText;
		  }
		}
		
		xmlhttp.open("GET","controllers/ivies/dc/chiliphotocontroller.php?a="+int+"&b="+gint,true);
		xmlhttp.send();
	}
	
	function getPhotoChiliRight(int, gint) {
		document.getElementById("chiliphotorefreshright").innerHTML='<img src="views/default/images/tiny_loader.gif" />';
		
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
		    document.getElementById("chiliphotorefreshright").innerHTML=xmlhttp.responseText;
		  }
		}
		
		xmlhttp.open("GET","controllers/ivies/dc/chiliphotocontroller.php?a="+int+"&b="+gint,true);
		xmlhttp.send();
	}
	
	function getEventChiliLeft(int, gint) {
        	document.getElementById("chilieventleft").innerHTML='<img src="views/default/images/tiny_loader.gif" />';
        	var d = document.getElementById('school').value.toLowerCase();
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
		    document.getElementById("chilieventleft").innerHTML=xmlhttp.responseText;
		  }
		}
		
		xmlhttp.open("GET","controllers/ivies/dc/chilieventcontroller.php?a="+int+"&b="+gint+"&d="+d,true);
		xmlhttp.send();
	}
	
	function getEventChiliRight(int, gint) {
		document.getElementById("chilieventright").innerHTML='<img src="views/default/images/tiny_loader.gif" />';
		var d = document.getElementById('school').value.toLowerCase();
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
		    document.getElementById("chilieventright").innerHTML=xmlhttp.responseText;
		  }
		}
		
		xmlhttp.open("GET","controllers/ivies/dc/chilieventcontroller.php?a="+int+"&b="+gint+"&d="+d,true);
		xmlhttp.send();
	}
	
	function toggleComment(postid, toggle) {
		var comment = 'comment'+postid;
		var commentid = '#comment'+postid;
		var insert = 'commentInsert'+postid;
		var insertid = '#commentInsert'+postid;
		var thiscomm = 'this.comm'+postid+'.value';
		if(toggle == '1'){ // if comment is toggled, remove
			$(commentid).replaceWith('<button class="comment" id="'+comment+'" onclick="toggleComment('+postid+',0)">Comment</button>');
			$(document.getElementsByName("loadedcomments"+postid)).remove();
			$(insertid).remove();
			$(document.getElementsByName(postid)).remove();
		}
		else { //if comment is not toggled it loads and shows the comments
			$(commentid).replaceWith('<button class="comment" id="'+comment+'" onclick="toggleComment('+postid+',1)"><img id="'+comment+'" height="12px" src="views/default/images/tiny_loader.gif" /> Hide Comment</button>');
			var topinsertmat = '<br /><form name="'+postid+'" align="left" onsubmit="javascript:return tackComment('+postid+', '+thiscomm+')" style="margin:0;margin-bottom:-2px;"><input name="comm'+postid+'" placeholder="Add Comment Then Press &quot;return&quot;" id="'+insert+'" style="width:100%; line-height:1.7;"></input><input name="loadedcomments'+postid+'" type="submit" value="" style="visibility:hidden; position:absolute; height:0px;" ></form>';
			var insertmat = '<br /><form name="'+postid+'" align="left" onsubmit="javascript:return tackComment('+postid+', '+thiscomm+')" style="margin:0; margin-top:-19px;"><input name="comm'+postid+'" placeholder="Add Comment Then Press &quot;return&quot;" id="'+insert+'" style="width:100%; line-height:1.7;"></input><input name="loadedcomments'+postid+'" type="submit" value="" style="visibility:hidden; position:absolute; height:0px;" ></form>';

			var d = document.getElementById('user').value;
			var e = document.getElementById('school').value.toLowerCase();

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
					
					$(xmlhttp.responseText).insertAfter(document.getElementById(comment));											$(commentid).replaceWith('<button class="comment" id="'+comment+'" onclick="toggleComment('+postid+',1)">Hide Comment</button>');
					$(topinsertmat).insertAfter('button'+commentid);
					if(xmlhttp.responseText !== '') {
						$(insertmat).insertAfter('[name=loadedcomments'+postid+']:last');
						return false;
					}
					else {
						return false;
					}
				}
			}

			xmlhttp.open("GET","controllers/ivies/dc/commentcontroller.php?a="+postid+"&d="+d+"&e="+e,true);
			xmlhttp.send();
		}
	}
	
	function tackComment(a, b) {
		event.preventDefault();
		var c = '{pID}';
		var d = document.getElementById('user').value;
		var e = document.getElementById('school').value.toLowerCase();
		var f = "\"<div align='right' name='loadedcomments"+a+"' style='background: #E2FFDF; margin-top:-22px;'><hr color='#fff' size='1' style='margin-top:0px; margin-bottom:3px;' /><div style='padding-right:10px;'><strong><a class='name' style='color: #000;' href='profile/view/"+c+"'>"+d+"</a></strong><span style='font-size:12px;'>: "+b+"</span></div><div align='right' class='unformattedtime' style='padding-right: 10px; font-size: 11px; padding-top: 5px; padding-bottom: 7px; margin-bottom: 16px; font-style: italic; color: #aaa;'>Commented just now</div></div>\"";
		$('#commentInsert'+a).animate({'width':'95%'},0);
		$('<img id="remove" src="views/default/images/tiny_loader.gif" style="vertical-align:middle; padding-left:3px;" />').insertAfter('input[name="comm'+a+'"]');
		
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
					//if(xmlhttp.responseText==='true'){
						//$(xmlhttp.responseText).insertAfter(document.getElementById(comment));
						//$("#loadedcomments"+a).insertAfter(f);
						$(f).insertBefore("[name="+a+"]:last");
						$('img').remove('#remove');
						//$('#remove').remove();
						$('#commentInsert'+a).animate({'width':'100%'},0);
						$('#commentInsert'+a).val('');
						$('#commentInsert'+a).val('');
						return false;				
					//}
					/*else {
						$(f).insertBefore("[name="+a+"]:last");
						$('img').remove('#remove');
						//$('#remove').remove();
						$('#commentInsert'+a).animate({'width':'100%'},0);

						return false;
					}*/
				}
			}

			xmlhttp.open("GET","controllers/ivies/dc/postcommentcontroller.php?a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e,true);
			xmlhttp.send();

	}
		
	function EnableButton() {
		$('.gbutton').css('opacity', '1');	
	}
	//'onmouseover='flipEvent(1)' onmouseout='revert(1)'
	
	function flipEvent(side) {
		$('.info'+side).css({opacity: '1',
		WebkitTransition: 'opacity .2s ease-in-out',
        MozTransition: 'opacity .2s ease-in-out',
        MsTransition: 'opacity .2s ease-in-out',
        OTransition: 'opacity .2s ease-in-out',
        transition: 'opacity .2s ease-in-out'});
	}
	
	function revert(side) {
		$('.info'+side).css({opacity: '0'});
	}
	// Courtesy of tinywall.info
	function getValidDate(ivDate){
		var arrDateTime = ivDate.split("T");
		var strTimeCode = arrDateTime[1].substring(0,arrDateTime[1].indexOf("+"));
		var valid_date = new Date();
		var arrDateCode = arrDateTime[0].split("-");
		valid_date.setYear(arrDateCode[0]);
		valid_date.setMonth(arrDateCode[1]-1);
		valid_date.setDate(arrDateCode[2]);
		var arrTimeCode = strTimeCode.split(":");
		valid_date.setHours(arrTimeCode[0]);
		valid_date.setMinutes(arrTimeCode[1]);
		valid_date.setSeconds(arrTimeCode[2]);
		return valid_date;
	}
	function toFormattedDate(gmdate){
		
		var date=getValidDate(gmdate);
		var offset=parseInt(date.getTimezoneOffset());
		var sec_diff = (((new Date()).getTime()+(offset*60*1000)-date.getTime())/1000);
		var day_diff = Math.floor(sec_diff / 86400);
		if(sec_diff<60){
			return "Just Now";
		}
		else if(sec_diff<120){
			return "1 minute ago";
		}
		else if(sec_diff<3600){
			return ""+Math.floor( sec_diff / 60 ) + " minutes ago";
		}
		else if(sec_diff<7200){
			return "1 hour ago";
		}
		else if(sec_diff<86400){
			return Math.floor( sec_diff / 3600 ) + " hours ago";
		}
		else if(day_diff==1){
			return "yesterday";
		}
		else if(day_diff<7){
			return day_diff + " days ago";
		}
		else if(day_diff<31){
			return Math.ceil( day_diff / 7 ) + " weeks ago";
		}
		else{
			return month[date.getMonth()]+" "+date.getDate()+", "+date.getFullYear();
		}
		return date;
	}
</script>

<link rel="stylesheet" type="text/css" href="external/css/ivystyle.css" />
</head>

<center>
<div id="main">
<body id="yale">
	<div id="dartmouth"></div>
	<div id="dart"></div>
	<center><h1 id="dartmouth"><div id="transbar">Yale University</div></h1></center>
	
	<!--<p class="fifty">
        <center class="engraved2">| New Haven, Connecticut | Founded 1701 | Handsome Dan |</center>
	</p>-->
	
<!-- begin wall -->

<table border="0px" align="center" width="100%" height="auto">
	<td width="20%" valign="top" class="borderright">
		<center>
			<div style="background: #fff;" class="photoborder">
	                        <span id="pleft1">
				        <img id="pleft1" class="pleft" border="1px" src="uploads/profile/{p_photo}"></img>
			        </span>
	                        <div style='height:10px;'></div>
	                        <button class="engravedbtn" type="button" onclick="load(1)">Switch Limelight</button>
	            	</div>
			<br />
			
			<div style="background: #fff;" class="photoborder">
	                        <span id="phleft2">
				        <img id="phleft2" class="pleft" border="1px" src="uploads/profile/{p_photo}"></img>
			        </span>
	                        <div style='height:10px;'></div>
	                        <button class="engravedbtn" type="button" onclick="phload(2)">Random Photo</button>
                        </div>
                        <br />
                        
                        <div style="background: #fff;" class="photoborder">
	                        <span id="eveleft3">
				        <img id="eveleft3" class="pleft" border="1" src="uploads/profile/man.png" />
			        </span>
	                        <div style='height:10px;'></div>
	                        <button class="engravedbtn" type="button" onclick="eveload(3)">Switch Event</button>
                        </div>
                </center>
	</td>
	
	<td width="60%" valign="top" class="leftright">
		<div id="center">
		        
			<div id="adjustpostbox">
                        <hr color="#fff" size="1" style="margin-top: -1px;" />
			<!-- This is where you adjust the textarea shout out area width:98%; -->
				<textarea id="postbox" name="postbox" class="input" placeholder=" Shout Out To Yale!" wrap="hard"></textarea>
				
				
				<input type="hidden" name="school" id="school" value="yale" />
				<input type="hidden" name="user" id="user" value="{firstname} {lastname}" />
				<!-- this is to load more posts -->
				<input type="hidden" name="keepID" id="keepID" value="{pID}" />
				
				<div class="buttoncontainer">
					<label><input type="radio" value="Post" id="radio_post" name="status_type" checked></input><div class="contain" id="post"> Post</div></label>
					<label><input type="radio" value="Event" id="radio_event" name="status_type"></input><div class="contain" id="event"> Event</div></label>
					<label><input type="radio" value="Link" id="radio_link" name="status_type"></input><div class="contain" id="link"> Link</div></label>
					<label><input type="radio" value="Photo" id="radio_photo" name="status_type"></input><div class="contain" id="photo"> Photo</div></label>
					<label><input type="radio" value="Video" id="radio_video" name="status_type"></input><div class="contain" id="video" style="border-right: 0px;"> Video</div></label>
					
					
					<!--<input type="button" class="colbtn" value="video" name="status_type"><img src="views/default/images/media.ico" width="20" alt="" id="uploadMediaToggle" style="cursor:pointer" onclick="mediaToggle" /></input>&nbsp
					<input type="button" class="colbtn" value="link" name="status_type"><img src="views/default/images/link.png" width="20" alt="" onclick="toggle" style="cursor:pointer" /></input>&nbsp
					<input type="button" class="colbtn" value="photo" name="status_type"><img src="views/default/images/link.png" width="20" alt="" onclick="toggle" style="cursor:pointer" /></input>&nbsp
					<input type="button" class="colbtn" value="event" name="status_type"><img src="views/default/images/link.png" width="20" alt="" onclick="toggle" style="cursor:pointer" /></input>&nbsp-->
					
				</div>
				<div id="align" class="video_input  extra_field">
					<label for="video_url">YouTube URL</label>
					<input type="text" id="video_url" class="extra" name="video_url" size="70%" /><br />
				</div>
				<div id="align" class="photo_input  extra_field">
				<form id="imageform" method="post" enctype="multipart/form-data" action="controllers/ivies/dc/photocontroller.php">
				
						<label class="img_file">Upload Image</label>
						<input type="file" class="extra" id="image_file" name="image_file" /><br />
				</form>					
					<div id='preview'></div>				
				</div>
				<div id="align" class="link_input  extra_field">
					<label class="link_url">Link</label>
					<input type="text" id="url" class="extra" name="link_url" size="70%" /><br /><br />
					<label for="link_description">Description</label>
					<input type="text" id="linkdescription" class="extra" name="link_description" size="62%" /><br />
				</div>
				<div id="align" class="event_input  extra_field">
				<center>
				<form id="eventform" method="post" enctype="multipart/form-data" action="controllers/ivies/dc/eventcontroller.php">
					<label class="event_url">Event</label>
					<input type="text" id="event_url" class="extra" name="event_url" size="65%" /><br /><br />
					<label for="event_start">Start Date</label>
					<input type="date" class="extra" id="event_start" name="event_start" size="22%" style="padding-right: 5%;" placeholder="e.g. 2012-05-08   Y-M-D" />
					<label for="event_starttime">Time</label>
					<input type="time" class="extra" id="event_starttime" name="event_starttime" size="10%" style="padding-right: 11%;" placeholder="e.g. 7:05 PM" /><br /><br />
					<label class="event_end">End Date</label>
					<input type="date" id="event_end" class="extra" name="event_end" size="23%" style="padding-right: 5%;" placeholder="e.g. 2012-05-29   Y-M-D" />
					<label for="event_endtime">Time</label>
					<input type="time" class="extra" id="event_endtime" name="event_endtime" size="10%" style="padding-right: 11%;" placeholder="e.g. 12 AM" /><br /><br />
					<label for="event_description">Description</label>
					<input type="text" class="extra" id="event_description" name="event_description" size="60%" /><br /><br />
					<label class="event_file">Upload Image</label>
					<input type="file" class="extra" id="event_file" name="event_file" /><br />
				</form>
				</center>
					<div id='eventpreview'></div>
				</div>
				
				<div align="center">
					<div class="test">
					<label for="anonymous" value="Anonymous"><input type="checkbox" name="anonymous" id="anonymous" class="test" value="1"></input><img class="ivy" src="views/default/images/ivyblack.png"/>Anonymous</label></div>
					<button type="submit" class="pbutton"  id="shareButtons" onclick="shareThis({pID})">Share</button>
				</div>
				
			</div>
				
<script type="text/javascript"> 
$(function() {
	$('.extra_field').hide();
	$("input[name='status_type']").change(function(){
		$('.extra_field').hide();
		$('.extra').val('');
		$('.'+ $(this).val() + '_input').show();
	});
});
</script>
			<div align="left" style="text-align:left; margin-top:10px;">
				<br />
				<center><button class="count" type="button" onclick="loadnewposts(0)">Load New Posts</button></center>
                                <hr color="#fff" size="1" />
				<div id="wallrefreshnew"></div>
				<div id="eventaddition"></div>
				<div id="postaddition"></div>
				<div id="wallrefresh"></div>
				
				<div id="copyright">IvyNexus &copy {current_year} All Rights Reserved</div>
			</div>
		</div>
	</td>

	<td width="20%" valign="top" class="borderleft">
		<center>
                        <div style="background: #fff;" class="photoborder">
			        <span id="pright1">
				        <img id="pright1" class="pright" border="1" src="uploads/profile/man.png" />
			        </span>
	                        <div style='height:10px;'></div>
	                        <button class="engravedbtn" type="button" onclick="sload(1)">Switch Limelight</button>

	                </div>
                        <br />
                        
                        <div style="background: #fff;" class="photoborder">
	                        <span id="everight2">
				        <img id="everight2" class="pright" border="1" src="uploads/profile/man.png" />
			        </span>
	                        <div style='height:10px;'></div>
	                        <button class="engravedbtn" type="button" onclick="seveload(2)">Switch Event</button>

	                </div>
                        <br />
                        
                        <div style="background: #fff;" class="photoborder">									
	                        <span id="phright3">
				        <img id="phright3" class="pright" border="1px" src="uploads/profile/{p_photo}"></img>
			        </span>
	                        <div style='height:10px;'></div>
	                        <button class="engravedbtn" type="button" onclick="sphload(3)">Random Photo</button>

	                </div>
                        
                </center>
	</td>
</table>	
	
	<br clear="all"><br clear="all">

	<div id="loadpage" style="display:none;"></div>

	</div>

	</div>

	<div id="popUpDiv" style="display:none;"> 
		<a href="javascript:;" onclick="popup('popUpDiv')"><img border="0" src="hide.png" alt="Close" title="Close" /></a> 
		<div>
			<span></span>
			<div id="comment_part"></div>
		</div>

	</div>
</body></center>
</div>
</html>