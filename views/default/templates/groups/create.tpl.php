

<div id="content">
	<div style="margin-top: 45px;">
	<h1>Create a new club</h1>
	<div style="margin-left: 10px">
	<form action="groups/create" method="post">
		<label for="name">Name</label><br />
		<input type="text" id="name" name="name" value="" onFocus="this.style.color='#000000';" /><br />
		<label for="description" name"description">Description</label><br />
		<textarea id="description" name="description"></textarea><br />
		<label for="type">Type</label><br />
		
		<select id="type" name="type">
			<option value="public">Public Club</option>
			<option value="private">Private Club</option>
			<option value="private-member-invite">Private (Invite Only) Club</option>
			<option value="private-self-invite">Private (Self-Invite) Club</option>
		</select><br /><br />
		
		<input type="submit" id="create" name="create" value="Create group" />
	</form>
	</div>
	</div>
</div>