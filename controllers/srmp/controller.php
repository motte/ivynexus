<?php

/*
 * Profile controller - acts like index.php to point to other classes and objects
 * Delegates control to profile controllers to separate the distinct profile features
 */
class Srmpcontroller {
    
    /*
     * Constructor
     * @param Object $registry the registry
     * @param bool $directCall - are we directly accessing this controller?
     */
    public function __construct($registry, $directCall=true) {
        $this->registry = $registry;
        
        $urlBits = $this->registry->getObject('url')->getURLBits();
        switch(isset($urlBits[1]) ? $urlBits[1] : '') {
            case 'view':
                $this->staticContentDelegator(intval($urlBits[2]));
                break;
            case 'statuses':
                $this->statusesDelegator(intval($urlBits[2]));
                break;
            case 'stream':
            	$this->streamDelegator(intval($urlBits[2]));
                break;
            default:
                $this->staticContentDelegator($this->registry->getObject('authenticate')->getUser()->getUserID());
                break;
        }
    }
    
    /*
     * Delegate control to the static content profile controller
     * This sends the profile information/content of the user
     * @param int $user the user whose profile we are viewing
     * @return void
     */
    private function staticContentDelegator($user) {
        $this->commonTemplateTags($user);
        require_once(FRAMEWORK_PATH . 'controllers/srmp/srmpcontroller.php');
        $sc = new Srmpcontentcontroller($this->registry, true, $user);
    }
    
    /*
     * Delegate control to the statuses profile controller
     * @param int $user the user whose profile we are viewing
     * @return void
     */
    private function statusesDelegator($user) {
        $this->commonTemplateTags($user);
        require_once(FRAMEWORK_PATH . 'controllers/profile/profilestatusescontroller.php');
        $sc = new Profilestatusescontroller($this->registry, true, $user);
    }
    
    /*
     * Delegate control to the stream profile controller
     * This is to allow users to post their statuses on the stream wall
     * @param int $user the user whose profile we are viewing
     * @return void
     */
    private function streamDelegator($user) {
        $this->commonTemplateTags($user);
        require_once(FRAMEWORK_PATH . 'controllers/profile/profilestreamcontroller.php');
        $sc = new Profilestreamcontroller($this->registry, true, $user);
    }
    
   
    /*
     * Delegate control to the academic content profile controller
     * @param int $user the user whose academic profile is opened
     * @return void
     */
    /*
    private function staticAcademicContentDelegator($user) {
        $this->commonTemplateTags($user);
        require_once(FRAMEWORK_PATH . 'controllers/profile/profileacademiccontentcontroller');
        $sc = new Profileacademiccontentcontroller($this->registry, true, $user);
    }
    
     */
    
    /*
     * Display an error - you cannot access this profile
     * @return void
     */
    private function profileError() {
        $this->registry->errorPage('Sorry, an error occurred', 'The link you followed was invalid, please try again');
    }
    
    /*
     * This adds user properties on the pages
     * Set common template tags for all profile aspects
     * @param int $user the user id
     * @return void
     */
    private function commonTemplateTags($user) {
    // get a random sample of 6 friends.
	require_once(FRAMEWORK_PATH . 'models/relationships.php');
	$relationships = new Relationships($this->registry);
	/* This is where I change the number of sample friends shown in the profiles */
	$cache = $relationships->getByUser($user, true, 3);
	$this->registry->getObject('template')->getPage()->addTag('profile_friends_sample', array('SQL', $cache));
	
	// get the name and photo of the user
	require_once(FRAMEWORK_PATH . 'models/profile.php');
	$profile = new Profile($this->registry, $user);
	$name = $profile->getName();
	$photo = $profile->getPhoto(); 
	$uid = $profile->getID();

	$this->registry->getObject('template')->getPage()->addTag('profile_name', $name);
	$this->registry->getObject('template')->getPage()->addTag('profile_photo', $photo);
	$this->registry->getObject('template')->getPage()->addTag('profile_user_id', $uid);
	// clear the profile
	$profile = "";
    }

}
?>
