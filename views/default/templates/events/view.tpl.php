<div id="main">
	<div id="rightside">
	</div>
	<div id="content">
	  <h1>{event_name}</h1>
	  <p>{event_description}</p>
	  <p>{event_date}: {event_start_time} until {event_end_time}</p>
	  <h2>Your attendance</h2>
	  <p>You are currently recorded as:</p>
	  <form action="event/change-attendance/{event_id}" method="post">
	     <select name="status">
	        <option value="" {unknown_select}>Unknown - Please select</option>
	        <option value="going" {attending_select}>Attending</option>
	        <option value="not going" {notattending_select}>Not attending</option>
	        <option value="maybe" {maybeattending_select}>Maybe attending</option>
	     </select>
	     <input type="submit" name="" value="Update attendance" />
	  </form>
	  <h2>Attending</h2>
	  <ul>
	     <!-- START attending -->
	     	<li>{name}</li>
	     <!-- END attending -->
	  </ul>
	  <h2>Invited / Awaiting Reply</h2>
	  <ul>
	     <!-- START invited -->
	     	<li>{name}</li>
	     <!-- END invited -->
	  </ul>
	  <h2>Maybe attending</h2>
	  <ul>
	     <!-- START maybeattending -->
	     	<li>{name}</li>
	     <!-- END maybe attending -->
	  </ul>
	  <h2>Not attending</h2>
	  <ul>
	     <!-- START notattending -->
	     	<li>{name}</li>
	￼     <!-- END not attending -->
	  </ul>
	</div>
</div>