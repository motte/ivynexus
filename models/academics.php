<?php

/*
 * Academics model
 */
class Academics {
    
    /*
     * The registry
     */
    private $registry;
    
    /*
     * Users ID
     */
    private $id;
    
    /*
     * Fields that can be saved by the save() method
     */
    private $saveable_academics_fields = array('major', 'interests', 'awards', 'clubs', 'classes', 'experiences', 'gpa', 'fgpa', 'sgpa', 'jgpa', 'segpa', 'ssgpa', 'portrait', 'autobio');
	
    /*
     * Users major
     */
    private $major;
    
    /*
     * Users interests
     */
    private $interets;
	
    /*
     * awards
     */
    private $awards;
    
    private $classes;
	
    /*
     * Clubs
     */
    private $clubs;
	
    /*
     * Experiences
     */
    private $experiences;
    
    /*
     * Users bio
     */
    private $autobio;

    /*
     * Photo
     */
    private $portrait;
	
    /*
     * Users gpa
     */
    private $gpa;
    
    private $fgpa;
    
    private $sgpa;
    
    private $jgpa;
    
    private $segpa;
    
    private $ssgpa;
	
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
            $sql = "SELECT * FROM academics WHERE idacad=" . $this->id;
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
     * Sets the users major
     * @param String $major
     * @return void
     */
    public function setMajor($major) {
        $this->major = $major;
    }
    
    /*
     * Sets the users interests
     * @param String $interests
     * @return void
     */
    public function setInterests($interests) {
        $this->interests = $interests;
    }
	

    /*
     * Sets the users awards
     * @param String $awards
     * @return void
     */
    public function setAwards($awards) {
        $this->awards = $awards;
    }
    
    /*
     * Set Clubs
     * @param String $clubs
     * @return void
     */
    public function setClubs($clubs) {
        $this->clubs = $clubs;
    }
    
    /*
     * Set Classes
     * @param String $classes
     * @return void
     */
    public function setClasses($classes) {
        $this->classes = $classes;
    }
    
    /*
     * Set experiences
     * @param String $experiences
     * @return void
     */
    public function setExperiences($experiences) {
        $this->experiences = $experiences;
    }
    
    /*
     * Set gpa
     * @param String $gpa
     * @return void
     */
    public function setGpa($gpa) {
        $this->gpa = $gpa;
    }
    
    public function setFroshGpa($fgpa) {
    	$this->fgpa = $fgpa;
    }
    
    public function setSophGpa($sgpa) {
    	$this->sgpa = $sgpa;
    }
    
    public function setJunGpa($jgpa) {
    	$this->jgpa = $jgpa;
    }
    
    public function setSenGpa($segpa) {
    	$this->segpa = $segpa;
    }
    
    public function setSuperGpa($ssgpa) {
    	$this->ssgpa = $ssgpa;
    }
    
    /*
     * Sets the users autobio
     * @param String autobio
     * @return void
     */
    public function setAutobio($autobio) {
        $this->autobio = $autobio;
    }
    
    /*
     * Sets the users picture
     * @param String photo name
     * @return void
     */
    public function setPortrait($portrait) {
        $this->portrait = $portrait;
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
            foreach($this->saveable_academics_fields as $field) {
                $changes[$field] = $this->$field;
            }
            $this->registry->getObject('db')->updateRecords('academics', $changes, 'idacad=' . $this->id);
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
     * Get users major
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
     * Get users awards
     * @return String
     */
    public function getAwards() {
        return $this->awards;
    }

    /*
     * Get users clubs
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
     * Get users experiences
     * @return String
     */
    public function getExperiences() {
        return $this->experiences;
    }
    
    /*
     * Get users gpa
     * @return String
     */
    public function getGpa() {
        return $this->gap;
    }
    
    public function getFroshGpa($fgpa) {
    	return $this->fgpa;
    }
    
    public function getSophGpa($sgpa) {
    	return $this->sgpa;
    }
    
    public function getJunGpa($jgpa) {
    	return $this->jgpa;
    }
    
    public function getSenGpa($segpa) {
    	return $this->segpa;
    }
    
    public function getSuperGpa($ssgpa) {
    	return $this->ssgpa;
    }
    
    /*
     * Get users autobio
     * @return String
     */
    public function getAutobio() {
        return $this->autobio;
    }
    
    /*
     * get users ID
     * @return int
     */
    public function getID() {
        return $this->id;
    }
    
}
?>
