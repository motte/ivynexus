<?php

/**
 * Private message class
 */
class Message {
	/**
	 * The registry object
	 */
	private $registry;
	
	/**
	 * ID of the message
	 */
	private $messageId = 0;
	
	/**
	 * ID of the sender
	 */
	private $senderId;
	
	/**
	 * Name of the sender
	 */
	private $senderName;
	
	/**
	 * ID of the thread
	 */
	private $threadId;
	
	/**
	 * When the message was sent (TIMESTAMP)
	 */
	private $sent;
	
	/**
	 * User readable, visible format of the time the message was sent
	 */
	private $sentRelativeTime;

	/**
	 * The message content itself
	 */
	private $message;
	
	/**
	 * Message constructor
	 * @param Registry $registry the registry object
	 * @param int $id the ID of the message
	 * @return void
	 */

	public function __construct(Registry $registry, $threadId) {
		$this->registry = $registry;
		$this->threadId = $threadId; /* this is the threadID that is passed to this model from the controller */
		if($this->threadId > 0) {
			$this->registry->getObject('template')->getPage()->addTag("tId", $this->threadId);
		
			$sql = "SELECT messageId, senderId, senderName, body, expirationFuse as selfdestruct, DATE_FORMAT(created, '%M %D %Y') as whenSent, created FROM thread_messages WHERE messageThreadId='$this->threadId' AND deleted='0' ORDER BY created DESC LIMIT 50";
			
			$query = $this->registry->getObject('db')->executeQuery($sql);
			

			$counter = "1";
			$ids = array();	
			
			while($data = $this->registry->getObject('db')->getRows()) {
				$ids[] = $data['messageId'];

		
				if($data['selfdestruct'] == '0000-00-00 00:00:00'){
					$whenExpires = '';		
					$this->registry->getObject('template')->getPage()->addTag('senderId'.$counter, $data['senderId']);
				$this->registry->getObject('template')->getPage()->addTag('senderName'.$counter, $data['senderName'].': ');
				$this->registry->getObject('template')->getPage()->addTag('message'.$counter, $data['body']);
				$this->registry->getObject('template')->getPage()->addTag('exp'.$counter, $whenExpires);
					$this->registry->getObject('template')->getPage()->addTag('expD'.$counter, '');
					$this->registry->getObject('template')->getPage()->addTag('expH'.$counter, '');
					$this->registry->getObject('template')->getPage()->addTag('expM'.$counter, '');
					$this->registry->getObject('template')->getPage()->addTag('expS'.$counter, '');
					$this->registry->getObject('template')->getPage()->addTag('whenSent'.$counter, 'Sent on '.$data['whenSent'].'<hr style="height: 1px; width: 80%; background: #fff; border: none;" />');
					$counter++;
				}
				
				else {

					// This takes the difference in seconds from a unix timestamp for both when created and the selfdestruct timer to determine expiration
					// For some reason the difference is backward on the internal server
					$difference = strtotime($data['selfdestruct'])-strtotime($data['created']);
					//$difference = strtotime($data['created'])-strtotime($data['selfdestruct']);
					
					if($difference < 0) {
						$mId = $data['messageId'];
						$sqlupdate = "UPDATE thread_messages SET deleted='1' WHERE messageId='$mId'";
						$queryupdate = $this->registry->getObject('db')->executeQuery($sqlupdate);
						$counter;
					}
					else {
						$whenExpires = date('F d, Y h:i:s',strtotime($data['selfdestruct']));
						$whenExpires = 'Message expires '.$whenExpires;
						$this->registry->getObject('template')->getPage()->addTag('senderId'.$counter, $data['senderId']);
				$this->registry->getObject('template')->getPage()->addTag('senderName'.$counter, $data['senderName'].': ');
				$this->registry->getObject('template')->getPage()->addTag('message'.$counter, $data['body']);
				$this->registry->getObject('template')->getPage()->addTag('exp'.$counter, $whenExpires);
					$this->registry->getObject('template')->getPage()->addTag('expD'.$counter, '');
					$this->registry->getObject('template')->getPage()->addTag('expH'.$counter, '');
					$this->registry->getObject('template')->getPage()->addTag('expM'.$counter, '');
					$this->registry->getObject('template')->getPage()->addTag('expS'.$counter, '');
					$this->registry->getObject('template')->getPage()->addTag('whenSent'.$counter, 'Sent on '.$data['whenSent'].'<hr style="height: 1px; width: 80%; background: #fff; border: none;" />');
					$counter++;
					}
				}
				
			}
				$this->registry->getObject('template')->getPage()->addTag('mId', $ids[0]);
				$update = array();
				$update['read_status'] = 1;
				$p_id = $this->registry->getObject('authenticate')->getUser()->getUserID();
				$this->registry->getObject('db')->updateRecords('thread_participants', $update, 'threadId='.$this->threadId.' AND viewerId='.$p_id);
			while($counter < "26") {
					$this->registry->getObject('template')->getPage()->addTag('senderId'.$counter, '');
					$this->registry->getObject('template')->getPage()->addTag('senderName'.$counter, '');
					$this->registry->getObject('template')->getPage()->addTag('message'.$counter, '');
					$this->registry->getObject('template')->getPage()->addTag('exp'.$counter, '');
					$this->registry->getObject('template')->getPage()->addTag('expD'.$counter, '');
					$this->registry->getObject('template')->getPage()->addTag('expH'.$counter, '');
					$this->registry->getObject('template')->getPage()->addTag('expM'.$counter, '');
					$this->registry->getObject('template')->getPage()->addTag('expS'.$counter, '');
					$this->registry->getObject('template')->getPage()->addTag('whenSent'.$counter, '');
					$counter++;
			}
			/*}
			else {
				echo "Epic Fail";
			}*/
		}
	}
	
	/**
	 * Set the sender of the message
	 * @param int $sender
	 * @return void
	 */
	public function setThreadId($threadId) {
		$this->threadId = $threadId;
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
	 * @param String $message
	 * @return void
	 */
	public function setMessage($message) {
		$this->message = $message;
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