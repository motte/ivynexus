<?php

/*
 Ivies controller - sends the user to information on the ivies
 */

class Ideascontroller {

	/* Constructor
	 * @param Object $registry the registry
     * @param bool $directCall - we are directly accessing this controller
	 */
	public function __construct($registry, $directCall=true) {
		$this->registry = $registry;

		$urlBits = $this->registry->getObject('url')->getURLBits();
		if(isset($urlBits[1])) {
			switch($urlBits[1]) {
				case 'view':
					if(intval($urlBits[2]) == '' || '0') {
						$this->toIdeas();
					}
					else {
						$this->toSpecificIdea(intval($urlBits[2]));
					}
					break;
				default:
					$this->toIdeas();
					break;		
			}
		}
		else {
			$this->toIdeas();
		}
	}

	private function toSpecificIdea($ideaid) {
		require_once(FRAMEWORK_PATH . 'models/idea.php');
		$idea = new Idea($this->registry, $ideaid);
		$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'ideas/specificIdea.tpl.php', 'footer.tpl.php');
	}

	private function toIdeas() {
		$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'ideas/ideas.tpl.php', 'footer.tpl.php');
	}
	
}

?>