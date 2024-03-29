<?php

/**
 IvyNexus Registry Class
 Michael Otte
 */
 
class Registry {

	/**
	 Array of objects
	 */
	private $objects;
	
	/**
	 Array of settings
	 */
	private $settings;
	
	public function __construct() {
	}
	
	/**
	 To create a new object and store it in registry object array
	 @param String $object the object file prefix (add prefix to new object)
	 @param String $key pair for the object
	 @return void
	 */
	public function createAndStoreObject($object, $key) {
		require_once($object . '.class.php');
		$this->objects[$key] = new $object($this);
	}
	
	/**
	 Get an object from the registry object array
	 @param String $key the objects array key
	 @return Object
	 */
	public function getObject($key) {
		return $this->objects[$key];
	}
	
	/**
	 Store Settings - Direct storage of settings in registry settings array
	 @param String $setting the setting data
	 @param String $key the key pair for the settings array
	 @return void
	 */
	public function storeSetting($setting, $key) {
		$this->settings[$key] = $setting;
	}
	
	/**
	 Get a setting from the registry setting array
	 @param String $key the settings array key
	 @return String the setting data
	 */
	public function getSetting($key) {
		return $this->settings[$key];
	}
	
	public function errorPage( $heading, $content ) {
    	$this->getObject('template')->buildFromTemplates('header.tpl.php', 'message.tpl.php', 'footer.tpl.php');
    	$this->getObject('template')->getPage()->addTag('heading', $heading);
    	$this->getObject('template')->getPage()->addTag('content', $content);
    }
    
    /**
     * Build a URL
     * @param array $urlBits bits of the array
     * @param array $queryString any query string data
     * @return String
     */
    public function buildURL($urlBits, $queryString=array()) {
    	return $this->getObject('url')->buildURL($urlBits, $queryString, false);
    }
    
    /**
     * Redirect the user to another location, displaying a message during the process
     * @param String $url the URL to redirect the user to
     * @param String $heading the message heading
     * @param String $message the message itself
     * @return void
     */
    public function redirectUser($url, $heading, $message) {
    	$this->getObject('template')->buildFromTemplates('redirect.tpl.php');
    	$this->getObject('template')->getPage()->addTag('heading', $heading);
    	$this->getObject('template')->getPage()->addTag('message', $message);
    	$this->getObject('template')->getPage()->addTag('url', $url);
    	
    }

	public function redirectUserProfile($url, $heading, $message) {
		$this->getObject('template')->buildFromTemplates('redirectprofile.tpl.php');
    	$this->getObject('template')->getPage()->addTag('heading', $heading);
    	$this->getObject('template')->getPage()->addTag('message', $message);
    	$this->getObject('template')->getPage()->addTag('url', $url);
    	
    }
    
    public function redirectUserAcademics($url, $heading, $message) {
		$this->getObject('template')->buildFromTemplates('redirectacademics.tpl.php');
    	$this->getObject('template')->getPage()->addTag('heading', $heading);
    	$this->getObject('template')->getPage()->addTag('message', $message);
    	$this->getObject('template')->getPage()->addTag('url', $url);
    	
    }
        
}

?>