<?php

/**
 Registration controller extention
 Manages profile fields for our Social Network on user registration
 
 Michael Otte
 */
class Registrationcontrollerextention {
	
	private $registry;
	private $extraFields = array();
	
	private $errors = array();
	private $submittedValues = array();
	private $sanitizedValues = array();
	private $errorLabels = array();
	
	public function __construct($registry) {
		$this->registry = $registry;
		$this->extraFields['name'] = array('visiblelabel' => 'Name', 'table' => 'profile', 'field' => 'name', 'type' => 'specialtext', 'required' => true);
		$this->extraFields['birth_day'] = array('visiblelabel' => 'Birth Day', 'table' => 'profile', 'field' => 'birth_day', 'type' => 'int', 'required' => true);
		$this->extraFields['birth_month'] = array('visiblelabel' => 'Birth Month', 'table' => 'profile', 'field' => 'birth_month', 'type' => 'text', 'required' => true);
		$this->extraFields['birth_year'] = array('visiblelabel' => 'Birth Year', 'table' => 'profile', 'field' => 'birth_year', 'type' => 'int', 'required' => true);
		$this->extraFields['school'] = array('visiblelabel' => 'School', 'table' => 'profile', 'field' => 'school', 'type' => 'text', 'required' => true);
		$this->extraFields['gender'] = array('visiblelabel' => 'Gender', 'table' => 'profile', 'field' => 'gender', 'type' => 'text', 'required' => true);
		$this->extraFields['class'] = array('visiblelabel' => 'Class Year', 'table' => 'profile', 'field' => 'class', 'type' => 'int', 'required' => true);
		$this->extraFields['photo'] = array('visiblelabel' => 'Portrait Photo', 'table' => 'profile', 'field' => 'photo', 'type' => 'file', 'required' => true);
		
		
		
		/*$this->extraFields['last_name'] = array('visiblelabel' => 'Last Name', 'table' => 'profile', 'field' => 'user_last', 'type' => 'text', 'required' => true);
		$this->extraFields['dob_month'] = array('visiblelabel' => 'Date of Birth Month', 'table' => 'profile', 'field' => 'user_month', 'type' => 'list', 'required' => true, 'options' => array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'));
		$this->extraFields['dob_day'] = array('visiblelabel' => 'Day', 'table' => 'profile', 'field' => 'user_day', 'type' => 'list', 'required' => true, 'options' => array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'));
		$this->extraFields['dob_year'] = array('visiblelabel' => 'Year', 'table' => 'profile', 'field' => 'user_year', 'type' => 'list', 'required' => true, 'options' => array('1985', '1986', '1987', '1988', '1989', '1990', '1991', '1992', '1993', '1994', '1995'));*/
	}
	
	public function getExtraFields() {
		return array_keys($this->extraFields);
	}
	
	public function checkRegistrationSubmission() {
		$valid = true;
		foreach($this->extraFields as $field => $data) {
			if((! isset($_POST['register_school']) || ! isset($_POST['register_class']) || ! isset($_POST['register_gender']) || ! isset($_FILES['register_photo']) || ($_FILES['register_photo']['size'] == 0)) && $data['required'] = true) {
				$this->submittedValues[$field] = $_POST['register_' . $field];
				$this->errorLabels['register_' . $field .'_label'] = 'error';
				$this->errors[] = 'You must select a ' . $data['visiblelabel'].'<br />';
				$valid = false;
			}
			
			/* originally used before photo requirement
			if((! isset($_POST['register_' . $field]) || $_POST['register_' . $field] == '') && $data['required'] = true) {
				$this->submittedValues[$field] = $_POST['register_' . $field];
				$this->errorLabels['register_' . $field .'_label'] = 'error';
				$this->errors[] = 'You must select a ' . $data['visiblelabel'];
				$valid = false;
			}*/
			
			/*elseif(! isset($_FILES['register_photo']) && ($_FILES['register_photo']['size'] < 0)) {
				$this->errorLabels['register_photo_label'] = 'error';
				$this->errors[] = 'You must select a ' . $data['visiblelabel'];
				$valid = false;
		*/
			
			/*originally used before adding photo requirement
			elseif($_POST['register_' . $field] == '') {
				$this->submittedValues['register_' . $field] = '';
			}*/
			
			else {
				
				if($data['type'] == 'text') {
					$this->sanitizedValues['register_' . $field] = $this->registry->getObject('db')->sanitizeData($_POST['register_' . $field]);
					$this->submittedValues['register_' . $field] = $_POST['register_' . $field];
				}
				
				elseif($data['type'] == 'specialtext') {
					$this->sanitizedValues['register_name'] = $this->registry->getObject('db')->sanitizeData($_POST['register_firstname'] . ' ' . $_POST['register_lastname']);
					$this->submittedValues['register_name'] = $_POST['register_firstname'];
				}
				
				elseif($data['type'] == 'file') {
                 
                    				require_once(FRAMEWORK_PATH . 'library/images/imagemanager.class.php');
                    			
                    				$im = new Imagemanager();
                    				$im->loadFromPost('register_photo', $this->registry->getSetting('upload_path') . 'profile/', time());
                    				if($im == true) {
                        				$im->resizeScaleHeight(230);
                        				$im->save($this->registry->getSetting('upload_path') . 'profile/' . $im->getPhotoName());
                        				// square created - this order is impt because scale resize
                        				$im->resizeProfileSqr();
                        				$im->save($this->registry->getSetting('upload_path') . 'profile/' . $im->getSqrName());
                        				// thumbnail created
                        				$im->resizeScaleHeight(50);
                        				$im->save($this->registry->getSetting('upload_path') . 'profile/' . $im->getThumbName());
                        				
                        	
                   				}
                   				
                   				$this->sanitizedValues['register_photo'] = $im->getPhotoName();
						$this->submittedValues['register_photo'] = $im->getPhotoName();
					
                		}
                		
				elseif($data['type'] == 'int') {
					$this->sanitizedValues['register_' . $field] = intval($_POST['register_' . $field]);
					$this->submittedValues['register_' . $field] = $_POST['register_' . $field];
				}
				
				elseif($data['type'] == 'list') {
					
					if(! in_array($_POST['register_' . $field], $data['options'])) {
						$this->submittedValues['register_' .$field] = $_POST['register_' . $field];
						$this->sanitizedValues['register_' . $field] = $this->registry->getObject('db')->sanitizeData($_POST['register_' . $field]);
					
						$this->errorLabels['register_' . $field .'_label'] = 'error';
						$this->errors[] = 'Field ' . $data['visiblelabel'] . ' was not valid';
				
						$valid = false;
					}
					else {
						$this->sanitizedValues['register_' . $field] = intval($_POST['register_' . $field]);
						$this->submittedValues['register_' . $field] = $_POST['register_' . $field];
					}
				}
				else {
					$method = 'validate' . $data['type'];	
					if($this->$method($_POST['register_' . $field]) == true) {
						$this->sanitizedValues['register_' . $field] = $this->registry->getObject('db')->sanitizeData( $_POST['register_' . $field] );
						$this->submittedValues['register_' . $field] = $_POST['register_' . $field];
					}
					else {
						$this->sanitizedValues['register_' . $field] = $this->registry->getObject('db')->sanitizeData( $_POST['register_' . $field]);
						$this->submittedValues['register_' . $field] = $_POST['register_' . $field];
						$this->errors[] = 'Field ' . $data['visiblelabel'] . ' was not valid';
						$valid = false;
					}
				}
			}
		}
		if($valid == true) {
			return true;
		}
		else {
			return false;
		}
	}
	
	/*private function validateDOB($value)
	{
		// logic based on code from http://www.smartwebby.com/PHP/datevalidation.asp
		if( (strlen( $value ) != 10 ) )
		{
			return false;
		}
		else
		{
			// it needs two of these /
			if( substr_count( $value, '/' ) != 2 )
			{
				return false;
			}
			else
			{
				$date_parts = explode( '/', $value );
				// is the date valid?
				if( $date_parts[0] < 0 || $date_parts[0] > 31 )
				{
					return false;
				}
				else
				{
					// check the month is valid
					if( $date_parts[1] < 0 || $date_parts[1] > 12 )
					{
						return false;
					}
					else
					{
						// check the year is almost realistic.
						// note: needs updating in 2099 ;)
						if( $date_parts[2] < 1880 || $date_parts[2] > 2100 )
						{
							return false;
						}
						else
						{
							return true;
						}
					}
				}
			}
		}
	}
	*/
	
	/**
	 Create our user profile
	 @param int $uid the user ID
	 @return bool
	 */
	public function processRegistration($uid, $school) {
		$tables = array();
		$tableData = array();
		
		// group our profile fields by table, so we only need to do one insert per table 
		foreach($this->extraFields as $field => $data) {
			if(! (in_array($data['table'], $tables))) {
				$tables[] = $data['table'];
				$tableData[$data['table']] = array('user_id' => $uid, $data['field'] => $this->sanitizedValues['register_' . $field]);
			}
			else {
				$tableData[$data['table']][$data['field']] = $this->sanitizedValues['register_' . $field];
			}
		}
		foreach($tableData as $table => $data) {
			$this->registry->getObject('db')->insertRecords($table, $data);

			// I want to set the default photo dependent on gender
			/*if(in_array('Female', $data)) {
				$photo = array('visiblelabel' => 'Photo', 'table' => 'profile', 'field' => 'photo', 'type' => 'text', 'required' => true);
				$this->registry->getObject('db')->insertRecords('profile', 'woman.gif');*/
				//$this->registry->getObject('db')->updateRecords('profile', 'photo', 'user_id='.);
			//}
		}
		
		return true;
	}
	
	public function getRegistrationErrors() {
		return $this->errors;
	}
	
	public function getRegistrationValues() {
		return $this->submittedValues;
	}
	
	public function getErrorLabels() {
		return $this->errorLabels;	
	}
}


?>