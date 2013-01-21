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
            // This injects info into the log and chat section windows
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
            
            // this injects info into players/schools playing and the game window itself
            $this->registry->getObject('template')->getPage()->addTag('game_name', 'Ivy League Championship');
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
            $sqlthree = "SELECT * FROM sandrm_partials ORDER BY partial_id ASC LIMIT 64";
            $this->registry->getObject('db')->executeQuery($sqlthree);
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
