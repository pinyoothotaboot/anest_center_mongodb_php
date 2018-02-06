<?php
class Parcel_Model extends Model{
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


	function get_byid($id){


		

		$filter =  [
						
						'anest.equipment_id'        => $this->db->getObjectID($id)
						
					];
		
		$cursor = $this->db->Query($filter);

		
		foreach ($cursor as $value) {
				$data1 = $value;
			}	

	


			$packet = array(
								'id'     => $data1['anest']['equipment_id'],
								'name'   => $data1['anest']['equipment']['equipment_nameEN'],
                				'sn'     => $data1['anest']['equipment']['equipment_sn'],
                				'pic'    => $data1['anest']['equipment']['pic_name'],
                
							);

			
		return $packet;
	}

	function send_parcel($packet){

	$status = '57f2241ad70289880158fdd5'; // ส่งคืนพัสดุ

    $param = [
              'anest.equipment_id'=> $this->db->getObjectID($packet['id'])
                
             ];

    $data  = ['$set'=>[
                  
                  'anest.equipment_status_ref'  => $this->db->getObjectID($status),
                   
                    ]

              ];

        $update = $this->db->Update($param,$data);

        if($update){
          $online = 1;
          $date = date('d-m-Y');
          $parcel = array(
            array(  

                'anest'=> array(
                  'parcel_id'               => $this->db->getObjectID(),
                  'parcel_equipment_ref'    => $this->db->getObjectID($packet['id']),
                  'parcel_staff_ref'        => $this->db->getObjectID($packet['staff']),
                
                  'parcel'=>
                      array(
                        'parcel_date'        => $this->db->getISODateID($packet['date']), 
                        'parcel_registed'    => $this->db->getISODateID($date), 
                        'parcel_note'        => $packet['note'],
                        'parcel_accessories' => $packet['access'],
                        'parcel_online'      => (int)$online,   
                                             
                      )
                )
          ),

        );

      $insert = $this->db->Insert($parcel);

      if($insert){
          //$alarm = ['ลงทะเบียนสำเร็จ','',''];
          header('location:'.URL.'parcel');

      }

     } // End update
  } // End function

}

?>