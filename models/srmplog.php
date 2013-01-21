<?php

/*
 * Strategy and Risk Mangement Program Log model
 */
class Srmplog {
    
    /*
     * The registry
     */
    private $registry;
    
    /*
     * Profile ID
     */
    private $id;
    
    /*
     * Users ID
     */
    private $user_id;
	
    /*
     * Users name
     */
    private $name;
	
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
            $table = 'srmp_'.$specific_game.'_log';
            // if an ID is passed, populate based off that
            $sql = "SELECT * FROM $table ORDER BY id DESC LIMIT 1";
            $this->registry->getObject('db')->executeQuery($sql);
            if($this->registry->getObject('db')->numRows() == 1) {
                $this->valid = true;
                
                $data = $this->registry->getObject('db')->getRows();
                // populate our fields
                $this->registry->getObject('template')->getPage()->addTag('srmp_log', $data['log']);
                $this->registry->getObject('template')->getPage()->addTag('srmp_turn_number', $data['turn_number']);
                $profile_team_id = $this->registry->getObject('authenticate')->getProfile()->getTeamID();
	            $tabletwo = 'srmp_'.$specific_game.'_chat';
	            $psql = "SELECT * FROM $tabletwo WHERE team_id='$profile_team_id' ORDER BY id DESC LIMIT 12";
	            $query = $this->registry->getObject('db')->executeQuery($psql);
	            $counter = 1;
            	while($data = $this->registry->getObject('db')->getRows()) {
            		$this->registry->getObject('template')->getPage()->addTag('srmp_chat'.$counter, $data['message']);
            		$counter++;
            	}
            	
	            while($counter < 13) {
		            $this->registry->getObject('template')->getPage()->addTag('srmp_chat'.$counter, $data['message']);
            		$counter++;
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
     * get users ID
     * @return int
     */
    public function getID() {
        return $this->user_id;
    }
    
}
?>
