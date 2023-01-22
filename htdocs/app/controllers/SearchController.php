<?php
class SearchController extends Controller{

	public function searchForums(){
		$profiles = null;
		$subs = null;
		if(!isset($_POST['action'])){
			$search_param = $_POST['search'];
			//forums
			$subforum = $this->model('Subforums');
			
			$subs = $subforum->findSubforum($search_param);
			//users
			$profile = $this->model('Profile');
			$profiles = $profile->findUsernames($search_param);	
		}
		$this->view('Default/searchPage', ['subs'=>$subs, 'profiles'=>$profiles]);		
	}
}
?>