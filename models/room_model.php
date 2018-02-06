<?php
class Room_Model extends Model{
	function __construct(){
		parent::__construct();
		
	}
	
	function get_room(){


		$filter = array( 
							'$or' => array(
                          				array("anest.room.room_online" => 1),
                          				array("anest.room.room_online" => 0)
                      )

							
							);
		$cursor = $this->db->Query($filter);


		return $cursor;
	}
	
	
	function create($packet){

		$date = date('d-m-Y');
		$online = 1;

		$data = array( 
						array(
								'anest'=> array(
									
									"room_id"=>$this->db->getObjectID(),
									"room"=>array(
					 
										"room_name"           => (string)$packet['room-name'],        /*ชื่อประเภทครุภัณฑ์*/
										"room_registed"	      => $this->db->getISODateID($date),                /*วันที่ลงทเบียน*/
										"room_online"		  => (int)$online                         /*สถานะออนไลน์*/
						            )                 
							     )
					),
				);

		

		
			
			$insert = $this->db->Insert($data);

			if($insert){
    			//$alarm = ['ลงทะเบียนสำเร็จ','',''];
    			header('location:'.URL.'room');



			}

	}
	
	
	function delete($id){
			
				$online = 0;
				$param = [
							'anest.room_id'=> $this->db->getObjectID($id)
						    
						 ];

				$data1  = ['$set'=>[
										'anest.room.room_online'           => (int)$online     
										                       

									]

						  ];

				$update = $this->db->Update($param,$data1);

				if($update){
					
					header('location:'.URL.'room');

				} // End update
	}
	
	function get_roomBy($id){
		
		$filter =  [
						
						'anest.room_id'        => $this->db->getObjectID($id)
						
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
							'anest.room_id'=> $this->db->getObjectID($packet['room_id'])
						    
						 ];

				$data1  = ['$set'=>[
										'anest.room.room_name'             => (string)$packet['room_name'],
										'anest.room.room_online'           => (int)$online     
	
									]

						  ];

				$update = $this->db->Update($param,$data1);

				if($update){
					
					header('location:'.URL.'room');

				} // End update
	}

} // End class
?>