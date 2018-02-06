<?php
class Status_Model extends Model{
	function __construct(){
		parent::__construct();
		
	}
	
	function get_status(){

		



		$filter = array( 
							'$or' => array(
                          				array("anest.status.status_online" => 1),
                          				array("anest.status.status_online" => 0)
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

							'status_id'=>$this->db->getObjectID(),
							'status'=>	
								[ 
									'status_name'          => (string)$packet['status-name'],        /*ชื่อสถานะเครื่องมือ*/
									'status_registed'	   => $this->db->getISODateID($date),                /*วันที่ลงทเบียน*/
									'status_online'		   => (int)$online,                         /*สถานะออนไลน์*/
						         ]                       
						]
					],
				];

			$insert = $this->db->Insert($data);

			if($insert){
    			//$alarm = ['ลงทะเบียนสำเร็จ','',''];
    			header('location:'.URL.'status');



			}

	}
	
	
	function delete($id){
			
				$online = 0;
				$param = [
							'anest.status_id'=> $this->db->getObjectID($id)
						    
						 ];

				$data1  = ['$set'=>[
										'anest.status.status_online'           => (int)$online     
										                       

									]

						  ];

				$update = $this->db->Update($param,$data1);

				if($update){
					
					header('location:'.URL.'status');

				} // End update
	}
	
	function get_statusBy($id){
		
		$filter =  [
						
						'anest.status_id'        => $this->db->getObjectID($id)
						
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
							'anest.status_id'=> $this->db->getObjectID($packet['status_id'])
						    
						 ];

				$data1  = ['$set'=>[
										'anest.status.status_name'             => (string)$packet['status_name'],
										'anest.status.status_online'           => (int)$online     
	
									]

						  ];

				$update = $this->db->Update($param,$data1);

				if($update){
					
					header('location:'.URL.'status');

				} // End update
	}

} // End class
?>