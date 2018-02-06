<?php
class Change_Model extends Model{
	function __construct(){
		parent::__construct();
		
	}

	function get_equipment(){

    $status = '57f2240dd70289880158fdd3'; // พร้อมใช้งาน
  
  	$filter = array(
  						'anest.equipment.equipment_online'=>1,
  						'anest.equipment_status_ref' => $this->db->getObjectID($status),
  					);

	$cursor = $this->db->Count($filter);

    
    
   
   	
   	$room_id = array();
    $room = array();

    $building_id = array();
    $building = array();

    $floor_id = array();
    $floor = array();
    
    $equipment = array( [
                        'id'=>0,
                        'equipment'=>array()
                    ]
                );
    $packet = array(    
                      [
                        'sap' => '',
                        'sn'=>'',
                        'name'=>'',
                        'room'=>'',
                        'building'=>'',
                        'floor'=>'',
                        'id'=>''
                      ]
                    );
    $num = 0;

    if($cursor != 0){

     $where = array(
                     '$or'=> array(
                                
                                array('anest.room.room_online'=>1),
                                array('anest.building.building_online'=>1),
                                array('anest.floor.floor_online'=>1),
 
                             ),

                    );
     
     $cursor = $this->db->Query($where);

     
     $i=0;$j=0;$k=0;$l=0;
     foreach ($cursor as $value) {
     
        if((string)$value['anest']['building_id'] != ''){
     		 $building_id[$j] =   $value['anest']['building_id'];
             $building[$j] =   $value['anest']['building']['building_name'];
             $j++;
         }
        if((string)$value['anest']['floor_id'] != ''){
     		 $floor_id[$k] =   $value['anest']['floor_id'];
             $floor[$k] =   $value['anest']['floor']['floor_name'];
             $k++;
         }
        if((string)$value['anest']['room_id'] != ''){
     		 $room_id[$l] =   $value['anest']['room_id'];
             $room[$l] =   $value['anest']['room']['room_name'];
             $l++;
         }

             
     }


        $filter = array(
    						'anest.equipment_room_ref'=> array('$in'=>$room_id),
    						'anest.equipment_floor_ref'=> array('$in'=>$floor_id),
    						'anest.equipment_building_ref'=> array('$in'=>$building_id),
    						'anest.equipment.equipment_online'=>1,
                            'anest.equipment_status_ref' => $this->db->getObjectID($status),
                        );
             
        $cursor1 = $this->db->Query($filter);

        $i=0;
        foreach ($cursor1 as $value) {
        	$equipment[$i]['id'] = $value['anest']['equipment_group_ref'];
            $equipment[$i]['equipment'] = $value['anest'];
            $i++;               
        }

        
        $num = 0;
        for($i=0;$i<count($equipment);$i++){
        	

        	for($k=0;$k<count($building);$k++){
        		if((string)$building_id[$k] == (string)$equipment[$i]['equipment']['equipment_building_ref'])
        				$packet[$num]['building'] = $building[$k]; 
        	}
        	for($l=0;$l<count($floor);$l++){
        		if((string)$floor_id[$l] == (string)$equipment[$i]['equipment']['equipment_floor_ref'])
        				$packet[$num]['floor'] = $floor[$l]; 
        	}
        	for($m=0;$m<count($room);$m++){
        		if((string)$room_id[$m] == (string)$equipment[$i]['equipment']['equipment_room_ref'])
        				$packet[$num]['room'] = $room[$m]; 
        	}

        	$packet[$num]['sap']= $equipment[$i]['equipment']['equipment']['equipment_sap'];
        	$packet[$num]['sn']= $equipment[$i]['equipment']['equipment']['equipment_sn'];
        	$packet[$num]['name']= $equipment[$i]['equipment']['equipment']['equipment_nameEN'];
        	$packet[$num]['id']= $equipment[$i]['equipment']['equipment_id'];
        	$num++;

        }
     
    	} // End check count
    	else
    		$packet = $cursor;
 
 	return $packet;
  
	}

	function get_address($id){

      

        $filter = array(
        				'$or' => array(
        								 array('anest.building.building_online'=>1,),
        								 array('anest.floor.floor_online'=>1,),
        								 array('anest.room.room_online'=>1,),	
        								),
                        );
        $cursor = $this->db->Query($filter);



        return $cursor;
    }


    function get_byid($id){


		$online = 1;

		$filter =  [
						
						'anest.equipment_id'        => $this->db->getObjectID($id)
						
					];
		
		$cursor = $this->db->Query($filter);

		
		foreach ($cursor as $value) {
				$data1 = $value;
			}	

	$where = array( 
					
				'$or'=> [
					array('anest.building_id' => $data1['anest']['equipment_building_ref'],),
					array('anest.floor_id' => $data1['anest']['equipment_floor_ref'],),	 
					array('anest.room_id' => $data1['anest']['equipment_room_ref'],),	  
				]
			);
		$cursor1 = $this->db->Query($where);

		
		$data2 = array( 
						 		'building' => array('id'=>'','name'=>''),
						 		'floor' => array('id'=>'','name'=>''),
						 		'room' => array('id'=>'','name'=>''),
						 		
						);
		$i= 0;
		foreach ($cursor1 as $value) {

				
				if($value['anest']['building']['building_online'] != ''){

						$data2['building']['id'] = $value['anest']['building_id'];
						$data2['building']['name'] = $value['anest']['building']['building_name'];

				}
				else if($value['anest']['floor']['floor_online'] != ''){

						$data2['floor']['id'] = $value['anest']['floor_id'];
						$data2['floor']['name'] = $value['anest']['floor']['floor_name'];
				}
				else if($value['anest']['room']['room_online'] != ''){
						$data2['room']['id'] = $value['anest']['room_id'];
						$data2['room']['name'] = $value['anest']['room']['room_name'];

				}
			}


			$packet = array(
								'id'     => $data1['anest']['equipment_id'],
								'name'   => $data1['anest']['equipment']['equipment_nameEN'],
                'sn'     => $data1['anest']['equipment']['equipment_sn'],
                'pic'    => $data1['anest']['equipment']['pic_name'],
                'building' => $data2['building'],
                'floor'    => $data2['floor'],
                'room'     => $data2['room']
							);

			
		return $packet;
	}


  function send_change($packet){

    $param = [
              'anest.equipment_id'=> $this->db->getObjectID($packet['id'])
                
             ];

    $data  = ['$set'=>[
                  
                  'anest.equipment_building_ref'  => $this->db->getObjectID($packet['building']),
                  'anest.equipment_floor_ref'     => $this->db->getObjectID($packet['floor']),
                  'anest.equipment_room_ref'      => $this->db->getObjectID($packet['room']),  
                    ]

              ];

        $update = $this->db->Update($param,$data);

        if($update){
          $online = 1;
          $date = date('d-m-Y');
          $change = array(
            array(  

                'anest'=> array(
                  'change_id'               => $this->db->getObjectID(),
                  'change_equipment_ref'    => $this->db->getObjectID($packet['id']),
                  'change_staff_ref'        => $this->db->getObjectID($packet['staff']),
                  'change_old_building_ref' => $this->db->getObjectID($packet['obuilding']),
                  'change_old_floor_ref'    => $this->db->getObjectID($packet['ofloor']),
                  'change_old_room_ref'     => $this->db->getObjectID($packet['oroom']),

                  'change_new_building_ref' => $this->db->getObjectID($packet['building']),
                  'change_new_floor_ref'    => $this->db->getObjectID($packet['floor']),
                  'change_new_room_ref'     => $this->db->getObjectID($packet['room']),
                  'change'=>
                      array(
                        'change_date'      => $this->db->getISODateID($packet['date']), 
                        'change_registed'  => $this->db->getISODateID($date), 
                        'change_note'      => $packet['note'],
                        'change_online'    => (int)$online,   
                                             
                      )
                )
          ),

        );

      $insert = $this->db->Insert($change);

      if($insert){
          //$alarm = ['ลงทะเบียนสำเร็จ','',''];
          header('location:'.URL.'change');

      }
          
          //header('location:'.URL.'building');

        } // End update
  } // End function

}

?>