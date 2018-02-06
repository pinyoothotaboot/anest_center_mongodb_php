<?php
class Staff_Model extends Model{
	function __construct(){
		parent::__construct();
	}

	function get_staff(){


	$filter = array(
						'anest.staff.staff_status'=> array('$in'=>array(0,1))
					);

	$cursor = $this->db->Count($filter);

    if($cursor != 0){
    
    $id = array();
    $department = array();
    $staff = array( [
                        'id'=>0,
                        'staff'=>array()
                    ]
                );
    $packet = array(    [
                        'department' => '',
                        'name'=>'',
                        'permission'=>'',
                        'online'=>'',
                        'status'=>'',
                        'id'=>''
                        ]
                    );
    $num = 0;

    $permission = ['','Visitor','Service','Admin'];
    if($cursor != 0){

     $where = array('anest.department.department_online'=>1);
     
     $cursor = $this->db->Query($where);
         
         foreach($cursor as $value){
             
          
             $id[$num] =   $value['anest']['department_id'];
             $department[$num] =   $value['anest']['department']['department_name'];
             $num++;
         }
         
  
        
              $filter = array(
                              'anest.staff_department_ref'=> array('$in'=>$id),
                              
                        );
             
              $cursor = $this->db->Query($filter);
                 
                 $i=0;
                 foreach($cursor as $value){
                     
                     $staff[$i]['id'] = $value['anest']['staff_department_ref'];
                     $staff[$i]['staff'] = $value['anest'];
                     $i++;
                     
                 }
                 
             $count = 0;
             for($i=0;$i<count($department);$i++){
                 
                     for($j=0;$j<count($staff);$j++){

                            if((string)$id[$i] == (string)$staff[$j]['id']){

                            $packet[$count]['department'] = $department[$i];

                            $packet[$count]['name'] = $staff[$j]['staff']['staff']['staff_name'];

                            $packet[$count]['permission'] = $permission[(int)$staff[$j]['staff']['staff']['staff_permission']];

                            $packet[$count]['online'] = $staff[$j]['staff']['staff']['staff_online'];

                            $packet[$count]['status'] = $staff[$j]['staff']['staff']['staff_status'];

                            $packet[$count]['id'] = $staff[$j]['staff']['staff_id'];
                           
                            $count++;
                         }
                       
                        
                     }
                  
             }
             
            //var_dump($packet);
          
           
    }
}
   

	
		return $packet;
	}
	
	function get_department(){
		
		$online = 1;
		
		$filter =  [
						'anest.department.department_online' => (int)$online,
						
					];
		
		$cursor = $this->db->Query($filter);

		return $cursor;


		
		
	}




	function edit($id){


		

		$filter =  [
						
						'anest.staff_id'        => $this->db->getObjectID($id)
						
					];
		
		$cursor = $this->db->Query($filter);

		
		foreach ($cursor as $value) {
				$data1 = $value;
			}	

		$where = array( 
							'anest.department_id' => $data1['anest']['staff_department_ref'],
							'anest.department.department_online' => 1
						);
		$cursor = $this->db->Query($where);

		foreach ($cursor as $value) {
				$data2 = $value;
			}

			$packet = array($data1,$data2);

		

		return $packet;


	}


	function create1($packet){


		$path = $_SERVER['DOCUMENT_ROOT'].'/anest_center/publics/images/user';

		
		$name = basename($packet['staff-pic']['name']);
		
		if(move_uploaded_file($packet['staff-pic']['tmp_name'],"$path/$name")){

			echo "Saving success";
		}
		else
			echo "Can't save";
		

		echo $dirpath.$folder.'/'.$packet['staff-pic']['name'];
		
	}

	function create($packet){

		

		$type = array('image/jpg','image/jpeg','image/gif','image/png');
		$check = true;
		
		
		
		$file_name  = $packet['staff-pic']['name'];
		$file_tmp   = $packet['staff-pic']['tmp_name'];
		$file_type  = $packet['staff-pic']['type'];
		$file_size  = $packet['staff-pic']['size'];
		$file_error = $packet['staff-pic']['error'];
		
		$target_file = $target_dir.$file_name;
		
		// Check image file [jpg,jpeg,gif,png]
			if(($file_type == $type[0]) || 
			   ($file_type == $type[1]) ||
			   ($file_type == $type[2]) || 
			   ($file_type == $type[3]))
				$check = true;

			// Check image file large too 1MB
			if($file_size > 1024000)
				$check =false;
				
			if($check == true){

				$path = $_SERVER['DOCUMENT_ROOT'].'/anest_center/publics/images/staff';


        		$tmp_name = $packet['staff-pic']["tmp_name"];
        
        		$name = basename($file_name);

        		//if(is_uploaded_file($tmp_name)) 
				if(move_uploaded_file($file_tmp, "$path/$name")){
					
					$online = 0;
					$status = 1;
					$date = date('d-m-Y');

				$data = [ 
							[
								'anest'=> [

									'staff_id'=>$this->db->getObjectID(),
									'staff_department_ref' => $this->db->getObjectID($packet['staff-department']),
									'staff'=>[
											
										'staff_name'           => (string)$packet['staff-name'],        /*ชื่อ-สกุลบุคลากร*/
										'staff_position'	   => (string)$packet['staff-position'],    /*ตำแหน่งงาน*/
										'staff_tel'			   => (string)$packet['staff-tel'],         /*เบอร์โทรติดต่อ*/
										'staff_email'		   => (string)$packet['staff-email'],       /*อีเมลล์*/
										'staff_pass'		   => (string)$this->hash->create('md5',$packet['staff-pass'],HASH_PASSWORD_KEY),                                  
										'staff_registed'	   => $this->db->getISODateID($date),                /*วันที่ลงทเบียน*/
										'staff_permission'     => (int)$packet['staff-permission'],     /*่กำหนดสิทธิ์*/
										'staff_online'		   => (int)$online,                         /*สถานะออนไลน์*/
										'staff_status'		   => (int)$status,
										
					
										'pic_name'   		   => $file_name,                                   /*ชื่อรูป*/
										'pic_tmp'              => $file_tmp,                                   /*temp file*/
										'pic_type'             => $file_type,                                   /*ชนิดรูป*/
										'pic_size'             => (int)$file_size,                                   /*ขนาดรูป*/
										'pic_error'            => $file_error                                    /*error*/
										]
								]
					],
				];

						$insert = $this->db->Insert($data);

						if($insert){
    			
    						header('location:'.URL.'staff');

						}

					
				} // End upload


			} // End check

	}

	function update($packet,$img){

		$type = array('image/jpg','image/jpeg','image/gif','image/png');
		$check = true;

		Session::init();
			
		if($img['name'] != ''){		
			
			$file_name = $img['name'];
			$file_tmp  = $img['tmp_name'];
			$file_type = $img['type'];
			$file_size = $img['size'];
			$file_error =$img['error']; 
			
		}	

			// Check image file [jpg,jpeg,gif,png]
			if(($file_type == $type[0]) || 
			   ($file_type == $type[1]) ||
			   ($file_type == $type[2]) || 
			   ($file_type == $type[3]))
				$check = true;

			// Check image file large too 1MB
		if($file_size > 1024000)
				$check =false;
  			
		if($check== true && $img['name'] != ''){

		
				$path = $_SERVER['DOCUMENT_ROOT'].'/anest_center/publics/images/staff';


        		
        
        	$name = basename($file_name);

        	
				if(move_uploaded_file($file_tmp, "$path/$name")){

				
				$param = [
							'anest.staff_id'=> $this->db->getObjectID($packet['staff_id']),
							'anest.staff.staff_status'=> array('$in' => array(0,1))
						    
						 ];

				$data1  = ['$set'=>[
									'anest.staff.staff_name'     => (string)$packet['staff_name'],      
									'anest.staff.staff_position' => (string)$packet['staff_position'],   
									'anest.staff.staff_tel'		 => (string)$packet['staff_tel'],
									'anest.staff.staff_permission'=> (string)$packet['staff_permission'],
									'anest.staff_department_ref'		 => $this->db->getObjectID($packet['staff_department']),          
									'anest.staff.staff_status'	 => 1,  
									'anest.staff.pic_name'   	 => $file_name,                          
									'anest.staff.pic_tmp'        => $file_tmp,                          
									'anest.staff.pic_type'       => $file_type,                          
									'anest.staff.pic_size'       => (int)$file_size,                    
									'anest.staff.pic_error'      => $file_error                         

									]

						  ];

				$update = $this->db->Update($param,$data1);

				if($update){

					Session::set('user_name',$packet['staff_name']);
					Session::set('user_pic',$file_name);
					header('location:'.URL.'staff/edit/'.$packet['staff_id']);

					//echo "อัพได้สัส";
				} // End Result
				

				
			}
			else {

							

				$param = [
							'anest.staff_id'=> $this->db->getObjectID($packet['staff_id']),
							'anest.staff.staff_status'=> array('$in' => array(0,1))
						    
						 ];

				$data1  = ['$set'=>[
									'anest.staff.staff_name'     => (string)$packet['staff_name'],      
									'anest.staff.staff_position' => (string)$packet['staff_position'],   
									'anest.staff.staff_tel'		 => (string)$packet['staff_tel'],
									'anest.staff.staff_permission'=> (string)$packet['staff_permission'],
									'anest.staff.staff_status'	 => 1, 
									'anest.staff_department_ref'=> $this->db->getObjectID($packet['staff_department']) ,
									'anest.staff.staff_status'	 => 1,  
									'anest.staff.pic_name'   	 => $file_name,                          
									'anest.staff.pic_tmp'        => $file_tmp,                          
									'anest.staff.pic_type'       => $file_type,                          
									'anest.staff.pic_size'       => (int)$file_size,                    
									'anest.staff.pic_error'      => $file_error 
										                        

									]

						  ];

				$update = $this->db->Update($param,$data1);

				if($update){
						Session::set('user_name',$packet['staff_name']);
						Session::set('user_pic',$file_name);
						header('location:'.URL.'staff/edit/'.$packet['staff_id']);
						//echo "อัพไม่ได้ สัส";
				} // End update
	
			}
			

		}

		else {

			//Session::init();

		

				$param = [
							'anest.staff_id'=> $this->db->getObjectID($packet['staff_id']),
							'anest.staff.staff_status'=> array('$in' => array(0,1))
						    
						 ];

				$data1  = ['$set'=>[
									'anest.staff.staff_name'     => (string)$packet['staff_name'],      
									'anest.staff.staff_position' => (string)$packet['staff_position'],   
									'anest.staff.staff_tel'		 => (string)$packet['staff_tel'],
									'anest.staff.staff_permission'=> (string)$packet['staff_permission'],
									'anest.staff.staff_status'	 => 1, 
									'anest.staff_department_ref'=> $this->db->getObjectID($packet['staff_department']) 
										                        

									]

						  ];

				$update = $this->db->Update($param,$data1);

				if($update){
						Session::set('user_name',$packet['staff_name']);
						header('location:'.URL.'staff/edit/'.$packet['staff_id']);
				} // End update

			}
	} // End function


	function delete($id){
			
				$online = 0;
				$param = [
							'anest.staff_id'=> $this->db->getObjectID($id)
						    
						 ];

				$data1  = ['$set'=>[
										'anest.staff.staff_status'           => (int)$online     
										                       

									]

						  ];

				$update = $this->db->Update($param,$data1);

				if($update){
					
					header('location:'.URL.'staff');

				} // End update
	}
}
?>