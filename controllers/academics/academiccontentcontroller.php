<?php

/*
 * Profile content/information controller
 */
class Academiccontentcontroller {
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
                    $this->editAcademics();
                    break;
                case 'print':
                	$this->pringAcademics();
                	break;
                default:
                    $this->viewAcademics();
                    break;
            }
		}
		elseif(isset($urlBits[1])) {
            switch($urlBits[1]) {
                case 'edit':
                    $this->editAcademics();
                    break;
                case 'print':
                	$this->printAcademics();
                	break;
                default:
                    $this->viewAcademics();
                    break;
            }
		}
        else {
            $this->viewAcademics();
        }
    }
    
    /*
     * View a users profile information/content
     * @param int $user the user id
     * @return void
     */
    private function viewAcademics() {
    	$user = $this->registry->getObject('authenticate')->getUser()->getUserID();
    	//if($user == userid of the academics table)
        // load the template
        $this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'academics/content/view.tpl.php', 'footer.tpl.php');
        // get all the profile information/content and send it to the template
        require_once(FRAMEWORK_PATH . 'models/academics.php');
        $profile = new Academics($this->registry, $user);
        $profile->toTags('a_');

    }
    
    /*
     * View a users profile information/content
     * @param int $user the user id
     * @return void
     */
    private function printAcademics() {
    	$user = $this->registry->getObject('authenticate')->getUser()->getUserID();
        // load the template
        $this->registry->getObject('template')->buildFromTemplates('headercss.tpl.php', 'academics/content/print.tpl.php', 'footer.tpl.php');
        // get all the profile information/content and send it to the template
        require_once(FRAMEWORK_PATH . 'models/academics.php');
        $profile = new Academics($this->registry, $user);
        $profile->toTags('a_');

    }
    
    /*
     * Edit your profile
     * @return void
     */
    private function editAcademics() {
    	$user = $this->registry->getObject('authenticate')->getUser()->getUserID();
        //if($user == userid of the academics table) {
            if(isset($_POST) && count($_POST) > 0) {
                // edit form submitted
                $academics = new Academics($this->registry, $user);
                $academics->setMajor($this->registry->getObject('db')->sanitizeData($_POST['major']));
                $academics->setHomephone($this->registry->getObject('db')->sanitizeData($_POST['homephone']));
                $academics->setCell($this->registry->getObject('db')->sanitizeData($_POST['cell']));
                $academics->setInterests($this->registry->getObject('db')->sanitizeData($_POST['interests']));
                $academics->setAwards($this->registry->getObject('db')->sanitizeData($_POST['awards']));
                $academics->setClubs($this->registry->getObject('db')->sanitizeData($_POST['clubs']));
                $academics->setClasses($this->registry->getObject('db')->sanitizeData($_POST['classes']));
                $academics->setExperiences($this->registry->getObject('db')->sanitizeData($_POST['experiences']));
                $academics->setGpa($this->registry->getObject('db')->sanitizeData($_POST['gpa']));
                $academics->setFroshGpa($this->registry->getObject('db')->sanitizeData($_POST['fgpa']));
                $academics->setSophGpa($this->registry->getObject('db')->sanitizeData($_POST['sgpa']));
                $academics->setJunGpa($this->registry->getObject('db')->sanitizeData($_POST['jgpa']));
                $academics->setSenGpa($this->registry->getObject('db')->sanitizeData($_POST['segpa']));
                $academics->setSuperGpa($this->registry->getObject('db')->sanitizeData($_POST['ssgpa']));
                $academics->setAutobio($this->registry->getObject('db')->sanitizeData( $_POST['autobio']));
                //$profile->setExperience($this->registry->getObject('db')->sanitizeData($_POST['experience']));
                //$profile->setPhilosophy($this->registry->getObject('db')->sanitizeData($_POST['philosophy']));
                //$profile->setInterests($this->registry->getObject('db')->sanitizeData($_POST['interests']));
                //$profile->setContactInfo($this->registry->getObject('db')->sanitizeData($_POST['contact_info']));*/
                if(isset($_FILES['portrait']) && ($_FILES['portrait']['size'] > 0)) {
                    require_once(FRAMEWORK_PATH . 'library/images/imagemanager.class.php');
                    $im = new Imagemanager();
                    $im->loadFromPost('portrait', $this->registry->getSetting('upload_path') . 'academicportraits/', time());
                    //$im->loadFromPost('profile_picture', 'http://localhost/ivy_nexus/uploads/profile', time());
                    if($im == true) {
                        $im->resizeScaleHeight(230);
                        $im->save($this->registry->getSetting('upload_path') . 'academicportraits/' . $im->getPhotoName());
                        //$im->save('http://localhost/ivy_nexus/uploads/profile' . $im->getName());
                        $academics->setPortrait($im->getPhotoName());
                    }
                }
                
                $academics->save();
                $this->registry->redirectUserAcademics(array('academics', 'view', 'edit'), 'Academic Profile saved', 'The changes to your academic profile has been saved', false); 
                   
            }
            else {
                // show the edit form
                $this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'academics/content/edit.tpl.php', 'footer.tpl.php');
                $this->registry->getObject('template')->addTemplateBit('userbar', 'userbar_loggedin.tpl.php');
                // get the profile information to pre-populate the form fields
                require_once(FRAMEWORK_PATH . 'models/academics.php');
                $academics = new Academics($this->registry, $user);
                $academics->toTags('a_');
                
            }
        }
        //else {
          //  $this->registry->errorPage('Please login', 'You need to be logged in to edit your profile');
        //}
    
}

?>
