<?php

/*
 * Profile content/information controller
 */
class Srmpcontentcontroller {
    /*
     * Constructor - p164
     * @param Registry $registry
     * @param int $user the user id
     * @return void
     */
    public function __construct($registry, $directCall=true, $user) {
       	$this->registry = $registry;
        $urlBits = $this->registry->getObject('url')->getURLBits();
        if(isset($urlBits[3])) {
            switch($urlBits[3]) {
                case 'personal':
                    $this->personalProfile();
                    break;
                default:
                    $this->openIvy($user, 'ivy');
                    break;
            }
		}
		elseif(isset($urlBits[1])) {
            switch($urlBits[1]) {
                case 'personal':
                    $this->personalProfile();
                    break;
                default:
                    $this->openIvy($user, 'ivy');
                    break;
            }
		}
        else {
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
        require_once(FRAMEWORK_PATH . 'models/srmpgame.php');
        $srmpgame = new Srmpgame($this->registry, $user, $specific_game);
        $this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'strategy_rmp/main.tpl.php', 'footer.tpl.php');
		
    }    
  	
    
    /*
     * View a users profile information/content
     * @param int $user the user id
     * @return void
     */
    private function personalProfile() {
        if($this->registry->getObject('authenticate')->isLoggedIn() == true) {
            $user = $this->registry->getObject('authenticate')->getUser()->getUserID();
                // show the edit form
                $this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'profile/content/privateview.tpl.php', 'footer.tpl.php');
                $this->registry->getObject('template')->addTemplateBit('userbar', 'userbar_loggedin.tpl.php');
                // get the profile information to pre-populate the form fields
                require_once(FRAMEWORK_PATH . 'models/personalprofile.php');
                $profile = new Personalprofile($this->registry, $user);
                $profile->toTags('p_');
                require_once(FRAMEWORK_PATH.'models/crushreturn.php');
                $crush = new Crush($this->registry);
        }
	else {
            $this->registry->errorPage('Please login', 'You need to be logged in to edit your profile');
        }	
    }

   
}

?>