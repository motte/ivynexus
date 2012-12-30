<div id="rightside">
	<ul>
		<li><a href="group/{group_id}">{group_name}</a></li>
		<li><a href="group/{group_id}/create-topic">Create New Topic</a></li>
	</ul>
</div>

<div id="content">
	<h1>{topic_name}</h1>
	<!-- START posts -->
	<p>{post}</p>
	<p><em>Posted by {creator_relative_post} on {relative_created_post}</em></p>
	<hr />
	<!-- END posts -->
	<h2>Reply to this topic</h2>
	<form action="group/{group_id}/reply-to-topic/{topic_id}" method="post">
		<textarea id="post" name="post"></textarea>
		<input type="submit" id="np" name="np" value="Reply" />
	</form>
</div>