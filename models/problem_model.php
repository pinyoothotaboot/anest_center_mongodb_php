<?php
class Problem_Model extends Model{
	function __construct(){
		parent::__construct();
		
	}

	function get_problem(){

		

		$packet = array( [
							'id'=>'',
							'name'=>'',
							'group'=>'',
							'online'=>''
							]
						);
		$group_id = array();
		$group    = array();

		$problem_id = array();
		$problem = array();

		$where = array(
							'anest.group.group_online'=>1
						);
		$cursor = $this->db->Query($where);

		$i=0;
		foreach ($cursor as $value) {
			if((string)$value['anest']['group_id'] != ''){
     		 	$group_id[$i] =   $value['anest']['group_id'];
             	$group[$i]    =   $value['anest']['group']['group_name'];
             	$i++;
         	}
		}

		//'anest.equipment_room_ref'=> array('$in'=>$room_id),

		 $filter = array(
    						'anest.problem_group_ref'=> array('$in'=>$group_id),
    						
                        );

		//$filter = array(  "anest.problem.problem_online" => array('$in'=>[0,1]) );
							
		$cursor = $this->db->Query($filter);

		$i=0;
		foreach ($cursor as $value) {

			if((string)$value['anest']['problem_id'] != ''){
					$problem_id[$i] = $value['anest']['problem_id'];
					$problem[$i] = $value['anest'];
					$i++;
			}
		}

		$num = 0;
		for($i=0;$i<count($problem);$i++){
			for($j=0;$j<count($group);$j++){
				if((string)$problem[$i]['problem_group_ref'] == (string)$group_id[$j]){
						
						$packet[$num]['id']     = $problem_id[$i];
						$packet[$num]['name']   = $problem[$i]['problem']['problem_name'];
						$packet[$num]['group']  = $group[$j];
						$packet[$num]['online'] = $problem[$i]['problem']['problem_online'];
				}
			}
			$num++;
		}

	//var_dump($packet);	

		return $packet;
	}
	function get_group(){

		
		$filter = array(  "anest.group.group_online" => 1 );
							
		$cursor = $this->db->Query($filter);

		return $cursor;
	}

	function create($packet){

		$online = 1;
		$date = date('d-m-Y');
		$data = array( 
						array(
								'anest'=> array(
									
									"problem_id"=>$this->db->getObjectID(),
									"problem_group_ref" => $this->db->getObjectID($packet['problem-group']),
									"problem"=>array(
					 
										"problem_name"           => (string)$packet['problem-name'],        
										"problem_registed"	      => $this->db->getISODateID($date),                
										"problem_online"		  => (int)$online                         
						            )                 
							     )
					),
				);

		

		
			
			$insert = $this->db->Insert($data);

			if($insert){
    			//$alarm = ['ลงทะเบียนสำเร็จ','',''];
    			header('location:'.URL.'problem');

			}

	}

	function delete($id){
			
				$online = 0;
				$param = [
							'anest.problem_id'=> $this->db->getObjectID($id)
						    
						 ];

				$data1  = ['$set'=>[
										'anest.problem.problem_online'           => (int)$online     
										                       

									]

						  ];

				$update = $this->db->Update($param,$data1);

				if($update){
					
					header('location:'.URL.'problem');

				} // End update
	}

	function edit($id){

		$filter =  [
						
						'anest.problem_id'        => $this->db->getObjectID($id)
						
					];
		
		$cursor = $this->db->Query($filter);

		
		foreach ($cursor as $value) {
				$data1 = $value;
			}	

		$where = array( 
							'anest.group_id' => $data1['anest']['problem_group_ref'],
							'anest.group.group_online' => 1
						);
		$cursor = $this->db->Query($where);

		foreach ($cursor as $value) {
				$data2 = $value;
			}

			$packet = array($data1,$data2);

		

		return $packet;


	}

	function update($packet){
		$online = 1;
		$param = [
							'anest.problem_id'=> $this->db->getObjectID($packet['problem_id'])
						    
						 ];

		$data1  = ['$set'=>[
							'anest.problem.problem_name'    => (string)$packet['problem_name'],
							'anest.problem_group_ref'       => $this->db->getObjectID($packet['problem_group']),
							'anest.problem.problem_online'  => (int)$online     
	
							]

						  ];

		$update = $this->db->Update($param,$data1);

		if($update){
					
			header('location:'.URL.'problem');

		} // End update
		
	}

}
?>