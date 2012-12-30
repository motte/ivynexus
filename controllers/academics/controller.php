<?php

/*
 * Profile controller - acts like index.php to point to other classes and objects
 * Delegates control to profile controllers to separate the distinct profile features
 */
class Academicscontroller {
    
    /*
     * Constructor
     * @param Object $registry the registry
     * @param bool $directCall - are we directly accessing this controller?
     */
    public function __construct($registry, $directCall=true) {
        $this->registry = $registry;
        
        $urlBits = $this->registry->getObject('url')->getURLBits();
        switch(isset($urlBits[0]) ? $urlBits[0] : '') {
            case 'academics':
                $this->staticAcademicContentDelegator(intval($urlBits[1]));
                break;
            default:
                $this->staticAcademicContentDelegator($this->registry->getObject('authenticate')->getUser()->getUserID());
                break;
        }
	}
	
    /*
     * Delegate control to the academic content profile controller
     * @param int $user the user whose academic profile is opened
     * @return void
     */
    
    private function staticAcademicContentDelegator($user) {
        //$this->commonTemplateTags($user);
        require_once(FRAMEWORK_PATH . 'controllers/academics/academiccontentcontroller.php');
        $sc = new Academiccontentcontroller($this->registry, true, $user);
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
