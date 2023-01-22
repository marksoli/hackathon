<?php
	class LoginController extends Controller
	{
		public function index(){
			if( isset($_SESSION['user_id'])){
				return header('location:/Default/');
			}
			if(!isset($_POST['action'])){
				$this->view('Login/Index');	
			}else{
				$user = $this->model('User')->find($_POST['username']);
				if($user != null && password_verify($_POST['password'], $user->password)){
					session_start();	
					$_SESSION['user_id'] = $user->user_id;
					$_SESSION['username'] = $user->username;
					return header('location:/Default/mainpage');
				}
				else{
					$this->view('Login/index', ['error' => 'Bad username/password!']);
				}
			}
		}

		public function register(){
			if(!isset($_POST['action'])){
				$this->view('Login/Register');
			}
			else{
				if( ($_POST['username'] != null && $_POST['password'] != null && $_POST['fname'] != null && $_POST['lname'] != null ) )	{
 					$user = $this->model('User');
 					$user->username = $_POST['username'];
 					$user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
					$user->first_name = $_POST['fname'];
					$user->last_name = $_POST['lname'];
 					$user->insert();
 					$theUser = $this->model('User')->find($user->username);
 					header('location:/Login/index');
				}
				else {
					$this->view('Login/register', ['error' => 'Error creating the account!']);
				}
				
			}
		}

		public function logout(){
			session_destroy();
			header('location:/Login/index');
		}

		public function changePassword(){
			if(!isset($_SESSION['user_id'])){
				$this->view('Login/Index');
			}

			//$users = $this->model('User')->find($_SESSION['user_id']);
			$users = $this->model('User')->findId($_SESSION['user_id']);
			//var_dump($users);

			if(!isset($_POST['action'])){
				$this->view('Login/edit', ['users'=>$users]);
			}
			else{				
				//var_dump($_POST['oldPassword']);
				//var_dump($_POST['newPassword']);
				//var_dump(password_verify($_POST['oldPassword'], $users->password));				
				if(password_verify($_POST['oldPassword'], $users->password)){
					$users->password = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
					$users->edit();				
				}				
				header('location:/Profile/displayProfile/' . $_SESSION['user_id']);
			}
		}
	}
?>
