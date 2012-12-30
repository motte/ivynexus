<?php

class Memberscontroller {
	/**
	 Registry object reference
	 */
	private $registry;
	
	/**
	 Quotation model object reference
	 */
	private $model;
	
	/**
	 Controller constructor - direct call to false when being embedded via another controller
	 @param Registry $registry our registry
	 @param bool $directCall - are we calling it directly via the framework (true), or via another controller (false)
	 */
	public function __construct(Registry $registry, $directCall) {
		$this->registry = $registry;
		
		$urlBits = $this->registry ->getObject('url')->getURLBits();
		if(isset($urlBits[1])) {
			switch($urlBits[1]) {
				case 'list':
					$this->listMembers(intval($urlBits[2]));
					break;
				case 'letter':
					$this->listMembersAlpha($urlBits[2], intval(isset($urlBits[3]) ? $urlBits[3] : 0));
					break;
				case 'search':
					$this->searchMembers(true, '', 0);
					break;
				case 'search-results':
					$this->searchMembers(false, $urlBits[2] , intval(isset($urlBits[3]) ? $urlBits[3] : 0));
					break;	
				default:
					$this->listMembers(0);
					$this->commonTemplateTags(intval($urlBits[2]));
					break;
			}
		}
		else {
			$this->listMembers(0);
			$this->commonTemplateTags(intval($urlBits[2]));
		}
	}
	
	private function listMembers($offset) {
		require_once(FRAMEWORK_PATH . 'models/members.php');
		$members = new Members($this->registry);
		$listing = $members->listMembers($offset);
		if($listing->getNumRowsPage() == 0) {
			$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'members/invalid.tpl.php', 'footer.tpl.php');
			$this->registry->getObject('template')->getPage()->addTag('members', array('SQL', $listing->getCache()));
			$this->registry->getObject('template')->getPage()->addTag('letter', '"' . $alpha . '"');
		}
		else {
			$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'members/list.tpl.php', 'footer.tpl.php');
			$this->registry->getObject('template')->getPage()->addTag('members', array('SQL', $listing->getCache()));
			$this->registry->getObject('template')->getPage()->addTag('letter', '');
			$this->registry->getObject('template')->getPage()->addTag('page_number', $listing->getCurrentPage());
			$this->registry->getObject('template')->getPage()->addTag('num_pages', $listing->getNumPages());
			if($listing->isFirst()) {
				$this->registry->getObject('template')->getPage()->addTag('first', '');
				$this->registry->getObject('template')->getPage()->addTag('previous', '');
			}
			else {
				$this->registry->getObject('template')->getPage()->addTag('first', "<a href='members/list/'>First page</a>");
				$this->registry->getObject('template')->getPage()->addTag('previous', "<a href='members/list/" . ($listing->getCurrentPage() - 2) . "'>Previous page</a>");
			}
			if($listing->isLast()) {
				$this->registry->getObject('template')->getPage()->addTag('next', '');
				$this->registry->getObject('template')->getPage()->addTag('last', '');
			}
			else {
				$this->registry->getObject('template')->getPage()->addTag('next', "<a href='members/list/" . $listing->getCurrentPage() . "'>Next page</a>");
				$this->registry->getObject('template')->getPage()->addTag('last', "<a href='members/list/" . ($listing->getNumPages() - 1) . "'>Last page</a>");
				
			}
			$this->formRelationships();
		}	
	}
	
	/* When clicking the last name letter on the bottom of the members list */
	private function listMembersAlpha($alpha='A', $offset=0) {
		require_once(FRAMEWORK_PATH . 'models/members.php');
		$members = new Members($this->registry);
		$listing = $members->listMembersByLetter($alpha, $offset);
		if($listing->getNumRowsPage() == 0) {
			$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'members/invalid.tpl.php', 'footer.tpl.php');
			$this->registry->getObject('template')->getPage()->addTag('members', array('SQL', $listing->getCache()));
			$this->registry->getObject('template')->getPage()->addTag('letter', '"' . $alpha . '"');
		}
		else {
			$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'members/list.tpl.php', 'footer.tpl.php');
			$this->registry->getObject('template')->getPage()->addTag('members', array('SQL', $listing->getCache()));
			$this->registry->getObject('template')->getPage()->addTag('letter', " - Letter " . '"' . $alpha . '"');
			$this->registry->getObject('template')->getPage()->addTag('page_number', $listing->getCurrentPage());
			$this->registry->getObject('template')->getPage()->addTag('num_pages', $listing->getNumPages());
			if($listing->isFirst()) {
				$this->registry->getObject('template')->getPage()->addTag('first', '');
				$this->registry->getObject('template')->getPage()->addTag('previous', '');
			}
			else {
				$this->registry->getObject('template')->getPage()->addTag('first', "<a href='members/letter/" . $alpha . "/'>First page</a>");
				$this->registry->getObject('template')->getPage()->addTag('previous', "<a href='members/letter/" . $alpha . "/" . ($listing->getCurrentPage() - 2) . "'>Previous page</a>");
			}
			if($listing->isLast()) {
				$this->registry->getObject('template')->getPage()->addTag('next', '');
				$this->registry->getObject('template')->getPage()->addTag('last', '');
			}
			else {
				$this->registry->getObject('template')->getPage()->addTag('first', "<a href='members/letter/" . $alpha . "/" . $listing->getCurrentPage() . "'>Next page</a>");
				$this->registry->getObject('template')->getPage()->addTag('previous', "<a href='members/letter/" . $alpha . "/" .($listing->getNumPages() - 1) . "'>Last page</a>");
			}
		}
	}
	
	private function searchMembers($search=true, $name='', $offset=0) {
		require_once(FRAMEWORK_PATH . 'models/members.php');
		$members = new Members($this->registry);
		if($search == true) {
			// we are performing the search
			$listing = $members->filterMembersByName(urlencode($_POST['name']), $offset);
			$name = urlencode($_POST['name']);
		}
		else {
			// we are paginating/listing search results
			$listing = $members->filterMembersByName($name, $offset);
		}
		if($listing->getNumRowsPage() == 0) {
			$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'members/invalid.tpl.php', 'footer.tpl.php');
		}
		else {
			$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'members/search.tpl.php', 'footer.tpl.php');
			$this->registry->getObject('template')->getPage()->addTag('members', array('SQL', $listing->getCache()));
			$this->registry->getObject('template')->getPage()->addTag('public_name', urlencode($name));
			$this->registry->getObject('template')->getPage()->addTag('encoded_name', $name);
			$this->registry->getObject('template')->getPage()->addTag('page_number', $listing->getCurrentPage());
			$this->registry->getObject('template')->getPage()->addTag('num_pages', $listing->getNumPages());
			if($listing->isFirst()) {
				$this->registry->getObject('template')->getPage()->addTag('first', '');
				$this->registry->getObject('template')->getPage()->addTag('previous', '');
			}
			else {
				$this->registry->getObject('template')->getPage()->addTag('first', "<a href='members/search-results/" . $name . "/'>First page</a>");
				$this->registry->getObject('template')->getPage()->addTag('previous', "<a href='members/search-results/" . $name . "/" . ($listing->getCurrentPage() - 2) . "'>Previous page</a>");
			}
			if($listing->isLast()) {
				$this->registry->getObject('template')->getPage()->addTag('next', '');
				$this->registry->getObject('template')->getPage()->addTag('last', '');
			}
			else {
				$this->registry->getObject('template')->getPage()->addTag('next', "<a href='members/search-results/" . $name . "/" . $listing->getCurrentPage() . "'>Next page</a>");
				$this->registry->getObject('template')->getPage()->addTag('last', "<a href='members/search-results/" . $name . "/" . ($listing->getNumPages() - 1) . "'>Last page</a>");
			}
		}
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
     * Set common template tags for all profile aspects
     * @param int $user the user id
     * @return void
     */
    private function commonTemplateTags($user) {
    // get a random sample of 6 friends.
	require_once(FRAMEWORK_PATH . 'models/relationships.php');
	$relationships = new Relationships($this->registry);
	$cache = $relationships->getByUser($user, true, 5);
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