<?php

/**
 * Event model
 */
class Crush {
	
	/**
	 * The registry
	 */
	private $registry;
	
	/**
	 * Event ID
	 */
	private $ID;
	
	/**
	 * Event name
	 */
	private $name;
	
	
	/**
	 * Crush constructor
	 * @param Registry $registry the registry
	 * @param int $ID the event ID
	 * @return void
	 */
	public function __construct(Registry $registry) {
		$this->registry = $registry;
		
			$ID = $this->registry->getObject('authenticate')->getUser()->getUserID();
			
			//$sql = "SELECT crush FROM crushes WHERE c_id=".$this->ID;
			//$result = $this->registry->getObject('db')->executeQuery($sql);
			require_once('dbconnect.php');
			$sql = "SELECT crush FROM crushes WHERE c_id='$ID'";
			$query = mysql_query("SELECT crush FROM crushes WHERE c_id='$ID'");
			//$a= mysql_num_rows($query);
			//if($a > 0) {
				$counter='1';
				
				//if(mysql_num_rows($query) > 0) {
				while($data = mysql_fetch_array($query)){
					$crid = $data['crush'];
					$sqlcrushes = "SELECT name FROM profile WHERE user_id='$crid'";
					$result = mysql_query($sqlcrushes);
					$temp = mysql_result($result, 0);
					$temp = '<a href="profile/view/'.$crid.'" id="event">'.$temp.'</a>';
					$this->registry->getObject('template')->getPage()->addTag('crush'.$counter, $temp);
					
					$counter++;
				}
				//}
				
				while($counter < 4) {
					$this->registry->getObject('template')->getPage()->addTag('crush'.$counter, '<em style="color: #ddd;">nobody</em>');
					$counter++;
				}
			//}
			//else{
				//$this->registry->getObject('template')->getPage()->addTag('crush1', '');
				//$this->registry->getObject('template')->getPage()->addTag('crush2', '');
				//$this->registry->getObject('template')->getPage()->addTag('crush3', '');
			//}
	}
	
	/**
	 * Sets the events name
	 * @param String $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}
	
	/**
	 * Sets the creator
	 * @param int $creator the creator
	 * @return void
	 */
	public function setCreator($ID) {
		$this->creator = $ID;
	}
	
	public function setInvitees($invitees) {
		$this->invitees = $invitees;
	}
	
	/** 
	 * Set the events description
	 * @param String $description the description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}
	
	/**
	 * Set the event date
	 * @param String $date the date
	 * @param boolean $formatted - indicates if the controller has formatted the date, or if we need to do it here
	 */
	public function setDate($date, $formatted=true) {
		if($formatted == true) {
			$this->event_date = $date;
		}
		else {
			$temp = explode('/', $date);
			$this->event_date = $temp[2].'-'.$temp[1].'-'.$temp[0];
		}
	}
	
	/**
	 * Sets the start time of the event
	 * @param String $time
	 * return void
	 */
	public function setStartTime($time) {
		$this->start_time = $time;
	}
	
	/**
	 * Sets the end time of the event
	 * @param String $time
	 * return void
	 */
	public function setEndTime($time) {
		$this->end_time = $time;
	}
	
	/**
	 * Set the type of the event
	 * @param String $type the type
	 * @param boolean $checked - indicates if the controller has validated the type of if we need to do it
	 * @return void
	 */
	public function setType($type, $checked=true) {
		if($checked == true) {
			$this->type = $type;
		}
		else {
			$types = array('public', 'private');
			if(in_array($type, $types)) {
				$this->type = $type;
			}
		}
	}
	
	/**
	 * Sets if the event is active
	 * @param bool $active
	 * @return void
	 */
	 public function setActive($active) {
	 	$this->active = $active;
	 }
	 
	 /**
	  * Save the event
	  * @reutrn bool
	  */
	 public function save() {
	 	// handle the updating of a profile
	 	if($registry->getObject('authenticate')->isLoggedIn() && ($registry->getObject('authenticate')->getUser()->getUserID() == $this->creator || $registry->getObject('authenticate')->getUser()->isAdmin() == true || $this->ID == 0)) {
	 		// we are either the user that created the event, or we are the administrator, or the event is being created
	 		$event = array();
	 		foreach($this as $field => $data) {
	 			if(! is_array($field) && ! is_object($field) && $field != 'ID') {
	 				$event[$field] = $this->$field;
	 			}
	 		}
	 		if($this->ID == 0) {
	 			$this->registry->getObject('db')->insertRecords('events', $event);
	 			$this->ID = $this->registry->getObject('db')->lastInsertID();
	 			if(is_array($this->invitees) && count($this->invitees) > 0) {
	 				foreach($this->invitees as $invitee) {
	 					$insert = array();
	 					$insert['event_id'] = $this->ID;
	 					$insert['user_id'] = $invitee;
	 					$insert['status'] = 'invited';
	 					$this->registry->getObject('db')->insertRecords('event_attendees', $insert);
	 				}
	 			}
	 			return true;
	 		}
	 		else {
	 			$this->registry->getObject('db')->updateRecords('events', $event, 'ID=' . $this->ID);
	 			if($this->registry->getObject('db')->affectedRows() == 1) {
	 				return true;
	 			}
	 			else {
	 				return false;
	 			}
	 		}
	 	}
	 	else {
	 		return false;
	 	}
	 }
	 
	 /**
	  * Convert the event data to template tags
	  * @param String $prefix prefix for the template tags
	  * @return void
	  */
	 public function toTags($prefix='') {
	 	foreach($this as $field => $data) {
	 		if(! is_object($data) && ! is_array($data)) {
	 			$this->registry->getObject('template')->getPage()->addTag($prefix.$field, $data);
	 		}
	 	}
	 }
	 
	 /**
	  * Get the event name
	  * @return String
	  */
	 public function getName() {
	 	return $this->name;
	 }
	 
	 /**
	  * Get the users ID
	  * @return int
	  */
	 public function getID() {
	 	return $this->ID;
	 }
	 
	 /**
	  * Get users attending the event
	  * @return int cache id
	  */
	 public function getAttending() {
	 	$sql = "SELECT p.* FROM profile p, event_attendees WHERE p.user_id=a.user_id AND a.status='attending' AND a.event_id=" . $this->ID;
	 	$cache = $this->registry->getObject('db')->cacheQuery($sql);
	 	return $cache;
	 }
	 
	 /**
	  * Get users not attending the event
	  * @return int cache id
	  */
	 public function getNotAttending() {
	 	$sql = "SELECT p.* FROM profile p, event_attendees WHERE p.user_id=a.user_id AND a.status='not attending' AND a.event_id=" . $this->ID;
	 	$cache = $this->registry->getObject('db')->cacheQuery($sql);
	 	return $cache;
	 }
	 
	 /**
	  * Get users maybe attending the event
	  * @return int cache id
	  */
	 public function getMaybeAttending() {
	 	$sql = "SELECT p.* FROM profile p, event_attendees WHERE p.user_id=a.user_id AND a.status='maybe' AND a.event_id=" . $this->ID;
	 	$cache = $this->registry->getObject('db')->cacheQuery($sql);
	 	return $cache;
	 }
	 
	 /**
	  * Get users invited to the event
	  * @return int cache id
	  */
	 public function getInvited() {
	 	$sql = "SELECT p.* FROM profile p, event_attendees WHERE p.user_id=a.user_id AND a.status='invited' AND a.event_id=" . $this->ID;
	 	$cache = $this->registry->getObject('db')->cacheQuery($sql);
	 	return $cache;
	 }
}

?>