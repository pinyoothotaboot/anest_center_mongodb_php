<?php
class Login_Model extends Model{
	function __construct(){
		parent::__construct();
	}

	function signin($packet){

		$status = 1;  // 1 is active  , 0 inactive

		$filter =  [
						'anest.staff.staff_email'  => (string)$packet['email'],
						'anest.staff.staff_pass'   => (string)$this->hash->create('md5',$packet['pass'],HASH_PASSWORD_KEY),
						'anest.staff.staff_status' => (int)$status
					];
		

		$cursor = $this->db->Query($filter);

		$data = array(
							'id'         => '',
							'name'       => '',
							'email'      => '',
							'online'     => '',
							'pic'        => '',
							'registed'   => '',
							'permission' => '',
						);
		
		foreach ($cursor as $value) {
				$data['id']          = $value['anest']['staff_id'];
				$data['name']        = $value['anest']['staff']['staff_name'];
				$data['email']       = $value['anest']['staff']['staff_email'];
				$data['online']      = $value['anest']['staff']['staff_online'];
				$data['pic']         = $value['anest']['staff']['pic_name'];
				$data['registed']    = $value['anest']['staff']['staff_registed'];
				$data['permission']  = $value['anest']['staff']['staff_permission'];
		}

		$online = 1;
		$param  = [
							'anest.staff_id'=> $this->db->getObjectID((string)$data['id'])
						    
						 ];

		$data1  = [
						'$set'=>[
								  'anest.staff.staff_online' => (int)$online                       

							    ]

				  ];

		$update = $this->db->Update($param,$data1);

		if($update){
					
					
			//print_r($data);

    		$str = $_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR'];	

			$user_agent = $this->hash->create('md5',$str,HASH_GENERAL_KEY);	

	 
			$since =  date('M. Y ', $data['registed']->sec);
	
		

			Session::init();

			Session::set('user_code',$user_agent);
			Session::set('user_account',$data['email']);
			Session::set('user_name',$data['name']);
			Session::set('user_online',$online);
			Session::set('user_since',$since);
			Session::set('user_id',(string)$data['id']);
			Session::set('user_pic',$data['pic']);
			Session::set('user_permission',$data['permission']);

			Session::set('user_lock',1);

			header('location:'.URL);

		}
		else {
			Session::destroy();
			header('location:'.URL.'login');
		}


	}


	function signout(){


		Session::init();


			if(Session::id() != ''){

				if((int)Session::get('user_online') == 1){

					$online = 0;
					$param  = [
							    'anest.staff_id'=> $this->db->getObjectID((string)Session::get('user_id'))
						    
						     ];

					$data1  = [
								'$set'=>[
									       'anest.staff.staff_online' => (int)$online
							    	   ]

				  			];

					$update = $this->db->Update($param,$data1);

						if($update){

								Session::destroy();
								header('location:'.URL.'login');
						}

				}

				
			}
			else{
				Session::destroy();
				header('location:'.URL.'login');

			}
	}
	
}
?>