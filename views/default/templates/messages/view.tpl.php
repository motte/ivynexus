<script src="external/jquery.form.js" type="text/javascript"></script>
<!--<script type="text/javascript"> 
$(window).load(function(){
var count2 = new countDown(new Date('2012/12/11 10:44:59'),'counter2','tomorrow 10:45');
var count1 = new countDown(new Date('{expD1}'),'counter1','first christmas day');

function countDown(startTime, divid, the_event) {
    var tdiv = document.getElementById(divid),start = parseInt(startTime.getTime(),10),the_event = the_event || startTime.toLocaleString(),to;
    this.rewriteCounter = function() {
      var now = new Date(),diff = ((start - now)/1000);
      if (startTime > now) {
        tdiv.innerHTML = diff +' seconds untill ' + the_event;
      }
      else {
      	clearInterval(to);
      }
    };
    this.rewriteCounter();
    to = setInterval(this.rewriteCounter,1000);
}
});
</script>-->
<script>
	$(document).ready(function(){
		$("#anonymous").selected(true);
		$('#event_file').live('change', function(){ 
			$("#eventpreview").html('');
			$("#eventpreview").html('<img src="views/default/images/load.gif" alt="Uploading...."/>');
			//Get the data from all the fields
        	var a = document.getElementById('keepID').value;
        	var b = document.getElementById('postbox').value;
        	b=b.replace(/\r\n|\r|\n/g, "<br />");
        		var c = 1;
 			var d = document.getElementById('user').value;
 			var e = {tId};
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
b=b.replace(/\r\n|\r|\n/g, "<br />");
        		var c = 1;
 			var d = document.getElementById('user').value;
 			var e = {tId};
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
	});
	
	function shareThis(a) {
			
		var b = document.getElementById('postbox').value;
b=b.replace(/\r\n|\r|\n/g, "<br />");
 		var c = 1;
 		var d = document.getElementById('user').value;
 		var e = {tId};
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
		//alert(xmlhttp.responseText);
			postbox.value = '';
			//document.getElementById("wallrefresh").innerHTML=xmlhttp.responseText;
		 	$(xmlhttp.responseText).insertAfter(document.getElementById("wallrefreshnew"));
		  }
		}
		
		if($('#settime').is(':checked')) {
			var mins = $('select#mins').val();
			var hours = $('select#hours').val();
			var days = $('select#days').val();
			var months = $('select#months').val();
			var years = $('select#years').val();
			
			if($('#radio_post').is(':checked')) {
	
				xmlhttp.open("GET","controllers/messages/posttimecontroller.php?a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&g="+g+"&h="+h+"&m="+mins+"&n="+hours+"&o="+days+"&p="+months+"&q="+years,true);
			}
			else if($('#radio_event').is(':checked')) {
				var g = $('#event_url').val();
				var h = $('#event_start').val();
				var i = $('#event_starttime').val();
				var j = $('#event_end').val();
				var k = $('#event_endtime').val();
				var l = $('#event_description').val();
				xmlhttp.open("GET","controllers/messages/alteventtimecontroller.php?a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&g="+g+"&h="+h+"&i="+i+"&j="+j+"&k="+k+"&l="+l+"&m="+mins+"&n="+hours+"&o="+days+"&p="+months+"&q="+years,true);
			}
			else if($('#radio_link').is(':checked')) {
				var g = $('#linkdescription').val();
				var h = $('#url').val();
				xmlhttp.open("GET","controllers/messages/linktimecontroller.php?a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&g="+g+"&h="+h+"&m="+mins+"&n="+hours+"&o="+days+"&p="+months+"&q="+years,true);
			}
			else if($('#radio_photo').is(':checked')) {
				//xmlhttp.open("POST","controllers/ivies/dc/photocontroller.php?file="+image_file+"&a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e,true);
				
			}
			else if($('#radio_video').is(':checked')) {
				var regex = /http\:\/\/www\.youtube\.com\/watch\?v=([\w-]{11})/;
				var url = $('#video_url').val();
				var vid = url.match(regex)[1];
		
				xmlhttp.open("GET","controllers/messages/videotimecontroller.php?a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&j="+vid+"&m="+mins+"&n="+hours+"&o="+days+"&p="+months+"&q="+years,true);
			}
		}
		/* if settime is not checked */
		else{
			if($('#radio_post').is(':checked')) {
	
				xmlhttp.open("GET","controllers/messages/postcontroller.php?a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&g="+g+"&h="+h,true);
			}
			else if($('#radio_event').is(':checked')) {
				var g = $('#event_url').val();
				var h = $('#event_start').val();
				var i = $('#event_starttime').val();
				var j = $('#event_end').val();
				var k = $('#event_endtime').val();
				var l = $('#event_description').val();
				xmlhttp.open("GET","controllers/messages/alteventcontroller.php?a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&g="+g+"&h="+h+"&i="+i+"&j="+j+"&k="+k+"&l="+l,true);
			}
			else if($('#radio_link').is(':checked')) {
				var g = $('#linkdescription').val();
				var h = $('#url').val();
				xmlhttp.open("GET","controllers/messages/linkcontroller.php?a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&g="+g+"&h="+h,true);
			}
			else if($('#radio_photo').is(':checked')) {
				//xmlhttp.open("POST","controllers/ivies/dc/photocontroller.php?file="+image_file+"&a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e,true);
				
			}
			else if($('#radio_video').is(':checked')) {
				var regex = /http\:\/\/www\.youtube\.com\/watch\?v=([\w-]{11})/;
				var url = $('#video_url').val();
				var vid = url.match(regex)[1];
		
				xmlhttp.open("GET","controllers/messages/videocontroller.php?a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&j="+vid,true);
			}
		}
		xmlhttp.send();
	}
	
	function newMessage(a, b) {
		
	}

	function infiniteset() {
		$('#setselects').css({'display':'none'});
	    $('#setselects').animate({'opacity':'0'}, 300);
	    $('#setstyle').css({'text-decoration':'none'});
	    $('#setstyle').css({'color':'#dddddd'});
	    $('#infinitesymbol').css({'color':'#777777'});
	    $('#settime').prop('checked', false);	
	}
	
	function showset() {
		$('#setselects').css({'display':'inline-block'});
		$('#setselects').animate({'opacity':'1'}, 300);
		$('#setstyle').css({'text-decoration':'underline'});
		$('#setstyle').css({'color':'#777777'});
		$('#infinitesymbol').css({'color':'#dddddd'});	
		$('#settime').prop('checked', true);	
	}
	
	function infhover() {
		var check = $("#setselects").css("opacity");
		switch(check){
			case "0":
				$('#infinitesymbol').css({'color':'#777777'});
				break;
			case "1":
				$('#infinitesymbol').css({'color':'#dddddd'});
				break;
		}
	}
	
	function sethover() {
		var check = $("#setselects").css("opacity");
		switch(check){
			case "1":
				$('#setstyle').css({'color':'#777777'});
				break;
			case "0":
				$('#setstyle').css({'color':'#dddddd'});
				break;
		}
	}

	function focusPostbox() {
		$('textarea#postbox').animate({'height':'76px'});
		
		$('#shareButtons').css({'display':'inline-block'});
	}
	
	
	function initializePostbox() {
		var post = $('textarea#postbox').val();
		if(post == 'Shout Out To Dartmouth!' || ' Shout Out To Dartmouth' || '') {
			$('textarea#postbox').css({'height':'35px'});
		}
	}
	
	

	
</script>
<center>
<div id="main">
<div id="content">
	<div id="adjustpostbox">
                        <hr color="#eee" size="1" style="margin-top: -1px;" />
			<!-- This is where you adjust the textarea shout out area width:98%; -->
				<div align="left">
					<textarea id="postbox" name="postbox" class="input" placeholder=" Leave a reply" wrap="hard" style="width: 100%; margin-bottom: 5px;"  onfocus="focusPostbox()" onblur="initializePostbox()"></textarea>		
				</div>
				
				
				
				<input type="hidden" name="user" id="user" value="{firstname} {lastname}" />
				<!-- this is to load more posts -->
				<input type="hidden" name="keepID" id="keepID" value="{pID}" />
				
				<div class="buttoncontainer">
					<label><input type="radio" value="Post" id="radio_post" name="status_type" checked></input><div class="contain" id="post"> Post</div></label>
					<label><input type="radio" value="Event" id="radio_event" name="status_type"></input><div class="contain" id="event"> Event</div></label>
					
					<label><input type="radio" value="Photo" id="radio_photo" name="status_type"></input><div class="contain" id="photo"> Photo</div></label>
					<label><input type="radio" value="Video" id="radio_video" name="status_type"></input><div class="contain" id="video" style="border-right: 0px;"> Video</div></label>
					
					
				
					
				</div>
				<div id="align" class="video_input  extra_field">
					<label for="video_url">YouTube URL</label>
					<input type="text" id="video_url" class="extra" name="video_url" size="70%" /><br />
				</div>
				<div id="align" class="photo_input  extra_field">
				<form id="imageform" method="post" enctype="multipart/form-data" action="controllers/messages/photocontroller.php">
				
						<label class="img_file">Upload Image</label>
						<input type="file" class="extra" id="image_file" name="image_file" /><br />
				</form>					
					<div id='preview'></div>				
				</div>
				
				<div id="align" class="event_input  extra_field">
				<form id="eventform" method="post" enctype="multipart/form-data" action="controllers/messages/eventcontroller.php">
					<label class="event_url">Event</label>
					<input type="text" id="event_url" class="extra" name="event_url" size="81%" /><br /><br />
					<label for="event_start">Start Date</label>
					<input type="date" class="extra" id="event_start" name="event_start" size="29%" style="padding-right: 5%;" placeholder="e.g. 2012-05-28   Y-M-D" />
					<label for="event_starttime">Time</label>
					<input type="time" class="extra" id="event_starttime" name="event_starttime" size="24%" style="padding-right: 0%;" placeholder="e.g. 7:05 PM" /><br /><br />
					<label class="event_end">End Date</label>
					<input type="date" id="event_end" class="extra" name="event_end" size="29%" style="margin-left: 7px; padding-right: 5%;" placeholder="e.g. 2012-05-29   Y-M-D" />
					<label for="event_endtime">Time</label>
					<input type="time" class="extra" id="event_endtime" name="event_endtime" size="24%" style="padding-right: 0%;" placeholder="e.g. 12:00 AM" /><br /><br />
					<label for="event_description">Description</label>
					<input type="text" class="extra" id="event_description" name="event_description" size="74%" /><br /><br />
					<label class="event_file">Upload Image</label>
					<input type="file" class="extra" id="event_file" name="event_file" /><br />
				</form>
				
					<div id='eventpreview'></div>
				</div>
				<div class="test">
					<label for="anonymous" value="Anonymous" id="anony"  style="display: inline;"><input type="checkbox" name="anonymous" id="anonymous" class="test" value="1"></input><img class="ivy" src="views/default/images/ivyblack.png" style="vertical-align: -4px; height: 17px;" />Anonymous</label></div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<div id="theseselects">
				
					<img src="views/default/images/icons/leaf.png" style="opacity: .3;vertical-align: -4px; margin-top: 10px;" /><span>&nbspMessage Decays in 
					<span id="setselects" style="opacity: 0; display:none;">&nbsp
						<select id="mins" class="styledselect">
							<option value="0">0</option>
							<option value="5">5</option>
							<option value="10">10</option>
							<option value="15">15</option>
							<option value="30">30</option>
							<option value="40">40</option>
							<option value="50">50</option>
						</select>
						<label>Minutes</label>&nbsp
						<select id="hours" class="styledselect">
							<option value="0">0</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3" selected>3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
						</select>
						<label>Hours<option value="0">0</option></label>&nbsp
						<select id="days" class="styledselect">
							<option value="0">0</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
						</select>
						<label>Days</label>&nbsp
						<select id="months" class="styledselect">
							<option value="0">0</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
						</select>
						<label>Months</label>&nbsp
						<select id="years" class="styledselect">
							<option value="0">0</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
						<label>Years</label>&nbsp&bull;&nbsp
					</span><span onclick="infiniteset()" onmouseover="$('#infinitesymbol').css({'color':'#777777'});" onmouseout="infhover()" id="infinitesymbol">oo</span>&nbsp&nbsp&bull;&nbsp<span onclick="showset()" onmouseover="$('#setstyle').css({'color':'#777777'});" onmouseout="sethover()" id="setstyle">Set</span></span>
					
					<input type="checkbox" id="settime"></input>
				</div>
				
				<div align="center">
					
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

<hr style="height: 1px; margin: 15px; background: #fff; border: none;" />

	<h1 class="engraved" style="opacity:.5;">LATEST</h1>
	<hr style="height: 1px; width: 80%; background: #fff; border: none; margin-top: 10px;" />
	<table>
		<input type="hidden" value="{mId}"></input>
		<div id="counter1"></div>
		<div id="wallrefreshnew"></div>
		<div id="eventaddition"></div>
		<div id="postaddition"></div>
		<div id="wallrefresh"></div>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId1}">{senderName1}</a></strong>{message1}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">{exp1}{expD1}{expH1}{expM1}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">{whenSent1}</div>
		</tr>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId2}">{senderName2}</a></strong>{message2}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">{exp2}{expD2}{expH2}{expM2}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">{whenSent2}</div>
		</tr>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId3}">{senderName3}</a></strong>{message3}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">{exp3}{expD3}{expH3}{expM3}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">{whenSent3}</div>
		</tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId4}">{senderName4}</a></strong>{message4}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">{exp4}{expD4}{expH4}{expM4}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">{whenSent4}</div>
		</tr>
		<tr>	
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId5}">{senderName5}</a></strong>{message5}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">{exp5}{expD5}{expH5}{expM5}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">{whenSent5}</div>
		</tr>
		<tr>	
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId6}">{senderName6}</a></strong>{message6}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">{exp6}{expD6}{expH6}{expM6}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">{whenSent6}</div>
		</tr>
		<tr>	
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId7}">{senderName7}</a></strong>{message7}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">{exp7}{expD7}{expH7}{expM7}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">{whenSent7}</div>
		</tr>
		<tr>	
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId8}">{senderName8}</a></strong>{message8}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">{exp8}{expD8}{expH8}{expM8}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">{whenSent8}</div>
		</tr>
		<tr>	
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId9}">{senderName9}</a></strong>{message9}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">{exp9}{expD9}{expH9}{expM9}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">{whenSent9}</div>
		</tr>
		<tr>	
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId10}">{senderName10}</a></strong>{message10}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">{exp10}{expD10}{expH10}{expM10}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">{whenSent10}</div>
		</tr>
		<tr>	
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId11}">{senderName11}</a></strong>{message11}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">{exp11}{expD11}{expH11}{expM11}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">{whenSent11}</div>
		</tr>
		<tr>	
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId12}">{senderName12}</a></strong>{message12}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">{exp12}{expD12}{expH12}{expM12}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">{whenSent12}</div>
		</tr>
		<tr>	
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId13}">{senderName13}</a></strong>{message13}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">{exp13}{expD13}{expH13}{expM13}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">{whenSent13}</div>
		</tr>
		<tr>	
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId14}">{senderName14}</a></strong>{message14}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">{exp14}{expD14}{expH14}{expM14}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">{whenSent14}</div>
		</tr>
		<tr>	
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId15}">{senderName15}</a></strong>{message15}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">{exp15}{expD15}{expH15}{expM15}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">{whenSent15}</div>
		</tr>
		<tr>	
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId16}">{senderName16}</a></strong>{message16}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">{exp16}{expD16}{expH16}{expM16}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">{whenSent16}</div>
		</tr>
		<tr>	
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId17}">{senderName17}</a></strong>{message17}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">{exp17}{expD17}{expH17}{expM17}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">{whenSent17}</div>
		</tr>
		<tr>	
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId18}">{senderName18}</a></strong>{message18}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">{exp18}{expD18}{expH18}{expM18}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">{whenSent18}</div>
		</tr>
		<tr>	
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId19}">{senderName19}</a></strong>{message19}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">{exp19}{expD19}{expH19}{expM19}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">{whenSent19}</div>
		</tr>
		<tr>	
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId20}">{senderName20}</a></strong>{message20}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">{exp20}{expD20}{expH20}{expM20}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">{whenSent20}</div>
		</tr>
		<tr>	
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId21}">{senderName21}</a></strong>{message21}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">{exp21}{expD21}{expH21}{expM21}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">{whenSent21}</div>
		</tr>
		<tr>	
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId22}">{senderName22}</a></strong>{message22}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">{exp22}{expD22}{expH22}{expM22}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">{whenSent22}</div>
		</tr>
		<tr>	
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId23}">{senderName23}</a></strong>{message23}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">{exp23}{expD23}{expH23}{expM23}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">{whenSent23}</div>
		</tr>
		<tr>	
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId24}">{senderName24}</a></strong>{message24}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">{exp24}{expD24}{expH24}{expM24}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">{whenSent24}</div>
		</tr>
		<tr>	
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId25}">{senderName25}</a></strong>{message25}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">{exp25}{expD25}{expH25}{expM25}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">{whenSent25}</div>
		</tr>
			
	</table>
	
	<h1 class="engraved" style="opacity:.5;">EARLIEST</h1>
	
</div>
</div>
</center>