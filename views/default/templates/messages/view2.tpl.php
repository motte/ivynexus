<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript"> 
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
</script>
<center>
<div id="main">
<div id="content">
	<div id="adjustpostbox">
                        <hr color="#eee" size="1" style="margin-top: -1px;" />
			<!-- This is where you adjust the textarea shout out area width:98%; -->
				<textarea id="postbox" name="postbox" class="input" placeholder=" Shout Out To Dartmouth!" wrap="hard"></textarea>
				
				
				<input type="hidden" name="school" id="school" value="dartmouth" />
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
					<input type="text" id="url" class="extra" name="link_url" size="83%" /><br /><br />
					<label for="link_description">Description</label>
					<input type="text" id="linkdescription" class="extra" name="link_description" size="74%" /><br />
				</div>
				<div id="align" class="event_input  extra_field">
				<form id="eventform" method="post" enctype="multipart/form-data" action="controllers/ivies/dc/eventcontroller.php">
					<label class="event_url">Event</label>
					<input type="text" id="event_url" class="extra" name="event_url" size="81%" /><br /><br />
					<label for="event_start">Start Date</label>
					<input type="date" class="extra" id="event_start" name="event_start" size="25%" style="padding-right: 5%;" placeholder="e.g. 2012-05-28   Y-M-D" />
					<label for="event_starttime">Time</label>
					<input type="time" class="extra" id="event_starttime" name="event_starttime" size="12%" style="padding-right: 11%;" placeholder="e.g. 7:05 PM" /><br /><br />
					<label class="event_end">End Date</label>
					<input type="date" id="event_end" class="extra" name="event_end" size="26%" style="padding-right: 5%;" placeholder="e.g. 2012-05-29   Y-M-D" />
					<label for="event_endtime">Time</label>
					<input type="time" class="extra" id="event_endtime" name="event_endtime" size="12%" style="padding-right: 11%;" placeholder="e.g. 12 AM" /><br /><br />
					<label for="event_description">Description</label>
					<input type="text" class="extra" id="event_description" name="event_description" size="74%" /><br /><br />
					<label class="event_file">Upload Image</label>
					<input type="file" class="extra" id="event_file" name="event_file" /><br />
				</form>
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

<hr style="height: 1px; margin: 15px; background: #fff; border: none;" />

	<h1 class="engraved" style="opacity:.5;">LATEST</h1>
	<hr style="height: 1px; width: 80%; background: #fff; border: none; margin-top: 10px;" />
	<table>
		<input type="hidden" value="{mId}"></input>
		<div id="counter1"></div>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId1}">{senderName1}: </a></strong>{message1}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">Self-Destruct in {expD1}{expH1}{expM1}{expS1}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">Sent on {whenSent1}</div>
			<hr style="height: 1px; width: 80%; background: #fff; border: none;" />
		</tr>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId2}">{senderName2}: </a></strong>{message2}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">Self-Destruct in {expD2}{expH2}{expM2}{expS2}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">Sent on {whenSent2}</div>
			<hr style="height: 1px; width: 80%; background: #fff; border: none;" />
		</tr>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId3}">{senderName3}: </a></strong>{message3}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">Self-Destruct in {expD3}{expH3}{expM3}{expS3}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">Sent on {whenSent3}</div>
			<hr style="height: 1px; width: 80%; background: #fff; border: none;" />
		</tr>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId4}">{senderName4}: </a></strong>{message4}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">Self-Destruct in {expD4}{expH4}{expM4}{expS4}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">Sent on {whenSent4}</div>
			<hr style="height: 1px; width: 80%; background: #fff; border: none;" />
		</tr>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId5}">{senderName5}: </a></strong>{message5}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">Self-Destruct in {expD5}{expH5}{expM5}{expS5}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">Sent on {whenSent5}</div>
			<hr style="height: 1px; width: 80%; background: #fff; border: none;" />
		</tr>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId6}">{senderName6}: </a></strong>{message6}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">Self-Destruct in {expD6}{expH6}{expM6}{expS6}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">Sent on {whenSent6}</div>
			<hr style="height: 1px; width: 80%; background: #fff; border: none;" />
		</tr>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId7}">{senderName7}: </a></strong>{message7}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">Self-Destruct in {expD7}{expH7}{expM7}{expS7}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">Sent on {whenSent7}</div>
			<hr style="height: 1px; width: 80%; background: #fff; border: none;" />
		</tr>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId8}">{senderName8}: </a></strong>{message8}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">Self-Destruct in {expD8}{expH8}{expM8}{expS8}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">Sent on {whenSent8}</div>
			<hr style="height: 1px; width: 80%; background: #fff; border: none;" />
		</tr>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId9}">{senderName9}: </a></strong>{message9}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">Self-Destruct in {expD9}{expH9}{expM9}{expS9}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">Sent on {whenSent9}</div>
			<hr style="height: 1px; width: 80%; background: #fff; border: none;" />
		</tr>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId10}">{senderName10}: </a></strong>{message10}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">Self-Destruct in {expD10}{expH10}{expM10}{expS10}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">Sent on {whenSent10}</div>
			<hr style="height: 1px; width: 80%; background: #fff; border: none;" />
		</tr>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId11}">{senderName11}: </a></strong>{message11}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">Self-Destruct in {expD11}{expH11}{expM11}{expS11}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">Sent on {whenSent11}</div>
			<hr style="height: 1px; width: 80%; background: #fff; border: none;" />
		</tr>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId12}">{senderName12}: </a></strong>{message12}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">Self-Destruct in {expD12}{expH12}{expM12}{expS12}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">Sent on {whenSent12}</div>
			<hr style="height: 1px; width: 80%; background: #fff; border: none;" />
		</tr>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId13}">{senderName13}: </a></strong>{message13}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">Self-Destruct in {expD13}{expH13}{expM13}{expS13}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">Sent on {whenSent13}</div>
			<hr style="height: 1px; width: 80%; background: #fff; border: none;" />
		</tr>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId14}">{senderName14}: </a></strong>{message14}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">Self-Destruct in {expD14}{expH14}{expM14}{expS14}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">Sent on {whenSent14}</div>
			<hr style="height: 1px; width: 80%; background: #fff; border: none;" />
		</tr>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId15}">{senderName15}: </a></strong>{message15}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">Self-Destruct in {expD15}{expH15}{expM15}{expS15}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">Sent on {whenSent15}</div>
			<hr style="height: 1px; width: 80%; background: #fff; border: none;" />
		</tr>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId16}">{senderName16}: </a></strong>{message16}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">Self-Destruct in {expD16}{expH16}{expM16}{expS16}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">Sent on {whenSent16}</div>
			<hr style="height: 1px; width: 80%; background: #fff; border: none;" />
		</tr>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId17}">{senderName17}: </a></strong>{message17}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">Self-Destruct in {expD17}{expH17}{expM17}{expS17}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">Sent on {whenSent17}</div>
			<hr style="height: 1px; width: 80%; background: #fff; border: none;" />
		</tr>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId18}">{senderName18}: </a></strong>{message18}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">Self-Destruct in {expD18}{expH18}{expM18}{expS18}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">Sent on {whenSent18}</div>
			<hr style="height: 1px; width: 80%; background: #fff; border: none;" />
		</tr>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId19}">{senderName19}: </a></strong>{message19}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">Self-Destruct in {expD19}{expH19}{expM19}{expS19}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">Sent on {whenSent19}</div>
			<hr style="height: 1px; width: 80%; background: #fff; border: none;" />
		</tr>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId20}">{senderName20}: </a></strong>{message20}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">Self-Destruct in {expD20}{expH20}{expM20}{expS20}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">Sent on {whenSent20}</div>
			<hr style="height: 1px; width: 80%; background: #fff; border: none;" />
		</tr>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId21}">{senderName21}: </a></strong>{message21}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">Self-Destruct in {expD21}{expH21}{expM21}{expS21}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">Sent on {whenSent21}</div>
			<hr style="height: 1px; width: 80%; background: #fff; border: none;" />
		</tr>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId22}">{senderName22}: </a></strong>{message22}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">Self-Destruct in {expD22}{expH22}{expM22}{expS22}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">Sent on {whenSent22}</div>
			<hr style="height: 1px; width: 80%; background: #fff; border: none;" />
		</tr>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId23}">{senderName23}: </a></strong>{message23}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">Self-Destruct in {expD23}{expH23}{expM23}{expS23}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">Sent on {whenSent23}</div>
		
		</tr>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId24}">{senderName24}: </a></strong>{message24}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">Self-Destruct in {expD24}{expH24}{expM24}{expS24}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">Sent on {whenSent24}</div>
			<hr style="height: 1px; width: 80%; background: #fff; border: none;" />
		</tr>
		<tr>
			<p><strong><a class="name" style="color:#000;" href="profile/view/{senderId25}">{senderName25}: </a></strong>{message25}<br /></p>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; color:#333;">Self-Destruct in {expD25}{expH25}{expM25}{expS25}</div>
			<div class="unformattedtime" style="padding-top:10px; font-size:12px; font-style:italic; color:#aaa;">Sent on {whenSent25}</div>
			<hr style="height: 1px; width: 80%; background: #fff; border: none;" />
		</tr>
	</table>
</div>
</div>
</center>