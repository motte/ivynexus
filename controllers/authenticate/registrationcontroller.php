<?php

/**
 Registration controller
 Manages user registration etc. 
 
 Michael Otte
 */
class Registrationcontroller{
	
	/**
	 Our registry object
	 */
	private $registry;
	
	/**
	 Standard registration fields
	 */
	private $fields = array('firstname' => 'First Name', 'lastname' => 'Last Name', 'password' => 'Password', 'birth_day' => 'Birth Day', 'birth_month' => 'Birth Month', 'birth_year' => 'Birth Year');
	//private $fields = array('firstname' => 'First Name', 'lastname' => 'Last Name', 'password' => 'Password', 'gender' => 'Gender', 'birth_day' => 'Birth Day', 'birth_month' => 'Birth Month', 'birth_year' => 'Birth Year');
	
	/**
	 Any errors in the registration
	 */
	private $registrationErrors = array();
	
	/**
	 Array of error label classes - allows us to make a field a different color, to indicate there were errors
	 */
	private $registrationErrorLabels = array();
	
	/**
	 The values the user has submitted when registering
	 */
	private $submittedValues = array();
	
	/**
	 The santized versions of the values the user has submitted - these are database ready
	 */
	private $sanitizedValues = array();
	
	/**
	 Right now the users are automatically active but we can replace the following to add email authentication
	 */
	private $activeValue = 0;
	
	public function __construct(Registry $registry) {
		$this->registry = $registry;
		require_once FRAMEWORK_PATH . 'controllers/authenticate/registrationcontrollerextension.php';
		$this->registrationExtention = new Registrationcontrollerextention($this->registry);
		if(isset($_POST['process_registration'])) {
			if($this->checkRegistration() == true) {
				$userId = $this->processRegistration();
				if($this->activeValue == 1) {
					$this->registry->getObject('authenticate')->forceLogin($this->submittedValues['register_email'], md5($this->submittedValues['register_password']));
				}
				$this->uiRegistrationProcessed();
			}
			else {
				$this->uiRegister(true);
			}
			
		}
		else {
			$this->uiRegister(false);
		}
	}
	
	/**
	 Process the users registration, and create the user and users profiles
	 @return int
	 */
	private function processRegistration() {
		// insert
		$this->registry->getObject('db')->insertRecords('users', $this->sanitizedValues);
		// get ID
		$uid = $this->registry->getObject('db')->lastInsertID();
		// send to mysqldb.class.php to create academics id for user
		$this->registry->getObject('db')->createAcademics('academics', 'idacad', $uid);
		// send to mysqldb.class.php to create SandRM id for user
		$email = strtolower($this->sanitizedValues['email']);
		
		//if(preg_match( "^[A-Za-z0-9._%+-]+@[A-Za-z0-9-.]+(\.[cornell|dartmouth|upenn|harvard|yale|princeton|columbia|brown]+)*(\.edu)^", $_POST['register_email']))
		
		// This sets the school team in the sandrm_users by appropriate email extension
		if(preg_match("/^([a-zA-Z0-9_-]+)(@brown.edu)$/i", $email)){
			$school = '1';
		}
		elseif(preg_match("/^([a-zA-Z0-9_-]+)(@columbia.edu)$/i", $email)) {
			$school = '2';
		}
		elseif(preg_match("/^([a-zA-Z0-9_-]+)(@cornell.edu)$/i", $email)) {
			$school = '3';
		}
		elseif(preg_match("/^([a-zA-Z0-9_-]+)(@dartmouth.edu)$/i", $email)) {
			$school = '4';
		}
		elseif(preg_match("/^([a-zA-Z0-9_-]+)(@harvard.edu)$/i", $email)) {
			$school = '5';
		}
		elseif(preg_match("/^([a-zA-Z0-9_-]+)(@princeton.edu)$/i", $email)) {
			$school = '6';
		}
		elseif(preg_match("/^([a-zA-Z0-9_-]+)(@upenn.edu)$/i", $email)) {
			$school = '7';
		}
		elseif(preg_match("/^([a-zA-Z0-9_-]+)(@yale.edu)$/i", $email)) {
			$school = '8';
		}
		else {
			$school = '10';
		}
		//$this->registry->getObject('db')->createSandRM('sandrm_users', 'id', $uid);
		$this->registry->getObject('db')->createSandRM($uid, $school);
		// call extention to insert the profile
		$this->registrationExtention->processRegistration($uid);
		// return the ID for the frameworks reference - autologin?
		return $uid;
	}
	
	private function checkRegistration() {
		$allFine = true;
		// blank fields
		foreach( $this->fields as $field => $name )
		{
			if(! isset($_POST['register_' . $field]) || $_POST['register_' . $field] == '')
			{
				$allFine = false;
				$this->registrationErrors[] = 'You must enter a '.$name.'<br />';
				$this->registrationErrorLabels['register_' . $field . '_label'] = 'error';
			}
		}
		
		/*foreach($this->fields as $field => $firstname) {
			if(! isset( $_POST['register_' . $field]) || $_POST['register_' . $field] == '') {
				$allFine = false;
				$this->registrationErrors[] = 'You must enter a ' . $firstname;
				$this->registrationErrorLabels['register_' . $field . '_label'] = 'error';
			}
		}*/
		
		// passwords match
		/*if($_POST['register_password'] != $_POST['register_password_confirm']) {
			$allFine = false;
			$this->registrationErrors[] = 'You must confirm your password';
			$this->registrationErrorLabels['register_password_label'] = 'error';
			$this->registrationErrorLabels['register_password_confirm_label'] = 'error';
		}*/

		// email valid
		//if(! preg_match( "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.['a-z']{2,4})^", $_POST['register_email'])) {
		//if(! preg_match( "^[A-Za-z0-9._%+-]+@[A-Za-z0-9-.]+(\.[cornell|dartmouth|upenn|harvard|yale|princeton|columbia|brown|Cornell|Dartmouth|Upenn|Harvard|Yale|Princeton|Columbia|Brown|CORNELL|DARTMOUTH|UPENN|HARVARD|YALE|PRINCETON|COLUMBIA|BROWN]+)*(\.edu|.EDU)^", $_POST['register_email'])) {
		//if(! preg_match( "^[A-Za-z0-9._%+-]+@[A-Za-z0-9-.]+(\.[cornell|dartmouth|upenn|harvard|yale|princeton|columbia|brown]+)*(\.edu)^", $_POST['register_email'])) {
		
		
		//if($eduCheck[1] !== 'dartmouth.edu'||'brown.edu'||'columbia.edu'||'cornell.edu'||'harvard.edu'||'princeton.edu'||'upenn.edu'||'yale.edu' && !filter_var($_POST['register_email'], FILTER_VALIDATE_EMAIL)) {
		
		$email_temp = strtolower($_POST['register_email']);
		if(! preg_match( "/^([a-zA-Z0-9_-]+)(@brown.edu|@columbia.edu|@cornell.edu|@dartmouth.edu|@harvard.edu|@upenn.edu|@princeton.edu|@yale.edu)$/i", $email_temp)) {
			$allFine = false;
			$this->registrationErrors[] = 'You must enter a valid email address <br />';
			$this->registrationErrorLabels['register_email_label'] = 'error';
		}

		// password length
		if(strlen( $_POST['register_password']) < 6 )
		{
			$allFine = false;
			$this->registrationErrors[] = 'Your password is too short, it must be at least 6 characters <br />';
			$this->registrationErrorLabels['register_password_label'] = 'error';
			$this->registrationErrorLabels['register_password_confirm_label'] = 'error';
		}
		
		
		// email headers
		if(strpos((urldecode($_POST['register_email'])), "\r") === true || strpos((urldecode($_POST['register_email'])), "\n" ) === true) {
			$allFine = false;
			$this->registrationErrors[] = 'Your email address is not valid (security)';
			$this->registrationErrorLabels['register_email_label'] = 'error';
		}
		
		/*// terms accepted
		if(! isset( $_POST['register_terms']) || $_POST['register_terms'] != 1 ) {
			$allFine = false;
			$this->registrationErrors[] = 'You must accept our terms and conditions.';
			$this->registrationErrorLabels['register_terms_label'] = 'error';
		}*/
		
		// duplicate user+email check
		//$u = $this->registry->getObject('db')->sanitizeData($_POST['register_user']);
		$e = $this->registry->getObject('db')->sanitizeData($_POST['register_email']);
		//$sql = "SELECT * FROM users WHERE username='{$u}' OR email='{$e}'";
        $sql = "SELECT * FROM users WHERE email='{$e}'";
		$this->registry->getObject('db')->executeQuery($sql);
                if($this->registry->getObject('db')->numRows() == 1) {
                    $allFine = false;
                    // email address	
                    $this->registrationErrors[] = 'Your email address is already registered on this site.';
                    $this->registrationErrorLabels['register_email_label'] = 'error';
                }
                
		if( $this->registry->getObject('db')->numRows() == 2) {
			$allFine = false;
			// both	
			$this->registrationErrors[] = 'Both your email and password are already registered on this site.';
			//$this->registrationErrorLabels['register_user_label'] = 'error';
			$this->registrationErrorLabels['register_email_label'] = 'error';
		}
		/*elseif($this->registry->getObject('db')->numRows() == 1) {
			// possibly both, or just one
			//$u = $this->registry->getObject('db')->sanitizeData($_POST['register_user']);
			$e = $this->registry->getObject('db')->sanitizeData($_POST['register_email']);
			$data = $this->registry->getObject('db')->getRows();
			if($data['email'] == $e) {
				$allFine = false;
				$this->registrationErrors[] = 'Your email is already in use on this site.';
				//$this->registrationErrorLabels['register_user_label'] = 'error';
				$this->registrationErrorLabels['register_email_label'] = 'error';
				// both	
			}
			elseif( $data['username'] == $u ) {
				$allFine = false;
				// username	
				$this->registrationErrors[] = 'Your username is already in use on this site.';
				$this->registrationErrorLabels['register_user_label'] = 'error';
				
			}
			else {
				$allFine = false;
				// email address	
				$this->registrationErrors[] = 'Your email address is already in use on this site.';
				$this->registrationErrorLabels['register_email_label'] = 'error';
			}
		}*/
		// captcha
		if( $this->registry->getSetting('captcha.enabled') == 1 )
		{
			// captcha check
		}
		
		// hook
		if( $this->registrationExtention->checkRegistrationSubmission() == false ) {
			$allFine = false;
		}
		
		if($allFine == true) {
			//$this->sanitizedValues['username'] = $u;  This is where I would put the DOB inserted into the database users table, but gotta makes sure it is in the correct date format
			$this->sanitizedValues['lastname'] = $_POST['register_lastname'];
            $this->sanitizedValues['firstname'] = $_POST['register_firstname'];
			$this->sanitizedValues['email'] = strtolower($e);
			$this->sanitizedValues['password_salt'] = $this->generateSalt(7);
			$this->sanitizedValues['password_hash'] = md5($_POST['register_password'].$this->sanitizedValues['password_salt']);
			$this->sanitizedValues['gender'] = $_POST['register_gender'];
			$this->sanitizedValues['birth_day'] = $_POST['register_birth_day'];
			$this->sanitizedValues['birth_month'] = $_POST['register_birth_month'];
			$this->sanitizedValues['birth_year'] = $_POST['register_birth_year'];
			$this->sanitizedValues['active'] = $this->activeValue;
			$this->sanitizedValues['admin'] = 0;
			$this->sanitizedValues['banned'] = 0;
			
			//$this->submittedValues['register_user'] = $_POST['register_user'];
			$this->submittedValues['register_email'] = $_POST['register_email'];
			$this->submittedValues['register_password'] = $_POST['register_password'];

			$Content = file_get_contents("http://www.ivynexus.com/other/waitlistemail.html");
			$Content = 'Having trouble viewing this email? <a href="http://www.ivynexus.com/other/waitlistemail.html">View it online.</a>'.$Content;
			//$ToEmail = 'michaelotte1@gmail.com';
			$ToEmail = $_POST['register_email'];
			$Subject = "Hello from IvyNexus";

			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: IvyNexus Registration <registration@ivynexus.com>' . "\r\n";
			$headers .= 'Bcc: ceo@ivynexus.com' . "\r\n";

			mail($ToEmail, $Subject, $Content, $headers);

			return true;
		}
		else {
			//$this->submittedValues['register_user'] = $_POST['register_user'];
			$this->submittedValues['register_lastname'] = $_POST['register_lastname'];
            $this->submittedValues['register_firstname'] = $_POST['register_firstname'];
            $this->submittedValues['register_gender'] = $_POST['register_gender'];
			$this->submittedValues['register_email'] = strtolower($_POST['register_email']);
			$this->submittedValues['register_password'] = $_POST['register_password'];
			$this->submittedValues['register_gender'] = $_POST['register_gender'];
			$this->submittedValues['birth_day'] = $_POST['register_birth_day'];
			$this->submittedValues['birth_month'] = $_POST['register_birth_month'];
			$this->submittedValues['birth_year'] = $_POST['register_birth_year'];
			//$this->submittedValues['register_password_confirm'] = $_POST['register_password_confirm'] ;
			$this->submittedValues['register_captcha'] = ( isset( $_POST['register_captcha'] ) ? $_POST['register_captcha']  : '' );
			return false;
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
	
	private function uiRegistrationProcessed() {
		$this->registry->getObject('template')->getPage()->setTitle('Registration for ' . $this->registry->getSetting('sitename') . ' complete');
		$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'authenticate/register/complete.tpl.php', 'loginfooter.tpl.php');	
	}
	
	private function uiRegister($error) {
		$this->registry->getObject('template')->getPage()->setTitle('Sign Up for ' . $this->registry->getSetting('sitename') . ' - ');
		$this->registry->getObject('template')->buildFromTemplates('loginheader.tpl.php', 'authenticate/register/main.tpl.php', 'loginfooter.tpl.php');
		// blank out the field tags
		$fields = array_keys($this->fields);
		$fields = array_merge($fields, $this->registrationExtention->getExtraFields());
		foreach($fields as $field) {
			$this->registry->getObject('template')->getPage()->addTag('register_' . $field . '_label', '');
			$this->registry->getObject('template')->getPage()->addTag('register_' . $field, '');
		}
		if( $error == false ) {
			$this->registry->getObject('template')->getPage()->addTag('error', '');
		}
		else {
			$this->registry->getObject('template')->addTemplateBit('error', 'authenticate/register/error.tpl.php');
			$errorsData = array();
			$errors = array_merge( $this->registrationErrors, $this->registrationExtention->getRegistrationErrors() );
			foreach($errors as $error) {
				$errorsData[] = array('error_text' => $error);
			}
			$errorsCache = $this->registry->getObject('db')->cacheData($errorsData);
			$this->registry->getObject('template')->getPage()->addTag('errors', array('DATA', $errorsCache));
			$toFill = array_merge($this->submittedValues, $this->registrationExtention->getRegistrationValues(), $this->registrationErrorLabels, $this->registrationExtention->getErrorLabels());
			foreach( $toFill as $tag => $value ) {
				$this->registry->getObject('template')->getPage()->addTag($tag, $value);
			}
		}
	}
}



?>