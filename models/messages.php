<?php

/**
 * Messages model
 */
class Messages {
	/**
	 * Messages constructor
	 * @paramm Registry $registry
	 * @return void
	 */
	public function __construct(Registry $registry) {
		$this->registry = $registry;
	}
	
	/**
	 * Get a users inbox
	 * @param int $user the user
	 * @return int the cache of messages
	 */
	public function getInbox($user) {
		require_once(FRAMEWORK_PATH.'dbconnect.php');
		
		$query = "SELECT * FROM thread_participants WHERE viewerId='$user' ORDER BY read_status ASC, whenRead DESC LIMIT 25";
		//$query = "SELECT * FROM $participantsTable WHERE viewerId='$user' ORDER BY whenRead DESC LIMIT 7";
		
		//$user_result = mysqli_fetch_array(mysqli_query($query));
		//$cache = implode(",", $user_result);
		$check = mysqli_query($query);
		//$cache = '<div style="margin-top: 300px;">'.implode(",", $user_result).'</div>';
		$counter = "1";
		while($user_result = mysqli_fetch_array($check)) {
		
			if($user_result['read_status'] == 1) {
				$user_result['read_status'] = '';
			}
			else {
				$user_result['read_status'] = '<img src="views/default/images/shinyleaf.png" />';
			}
				//$this->registry->getObject('template')->getPage()->addTag('threads', array('SQL', $check));
				
				/*echo '<td>'.$user_result['read_status'].'</td>';
				echo '<td>&nbsp&nbsp<a href="messages/view/'.$user_result['threadId'].'" style="text-decoration: none;">'.$user_result['participantNames'].'</a></td>';
				echo '<td>&nbsp '.$user_result['whenRead'].'</td>';
				*/
				$this->registry->getObject('template')->getPage()->addTag('t.ID_'.$counter, $user_result['threadId']);
				$this->registry->getObject('template')->getPage()->addTag('read_status_'.$counter, $user_result['read_status']);
				$this->registry->getObject('template')->getPage()->addTag('last_date_'.$counter, $user_result['whenRead']);
				$this->registry->getObject('template')->getPage()->addTag('thread_'.$counter, $user_result['participantNames']);
				$counter++;	
		}
		
		// if there are fewer than 15
		while($counter < "16") {
			$this->registry->getObject('template')->getPage()->addTag('t.ID_'.$counter, '');
			$this->registry->getObject('template')->getPage()->addTag('read_status_'.$counter, '');
			$this->registry->getObject('template')->getPage()->addTag('last_date_'.$counter, '');
			$this->registry->getObject('template')->getPage()->addTag('thread_'.$counter, '');
			$counter++;
		}
		//return $cache;
		
        	
        	
		//if(mysqli_num_rows($result) > 0) {
		//	$sql = "SELECT IF(read=0, 'unread', 'read') as read_status
		// the 'as' keyword is optional
		//$sql = "SELECT IF(m.read=0, 'unread', 'read') as read_style, m.subject, m.ID, m.sender, m.recipient, DATE_FORMAT(m.sent, '%D %M %Y') as sent_relative, psender.name as sender_name FROM messages m, profile psender WHERE psender.user_id=m.sender AND m.recipient=" . $user . " ORDER BY m.ID DESC";
		//	$sql = "SELECT IF(read=0, 'unread', 'read') as read_style FROM $readTable, m.messageId, m.senderId, m.recipient, DATE_FORMAT(m.sent, '%D %M %Y') as sent_relative, psender.name as sender_name FROM $table m, profile psender WHERE psender.user_id=m.sender AND m.recipient=" . $user . " ORDER BY messageId DESC";
		//	$cache = $this->registry->getObject('db')->cacheQuery($sql);
		//}
		//return $cache;
	}
}

?>