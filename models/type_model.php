<?php
class Type_Model extends Model{
	function __construct(){
		parent::__construct();
		
	}
	
	function get_type(){

		
		$filter = array( 
							'$or' => array(
                          				array("anest.type.type_online" => 1),
                          				array("anest.type.type_online" => 0)
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
							
							'type_id'=> $this->db->getObjectID(),
							'type'=>
								[ 
								'type_name'          => (string)$packet['type-name'],        /*ชื่อประเภทครุภัณฑ์*/
								'type_registed'	     => $this->db->getISODateID($date),                /*วันที่ลงทเบียน*/
								'type_online'		 => (int)$online,                         /*สถานะออนไลน์*/
						        ]                         
						]
					],
				];

			$insert = $this->db->Insert($data);

			if($insert){
    			//$alarm = ['ลงทะเบียนสำเร็จ','',''];
    			header('location:'.URL.'type');



			}

	}
	
	
	function delete($id){
			
				$online = 0;
				$param = [
							'anest.type_id'=> $this->db->getObjectID($id)
						    
						 ];

				$data1  = ['$set'=>[
										'anest.type.type_online'           => (int)$online     
										                       

									]

						  ];

				$update = $this->db->Update($param,$data1);

				if($update){
					
					header('location:'.URL.'type');

				} // End update
	}
	
	function get_typeBy($id){
		
		$filter =  [
						
						'anest.type_id'        => $this->db->getObjectID($id)
						
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
							'anest.type_id'=> $this->db->getObjectID($packet['type_id'])
						    
						 ];

				$data1  = ['$set'=>[
										'anest.type.type_name'             => (string)$packet['type_name'],
										'anest.type.type_online'           => (int)$online     
	
									]

						  ];

				$update = $this->db->Update($param,$data1);

				if($update){
					
					header('location:'.URL.'type');

				} // End update
	}

} // End class
?>