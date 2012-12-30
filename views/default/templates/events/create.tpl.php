<div id="main">
	<div id="rightside">
	</div>
	<div id="content">
    	<h1>Create an event</h1>
  		<form action="event/create" method="post">
      		<label for="">Name</label><br />
        	<input type="text" name="name" /><br />
        	<label for="">Type of event</label><br />
        	<select name="type">
        		<option value="public">Public event</option>
        		<option value="private">Private event</option>
        	</select><br />
        	<label for="">Date</label><br />
        	<input type="text" class="select date" name="date" /><br />
        	<label for="">Start time</label><br />
        	<input type="text" class="select time" name="start_time" /><br />
        	<label for="">End time</label><br />
        	<input type="text" class="select time" name="end_time" /><br />
			<label for="">Description</label><br />
			<textarea name="description" cols="45" rows="6"></textarea><br />
		<h2>Invite friends?</h2>
			<p>Select any friends you would like to invite to the event.</p>
        	<!-- START all -->
       			<input type="checkbox" name="invitees[]" value="{ID}" />{users_name}
        	<!-- END all --><br />

        	<input type="submit" name="" value="Create event" />
        </form>
	</div>
</div>