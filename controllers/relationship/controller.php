<?php

class Relationshipcontroller {
	/**
	 * Controller constructor - direct call to false when embedded via another controller
	 * This processes the user request to create, approve, or reject a relationship
	 * @param Registry $regsitry our registry
	 * @param bool $directCall - we are calling this variable directly via the framework (true) or via another controller (false)
	 */
	public function __construct(Registry $registry, $directCall) {
		$this->registry = $registry;
		
		$urlBits = $this->registry->getObject('url')->getURLBits();
		if(isset($urlBits[1])) {
			switch($urlBits[1]) {
				case 'create':
					$this->createRelationship(intval($urlBits[2]));
					break;
				case 'approve':
					$this->approveRelationship(intval($urlBits[2]));
					break;
				case 'reject':
					$this->rejectRelationship(intval($urlBits[2]));
					break;
				default:
					break;
			}
		}
		
		else {
			// nothing!
		}
	}
	
	private function createRelationship($userb) {
		if($this->registry->getObject('authenticate')->isLoggedIn()) {
			$usera = $this->registry->getObject('authenticate')->getUser()->getUserID();
			$type = intval($_POST['relationship_type']);
			// echo '<pre>' . print_r($_POST, true) . '</pre>';
			require_once(FRAMEWORK_PATH . 'models/relationship.php');
			$relationship = new Relationship($this->registry, 0, $usera, $userb, 0, $type);
			if($relationship->isApproved()) {
				// email the user, tell them they have a new connection
				/**
				 * Add code to send email the users (email sending object)
				 */
				 $this->registry->errorPage('<div style="padding-right: 100px;">Relationship created</div>', '<div style="padding-left:120px; padding-top:10px; padding-bottom:10px; color: #196543; font-size: 19px;">~~ Personal Nexus Extended &nbsp<img src="views/default/images/ivy.png" /></div>');
			}
			else {
				// email the user, tell them they have a new pending connection
				/**
				 * Add code to send email to user (email sending object)
				 */
				 
				 $this->registry->errorPage('<div style="padding-right: 100px;">Request sent</div>', '<div style="padding-left:120px; padding-top:10px; padding-bottom:10px; color: #196543; font-size: 19px;"><img src="views/default/images/ivy.png" />&nbsp Ivy Leaf Extended ~~</div>');
			}
		}
		else {
			$this->registry->errorPage('Please login', 'Only logged in members can connect on this site');
			// display an error
		}
	}
	
	private function approveRelationship($r) {
		if($this->registry->getObject('authenticate')->isLoggedIn()) {
			require_once(FRAMEWORK_PATH . 'models/relationship.php');
			$relationship = new Relationship($this->registry, $r, 0, 0, 0, 0);
			if($relationship->getUserB() == $this->registry->getObject('authenticate')->getUser()->getUserID()) {
				// we can approve this
				$relationship->approveRelationship();
				$relationship->save();
				$this->registry->errorPage('<div style="padding-right: 100px;">Relationship approved</div>', '<div style="padding-left:120px; padding-top:10px; padding-bottom:10px; color: #196543; font-size: 19px;">~~ Personal Nexus Extended &nbsp<img src="views/default/images/ivy.png" /></div>');
			}
			else {
				$this->registry->errorPage('Invalid request', 'You are not authorized to approve the request');
			}
		}
		else {
			$this->registry->errorPage('Please login', 'Please login to approve this connection');
		}
	}
	
	private function rejectRelationship($r) {
		if($this->registry->getObject('authenticate')->isLoggedIn()) {
			require_once(FRAMEWORK_PATH . 'models/relationship.php');
			$relationship = new Relationship($this->registry, $r, 0, 0, 0, 0);
			if($relationship->getUserB() == $this->registry->getObject('authenticate')->getUser()->getUserID()) {
				// we can reject this
				$relationship->delete();
				$this->registry->errorPage('Relationship rejected', 'relationship rejected');
			}
			else {
				$this->registry->errorPage('Invalid request', 'You are not authorized to reject the request');
			}
		}
		else {
			$this->registry->errorPage('Please login', 'You must be logged in to reject the connection');
		}
	}
}

?>