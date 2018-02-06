<?php
class Building_Model extends Model{
	function __construct(){
		parent::__construct();
		
	}
	
	function get_building(){

		


		$filter = array( 
							'$or' => array(
                          				array("anest.building.building_online" => 1),
                          				array("anest.building.building_online" => 0)
                      )

							
							);
		$cursor = $this->db->Query($filter);
		return $cursor;
	}
	
	
	function create($packet){

		$date = date('d-m-Y');

		$online = 1;

		$building = array(
						array(	

								'anest'=> array(
									'building_id'=> $this->db->getObjectID(),
									'building'=>
											array(
												'building_name' => (string)$packet['building-name'], 
												'building_registed'	 => $this->db->getISODateID($date), 
												'building_online' => (int)$online,   
						                                 
												)
								)
					),

				);

			$insert = $this->db->Insert($building);

			if($insert){
    			//$alarm = ['ลงทะเบียนสำเร็จ','',''];
    			header('location:'.URL.'building');



			}

	}
	
	
	function delete($id){
			
				$online = 0;
				$param = [
							'anest.building_id'=> $this->db->getObjectID($id)
						    
						 ];

				$data1  = ['$set'=>[
										'anest.building.building_online'           => (int)$online     
										                       

									]

						  ];

				$update = $this->db->Update($param,$data1);

				if($update){
					
					header('location:'.URL.'building');

				} // End update
	}
	
	function get_buildingBy($id){
		
		$filter =  [
						
						'anest.building_id'        => $this->db->getObjectID($id)
						
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
							'anest.building_id'=> $this->db->getObjectID($packet['building_id'])
						    
						 ];

		$data1  = ['$set'=>[
								'anest.building.building_name'             => (string)$packet['building_name'],
								'anest.building.building_online'           => (int)$online     		
										]

						  ];

				$update = $this->db->Update($param,$data1);

				if($update){
					
					header('location:'.URL.'building');

				} // End update
	}

} // End class
?>