<div id="content" style="margin-top: 45px;">
	<h1>{group_name}</h1>
	<p>{group_description}</p>
	<h2>Topics</h2>
	<table>
		<tr>
			<a href="group/{group_id}/create-topic">Create New Topic</a>
		</tr>
		<p></p>
		<tr>
			<th width="250px" bgcolor="#eeeeee" align="left">Topic</th><th width="250px" bgcolor="#eeeeee" align="left">Creator</th><th width="150px" bgcolor="#eeeeee" align="left">Created</th><th width="200px" bgcolor="#eeeeee" align="left">Posts</th>
		</tr>
		<!-- START topics -->
		<tr>
			<td><a href="group/{group_id}/view-topic/{ID}">{name}</a></td><td>{creator_name}</td><td>{created_relative}</td><td>{posts}</td>
		</tr>
		<!-- END topics -->
	</table>
</div>