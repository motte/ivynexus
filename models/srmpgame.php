<?php

/*
 * Profile model
 */
class Srmpgame {
    
    /*
     * The registry
     */
    private $registry;
    
    /*
     * Profile ID
     */
    private $id;
    
    /*
     * Fields that can be saved by the save() method
     */
    private $saveable_profile_fields = array('name', 'gender', 'relationship', 'school', 'class', 'graduation', 'company1', 'companylocation1', 'internship1', 'internshipdescription1', 'company2', 'companylocation2', 'internship2', 'internshipdescription2', 'company3', 'companylocation3', 'internship3', 'internshipdescription3', 'home', 'photo', 'bio', 'interest', 'hall', 'chili', 'totalcrushes', 'can_crush');

    /*
     * Users ID
     */
    private $user_id;
	
    /*
     * Users name
     */
    private $name;
    
    /*
     * Users home
     */
    private $home;
	
    /*
     * School
     */
    private $school;
    
    private $class;
    
    private $graduation;
	
    /*
     * Internship1
     */
    private $company1;
    private $companylocation1;
    private $internship1;
    private $internshipdescription1;
    
    /*
     * Internship2
     */
    private $company2;
    private $companylocation2;
    private $internship2;
    private $internshipdescription2;
    
    /*
     * Internship3
     */
    private $company3;
    private $companylocation3;
    private $internship3;
    private $internshipdescription3;
	
    /*
     * Relationship Status
     */
    private $relationship;
    
    /*
     * Interest
     */
    private $interest;
    
    /*
     * Users bio
     */
    private $bio;

    /*
     * Gender
     */
    private $gender;
	
    /*
     * Users photograph
     */
    private $photo;
    
    /*
     * Users residence hall
     */
    private $hall;
    
    /*
     * Chili
     */
    private $chili;
	
    private $valid;
    
    /*
     * Profile constructor
     * @param Registry $registry the registry
     * @param int $id the profile ID
     * @return void
     */
    public function __construct(Registry $registry, $id=0, $specific_game) {
        $this->registry = $registry;
        if($id != 0) {
            $this->id = $id;
            $this->registry->getObject('template')->getPage()->addTag('game_name', 'The Ivy League Championship');
            $this->registry->getObject('template')->getPage()->addTag('player1_color', '321414');
            $this->registry->getObject('template')->getPage()->addTag('player1_name', '<a href="ivies/Brown" class="subtlelink">Brown</a>');
            $this->registry->getObject('template')->getPage()->addTag('player2_color', '9bddff');
            $this->registry->getObject('template')->getPage()->addTag('player2_name', '<a href="ivies/Columbia" class="subtlelink">Columbia</a>');
            $this->registry->getObject('template')->getPage()->addTag('player3_color', 'b31b1b');
            $this->registry->getObject('template')->getPage()->addTag('player3_name', '<a href="ivies/Cornell" class="subtlelink">Cornell</a>');
            $this->registry->getObject('template')->getPage()->addTag('player4_color', '00693e');
            $this->registry->getObject('template')->getPage()->addTag('player4_name', '<a href="ivies/Dartmouth" class="subtlelink">Dartmouth</a>');
            $this->registry->getObject('template')->getPage()->addTag('player5_color', '991122');
            $this->registry->getObject('template')->getPage()->addTag('player5_name', '<a href="ivies/Harvard" class="subtlelink">Harvard</a>');
            $this->registry->getObject('template')->getPage()->addTag('player6_color', 'ff6600');
            $this->registry->getObject('template')->getPage()->addTag('player6_name', '<a href="ivies/Princeton" class="subtlelink">Princeton</a>');
            $this->registry->getObject('template')->getPage()->addTag('player7_color', 'fff');
            $this->registry->getObject('template')->getPage()->addTag('player7_name', '<a href="ivies/Penn" class="subtlelink">UPenn</a>');
            $this->registry->getObject('template')->getPage()->addTag('player8_color', '0f4d92');
            $this->registry->getObject('template')->getPage()->addTag('player8_name', '<a href="ivies/Yale" class="subtlelink">Yale</a>');
            //$table = 'srmp_game_'.$specific_game;
            // if an ID is passed, populate based off that
            $sql = "SELECT * FROM sandrm_partials ORDER BY partial_id ASC LIMIT 64";
            $this->registry->getObject('db')->executeQuery($sql);
            $counter = 1;
            while($data = $this->registry->getObject('db')->getRows()) {
            	switch($data['owner_id']){
	            	case 1:
	            		$this->registry->getObject('template')->getPage()->addTag('srmp_team_color'.$counter, '321414');
	            		break;
	            	case 2:
	            		$this->registry->getObject('template')->getPage()->addTag('srmp_team_color'.$counter, '9bddff');
	            		break;
	            	case 3:
	            		$this->registry->getObject('template')->getPage()->addTag('srmp_team_color'.$counter, 'b31b1b');
	            		break;
	            	case 4:
	            		$this->registry->getObject('template')->getPage()->addTag('srmp_team_color'.$counter, '00693e');
	            		break;
	            	case 5:
	            		$this->registry->getObject('template')->getPage()->addTag('srmp_team_color'.$counter, '991122');
	            		break;
	            	case 6:
	            		$this->registry->getObject('template')->getPage()->addTag('srmp_team_color'.$counter, 'ff6600');
	            		break;
	            	case 7:
	            		$this->registry->getObject('template')->getPage()->addTag('srmp_team_color'.$counter, 'fff');
	            		break;
	            	case 8:
	            		$this->registry->getObject('template')->getPage()->addTag('srmp_team_color'.$counter, '0f4d92');
	            		break;
	            	
            	}
            	
            	
            	$counter++;
            }
            /*if($this->registry->getObject('db')->numRows() == 1) {
                $this->valid = true;
                
                $data = $this->registry->getObject('db')->getRows();
                // populate our fields
                foreach($data as $key => $value) {
                    $this->$key = $value;
                }
            }
            else {
                $this->valid = false;
            }*/
        }
        else {
            $this->valid = false;
        }
    }
    
    /*
     * Is the profile valid
     * @return bool
     */
    public function isValid() {
        return $this->valid;
    }
    
    /*
     * Sets the users name
     * @param String $name
     * @return void
     */
    public function setName($name) {
        $this->name = $name;
    }
    
    /*
     * Sets the users relationship status
     * @param String $relationship
     * @return void
     */
    public function setRelationship($relationship) {
        $this->relationship = $relationship;
    }
    
    /*
     * Sets the users interest status
     * @param String $interest
     * @return void
     */
    public function setInterest($interest) {
        $this->interest = $interest;
    }
    
    /*
     * Sets the users home
     * @param String $home
     * @return void
     */
    public function setHome($home) {
        $this->home = $home;
    }
    
    /*
     * Set School
     * @param String $school the school
     * @return void
     */
    public function setSchool($school) {
        $this->school = $school;
    }
    
    /*
     * Set Class
     * @param String $class the class
     * @return void
     */
    public function setClass($class) {
        $this->class = $class;
    }
    
    /*
     * Set Graduation
     * @param String $graduation the graduation month and year
     * @return void
     */
    public function setGraduation($graduation) {
        $this->graduation = $graduation;
    }
    
    /*
     * Set dob
     * @param String $dob the date of birth
     * @param boolean $formatted - indicates if the controller has formatted the dob, or if we need to do it here
     */
    public function setDOB($dob, $formatted=true) {
        if($formatted == true){
            $this->dob = $dob;
        }
        else {
            $temp = explode('/', $dob);
            $this->dob = $temp[2].'-'.$temp[1].'-'.$temp[0];
        }
    }
    
    /*
     * Set internships
     * @param String $internship the internship
     * @return void
     */
    public function setCompany1($company1) {
        $this->company1 = $company1;
    }
    public function setCompanyLocation1($companylocation1) {
        $this->companylocation1 = $companylocation1;
    }
    public function setInternship1($internship1) {
        $this->internship1 = $internship1;
    }
    public function setInternshipDescription1($internshipdescription1) {
        $this->internshipdescription1 = $internshipdescription1;
    }
    
    public function setCompany2($company2) {
        $this->company2 = $company2;
    }
    public function setCompanyLocation2($companylocation2) {
        $this->companylocation2 = $companylocation2;
    }
    public function setInternship2($internship2) {
        $this->internship2 = $internship2;
    }
    public function setInternshipDescription2($internshipdescription2) {
        $this->internshipdescription2 = $internshipdescription2;
    }
    
    public function setCompany3($company3) {
        $this->company3 = $company3;
    }
    public function setCompanylocation3($companylocation3) {
        $this->companylocation3 = $companylocation3;
    }
    public function setInternship3($internship3) {
        $this->internship3 = $internship3;
    }
    public function setInternshipDescription3($internshipdescription3) {
        $this->internshipdescription3 = $internshipdescription3;
    }
    
    /*
     * Set gender
     * @param String $gender the gender
     * @return void
     */
    public function setGender($gender, $checked=true) {
        if($checked == true) {
            $this->gender = $gender;
        }
        else {
            $genders = array();
            if(in_array($gender, $genders)) {
                $this->gender = $gender;
            }
        }
    }
    
    /*
     * Set hall
     * @param String $hall the hall
     * @return void
     */
    public function setHall($hall) {
    	$this->hall = $hall;
    }
    
    /*
     * Sets the users chili status
     * @param String $chili
     * @return void
     */
    public function setChili($chili) {
        $this->chili = $chili;
    }
    
    /*
     * Sets the users bio
     * @param String bio
     * @return void
     */
    public function setBio($bio) {
        $this->bio = $bio;
    }
    
    /*
     * Sets the users profile picture
     * @param String photo name
     * @return void
     */
    public function setPhoto($photo) {
        $this->photo = $photo;
    }
    
  
    
    /*
     * Convert the users profile data to template tags
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
    
    /*
     * Return the users data - getter method from model
     * @return array
     */
    public function toArray($prefix='') {
        $r = array();
        foreach($this as $field => $data) {
            if(! is_object($data) && ! is_array($data)) {
                $r[$field] = $data;
            }
        }
        return $r;
    }
    
    /*
     * Get users name
     * @return String
     */
    public function getName() {
        return $this->name;
    }
    
    /*
     * Get users relationship status
     * @return String
     */
    public function getRelationship() {
        return $this->relationship;
    }

	/*
     * Get users relationship status
     * @return String
     */
    public function getInterest() {
        return $this->interest;
    }

    
    /*
     * Get users home
     * @return String
     */
    public function getHome() {
        return $this->home;
    }
    
    /*
     * Get users photograph
     * @return String
     */
    public function getPhoto() {
        return $this->photo;
    }
    
    /*
     * Get users school
     * @return String
     */
    public function getSchool() {
        return $this->school;
    }
    
    /*
     * Get users chills
     * @return String
     */
    public function getChili() {
    	return $this->chili;
    }
    
    /*
     * Get users class
     * @return String
     */
    public function getClass() {
        return $this->class;
    }
    
    /*
     * Get users graduation
     * @return String
     */
    public function getGraduation() {
        return $this->graduation;
    }
    
    /*
     * Set internships
     * @param String $internship the internship
     * @return void
     */
    public function getCompany1($company1) {
        return $this->company1;
    }
    public function getCompanyLocation1($companylocation1) {
        return $this->companylocation1;
    }
    public function getInternship1($internship1) {
        return $this->internship1;
    }
    public function getInternshipDescription1($internshipdescription1) {
        return $this->internshipdescription1;
    }
    
    public function getCompany2($company2) {
        return $this->company2;
    }
    public function getCompanyLocation2($companylocation2) {
        return $this->companylocation2;
    }
    public function getInternship2($internship2) {
        return $this->internship2;
    }
    public function getInternshipDescription2($internshipdescription2) {
        return $this->internshipdescription2;
    }
    
    public function getCompany3($company3) {
        return $this->company3;
    }
    public function getCompanylocation3($companylocation3) {
        return $this->companylocation3;
    }
    public function getInternship3($internship3) {
        return $this->internship3;
    }
    public function getInternshipDescription3($internshipdescription3) {
        return $this->internshipdescription3;
    }
    
    /*
     * Get Hall
     * @return String
     */
    public function getHall() {
    	return $this->hall;
    }
    
    /*
     * get users ID
     * @return int
     */
    public function getID() {
        return $this->user_id;
    }
    
}
?>
