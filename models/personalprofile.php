<?php

/*
 * Profile model
 */
class Personalprofile {
    
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
    private $saveable_profile_fields = array('name', 'gender', 'relationship', 'school', 'class', 'internship', 'home', 'photo', 'bio', 'interest', 'hall', 'chili', 'totalcrushes', 'can_crush');

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
	
    /*
     * Internship
     */
    private $internship;
	
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
    public function __construct(Registry $registry, $id=0) {
        $this->registry = $registry;
        if($id != 0) {
            $this->id = $id;
            // if an ID is passed, populate based off that
            $sql = "SELECT * FROM profile WHERE user_id=" . $this->id;
            $this->registry->getObject('db')->executeQuery($sql);
            if($this->registry->getObject('db')->numRows() == 1) {
                $this->valid = true;
                
                $data = $this->registry->getObject('db')->getRows();
                // populate our fields
                foreach($data as $key => $value) {
                    $this->$key = $value;
                }
            }
            else {
                $this->valid = false;
            }
            // with a passed ID, crushes are populated
            /*$crush_sql = "SELECT * FROM crushes WHERE c_id=" . $this->id;
            $this->registry->getObject('db')->executeQuery($crush_sql);
            if($this->registry->getObject('db')->numRows() == 1) {
                $this->valid = true;
                
                $data_crush = $this->registry->getObject('db')->getRows();*/
                // populate our fields
               /* foreach($data_crush as $key => $value) {
                    $this->$key = $value;
                }
            }
            else {
                $this->valid = false;
            }*/
            // with a passed ID, academics are populated
            $acad_sql = "SELECT * FROM academics WHERE idacad=" . $this->id;
            $this->registry->getObject('db')->executeQuery($acad_sql);
            if($this->registry->getObject('db')->numRows() == 1) {
                $this->valid = true;
                
                $data_acad = $this->registry->getObject('db')->getRows();
                // populate our fields
                foreach($data_acad as $key => $value) {
                    $this->$key = $value;
                }
            }
            else {
                $this->valid = false;
            }
            
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
     * Set internship
     * @param String $internship the internship
     * @return void
     */
    public function setInternship($internship) {
        $this->internship = $internship;
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
     * Save the user profile
     * @return bool
     */
    public function save() {
        // handle the updating of a profile
        // should it be $this->registry->getObject or $registry->getObject
        if($this->registry->getObject('authenticate')->isLoggedIn() && ($this->registry->getObject('authenticate')->getUser()->getUserID() == $this->id || $this->registry->getObject('authenticate')->getUser()->isAdmin() == true)) {
            // we are either the user of this profile or we are the admin
            $changes = array();
            foreach($this->saveable_profile_fields as $field) {
                $changes[$field] = $this->$field;
            }
            $this->registry->getObject('db')->updateRecords('profile', $changes, 'user_id=' . $this->id);
            if($this->registry->getObject('db')->affectedRows() == 1) {
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
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
     * Convert the users academic data to template tags
     * @param String $prefix prefix for the template tags
     * @return void
     */
    public function toAcadTags($prefix='') {
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
    
    
    // All the other populating fields
    /*
     * Get academic portrait
     * @return String
     */
    public function getSchoolPortrait() {
        return $this->schoolportrait;
    }
    
    /*
     * Get major major
     * @return String
     */
    public function getMajor() {
    	return $this->major;
    }
    
    /*
     * Get users interests
     * @return String
     */
    public function getInterests() {
        return $this->interests;
    }
    
    /*
     * Get awards
     * @return String
     */
    public function getAwards() {
    	return $this->awards;
    }
    
    /*
     * Get acad clubs
     * @return String
     */
    public function getClubs() {
    	return $this->clubs;
    }
    
    /*
     * Get users classes
     * @return String
     */
    public function getClasses() {
        return $this->classes;
    }
    
    /*
     * Get autobio
     * @return String
     */
    public function getAutobio() {
    	return $this->autobio;
    }
    
    /*
     * Get gpa
     * @return String
     */
    public function getGpa() {
    	return $this->gpa;
    }
    
    /*
     * Get experiences
     * @return String
     */
    public function getExperiences() {
    	return $this->experiences;
    }
    
    /*
     * Get chili ids
     * @return String
     */
    public function getChiliId() {
    	return $this->chiliid;
    }
    
}
?>
