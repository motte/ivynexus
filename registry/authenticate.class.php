<?php
/**
 Authenticaton managed

 Michael Otte
 */
class Authenticate {
	/**
	 The user object
	 */
	private $user;
	
	/**
	 The profile object
	 */
	private $profile;
	
	/*
	 The academics object
	 */
	
	/**
	 Boolean variable indicating if user is logged in
	 */ 
	private $loggedIn = false;
	
	/**
	 Indicates if login has just been processed or not
	 */
	private $justProcessed = false;
	
	/**
	 Authentication constructor
	 */
	public function __construct(Registry $registry) {
		$this->registry = $registry;
	}
	
	public function checkForAuthentication() {
		$this->registry->getObject('template')->getPage()->addTag('error', '');
		
		if(isset($_SESSION['auth_session_uid']) && intval($_SESSION['auth_session_uid']) > 0) {
			$this->sessionAuthenticate(intval($_SESSION['auth_session_uid']));
			
			if($this->loggedIn == true) {
				$this->registry->getObject('template')->getPage()->addTag('error', '');
				
			}
			else {
				$this->registry->getObject('template')->getPage()->addTag('error', '<p><strong>Error: Your email or password was not correct, please try again~</p></strong>');
			}
		}
		elseif(isset($_POST['auth_email']) && $_POST['auth_email'] != '' && isset($_POST['auth_pass']) && $_POST['auth_pass'] != '') {
			$this->postAuthenticate($_POST['auth_email'], $_POST['auth_pass']);
			$this->registry->getObject('template')->getPage()->addTag('p_school', 'Welcome');
			if($this->loggedIn == true) {
				$this->registry->getObject('template')->getPage()->addTag('error', '');
			}
			else {
				$this->registry->getObject('template')->getPage()->addTag('error', '<strong>Error: Your email or password was not correct, please try again</strong>');
			}
		}
		elseif(isset($_POST['login'])) {
			$this->registry->getObject('template')->getPage()->addTag('error', '<strong>Error: You must enter an email and a password</strong><br />');
		}
	}

	private function sessionAuthenticate($uid) {
		require_once(FRAMEWORK_PATH.'registry/user.class.php');
		$this->user = new User($this->registry, intval($_SESSION['auth_session_uid']), '', '');
		
		// these three lines populate the profile information on all pages.
		require_once(FRAMEWORK_PATH . 'models/profile.php');
        $this->profile = new Profile($this->registry, $uid);
        $this->profile->toTags('p_');
        $this->registry->getObject('template')->getPage()->addTag('school', $this->profile->getSchool());
        
        // these three lines populate the academics information on all pages.
        require_once(FRAMEWORK_PATH . 'models/academics.php');
        $this->academics = new Academics($this->registry, $uid);
        $this->academics->toTags('a_');
		
		if($this->user->isValid()) {
			if($this->user->isActive() == false) {
				$this->loggedIn = false;
				$this->loginFailureReason = 'inactive';
			}
			elseif($this->user->isBanned() == true) {
				$this->loggedIn = false;
				$this->loginFailureReason = 'banned';
			}
			else {
				$this->loggedIn = true;
			}
		}
		else {
			$this->loggedIn = false;
			$this->loginFailureReason = 'no user';
		}
		if($this->loggedIn == false) {
			$this->logout();
		}
	}
	
	public function postAuthenticate($e, $p, $sessions=true) {
		$this->justProcessed = true;
		require_once(FRAMEWORK_PATH.'registry/user.class.php');
		$this->user = new User($this->registry, 0, $e, $p);
		
		if($this->user->isValid()) {
			if($this->user->isActive() == false) {
				$this->loggedIn = false;
				$this->loginFailureReason = 'inactive';
			}
			elseif($this->user->isBanned() == true) {
				$this->loggedIn = false;
				$this->loginFailureReason = 'banned';
			}
			else {
				$this->loggedIn = true;
		/* This is where I can make stuff available throughout entire website*/
				if($sessions == true) {
					$_SESSION['auth_session_uid'] = $this->user->getUserID();
					require_once(FRAMEWORK_PATH . 'models/profile.php');
        			$this->profile = new Profile($this->registry, $p);
				}
			}
		}
		else {
			$this->loggedIn = false;
			$this->loginFailureReason = 'invalid credentials';
		}
	}
	
	function logout() {
		$_SESSION['auth_session_uid'] = '';
		$this->loggedIn = false;
		$this->user = null;
	}
	
	public function forceLogin($email, $password) {
		$this->postAuthenticate($email, $password);
	}
	
	public function isLoggedIn() {
		return $this->loggedIn;
	}
	
	public function isJustProcessed() {
		return $this->justProcessed;
	}
	
	public function getUser() {
		return $this->user;
	}
	
	public function getProfile() {
		return $this->profile;
	}
	
	public function getAcademics() {
		return $this->academics;
	}
}

?>