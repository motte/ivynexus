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
            $sql = "SELECT * FROM sandrm_users WHERE id='$id'";
            $this->registry->getObject('db')->executeQuery($sql);
            $user = $this->registry->getObject('db')->getRows();
            $states_owned = explode(',',$user['states']);
            $search = array('ct1', 'ct2', 'ct3', 'ct4', 'ct5', 'ct6', 'ct7', 'ct8', 'ma1', 'ma2', 'ma3', 'ma4', 'ma5', 'ma6', 'ma7', 'ma8', 'ma9', 'ma10', 'ma11', 'ma12', 'ma13', 'nh1', 'nh2', 'nh3', 'nh4', 'nh5', 'nh6', 'nh7', 'nj1', 'nj2', 'nj3', 'nj4', 'nj5', 'nj6', 'nj7', 'nj8', 'nj9', 'nj10', 'ny1', 'ny2', 'ny3', 'ny4', 'ny7', 'ny8', 'ny5', 'ny6', 'ny9', 'ny10', 'ny11', 'pa1', 'pa2', 'pa3', 'pa4', 'pa5', 'pa6', 'pa7', 'pa8', 'pa9', 'pa10', 'ri1', 'ri2', 'ri3', 'ri4', 'ri5');
            $replace = array('Yale State One', 'Yale State Two', 'Yale State Three', 'Yale State Four', 'Yale State Five', 'Yale State Six', 'Yale State Seven', 'Yale State Eight', 'Harvard Sector One', 'Harvard Sector Two', 'Harvard Sector Three', 'Harvard Sector Four', 'Harvard Sector Five', 'Harvard Sector Six', 'Harvard Sector Seven', 'Harvard Sector Eight', 'Harvard Sector Nine', 'Harvard Sector Ten', 'Harvard Sector Elven', 'Harvard Sector Twelve', 'Harvard Sector Thirteen', 'Dartmouth Sector One', 'Dartmouth Sector Two', 'Dartmouth Sector Three', 'Dartmouth Sector Four', 'Dartmouth Sector Five', 'Dartmouth Sector Six', 'Dartmouth Sector Seven', 'Princeton Sector One', 'Princeton Sector Two', 'Princeton Sector Three', 'Princeton Sector Four', 'Princeton Sector Five', 'Princeton Sector Six', 'Princeton Sector Seven', 'Princeton Sector Eight', 'Princeton Sector Nine', 'Princeton Sector Ten', 'Cornell State One', 'Cornell State Two', 'Cornell State Three', 'Cornell State Four', 'Cornell State Five', 'Cornell State Six', 'Columbia State One', 'Columbia State Two', 'Columbia State Three', 'Columbia State Four', 'Columbia State Five', 'UPenn State One', 'UPenn State Two', 'UPenn State Three', 'UPenn State Four', 'UPenn State Five', 'UPenn State Six', 'UPenn State Seven', 'UPenn State Eight', 'UPenn State Nine', 'UPenn State Ten', 'Brown Sector One', 'Brown Sector Two', 'Brown Sector Three', 'Brown Sector Four', 'Brown Sector Five');
            $nums = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
            // new turn without any commands submitted
            if($user['committed'] == 0){
	            $this->registry->getObject('template')->getPage()->addTag('place_url', $insert);
	            $this->registry->getObject('template')->getPage()->addTag('attack_url', $insert);
	            $this->registry->getObject('template')->getPage()->addTag('fortify_url', $insert);
	            $this->registry->getObject('template')->getPage()->addTag('place_display', 'block');
	            $this->registry->getObject('template')->getPage()->addTag('attack_display', 'none');
	            $this->registry->getObject('template')->getPage()->addTag('attack_opacity', '0');
	            $this->registry->getObject('template')->getPage()->addTag('fortify_display', 'none');
	            $this->registry->getObject('template')->getPage()->addTag('fortify_opacity', '0');
	            $this->registry->getObject('template')->getPage()->addTag('done_display', 'none');
	            $this->registry->getObject('template')->getPage()->addTag('done_opacity', '0');
            }
            // placed troops so show attack div
            elseif($user['committed'] == 1){
	            $this->registry->getObject('template')->getPage()->addTag('place_url', '');
	            $this->registry->getObject('template')->getPage()->addTag('attack_url', '');
	            $this->registry->getObject('template')->getPage()->addTag('fortify_url', '');
	            $this->registry->getObject('template')->getPage()->addTag('place_display', 'none');
	            $this->registry->getObject('template')->getPage()->addTag('attack_display', 'block');
	            $this->registry->getObject('template')->getPage()->addTag('attack_opacity', '1');
	            $this->registry->getObject('template')->getPage()->addTag('fortify_display', 'none');
	            $this->registry->getObject('template')->getPage()->addTag('fortify_opacity', '0');
	            $this->registry->getObject('template')->getPage()->addTag('done_display', 'none');
	            $this->registry->getObject('template')->getPage()->addTag('done_opacity', '0');
            }
            // already submitted attack command so show fortify div
            elseif($user['committed'] == 2){
	            $this->registry->getObject('template')->getPage()->addTag('place_url', '');
	            $this->registry->getObject('template')->getPage()->addTag('attack_url', '');
	            $this->registry->getObject('template')->getPage()->addTag('fortify_url', '');
	            $this->registry->getObject('template')->getPage()->addTag('place_display', 'none');
	            $this->registry->getObject('template')->getPage()->addTag('attack_display', 'none');
	            $this->registry->getObject('template')->getPage()->addTag('attack_opacity', '0');
	            $this->registry->getObject('template')->getPage()->addTag('fortify_display', 'block');
	            $this->registry->getObject('template')->getPage()->addTag('fortify_opacity', '1');
	            $this->registry->getObject('template')->getPage()->addTag('done_display', 'none');
	            $this->registry->getObject('template')->getPage()->addTag('done_opacity', '0');
            }
            // already submitted fortify command so show done div
            elseif($user['committed'] >= 3){
	            $this->registry->getObject('template')->getPage()->addTag('place_url', '');
	            $this->registry->getObject('template')->getPage()->addTag('attack_url', '');
	            $this->registry->getObject('template')->getPage()->addTag('fortify_url', '');
	            $this->registry->getObject('template')->getPage()->addTag('place_display', 'none');
	            $this->registry->getObject('template')->getPage()->addTag('attack_display', 'none');
	            $this->registry->getObject('template')->getPage()->addTag('attack_opacity', '0');
	            $this->registry->getObject('template')->getPage()->addTag('fortify_display', 'none');
	            $this->registry->getObject('template')->getPage()->addTag('fortify_opacity', '0');
	            $this->registry->getObject('template')->getPage()->addTag('done_display', 'block');
	            $this->registry->getObject('template')->getPage()->addTag('done_opacity', '1');
            }
            
            foreach($states_owned as $states_owned) {
            	$each = str_replace($search, $replace, $states_owned);
	            //$insert .= "<option>".$states_owned."</option>";
	            //$each = str_replace($nums, '', $each);
	            $insert .= '<option value="'.$states_owned.'">'.$each.'</option>';
            }
            
            $this->registry->getObject('template')->getPage()->addTag('srmp_options', $insert);
            $this->registry->getObject('template')->getPage()->addTag('srmp_team', $user['team']);
            $this->registry->getObject('template')->getPage()->addTag('srmp_new_troops',$user['new_troops']);
            $this->registry->getObject('template')->getPage()->addTag('srmp_total_troops',$user['total_troops']);
            // This injects info into the log and chat section windows
            $table = 'srmp_'.$specific_game.'_log';
            // if an ID is passed, populate based off that
            $sqlone = "SELECT * FROM $table ORDER BY id DESC LIMIT 1";
            $this->registry->getObject('db')->executeQuery($sqlone);
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
            		$this->registry->getObject('template')->getPage()->addTag('srmp_chat'.$counter, '<strong>'.$data['username'].'</strong>&nbsp&nbsp&nbsp'.$data['message'].'<hr style="border: none; background: #eee; height:1px;" />');
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
            $this->registry->getObject('template')->getPage()->addTag('player7_color', 'FFFF00');
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
	            		$this->registry->getObject('template')->getPage()->addTag('srmp_team_name'.$counter, 'Brown');
	            		break;
	            	case 2:
	            		$this->registry->getObject('template')->getPage()->addTag('srmp_team_color'.$counter, '9bddff');
	            		$this->registry->getObject('template')->getPage()->addTag('srmp_team_name'.$counter, 'Columbia');
	            		break;
	            	case 3:
	            		$this->registry->getObject('template')->getPage()->addTag('srmp_team_color'.$counter, 'b31b1b');
	            		$this->registry->getObject('template')->getPage()->addTag('srmp_team_name'.$counter, 'Cornell');
	            		break;
	            	case 4:
	            		$this->registry->getObject('template')->getPage()->addTag('srmp_team_color'.$counter, '00693e');
	            		$this->registry->getObject('template')->getPage()->addTag('srmp_team_name'.$counter, 'Dartmouth');
	            		break;
	            	case 5:
	            		$this->registry->getObject('template')->getPage()->addTag('srmp_team_color'.$counter, '991122');
	            		$this->registry->getObject('template')->getPage()->addTag('srmp_team_name'.$counter, 'Harvard');
	            		break;
	            	case 6:
	            		$this->registry->getObject('template')->getPage()->addTag('srmp_team_color'.$counter, 'ff6600');
	            		$this->registry->getObject('template')->getPage()->addTag('srmp_team_name'.$counter, 'Princeton');
	            		break;
	            	case 7:
	            		$this->registry->getObject('template')->getPage()->addTag('srmp_team_color'.$counter, 'EEEE00');
	            		$this->registry->getObject('template')->getPage()->addTag('srmp_team_name'.$counter, 'UPenn');
	            		break;
	            	case 8:
	            		$this->registry->getObject('template')->getPage()->addTag('srmp_team_color'.$counter, '0f4d92');
	            		$this->registry->getObject('template')->getPage()->addTag('srmp_team_name'.$counter, 'Yale');
	            		break;
	            	
            	}
            	
            	$this->registry->getObject('template')->getPage()->addTag('state_count'.$counter, $data['troops']);
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
