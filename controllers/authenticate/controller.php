<?php

class Authenticatecontroller {

	/**
	 Registry object reference
	 */
	private $registry;
	
	/**
	 Quotation model object reference
	 */
	private $model;
	
	/**
	 Controller constructor - direct call to false when embedded via another controller
	 @param Registry $registry our registry
	 @param bool $directCall - are we calling it directly via the framework (true), or via another controller (false)
	 */
	public function __construct(Registry $registry, $directCall) {
		$this->registry = $registry;
		
		$urlBits = $this->registry->getObject('url')->getURLBits();
			if(isset($urlBits[1])) {
				switch($urlBits[1]) {
					case 'logout';
						$this->logout();
						break;
					case 'login';
						$this->login();
						break;
					/*case 'username':
						$this->forgotUsername();
						break;*/
					case 'password':
						$this->forgotPassword();
						break;
					case 'reset-password':
						//$this->resetPassword(intval($urlBits[2]), $this->registry->getObject('db')->sanitizeData($urlBits[3]));
						$this->resetPassword(intval($urlBits[2]));
						break;
					case 'email-reset':
						$this->resetPass(intval($urlBits[2]), $this->registry->getObject('db')->sanitizeData($urlBits[3]));
						break;
					case 'register':
						$this->registrationDelegator();
						break;
				}
			}
	}
	
	/*private function forgotEmail() {
		if(isset($_POST['email']) && $_POST['email'] != '') {
			$e = $this->registry->getObject('db')->sanitizedData($_POST['email']);
			$sql = "SELECT * FROM users WHERE email='{$e}'";
			if($this->registry->getObject('db')->numRows() == 1) {
				$data = $this->registry->getObject('db')->getRows();
				// email the user
				$this->registry->getObject('mailout')->startFresh();
				$this->registry->getObject('mailout')->setTo($_POST['email']);
				$this->registry->getObject('mailout')->setSender($this->registry->getSetting('adminEmailAddress'));
				$this->registry->getObject('mailout')->setFromName($this->registry->getSetting('cms_name'));
				$this->registry->getObject('mailout')->setSubject( 'Username details for ' .$this->registry->getSetting('sitename') );
				$this->registry->getObject('mailout')->buildFromTemplates('authenticate/username.tpl.php');
				$tags = $this->values;
				$tags['sitename'] = $this->registry->getSetting('sitename');
				$tags['username'] = $data['username'];
				$tags['siteurl'] = $this->registry->getSetting('siteurl');
				$this->registry->getObject('mailout')->replaceTags( $tags );
				$this->registry->getObject('mailout')->setMethod('sendmail');
				$this->registry->getObject('mailout')->send();
				
				// tell them that we emailed them
				$this->registry->errorPage('Email reminder sent.');
                        }
			else {
				// no user found
				$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'authenticate/username/main.tpl.php', 'footer.tpl.php');
				$this->registry->getObject('template')->addTemplateBit('error_message', 'authenticate/username/error.tpl.php');
			}
		}
		else {
			// form template
			$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'authenticate/username/main.tpl.php', 'footer.tpl.php');
			$this->registry->getObject('template')->getPage()->addTag('error_message', '');
		}
	}*/
	
	private function generateKey($len = 7) {
		$chars = "abcdefghijklmnopqrstuvwxyz0123456789";
		// 36 chars
		$tor = '';
		for($i = 0; $i < $len; $i++) {
			$tor .= $chars[rand() % 35];
		}
		return $tor;
	}
	
	private function forgotPassword() {
		if(isset($_POST['email']) && $_POST['email'] != '') {
			$e = $this->registry->getObject('db')->sanitizeData($_POST['email']);
			$sql = "SELECT * FROM users WHERE email='{$e}'";
			$this->registry->getObject('db')->executeQuery($sql);
			if($this->registry->getObject('db')->numRows() == 1) {
				$data = $this->registry->getObject('db')->getRows();
				// have they requested a new password recently?
				if($dta['reset_expires'] > date('Y-m-d h:i:s')) {
					// inform them
					$this->registry->errorPage('Error sending password request', 'You have recently requested a password reset link, so you must wait a short while before requesting one again.  This is for security purposes.');
				}
				else {
					// update their row
					$chages = array();
					$rk = $this->generateKey();
					$changes['reset_key'] = $rk;
					$changes['reset_expires'] = date('Y-m-d h:i:s', time()+86400);
						$this->registry->getObject('db')->updateRecords('users', $changes, 'ID=' . $data['ID']);
					// email the user
					$this->registry->getObject('mailout')->startFresh();
					$this->registry->getObject('mailout')->setTo($_POST['email']);
					$this->registry->getObject('mailout')->setSender($this->registry->getSetting('adminEmailAddress'));
					$this->registry->getObject('mailout')->setFromName($this->registry->getSetting('cms_name'));
					$this->registry->getObject('mailout')->setSubject('Password reset request for ' . $this->registry->getSetting('sitename'));
					$this->registry->getObject('mailout')->buildFromTemplates('authenticate/password.tpl.php');
					$tags = $this->values;
					$tags['sitename'] = $this->registry->getSetting('sitename');
					$tags['firstname'] = $data['firstname'];
					$url = $this->registry->buildURL('authenticate', 'reset-password', $data['ID'], $rk);
					$tags['url'] = $url;
					$tags['siteurl'] = $this->registry->getSetting('siteurl');
					$this->registry->getObject('mailout')->replaceTags($tags);
					$this->registry->getObject('mailout')->setMethod('sendmail');
					$this->registry->getObject('mailout')->send();
						
						// tell them that we emailed them
						$this->registry->errorPage('Password reset link sent', 'We have sent you a link which will allow you to reset your account password');
				}
			}
			else {
				// no user found
				$this->registry->getObject('template')->buildFromTemplates('loginheader.tpl.php', 'authenticate/password/main.tpl.php', 'footer.tpl.php');
				$this->registry->getObject('template')->addTemplateBit('error_message', 'authenticate/password/error.tpl.php');
			}
		}
		else {
			// form template
			$this->registry->getObject('template')->buildFromTemplates('loginheader.tpl.php', 'authenticate/password/main.tpl.php', 'footer.tpl.php');
			$this->registry->getObject('template')->getPage()->addTag('error_message', '');
		}
	}
		
	
	private function resetPassword($id) {
		$this->registry->getObject('template')->getPage()->addTag('user', $id);
		$this->registry->getObject('template')->getPage()->addTag('email', $email);
		//$this->registry->getObject('template')->getPage()->addTag('key', $key);
		//$sql = "SELECT * FROM users WHERE ID='{$user}' AND reset_key='{$key}'";
		$salt = $this->registry->getObject('authenticate')->getUser()->getSalt();

		$sql = "SELECT * FROM users WHERE ID='$id' AND password_salt='$salt'";
		//$sql = "SELECT * FROM users WHERE ID='{$user}'";
		$this->registry->getObject('db')->executeQuery($sql);
		if($this->registry->getObject('db')->numRows() == 1) {
			$data = $this->registry->getObject('db')->getRows();
			if($data['reset_expiry'] > date('Y-m-d h:i:s')) {
				//$this->registry->errorPage('Reset link expired', 'Password reset links are only valid for 24 hours.  This link is out of date and has expired.');
				$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'authenticate/password/reset.tpl.php', 'footer.tpl.php');
				$this->registry->getObject('template')->getPage()->addTag('error', 'Password reset links are only valid for 24 hours.  This link is out of date and has expired.');
			}
			else {
				if(isset($_POST['current_password']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
					$mdfied = md5($_POST['current_password'].$data['password_salt']);
					if($mdfied == $data['password_hash']) {
						if(strlen($_POST['password']) < 6) {
							$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'authenticate/password/reset.tpl.php', 'footer.tpl.php');
							$this->registry->getObject('template')->getPage()->addTag('error', 'Sorry your password is too short, passwords must be greater than 6 characters.');
							//$this->registry->errorPage('Password too short', 'Sorry your password is too short, passwords must be greater than 6 characters');
						}
						else {
							if($_POST['password'] != $_POST['confirm_password']) {
								$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'authenticate/password/reset.tpl.php', 'footer.tpl.php');
								$this->registry->getObject('template')->getPage()->addTag('error', 'Your password and password confirmation do not match, please try again.');
								
								//$this->registry->errorPage('Passwords do not match', 'Your password and password confirmation do not match, please try again.');
							}
							else {
								// reset the password
								$changes = array();
								$changes['password_salt'] = $this->generateSalt(7);
								$changes['password_hash'] = md5($_POST['password'].$changes['password_salt']);
								$this->registry->getObject('db')->updateRecords('users', $changes, 'ID=' . $id);
								$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'authenticate/password/reset.tpl.php', 'footer.tpl.php');
								$this->registry->getObject('template')->getPage()->addTag('error', 'Your password has been changed successfully.');
								//$this->registry->errorPage('Password reset', 'Your password has been reset to the new password');
							}
						}
					}
					else {
						$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'authenticate/password/reset.tpl.php', 'footer.tpl.php');
						$this->registry->getObject('template')->getPage()->addTag('error', 'Incorrect current password.  Please make sure you entered your current password correctly.');
						//$this->registry->errorPage('Incorrect current password', 'Make sure you entered your current password correctly');
					}
				}
				
				else {
					// show the form again if not filled out
					$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'authenticate/password/reset.tpl.php', 'footer.tpl.php');
					$this->registry->getObject('template')->getPage()->addTag('error', 'Please make sure to fill out all the fields.');
				}
			}
		}
		else {
			//$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'authenticate/password/reset.tpl.php', 'footer.tpl.php');
			$this->registry->errorPage('Invalid details', 'The password reset link was invalid.');
			
		}
	}
	
	private function resetPass($id, $key) {
		$this->registry->getObject('template')->getPage()->addTag('user', $id);
		$this->registry->getObject('template')->getPage()->addTag('email', $email);
		$this->registry->getObject('template')->getPage()->addTag('key', $key);
		$sql = "SELECT * FROM users WHERE ID='{$user}' AND reset_key='{$key}'";
		
		$this->registry->getObject('db')->executeQuery($sql);
		if($this->registry->getObject('db')->numRows() == 1) {
			$data = $this->registry->getObject('db')->getRows();
			if($data['reset_expiry'] > date('Y-m-d h:i:s')) {
				$this->registry->errorPage('Reset link expired', 'Password reset links are only valid for 24 hours.  This link is out of date and has expired.');
			}
			else {
				if(isset($_POST['password'])) {
					if(strlen($_POST['password']) < 6) {
						$this->registry->errorPage('Password too short', 'Sorry your password is too short, passwords must be greater than 6 characters');
					}
					else {
						if($_POST['password'] != $_POST['password_confirm']) {
							$this->registry->errorPage('Passwords do not match', 'Your password and password confirmation do not match, please try again.');
						}
						else {
							// reset the password
							$changes = array();
							$changes['password_salt'] = $this->generateSalt(7);
							$changes['password_hash'] = md5($_POST['password'].$changes['password_salt']);
							$this->registry->getObject('db')->updateRecords('users', $changes, 'ID=' . $user);
							$this->registry->errorPage('Password resent', 'Your password has been reset to the one you entered');
						}
					}
				}
				else {
					// show the form again if not filled out
					$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'authenticate/password/reset.tpl.php', 'footer.tpl.php');
				}
			}
		}
		else {
			
			$this->registry->errorPage('Invalid details', 'The password reset link was invalid');
		}
	}
	
	private function generateSalt($length) {
	        $characterList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*?";
	        $i = 0;
	        $salt = "";
	        while ($i < $length) {
	            $salt .= $characterList{mt_rand(0, (strlen($characterList) - 1))};
	            $i++;
	        }
	        return $salt;
	}
	
	private function login() {
		// template
		if($this->registry->getObject('authenticate')->isJustProcessed()) {
			if(isset($_POST['login']) && $this->registry->getObject('authenticate')->isLoggedIn() == false) {
				// invalid details
				$this->registry->getObject('template')->addTemplateBit('error_message', 'authenticate/login/error.tpl.php');
			}
			else {
				// bounce them away
				if($_POST['referer'] == '') {
					$referer = $this->registry->getSetting('siteurl');
					$this->registry->redirectUser($referer, 'Logged in', 'You are now logged in and are being redirected to the page you were on previously', false);
				}
				else {
					$this->registry->redirectUser($_POST['referer'], 'Logged in', 'You are now logged in and are being redirected to the page you were on previously', false);
				}
			}
		}
		else {
			if($this->registry->getObject('authenticate')->isLoggedIn() == true) {
				/*$this->registry->errorPage('Already logged in', 'You cannot login as <strong>'.$this->registry->getObject('authenticate')->getUser()->getFirstName() . $this->registry->getObject('authenticate')->getUser()->getLastName() . '</strong>');*/
			}
			
			else {
				$this->registry->getObject('template')->buildFromTemplates('loginheader.tpl.php', 'authenticate/login/main.tpl.php', 'footer.tpl.php');
				//The following adds a bit of url at the end of the user visible url
				$this->registry->getObject('template')->getPage()->addTag('referer', (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ''));		
			}
		}
	}
		
	private function logout() {
		$this->registry->getObject('authenticate')->logout();
		//$this->registry->getObject('template')->addTemplateBit('userbar', 'userbar_guest.tpl.php');
		//$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'login.tpl.php', 'footer.tpl.php');
		//$this->registry->getObject('template')->getPage()->addTag('url', $url);
		//$this->registry->getObject('url')->setURL(0);
		$this->registry->redirectUser(array('authenticate/login'), '', '' );
		//$this->login();

	}
		
	/**
	 Delegate control to the registration controller
	 @return void
	 */
	private function registrationDelegator() {
		require_once FRAMEWORK_PATH . 'controllers/authenticate/registrationcontroller.php';
		$rc = new Registrationcontroller($this->registry);
	}
}


?>