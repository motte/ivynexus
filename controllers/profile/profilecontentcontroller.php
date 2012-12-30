<?php

/*
 * Profile content/information controller
 */
class Profilecontentcontroller {
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
                case 'edit':
                    $this->editProfile();
                    break;
                case 'personal':
                    $this->personalProfile();
                    break;
                default:
                    $this->viewProfile($user);
                    break;
            }
		}
		elseif(isset($urlBits[1])) {
            switch($urlBits[1]) {
                case 'edit':
                    $this->editProfile();
                    break;
                case 'personal':
                    $this->personalProfile();
                    break;
                default:
                    $this->viewProfile($user);
                    break;
            }
		}
        else {
            $this->viewProfile($user);
        }
    }
    
    /*
     * View a users profile information/content
     * @param int $user the user id
     * @return void
     */
    private function viewProfile($user) {
        // load the template
        $this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'profile/content/view.tpl.php', 'footer.tpl.php');
        // get all the profile information/content and send it to the template
        require_once(FRAMEWORK_PATH . 'models/profile.php');
        $profile = new Profile($this->registry, $user);
        $profile->toTags('p_');
        $this->formRelationships();
		
    }
    
    	private function formRelationships() {
		if($this->registry->getObject('authenticate')->isLoggedIn() == true) {
			require_once(FRAMEWORK_PATH . 'models/relationships.php');
			$relationships = new Relationships($this->registry);
			$types = $relationships->getTypes(true);
			$this->registry->getObject('template')->addTemplateBit('form_relationship', 'members/form_relationship.tpl.php');
			$this->registry->getObject('template')->getPage()->addPPTag('relationship_types', array('SQL', $types));
			
		}
		else {
			$this->registry->getObject('template')->getPage()->addTag('form_relationship', '<!-- relationship types dropdown -->');
		}
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
                require_once(FRAMEWORK_PATH . 'models/profile.php');
                $profile = new Profile($this->registry, $user);
                $profile->toTags('p_');
        }
	else {
            $this->registry->errorPage('Please login', 'You need to be logged in to edit your profile');
        }	
    }

    /*
     * Edit your profile
     * @return void
     */
    private function editProfile() {
        if($this->registry->getObject('authenticate')->isLoggedIn() == true) {
            $user = $this->registry->getObject('authenticate')->getUser()->getUserID();
            if(isset($_POST) && count($_POST) > 0) {
                // edit form submitted
                $profile = new Profile($this->registry, $user);
                $profile->setBio($this->registry->getObject('db')->sanitizeData($_POST['bio']));
                $profile->setName($this->registry->getObject('db')->sanitizeData($_POST['name']));
                $profile->setRelationship($this->registry->getObject('db')->sanitizeData($_POST['relationship']));
                $profile->setInterest($this->registry->getObject('db')->sanitizeData($_POST['interest']));
                $profile->setSchool($this->registry->getObject('db')->sanitizeData($_POST['school']));
                $profile->setClass($this->registry->getObject('db')->sanitizeData($_POST['class']));
                $profile->setInternship($this->registry->getObject('db')->sanitizeData($_POST['internship']));
                $profile->setHome($this->registry->getObject('db')->sanitizeData($_POST['home']));
                $profile->setHall($this->registry->getObject('db')->sanitizeData($_POST['hall']));
                /*$profile->setCollege($this->registry->getObject('db')->sanitizeData($_POST['college']));
                $profile->setHS($this->registry->getObject('db')->sanitizeData( $_POST['highschool']));
                //$profile->setExperience($this->registry->getObject('db')->sanitizeData($_POST['experience']));
                //$profile->setPhilosophy($this->registry->getObject('db')->sanitizeData($_POST['philosophy']));
                //$profile->setInterests($this->registry->getObject('db')->sanitizeData($_POST['interests']));
                //$profile->setContactInfo($this->registry->getObject('db')->sanitizeData($_POST['contact_info']));*/
               
                if(isset($_FILES['profile_picture']) && ($_FILES['profile_picture']['size'] > 0)) { // this conditional was not working properly.  If I use $_FILES instead of $_POST it allows the function to pass always.
                //if($profile_picture != "no file selected") {
                    require_once(FRAMEWORK_PATH . 'library/images/imagemanager.class.php');
                    $im = new Imagemanager();
                    $im->loadFromPost('profile_picture', $this->registry->getSetting('upload_path') . 'profile/', time());
                    //$im->loadFromPost('profile_picture', 'http://localhost/ivy_nexus/uploads/profile', time());
                    //$im->loadFromPost('profile_picture', FRAMEWORK_PATH . 'uploads/profile/', time());
                    if($im == true) {
                        $im->resizeScaleHeight(230);
                        $im->save($this->registry->getSetting('upload_path') . 'profile/' . $im->getPhotoName());
                        //$im->save('http://localhost/ivy_nexus/uploads/profile' . $im->getName());
                        //$im->save(FRAMEWORK_PATH . 'uploads/profile/' . $im->getName());
                        $im->resizeScaleHeight(50);
                        $im->save($this->registry->getSetting('upload_path') . 'profile/' . $im->getThumbName());
                        $profile->setPhoto($im->getPhotoName());
                    }
                }
               
                $profile->save();
                $this->registry->redirectUserProfile(array('profile', 'view', 'edit'), 'Profile saved', 'The changes to your profile have been saved', false); 
                   
            }
            else {
                // show the edit form
                $this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'profile/content/edit.tpl.php', 'footer.tpl.php');
                $this->registry->getObject('template')->addTemplateBit('userbar', 'userbar_loggedin.tpl.php');
                // get the profile information to pre-populate the form fields
                require_once(FRAMEWORK_PATH . 'models/profile.php');
                $profile = new Profile($this->registry, $user);
                $profile->toTags('p_');
                
            }
        }
        else {
            $this->registry->errorPage('Please login', 'You need to be logged in to edit your profile');
        }
    }
}

?>