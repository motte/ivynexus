<?php

/* you can set the number of members shown in the members sections and lists, including for searches */

class Members {
    private $registry;

    public function __construct(Registry $registry) {
            $this->registry = $registry;
    }

    /**
     Generate paginated members list
     @param int $offset the offset
     @return Object pagination/listing object
     */
    public function listMembers($offset=0) {
            require_once(FRAMEWORK_PATH . 'library/pagination/listing.class.php');
            $paginatedMembers = new Listing($this->registry);
            // This sets the number of members paginated on members list
            $paginatedMembers->setLimit(12);
            $paginatedMembers->setOffset($offset);
            $query = "SELECT u.ID, p.photo, p.name, p.school, p.class, p.internship, p.chili, p. home FROM users u, profile p WHERE p.user_id=u.ID AND u.active=1 AND u.banned=0 AND u.deleted=0";
            $paginatedMembers->setQuery($query);
            $paginatedMembers->setMethod('cache');
            $paginatedMembers->generateList();
            return $paginatedMembers;
    }

    /*
     * Generated members list by family name
     * @param String $letter
     * @param int $offset the offset
     * @return Object listing object
     */
    public function listMembersByLetter($letter='A', $offset=0) {
        $alpha = strtoupper($this->registry->getObject('db')->sanitizeData($letter));
        require_once(FRAMEWORK_PATH . 'library/pagination/listing.class.php');
        $paginatedMembers = new Listing($this->registry);
        // This sets the number of members paginated on members list
        $paginatedMembers->setLimit(12);
        $paginatedMembers->setOffset($offset);
        $query = "SELECT u.ID, p.photo, p.name, p.school, p.class, p.internship, p.chili, p.home FROM users u, profile p WHERE p.user_id=u.ID AND u.active=1 and u.banned=0 AND u.deleted=0 AND SUBSTRING_INDEX(p.name,' ', -1) LIKE'" . $alpha . "%' ORDER BY SUBSTRING_INDEX (p.name, ' ', -1) ASC";
        $paginatedMembers->setQuery($query);
        $paginatedMembers->setMethod('cache');
        $paginatedMembers->generateList();
        return $paginatedMembers;
    }

    /*
     * Search for members based on their name
     * @param String $filter name
     * @param int $offset the offset
     * @return Object listing object
     */
    public function filterMembersByName($filter='', $offset=0) {
        $filter = ($this->registry->getObject('db')->sanitizeData(urldecode($filter)));
        require_once(FRAMEWORK_PATH . 'library/pagination/listing.class.php');
        $paginatedMembers = new Listing($this->registry);
        // This sets the number of members paginated on search members list
        $paginatedMembers->setLimit(7);
        $paginatedMembers->setOffset($offset);
        $query = "SELECT u.ID, p.photo, p.name, p.school, p.class, p.internship, p.chili, p.home FROM users u, profile p WHERE p.user_id=u.ID AND u.active=1 AND u.banned=0 AND u.deleted=0 AND p.name LIKE'%" . $filter . "%' ORDER BY p.name ASC";
        $paginatedMembers->setQuery($query);
        $paginatedMembers->setMethod('cache');
        $paginatedMembers->generateList();
        return $paginatedMembers;
    }
    
    /*
     * Add chilis -initial attempt
     * @param Int $chili
     * @return Int $chili
     */
    public function addChili($giverid) {
        $query = "SELECT * FROM chili WHERE cgiver = '$giverid'";
        $result = mysqli_query($query);
        if(mysqli_query($result) > 0) {
        	return;
        }
        
        else {
        	$this->registry->getObject('db')->updateRecords('profile', $result+1, 'ID=' . $receiveruser);
        }
        
        return $result;
    }
    
}

?>