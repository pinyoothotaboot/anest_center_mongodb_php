<?php

class Lockscreen extends Controller{
	function __construct(){
		parent::__construct();

	}
	function index(){

			$this->model = new Lockscreen_Model();
			
			//Session::delset('user_lock');

		    $this->model->lock();
				//Session::set('user_lock',0);
			$this->view->render('lockscreen/index',true);
			
			
	}

	function unlock(){

		

			if(isset($_POST['unlock'])){

					Session::init();
					$email = Session::get('user_account');

					$data = [
								
								'pass'       => $this->secure($_POST['password'],''),
								'email'      => $email
					];
			}

			$this->model = new Lockscreen_Model();

			$this->view->data = $this->model->unlock($data);
		

	}

}

?>