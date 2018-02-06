<?php
class Floor_Model extends Model{
	function __construct(){
		parent::__construct();
		
	}
	
	function get_floor(){

		
		$filter = array( 
							'$or' => array(
                          				array("anest.floor.floor_online" => 1),
                          				array("anest.floor.floor_online" => 0)
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
								'floor_id'=> $this->db->getObjectID(),
								'floor'=>
									[ 
									'floor_name'  => (string)$packet['floor-name'],        /*ชื่อประเภทครุภัณฑ์*/
									'floor_registed'=> $this->db->getISODateID($date),                /*วันที่ลงทเบียน*/
									'floor_online'		  => (int)$online,                         /*สถานะออนไลน์*/
						                                 
									]
								]
					],
				];

				

			$insert = $this->db->Insert($data);

			if($insert){
    			//$alarm = ['ลงทะเบียนสำเร็จ','',''];
    			header('location:'.URL.'floor');



			}

	}
	
	
	function delete($id){
			
				$online = 0;
				$param = [
							'anest.floor_id'=> $this->db->getObjectID($id)
						    
						 ];

				$data1  = ['$set'=>[
										'anest.floor.floor_online'           => (int)$online     
										                       

									]

						  ];

				$update = $this->db->Update($param,$data1);

				if($update){
					
					header('location:'.URL.'floor');

				} // End update
	}
	
	function get_floorBy($id){
		
		$filter =  [
						
						'anest.floor_id'        => $this->db->getObjectID($id)
						
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
							'anest.floor_id'=> $this->db->getObjectID($packet['floor_id'])
						    
						 ];

				$data1  = ['$set'=>[
										'anest.floor.floor_name'             => (string)$packet['floor_name'],
										'anest.floor.floor_online'           => (int)$online     
	
									]

						  ];

				$update = $this->db->Update($param,$data1);

				if($update){
					
					header('location:'.URL.'floor');

				} // End update
	}

} // End class
?>