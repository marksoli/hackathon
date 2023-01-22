<?php
class DefaultController extends Controller{
	public function index(){

		if( !isset($_SESSION['user_id']) ){
			return header('location:/Login/index');
		}
		$user = $this->model('User')->findId($_SESSION['user_id']);
		$this->view('Default/mainpage', ['User'=>$user]);
	}

	public function complete(){
		if( !isset($_SESSION['user_id']) ){
			return header('location:/Login/index');
		}
		$user = $this->model('User')->findId($_SESSION['user_id']);
		if(isset($_POST['complete'])){
			$val = $user->complete;
			if($val > '8')
				return $this->view('Default/mainpage', ['User'=>$user]);
			$user->setComplete($val);
			//first submit
			if(isset($_POST['age'])){
				//age
				$age = $_POST['age']; 
				$user->setAge($age);
			}
			if(isset($_POST['yearEarn'])){
				//yearly earning
				$yearEarn = $_POST['yearEarn']; 
				$user->setYearEarn($yearEarn);
			}
			if(isset($_POST['monthExp'])){
				//subscription
				$monthExp = $_POST['monthExp']; 
				$user->setMonthExp($monthExp);
			}
			if(isset($_POST['housing'])){
				$housing = $_POST['housing']; 
				$user->setHousing($housing);
			}
			if(isset($_POST['food'])){
				$food = $_POST['food']; 
				$user->setFood($food);
			}
			if(isset($_POST['misc'])){
				$food = $_POST['misc']; 
				$user->setMisc($misc);
			}
			if(isset($_POST['saving'])){
				$saving = $_POST['saving']; 
				$user->setSaving($saving);
			}
			if(isset($_POST['invest'])){
				$invest = $_POST['invest']; 
				$user->setInvest($invest);
			}
			if(isset($_POST['debt'])){
				$debt = $_POST['debt']; 
				$user->setDebt($debt);
			}

			$userNew = $this->model('User')->findId($_SESSION['user_id']);
			return $this->view('Default/mainpage', ['User'=>$userNew]);
		}
	}


}
?>
