<?php

/**
 * idea class
 */
class Idea {
	/**
	 * The registry object
	 */
	public $registry;
	
	/**
	 * id of the idea
	 */
	public $ideaId;
	
	/**
	 * id of the idea sharer
	 */
	public $senderId;
	
	/**
	 * Name of the sharer
	 */
	public $senderName;

	/**
	 * The idea description
	 */
	public $ideaDescription;
	
	/**
	 * Idea constructor
	 * @param Registry $registry the registry object
	 * @param int $id the ID of the idea
	 * @return void
	 */
	public function __construct(Registry $registry, $ideaId) {
		$this->registry = $registry;
		include_once('../dbconnect.php');
		$this->ideaId = $ideaId; /* this is the ideaId that is passed to this model from the controller */
		if($this->ideaId > 0) {
			//$this->registry->getObject('template')->getPage()->addTag("tId", $this->ideaId);
			//$sql = "SELECT * FROM ideas AS i, chili_ideas AS c WHERE i.id='$this->ideaId' AND c.id=i.id LIMIT 1";
			//$sql = "SELECT * FROM ideas INNER JOIN chili_ideas ON chili_ideas.c_receiver=ideas.id AND ideas.id='$ideaId'";
			$sql = "SELECT * FROM ideas WHERE id='$ideaId'";
			//$result = mysqli_query($sql) or die(mysqli_error());
			$query = $this->registry->getObject('db')->executeQuery($sql);
			//$rows = mysqli_num_rows($result);
			if($this->registry->getObject('db')->numRows() > 0) {
				$data = $this->registry->getObject('db')->getRows();
				//$data = mysqli_fetch_array($result) or die(mysqli_error());
				$this->registry->getObject('template')->getPage()->addTag('idea_id', $data['id']);
				$this->registry->getObject('template')->getPage()->addTag('idea_name', $data['idea_name']);
				$this->registry->getObject('template')->getPage()->addTag('idea_description', $data['description']);
				$this->registry->getObject('template')->getPage()->addTag('chilis', $data['chilis']);
				$this->registry->getObject('template')->getPage()->addTag('supporters', $data['support']);
				$this->registry->getObject('template')->getPage()->addTag('when_added', $data['when_added']);
				//$p_id = $this->registry->getObject('authenticate')->getUser()->getUserID();
				//$this->registry->getObject('db')->updateRecords('thread_participants', $update, 'threadId='.$this->ideaId.' AND viewerId='.$p_id);
			}
			else {
				$this->registry->getObject('template')->getPage()->addTag('idea_name', '');
				$this->registry->getObject('template')->getPage()->addTag('when_added', "Oops...how did you get here?  Go somewhere else.  If you keep ending up here, contact us and we'll help!<br /><br />");
				$this->registry->getObject('template')->getPage()->addTag('idea_description', '');
			}
		}
		else {
			$this->registry->getObject('template')->getPage()->addTag('when_added', "Oops...how did you get here?  Go somewhere else.  If you keep ending up here, contact us and we'll help!<br /><br />");
			$this->registry->getObject('template')->getPage()->addTag('idea_name',  '');
			$this->registry->getObject('template')->getPage()->addTag('idea_description', '');
		}
	}
	
	/**
	 * Set the sender of the message
	 * @param int $sender
	 * @return void
	 */
	public function setThreadId($ideaId) {
		$this->ideaId = $ideaId;
	}
	
	/**
	 * Set the sender of the message
	 * @param int $sender
	 * @return void
	 */
	public function setSenderId($senderId) {
		$this->senderId = $senderId;
	}
	
	/**
	 * Set the sender name of the message
	 * @param int $recipient
	 * @return void
	 */
	public function setSenderName($senderName) {
		$this->senderName = $senderName;
	}
	
	/**
	 * Set the message itself
	 * @param String $ideaDescription
	 * @return void
	 */
	public function setMessage($ideaDescription) {
		$this->ideaDescription = $ideaDescription;
	}
	
	/**
	 * Set when self-destructs
	 * @param boolean $datetime
	 * @return void
	 */
	public function setexpirationFuse($expiration) {
		$this->expirationFuse = $expiration;
	}
	
	/**
	 * Set if the message has been read
	 * @param boolean $read
	 * @return void
	 */
	public function setDeleted($deleted) {
		$this->deleted = $deleted;
	}
	
	
	/**
	 * Save the message into the database
	 * @return void This still needs to be turned into a loop to accomodate multiple participants
	 */
	public function save() {
		if($this->threadId > 0) {
			$update = array();
			$update['messageThreadId'] = $this->threadId;
			$update['senderId'] = $this->senderId;
			$update['senderName'] = $this->senderName;
			$update['body'] = $this->message;
			/*($update['expirationFuse'] = current time + 2 hours;*/
			$this->registry->getObject('db')->updateRecords('thread_messages', $update, 'messageThreadId=' . $this->threadId);
		}
		else {
			$insert = array();
			$insert['messageThreadId'] = $this->threadId;
			$insert['senderId'] = $this->senderId;
			$insert['senderName'] = $this->senderName;
			$insert['body'] = $this->message;
			/*$insert['expirationFuse'] = current time + 2 hours;*/
			$this->registry->getObject('db')->insertRecords('messages', $insert);
			$this->threadId = $this->registry->getObject('db')->lastInsertID();
		}
	}
	
	/**
	 * Get the sender of the message
	 * @return int
	 */
	public function getThreadId() {
		return $this->threadId;
	}
	
	/**
	 * Get the sender of the message
	 * @return int
	 */
	public function getSenderId() {
		return $this->senderId;
	}
	
	/**
	 * Get the sender name of the message
	 * @return string
	 */
	public function getSenderName() {
		return $this->senderName;
	}
	
	/**
	 * Get the message itself
	 * @return string text
	 */
	public function getMessage() {
		return $this->message;
	}
	
	/**
	 * Get when self-destructs
	 * @return timestamp
	 */
	public function getExpirationFuse() {
		return $this->expirationFuse;
	}
	
	/**
	 * Get when when sent
	 * @return timestamp
	 */
	public function getSent() {
		return $this->sent;
	}
	
	/**
	 * Convert the message data to template tags
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
	 * Delete the current message
	 * @return boolean
	 */
	public function delete() {
		$sql = "DELETE FROM messages WHERE messageId=" . $this->messageId;
		$this->registry->getObject('db')->executeQuery($sql);
		if($this->registry->getObject('db')->affectedRows() > 0) {
			$this->id = 0;
			return true;
		}
		else {
			return false;
		}
	}
	
}	

?>