<?php

class Login extends Controller{
	function __construct(){
		parent::__construct();

	}
	function index(){
			
			$this->model = new Login_Model();
			
			$this->view->render('login/index',true);
	}

	function signin(){


			if(isset($_POST['signin'])){

					$data = [
								'email'      => $this->secure($_POST['email'],''),
								'pass'       => $this->secure($_POST['pass'],'')
					];
			}

			$this->model = new Login_Model();

			$this->view->data = $this->model->signin($data);

	}

	function signout(){

		$this->model = new Login_Model();

		$this->model->signout();
	}
	
}

?>