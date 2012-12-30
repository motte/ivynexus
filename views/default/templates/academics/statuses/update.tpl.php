<link type="text/css" href="external/ui-lightness/jquery-ui-1.7.1.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="external/jquery-1.3.2.min.js"></script> 
<script type="text/javascript" src="external/jquery-ui-1.7.2.custom.min.js"></script>
<p>Tell your network what you are up to</p>
<form action="profile/statuses/{profile_user_id}" method="post" enctype="multipart/form-data">
	<textarea id="status" name="status" cols="56"></textarea><br />
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
	<button type="submit" id="updatestatus" class="btn" name="updatestatus" value="Update">Update</button>
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