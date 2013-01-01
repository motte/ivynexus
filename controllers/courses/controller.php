<?php
// This controller creates the courses page where people share what classes they are taking


class Coursescontroller {

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
						$this->toCourses();
					}
					else {
						$this->toSpecificCourse(intval($urlBits[2]));
					}
					break;
				default:
					$this->toCourses();
					break;		
			}
		}
		else {
			$this->toCourses();
		}
	}

	private function toSpecificCourse($courseid) {
		require_once(FRAMEWORK_PATH . 'models/courses.php');
		$idea = new Courses($this->registry, $courseid);
		$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'courses/specificCourse.tpl.php', 'footer.tpl.php');
	}

	private function toCourses() {
		$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'courses/courses.tpl.php', 'footer.tpl.php');
	}
	
}


?>