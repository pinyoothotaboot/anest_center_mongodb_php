<?php
class Department_Model extends Model{
	function __construct(){
		parent::__construct();
		
	}
	
	function get_department(){


		$filter = array( 
							'$or' => array(
                          				array("anest.department.department_online" => 1),
                          				array("anest.department.department_online" => 0)
                     					 )

							
							);
		$cursor = $this->db->Query($filter);


		
		return $cursor;
	}
	
	
	function create($packet){

		
		$date = date('d-m-Y');
		$online = 1;

		$data = [ 
					[
						'anest'=> [
								'department_id' => $this->db->getObjectID(),
								'department'=>
								[ 
									'department_name'          => (string)$packet['department-name'],
								    'department_boss'          => (string)$packet['department-boss'],
									'department_contact'       => (string)$packet['department-contact'],
									'department_tel'           => (string)$packet['department-tel'],
									'department_registed'	   => $this->db->getISODateID($date),
									'department_online'		   => (int)$online,
								]	
						                                 
						]
					],
				];

				

			$insert = $this->db->Insert($data);

			if($insert){
    			//$alarm = ['ลงทะเบียนสำเร็จ','',''];
    			header('location:'.URL.'department');

			}

	}
	
	
	function delete($id){
			
				$online = 0;
				$param = [
							'anest.department_id'=> $this->db->getObjectID($id)
						    
						 ];

				$data1  = ['$set'=>[
										'anest.department.department_online'           => (int)$online     

									]

						  ];

				$update = $this->db->Update($param,$data1);

				if($update){
					
					header('location:'.URL.'department');

				} // End update
	}
	
	function get_departmentBy($id){
		
		$filter =  [
						
						'anest.department_id'        => $this->db->getObjectID($id)
						
					];
		
		$cursor = $this->db->Query($filter);

		
		foreach ($cursor as $value) {
				$data = $value;
			}	
		

		return $data;	
	}
	
	
	function update($packet){
				$online = 1;
				$param = [
							'anest.department_id'=> $this->db->getObjectID((string)$packet['department_id'])
						    
						 ];

				$data1  = ['$set'=>[
										'anest.department.department_name'  => (string)$packet['department_name'],
										'anest.department.department_boss'  => (string)$packet['department_boss'],
										'anest.department.department_contact' => (string)$packet['department_contact'],
										'anest.department.department_tel'   => (string)$packet['department_tel'],
										'anest.department.department_online'=> (int)$online     
	
									]

						  ];
						
				$update = $this->db->Update($param,$data1);

				if($update){
					
					header('location:'.URL.'department');

				} // End update
	}

} // End class
?>