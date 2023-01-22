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
			if($val > '5')
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
				$misc = $_POST['misc']; 
				$user->setMisc($misc);
			}

			$userNew = $this->model('User')->findId($_SESSION['user_id']);
			return $this->view('Default/mainpage', ['User'=>$userNew]);
		}
	}

	public function completeInv(){
		if( !isset($_SESSION['user_id']) ){
			return header('location:/Login/index');
		}
		$user = $this->model('User')->findId($_SESSION['user_id']);
		if(isset($_POST['completeInv'])){
			$val = $user->completeInv;
			if($val > '3')
				return $this->view('Default/invest', ['User'=>$user]);
				
			$user->setCompleteInv($val);	

			if(isset($_POST['goal'])){
				$goal = $_POST['goal']; 
				$user->setGoal($goal);
			}

			if(isset($_POST['period'])){
				$period = $_POST['period']; 
				$user->setPeriod($period);
			}

			$types = "";
			if(isset($_POST['type1'])) 
				$types = $types . " " . $_POST['type1'];
			if(isset($_POST['type2']))
				$types = $types . " " . $_POST['type2'];
			if(isset($_POST['type3']))
				$types = $types . " " . $_POST['type3'];
			if(isset($_POST['type4']))
				$types = $types . " " . $_POST['type4'];
			if(isset($_POST['type5']))
				$types = $types . " " . $_POST['type5'];
			if(isset($_POST['type6']))
				$types = $types . " " . $_POST['type6'];
			if(!$types == "")
				$user->setTypes($types);

			if(isset($_POST['invested'])){
				$invested = $_POST['invested']; 
				$user->setInvested($invested);
			}

			$userNew = $this->model('User')->findId($_SESSION['user_id']);
			return $this->view('Default/invest', ['User'=>$userNew]);
		}
	}

	public function invest(){

		if( !isset($_SESSION['user_id']) ){
			return header('location:/Login/index');
		}
		$user = $this->model('User')->findId($_SESSION['user_id']);
		$val = $user->complete;
		// echo $val;
		if($val < '5'){
			return $this->view('Default/mainpage', ['User'=>$user, 'error'=>'Please complete the initial questionnaire first']);
			echo $val;
		}

		return $this->view('Default/invest', ['User'=>$user]);
	}



}
?>
