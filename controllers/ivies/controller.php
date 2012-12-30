<?php

/*
 Ivies controller - sends the user to information on the ivies
 */

class Iviescontroller {

	/* Constructor
	 * @param Object $registry the registry
     * @param bool $directCall - we are directly accessing this controller
	 */
	public function __construct($registry, $directCall=true) {
		$this->registry = $registry;
		
		$urlBits = $this->registry->getObject('url')->getURLBits();
		if(isset($urlBits[1])) {
			switch($urlBits[1]) {
				case 'Brown':
					$this->toBrown();
					break;
				case 'Brown University':
					$this->toBrown();
					break;
				case 'Columbia':
					$this->toColumbia();
					break;
				case 'Columbia University':
					$this->toColumbia();
					break;
				case 'Cornell':
					$this->toCornell();
					break;
				case 'Cornell University':
					$this->toCornell();
					break;
				case 'Dartmouth':
					$this->toDartmouth();
					break;
				case 'Dartmouth College':
					$this->toDartmouth();
					break;
				case 'Harvard':
					$this->toHarvard();
					break;
				case 'Harvard University':
					$this->toHarvard();
					break;
				case 'MIT':
					$this->toMIT();
					break;
				case 'mit':
					$this->toMIT();
					break;
				case 'Penn':
					$this->toPenn();
					break;
				case 'University of Pennsylvania':
					$this->toPenn();
					break;
				case 'Princeton':
					$this->toPrinceton();
					break;
				case 'Princeton University':
					$this->toPrinceton();
					break;
				case 'Stanford':
					$this->toStanford();
					break;
				case 'Stanford University':
					$this->toStanford();
					break;
				case 'Yale':
					$this->toYale();
					break;
				case 'Yale University':
					$this->toYale();
					break;
				case 'ivies':
					$this->toIvies();
					break;
				default:
					$this->toIvies();
					//$this->toDartmouth();
					break;
					
			}
		}
	}
	
	private function toBrown() {
		$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'ivies/brown.tpl.php');
	}
	
	private function toColumbia() {
		$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'ivies/columbia.tpl.php');
	}
	
	private function toCornell() {
		$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'ivies/cornell.tpl.php');
	}
	
	private function toDartmouth() {
		$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'ivies/dartmouth.tpl.php');
	}
	
	private function toHarvard() {
		$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'ivies/harvard.tpl.php');
	}
	
	private function toMIT() {
		$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'ivies/mit.tpl.php');
	}
	
	private function toPenn() {
		$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'ivies/penn.tpl.php');
	}
	
	private function toPrinceton() {
		$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'ivies/princeton.tpl.php');
	}
	
	private function toStanford() {
		$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'ivies/stanford.tpl.php');
	}
	
	private function toYale() {
		$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'ivies/yale.tpl.php');
	}
	
	private function toIvies() {
		$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'ivies/ivy.tpl.php', 'footer.tpl.php');
	}
	
}

?>