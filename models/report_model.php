<?php
class Report_Model extends Model{
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

    
    
    $group_id = array();
    $group = array();
   	
   	$room_id = array();
    $room = array();

    $building_id = array();
    $building = array();

    $floor_id = array();
    $floor = array();

   
    $repair = array();
    
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
                        'group'=>'',
                        'room'=>'',
                        'building'=>'',
                        'floor'=>'',
                        'age'=> '',
                        'repair'=>'',
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
                                array('anest.group.group_online'=>1),
                                array('anest.repair.repair_online'=>1,'anest.repair.repair_status'=>3),
                             ),

                    );
     
     $cursor = $this->db->Query($where);

     
     $i=0;$j=0;$k=0;$l=0;$m=0;
     foreach ($cursor as $value) {
     
     	if((string)$value['anest']['group_id'] != ''){
     		 $group_id[$i] =   $value['anest']['group_id'];
             $group[$i] =   $value['anest']['group']['group_name'];
             $i++;
         }
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

        if((string)$value['anest']['repair_id'] != ''){
        	
        	$repair[$m] =    $value['anest']['repair_equipment_ref'];
        	$m++;
        }

             
     }

    

        $filter = array(
                      		'anest.equipment_group_ref'=> array('$in'=>$group_id),
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
        $count =0;
        for($i=0;$i<count($equipment);$i++){
        	
        	for($j=0;$j<count($group);$j++){
        		if((string)$group_id[$j] == (string)$equipment[$i]['equipment']['equipment_group_ref'])
        				$packet[$num]['group'] = $group[$j]; 
        	}

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

        	for($n=0;$n<count($repair);$n++){

        		if((string)$equipment[$i]['equipment']['equipment_id'] == (string)$repair[$n]){
        			$count++;
        		}
        	}

        	$packet[$num]['sap']= $equipment[$i]['equipment']['equipment']['equipment_sap'];
        	$packet[$num]['sn']= $equipment[$i]['equipment']['equipment']['equipment_sn'];
        	$packet[$num]['name']= $equipment[$i]['equipment']['equipment']['equipment_nameEN'];
        	$packet[$num]['age']= $equipment[$i]['equipment']['equipment']['equipment_begin'];
        	$packet[$num]['id']= $equipment[$i]['equipment']['equipment_id'];

        	$packet[$num]['repair'] = $count;
        	$count = 0;
        	$num++;

        	}
     
    	} // End check count
    	else
    		$packet = $cursor;
 
  //print_r($repair);
 	return $packet;
  
	}
}

?>