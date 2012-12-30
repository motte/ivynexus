<?php
class Crushcontroller {
    /*
     * Constructor
     * @param Object $registry the registry
     * @param bool $directCall - are we directly accessing this controller?
     */
    public function __construct($registry, $directCall=true) {
        $this->registry = $registry;
        
        $urlBits = $this->registry->getObject('url')->getURLBits();
        switch(isset($urlBits[0]) ? $urlBits[0] : '') {
            case 'crush':
                $this->staticCrushContentDelegator(intval($urlBits[1]));
                break;
            default:
                $this->staticCrushContentDelegator($this->registry->getObject('authenticate')->getUser()->getUserID());
                break;
        }
	}
	
    /*
     * Delegate control to the academic content profile controller
     * @param int $user the user whose academic profile is opened
     * @return void
     */
    
    private function staticCrushContentDelegator($user) {
    	require_once(FRAMEWORK_PATH.'models/crushreturn.php');
    	$crush = new Crush($this->registry);
        $this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'crush/view.tpl.php', 'footer.tpl.php');
        
    }
    
     
    
    /*
     * Display an error - you cannot access this profile
     * @return void
     */
    private function profileError() {
        $this->registry->errorPage('Sorry, an error occurred', 'The link you followed was invalid, please try again');
    }
    
}
?>