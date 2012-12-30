<link rel="stylesheet" type="text/css" href="external/css/userbar_style.css" />
<div id="rightside">
</div>

<div id="content">

	<h1 style="margin-top: 50px;">Nexus Stream</h1>
	
	<link type="text/css" href="external/ui-lightness/jquery-ui-1.7.1.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="external/jquery-1.3.2.min.js"></script> 
<script type="text/javascript" src="external/jquery-ui-1.7.2.custom.min.js"></script>
<p>Tell your network what you are up to</p>
<form action="stream/{p_id}" method="post" enctype="multipart/form-data">
	<textarea id="stream" name="status"></textarea><span style="position:absolute; padding-left: 3px; padding-top:1px;"><button type="submit" id="updatestatusstream" class="btn" name="updatestatusstream" value="Update">Update</button></span><br />
	<input type="radio" name="status_type" id="status_checker_update" class="status_checker" value="update" checked /> Update &nbsp
	<input type="radio" name="status_type" id="status_checker_video" class="status_checker" value="video" /> Video &nbsp
	<input type="radio" name="status_type" id="status_checker_image" class="status_checker" value="image" /> Image &nbsp
	<input type="radio" name="status_type" id="status_checker_link" class="status_checker" value="link" /> Link &nbsp
	<div class="spaceten"></div>
	<div class="video_input  extra_field">
		<label for="video_url" class="">YouTube URL</label>
		<input type="text" id="" name="video_url" class="" /><br />
	</div>
	<div class="image_input  extra_field">
		<label class="image_file" class="">Upload image</label>
		<input type="file" id="" name="image_file" class="" /><br />
	</div>
	<div class="link_input  extra_field">
		<label class="link_url" class="">Link</label>
		<input type="text" id="" name="link_url" class="" /><br />
		<label for="link_description" class="">Description</label>
		<input type="text" id="" name="link_description" class="" /><br />
	</div>
	
</form>

<script type="text/javascript"> 
$(function() {
	$('.extra_field').hide();
	$("input[name='status_type']").change(function(){
		$('.extra_field').hide();
	    $('.'+ $("input[name='status_type']:checked").val() + '_input').show();
	});
});
</script>

	<div id="stream">
	{status_update}
	<table>
		<td align="left" width="1" bgcolor="#eeeeee"></td>
		<td>
		<!-- {status_update_message} -->
			<!-- START stream -->
				{stream-{status_id}}
				<!-- START comments-{status_id} -->
				<p> {comment} by {commenter}</p>
				<!-- END comments-{status_id} -->
				
				<!-- START likes-{status_id} -->
				<p>{liker} likes this</p>
				<!-- END likes-{status_id} -->
			
				<!-- START dislikes-{status_id} -->
				<p>{liker} dislikes this</p>
				<!-- END dislikes-{status_id} -->
				<div id="gray">
					
				</div>
			<!-- END stream -->
		</td>
	</table>
	</div>
</div>