<?php

/*
 * Profile content/information controller
 */
class Ivyroundcontroller {
    /*
     * Constructor - p164
     * @param Registry $registry
     * @param int $user the user id
     * @return void
     */
    public function __construct($registry, $directCall=true, $user) {
       	$this->registry = $registry;
        $admin = $this->registry->getObject('authenticate')->getUser()->isAdmin();
        if($user<10 && $admin==1) {
	        $this->openIvy($user, 'ivy');
		}
	}
    
    /*
     * View ivy map and inject information/content
     * @param int $user the user id
     * @return void
     */
    private function openIvy($user, $specific_game) {
        // load the template
        
        // get all the profile information/content and send it to the template
        //require_once(FRAMEWORK_PATH . 'models/srmplog.php');
        //$srmp = new Srmplog($this->registry, $user, $specific_game);
        require_once(FRAMEWORK_PATH . 'models/srmpgameadmin.php');
        $srmpgame = new Srmpgameadmin($this->registry, $user, $specific_game);
        $this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'strategy_rmp/moo/main.tpl.php', 'footer.tpl.php');
		
    }    
  	
   
}

?>