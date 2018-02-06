<?php
class Lockscreen_Model extends Model{
	function __construct(){
		parent::__construct();
	}

	function lock(){

		Session::init();
		Session::set('user_lock',0);

	}

	function unlock($packet){

		$status = 1;
		$filter =  [
						'anest.staff.staff_email'  => (string)$packet['email'],
						'anest.staff.staff_pass'   => (string)$this->hash->create('md5',$packet['pass'],HASH_PASSWORD_KEY),
						'anest.staff.staff_status' => (int)$status
					];
		

		$cursor = $this->db->Count($filter);

		if((int)$cursor == 1){
			Session::init();
			Session::set('user_lock',1);
			header('location:'.URL);
		}
		else {
			header('location:'.URL.'lockscreen');
		}

	}


}

?>