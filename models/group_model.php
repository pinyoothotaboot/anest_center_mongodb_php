<?php
class Group_Model extends Model{
	function __construct(){
		parent::__construct();
		
	}
	
	function get_group(){

		
		$filter = array( 
							'$or' => array(
                          				array("anest.group.group_online" => 1),
                          				array("anest.group.group_online" => 0)
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
							'group_id'=>$this->db->getObjectID(),
							'group'=>
								[ 
									'group_name'   => (string)$packet['group-name'],        /*ชื่อกลุ่มเครื่องมือ*/
									'group_pm'	           => (int)$packet['group-pm'], 
									'group_risk'	       => (string)$packet['group-risk'],
									'group_registed'	   => $this->db->getISODateID($date), 
									'group_online'		   => (int)$online,  
                       
								]
							]
				  ],
				];

			$insert = $this->db->Insert($data);

			if($insert){
    			//$alarm = ['ลงทะเบียนสำเร็จ','',''];
    			header('location:'.URL.'group');



			}

	}
	
	
	function delete($id){
			
				$online = 0;
				$param = [
							'anest.group_id'=> $this->db->getObjectID($id)
						    
						 ];

				$data1  = ['$set'=>[
										'anest.group.group_online'           => (int)$online     
										                       

									]

						  ];

				$update = $this->db->Update($param,$data1);

				if($update){
					
					header('location:'.URL.'group');

				} // End update
	}
	
	function get_groupBy($id){
		
		$filter =  [
						
						'anest.group_id'        => $this->db->getObjectID($id)
						
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
							'anest.group_id'=> $this->db->getObjectID($packet['group_id'])
						    
						 ];

				$data1  = ['$set'=>[
										'anest.group.group_name'             => (string)$packet['group_name'],
										'anest.group.group_pm'               => (int)$packet['group_pm'],
										'anest.group.group_risk'             => (string)$packet['group_risk'],
										'anest.group.group_online'           => (int)$online     
	
									]

						  ];

				$update = $this->db->Update($param,$data1);

				if($update){
					
					header('location:'.URL.'group');

				} // End update
	}

} // End class
?>