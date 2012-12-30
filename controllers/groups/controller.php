<?php

class Groupscontroller {
	
	/**
	 * Controller constructor - direct call to false when being embedded via another controller
	 * @param Registry $registry our registry
	 * @param bool $directCall - are we calling it directly via the framework (true), or via another controller (false)
	 */
	public function __construct(Registry $registry, $directCall) {
		$this->registry = $registry;
		$urlBits = $this->registry->getObject('url')->getURLBits();
		
		if($this->registry->getObject('authenticate')->isLoggedIn()) {
			if(isset($urlBits[1])) {
				switch($urlBits[1]) {
					case 'create':
						$this->createGroup();
						break;
					case 'mine':
						$this->listMyGroups();
						break;
					default:
						$this->listPublicGroups(0);
						break;
				}
				
			}
			else {
				$this->listPublicGroups(0);
			}
		}
		else {
			if(isset($urlBits[1])) {
				$this->listPublicGroups(intval($urlBits[1]));
			}
			else {
				$this->listPublicGroups(0);
			}
			
		}
		
		
	}
	
	
	/**
	 * Create a new group
	 * @return void
	 */
	private function createGroup() {
		if(isset($_POST) && is_array($_POST) && count($_POST) > 0) {
			require_once(FRAMEWORK_PATH . 'models/group.php');
			$group = new Group($this->registry, 0);
			$group->setCreator($this->registry->getObject('authenticate')->getUser()->getUserID());
			$group->setName($this->registry->getObject('db')->sanitizeData($_POST['name']));
			$group->setDescription($this->registry->getObject('db')->sanitizeData( $_POST['description']));
			$group->setType($_POST['type']);
			$group->save();
			$this->registry->errorPage('Group created', 'Thank you, your new group has been created');
		}
		else {
			$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'groups/create.tpl.php', 'footer.tpl.php');
		}
	}
	
	private function listPublicGroups($offset) {
		$sql = "SELECT * FROM groups WHERE active=1 AND type <> 'private' ";
		require_once(FRAMEWORK_PATH . 'library/pagination/listing.class.php');
		$listing = new Listing($this->registry);
		$listing->setQuery($sql);
		$listing->setOffset($offset);
		$listing->setLimit(20);
		$listing->setMethod('cache');
		$listing->generateList();
		if($listing->getNumRowsPage() == 0)
		{
			$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'groups/no-public.tpl.php', 'footer.tpl.php');
		
		}
		else {
			$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'groups/public.tpl.php', 'footer.tpl.php');
			$this->registry->getObject('template')->getPage()->addTag('groups', array('SQL', $listing->getCache()));
			
			$this->registry->getObject('template')->getPage()->addTag('page_number', $listing->getCurrentPage());
			$this->registry->getObject('template')->getPage()->addTag('num_pages', $listing->getNumPages());
			if($listing->isFirst()) {
				$this->registry->getObject('template')->getPage()->addTag('first', '');
				$this->registry->getObject('template')->getPage()->addTag('previous', '');			
			}	
			else {
				$this->registry->getObject('template')->getPage()->addTag('first', "<a href='groups/'>First page</a>");
				$this->registry->getObject('template')->getPage()->addTag('previous', "<a href='groups/" . ($listing->getCurrentPage() - 2) . "'>Previous page</a>");
			}
			if($listing->isLast()) {
				$this->registry->getObject('template')->getPage()->addTag('next', '');
				$this->registry->getObject('template')->getPage()->addTag('last', '');			
			}
			else {
				$this->registry->getObject('template')->getPage()->addTag('first', "<a href='groups/" . $listing->getCurrentPage() . "'>Next page</a>");
				$this->registry->getObject('template')->getPage()->addTag('previous', "<a href='groups/" . ( $listing->getNumPages() - 1 ) . "'>Last page</a>");
			}

		}
		
	}
	
	private function listMyGroups() {
		$user = $this->registry->getObject('authenticate')->getUser()->getUserID();
		$sql = "SELECT * FROM groups WHERE creator={$user} OR ID IN (SELECT m.group FROM group_membership m WHERE m.user={$user} and m.approved=1 ) ";
		$cache = $this->registry->getObject('db')->cacheQuery($sql);
		$this->registry->getObject('template')->getPage()->addTag('my-groups', array('SQL', $cache));
		$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'groups/mine.tpl.php', 'footer.tpl.php');
	}

}

?>