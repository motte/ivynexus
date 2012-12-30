<?php

class User {

	private $id;
	private $firstname;
    	private $lastname;
	private $email;
	private $registry;
	private $banned;
	private $admin = 0;
	private $active = 0;
	private $valid = false;
	private $birth_day;
	private $birth_month;
	private $birth_year;
	private $salt;
	//private $gender;
	
	//check login
	
	public function __construct(Registry $registry, $id=0, $email='', $password='') {
		$this->registry = $registry;
		// This is to make login case insensitive for email
		$email = strtolower($email);
		if($id == 0 && $email != '' && $password != '') {
			
			$sql = "SELECT * FROM users WHERE email='{$email}' AND deleted=0";
			$this->registry->getObject('db')->executeQuery($sql);
			if($this->registry->getObject('db')->numRows() == 1) {
			$data = $this->registry->getObject('db')->getRows();
			
			$hash = md5($password.$data['password_salt']);
			
			/*$sql = "SELECT * FROM users WHERE email='{$user}' AND password_hash='{$hash}' AND deleted=0";
			$this->registry->getObject('db')->executeQuery($sql);
			if($this->registry->getObject('db')->numRows() == 1) */
			if($hash == $data['password_hash']) {
				
				$this->id = $data['ID'];
				$this->firstname = $data['firstname'];
                		$this->lastname = $data['lastname'];
				$this->active = $data['active'];
				$this->banned = $data['banned'];
				$this->admin = $data['admin'];
				$this->email = strtolower($data['email']);
				$this->birth_day = $data['birth_day'];
				$this->birth_month = $data['birth_month'];
				$this->birth_year = $data['birth_year'];
				$this->salt = $data['password_salt'];
				//$this->gender = $data['gender'];
				$this->pwd_reset_key = $data['reset_key'];
				$this->valid = true;
			}
			}
		}
		// once user is logged in
		elseif($id > 0) {
			$id = intval($id);
			$sql = "SELECT * FROM users WHERE ID='{$id}' AND deleted=0";
			$this->registry->getObject('db')->executeQuery($sql);
			if($this->registry->getObject('db')->numRows() == 1) {
				$data = $this->registry->getObject('db')->getRows();
				$this->id = $data['ID'];
				$this->firstname = $data['firstname'];
                		$this->lastname = $data['lastname'];
				$this->active = $data['active'];
				$this->banned = $data['banned'];
				$this->admin = $data['admin'];
				$this->email = strtolower($data['email']);
				$this->birth_day = $data['birth_day'];
				$this->birth_month = $data['birth_month'];
				$this->birth_year = $data['birth_year'];
				$this->salt = $data['password_salt'];
				//$this->gender = $data['gender'];
				$this->pwd_reset_key = $data['reset_key'];
				$this->valid = true;
			}
		}
	}
	
	public function getUserID() {
		return $this->id;
	}
	
	public function getFirstName() {
		return $this->firstname;
	}
        
    public function getLastName() {
		return $this->lastname;
	}
	
	public function resetPassword($password) {
		
	}
	
	public function getSalt() {
		return $this->salt;
	}
	
	public function getBirthDay() {
		return $this->birth_day;
	}
	
	public function getBirthMonth() {
		return $this->birth_month;
	}
	
	public function getBirthYear() {
		return $this->birth_year;
	}
	
	public function getEmail() {
		return $this->email;
	}
	
	//public function getGender() {
	//	return $this->gender;
	//}
	
	public function isActive() {
		return ($this->active == 1) ? true : false;
	}
	
	public function isAdmin() {
		return ($this->admin == 1) ? true : false;
	}
	
	public function isBanned() {
		return ($this->banned == 1) ? true : false;
	}
	
	public function isValid() {
		return $this->valid;
	}
}


?>