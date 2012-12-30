<div id="content" style="margin-top: 45px;">
	<h1>Create New Topic</h1>
	<form action="group/{group_id}/create-topic" method="post">
		<label for="name">Topic Name</label><br />
		<input type="text" id="name" name="name" value="" onFocus="this.style.color='#000000';" /><br />
		<label for="post">First Post</label><br />
		<textarea id="post" name="post"></textarea><br /><br />
		
		<input type="submit" id="create" name="create" value="Create topic" /><br /><br />
		<a href="group/{group_id}">{group_name}</a>
	</form>
</div>