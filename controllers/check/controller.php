<?php
	include_once('../../dbconnect.php');
	$user = mysqli_real_escape_string($_GET["a"]);

	$query = "SELECT crush_counter, job_counter, first_time FROM users WHERE ID='$user'";
	//$query = "SELECT crush_counter, job_counter FROM users WHERE ID='$user'";
	$result = mysqli_query($query);
	$row = mysqli_fetch_array($result);
	
	/*){
			echo "<p><strong>".$row['name']."</strong>: ". $row['post']."</p>";
			echo "<hr color='#eee' size='1' />";
		}*/
if ($row['first_time'] == 0) {
	if ($row['job_counter'] > 0 && $row['crush_counter'] > 0) {
		if($row['job_counter'] == 1 && $row['crush_counter'] == 1) {
			echo '<br /><br /><tr align="left" valign="top">
			<div id="jobfield" class="jobfield" onmouseover="viewed(); this.onmouseover=null;">
				<a id="envelope" class="envelope"></a>Jobs & Internships
				<div class="message">You have a new job/internship offer</div>
			</div>
		</tr>
		<div class="tenspace"></div>
		<tr align="left" valign="top">
			<div id="jobfield" class="jobfield" onmouseover="viewed(); this.onmouseover=null;">
				<a href="/crush" id="redenvelope" class="redenvelope"></a>Crushes
				<div class="message">Someone has a new crush on you</div>
			</div>
		</tr>';
	}
	elseif($row['job_counter'] > 1 && $row['crush_counter'] == 1) {
			echo '<br /><br /><tr align="left" valign="top">
			<div id="jobfield" class="jobfield" onmouseover="viewed(); this.onmouseover=null;">
				<a id="envelope" class="envelope"></a>Jobs & Internships
				<div class="message">You have ' . $row['job_counter'] . ' new job/internship offers</div>
			</div>
		</tr>
		<div class="tenspace"></div>
		<tr align="left" valign="top">
			<div id="jobfield" class="jobfield" onmouseover="viewed(); this.onmouseover=null;">
				<a href="/crush"id="redenvelope" class="redenvelope"></a>Crushes
				<div class="message">Someone has a new crush on you</div>
			</div>
		</tr>';
	}
	elseif($row['job_counter'] == 1 && $row['crush_counter'] > 1) {
			echo '<br /><br /><tr align="left" valign="top">
			<div id="jobfield" class="jobfield" onmouseover="viewed(); this.onmouseover=null;">
				<a id="envelope" class="envelope"></a>Jobs & Internships
				<div class="message">You have a new job/internship offer</div>
			</div>
		</tr>
		<div class="tenspace"></div>
		<tr align="left" valign="top">
			<div id="jobfield" class="jobfield" onmouseover="viewed(); this.onmouseover=null;">
				<a href="/crush" id="redenvelope" class="redenvelope"></a>Crushes
				<div class="message">' . $row['crush_counter'] . ' new people have a crush on you</div>
			</div>
		</tr>';
	}
	else {
	        echo '<br /><br /><tr align="left" valign="top">
			<div id="jobfield" class="jobfield" onmouseover="viewed(); this.onmouseover=null;">
				<a id="envelope" class="envelope"></a>Jobs & Internships
				<div class="message">You have ' . $row['job_counter'] . ' new job/internship offers</div>
			</div>
		</tr>
		<div class="tenspace"></div>
		<tr align="left" valign="top">
			<div id="jobfield" class="jobfield" onmouseover="viewed(); this.onmouseover=null;">
				<a href="/crush" id="redenvelope" class="redenvelope"></a>Crushes
				<div class="message">' . $row['crush_counter'] . ' new people have a crush on you</div>
			</div>
		</tr>';
		}
	}
	
	elseif ($row['job_counter'] > 0 && $row['crush_counter'] <= 0) {
	        if($row['job_counter'] = 1) {
	        echo '<br /><br /><tr align="left" valign="top">
			<div id="jobfield" class="jobfield" onmouseover="viewed(); this.onmouseover=null;">
				<a id="envelope" class="envelope"></a>Jobs & Internships
				<div class="message">You have a new job/internship offer</div>
			</div>
		</tr>';}
		else{
		echo '<br /><br /><tr align="left" valign="top">
			<div id="jobfield" class="jobfield" onmouseover="viewed(); this.onmouseover=null;">
				<a id="envelope" class="envelope"></a>Jobs & Internships
				<div class="message">You have ' . $row['job_counter'] . ' new job/internship offers</div>
			</div>
		</tr>';}
	}
	
	
	elseif ($row['job_counter'] <=0 && $row['crush_counter'] > 0) {
	         if($row['crush_counter'] = 1) {
	        echo '<br /><br /><tr align="left" valign="top">
			<div id="jobfield" class="jobfield" onmouseover="viewed(); this.onmouseover=null;">
				<a href="/crush" id="redenvelope" class="redenvelope"></a>Crushes
				<div class="message">Someone has a crush on you</div>
			</div>
		</tr>';}
		else{
		echo '<br /><br /><tr align="left" valign="top">
			<div id="jobfield" class="jobfield" onmouseover="viewed(); this.onmouseover=null;">
				<a href="/crush" id="redenvelope" class="redenvelope"></a>Crushes
				<div class="message">' . $row['crush_counter'] . ' new people have a crush on you</div>
			</div>
		</tr>';}
	}
	
	else {
		echo '';
		//echo '<br /><br /><div class="announcement"><font size="4">Want exclusive jobs offers?</font><br /><br /><div style="margin-left: 100px; line-height: 30px;">Have employers contact <u>you</u> with offers - Just fill out and update your academic profile, and our matching algorithm will directly connect you with employers.</div></div><br />';
	}
}

else {
	$update = "UPDATE users SET first_time=0 where ID='$user'";
	mysqli_query($update);
	echo '<li id="firsttime" value="1" style="display:none;"></li>';
	//echo '<li id="firsttime" value="1" style="display:none;"></li><div class="announcement"><font size="4">Want exclusive jobs offers?</font><br /><br /><div style="margin-left: 100px; line-height: 30px;">Have employers contact <u>you</u> with offers - Just fill out and update your academic profile, and our matching algorithm will directly connect you with employers.</div></div><br />';
}

?>