<?php
class Streamcontroller {
	
	/**
	 * Registry object reference
	 */
	private $registry;
	
	/**
	 * Stream model object reference
	 */
	private $model;
	
	/**
	 * Controller constructor - direct call to false when being embedded via another controller
	 * @param Registry $registry our registry
	 * @param bool $directCall - are we calling it directly via the framework (true), or via another controller (false)
	 */
	public function __construct(Registry $registry, $directCall) {
		$this->registry = $registry;
		if($this->registry->getObject('authenticate')->isLoggedIn()) {
			$this->generateStream();
		
			
			$urlBits = $this->registry->getObject('url')->getURLBits();
			
			$user = $this->registry->getObject('authenticate')->getUser()->getUserID();
			require_once(FRAMEWORK_PATH . 'controllers/profile/profilestreamcontroller.php');
			$stream = new Profilestreamcontroller($registry, $directCall=true, $user);
			
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
	
			
			$this->generateStream();	

		}
		else {
			$this->registry->errorPage('Please login', 'You need to be logged in to see what is happening in your network');
		}		
	}
	
	private function generateStream($offset=0) {
		require_once(FRAMEWORK_PATH . 'models/stream.php');
		$stream = new Stream($this->registry);
		$stream->buildStream($this->registry->getObject('authenticate')->getUser()->getUserID(), $offset);
		if(! $stream->isEmpty()) {
			$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'stream/main.tpl.php', 'footer.tpl.php');
				
			$streamdata = $stream->getStream();
			
			$IDs = $stream->getIDs();
			$cacheableIDs = array();
			foreach($IDs as $id) {
				$i = array();
				$i['status_id'] = $id;
				$cacheableIDs[] = $i;
			}

			
			$cache = $this->registry->getObject('db')->cacheData($cacheableIDs);
			$this->registry->getObject('template')->getPage()->addTag('stream', array('DATA', $cache));
			
			foreach($streamdata as $data) {
				$datatags = array();
				foreach($data as $tag => $value) {
					$datatags['status' . $tag] = $value;
				}
				
				// your own status updates
				if($data['profile'] == $this->registry->getObject('authenticate')->getUser()->getUserID() && $data['poster'] == $this->registry->getObject('authenticate')->getUser()->getUserID()) {
					// it was a present...from me to me!
					// http://www.imdb.com/title/tt0285403/quotes?qt0473119
					$this->registry->getObject('template')->addTemplateBit('stream-' . $data['ID'], 'stream/types/' . $data['type_reference'] . '-fromtoself.tpl.php', $datatags);
				}
				elseif($data['profile'] == $this->registry->getObject('authenticate')->getUser()->getUserID() ) {
					// updates to you
					$this->registry->getObject('template')->addTemplateBit('stream-' . $data['ID'], 'stream/types/' . $data['type_reference'] . '-toself.tpl.php', $datatags);	
				}
				elseif($data['poster'] == $this->registry->getObject('authenticate')->getUser()->getUserID()) {
					// updates by you
					$this->registry->getObject('template')->addTemplateBit('stream-' . $data['ID'], 'stream/types/' . $data['type_reference'] . '-fromself.tpl.php', $datatags);	
				}
				elseif($data['poster'] == $data['profile']) {
					$this->registry->getObject('template')->addTemplateBit('stream-' . $data['ID'], 'stream/types/' . $data['type_reference'] . '-user.tpl.php', $datatags);		
				}
				else {
					// network updates
					$this->registry->getObject('template')->addTemplateBit('stream-' . $data['ID'], 'stream/types/' . $data['type_reference'] . '.tpl.php', $datatags);		
				}
				
			}
			
			// stream comments, likes and dislikes
			$status_ids = implode( ',', $IDs );
			$start = array();
			foreach($IDs as $id) {
				$start[$id] = array();
			}
			
			// comments
			$comments = $start;
			$sql = "SELECT p.name as commenter, c.profile_post, c.comment FROM profile p, comments c WHERE p.user_id=c.creator AND c.approved=1 AND c.profile_post IN ({$status_ids})";
			$this->registry->getObject('db')->executeQuery($sql);
			if($this->registry->getObject('db')->numRows() > 0) {
				while($comment = $this->registry->getObject('db')->getRows()) {
					$comments[$comment['profile_post']][] = $comment;
				}
			}
			foreach($comments as $status => $comments) {
				$cache = $this->registry->getObject('db')->cacheData($comments);
				$this->registry->getObject('template')->getPage()->addTag('comments-' . $status, array('DATA', $cache));				
			}
			
			// likes + dislikes
			$likes = $start;
			$dislikes = $start;
			$sql = "SELECT l.status, p.name as liker, l.liker as liker_id, l.type as type FROM profile p, likes l WHERE p.user_id=l.liker AND l.status IN ({$status_ids}) ";
			$this->registry->getObject('db')->executeQuery($sql);
			if($this->registry->getObject('db')->numRows() > 0) {
				while($like = $this->registry->getObject('db')->getRows()) {
					if( $like['type'] == 'likes' ) {
						$likes[ $like['status'] ][] = $like;
					}
					else {
						$dislikes[$ike['status']][] = $like;
					}
					
				}
			}
			foreach($likes as $status => $likeslist) {
				$cache = $this->registry->getObject('db')->cacheData($likeslist);
				$this->registry->getObject('template')->getPage()->addTag('likes-' . $status, array('DATA', $cache));				
			}
			foreach($dislikes as $status => $dislikeslist) {
				$cache = $this->registry->getObject('db')->cacheData($dislikeslist);
				$this->registry->getObject('template')->getPage()->addTag('dislikes-' . $status, array('DATA', $cache));				
			}
			
		}
		else {
			$this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'stream/none.tpl.php', 'footer.tpl.php');
				
		}
	}	
	
}
		
		
?>