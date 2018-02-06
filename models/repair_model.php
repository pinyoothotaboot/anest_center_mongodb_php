<?php
class Repair_Model extends Model{
	function __construct(){
		parent::__construct();
		
	}

    function get_repair($id){

    $status = '57f22412d702897f0058fdd9'; // ระหว่างซ่อม
  
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

    $staff_id = array();
    $staff = array();

    $repair_id = array();
    $repair_ref = array();
    $repair_pro = array();
    $repair = array();

    $problem_id = array();
    $problem = array();

    $packet_reapair = array(
                                [
                                   'id'=>'',
                                   'problem'=>'',
                                   'detail'=>array(),
                                   'ref'=>''     
                                ]
                            );
    
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
                        'problem'=>'',
                        'date_send'=>'',
                        'date_registed'=>'',
                        'service'=>'',
                        'note'=>'',
                        'epic'=>'',
                        'rpic'=>'',
                        'id'=>'',
                        'brand'=>'',
                        'model'=>'',
                        'price'=>'',
                        'year'=>'',
                        'check' => $id
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
                                array('anest.repair.repair_status'=>(int)$id),
                                array('anest.problem.problem_online'=>1),
                             ),

                    );
     
     $cursor = $this->db->Query($where);

     
     $i=0;$j=0;$k=0;$l=0;$m=0;$n=0;$o=0;
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
             $repair_id[$n] =   $value['anest']['repair_id'];
             $repair[$n] =   $value['anest']['repair'];
             $repair_ref[$n] = $value['anest']['repair_equipment_ref'];
             $repair_pro[$n] = $value['anest']['repair_problem_ref'];

             $n++;
         }

          if((string)$value['anest']['problem_id'] != ''){
             $problem_id[$o] =   $value['anest']['problem_id'];
             $problem[$o] =   $value['anest']['problem']['problem_name'];
             $o++;
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


       
        for($i=0;$i<count($repair_pro);$i++){
            for($j=0;$j<count($problem_id);$j++){
                if((string)$repair_pro[$i] == (string)$problem_id[$j]){
                    

                    $packet_repair[$i]['id'] = $repair_id[$i];
                    $packet_repair[$i]['problem'] = $problem[$j];
                    $packet_repair[$i]['detail'] = $repair[$i]; 
                    $packet_repair[$i]['ref'] = $repair_ref[$i]; 

                }
            }
         }
      
        
    
        
        $num = 0;
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

            for($n=0;$n<count($packet_repair);$n++){

                if((string)$packet_repair[$n]['ref'] == (string)$equipment[$i]['equipment']['equipment_id']){
                   
                  if((int)$packet_repair[$n]['detail']['repair_status'] == (int)$id ){
                      $packet[$num]['date_send']=  $packet_repair[$n]['detail']['repair_date_send'];
                      $packet[$num]['date_registed'] = $packet_repair[$n]['detail']['repair_registed'];
                      $packet[$num]['service'] = $packet_repair[$n]['detail']['repair_service'];
                      $packet[$num]['note'] = $packet_repair[$n]['detail']['repair_note'];
                      $packet[$num]['id']= $packet_repair[$n]['id'];
                      $packet[$num]['problem']= $packet_repair[$n]['problem'];
                      $packet[$num]['rpic'] = $packet_repair[$n]['detail']['pic_name'];


                      //var_dump($packet_repair[$n]);
                      //echo $packet[$num]['rpic'];
                  }
                    
                }

               
            }

            


            $packet[$num]['sap']= $equipment[$i]['equipment']['equipment']['equipment_sap'];
            $packet[$num]['sn']= $equipment[$i]['equipment']['equipment']['equipment_sn'];
            $packet[$num]['name']= $equipment[$i]['equipment']['equipment']['equipment_nameEN'];
            $packet[$num]['epic']= $equipment[$i]['equipment']['equipment']['pic_name'];

            $packet[$num]['brand']= $equipment[$i]['equipment']['equipment']['equipment_brand'];
            $packet[$num]['model']= $equipment[$i]['equipment']['equipment']['equipment_model'];
            $packet[$num]['price']= $equipment[$i]['equipment']['equipment']['equipment_cost'];
            $packet[$num]['year']= $equipment[$i]['equipment']['equipment']['equipment_begin'];
            
            $num++;

        }
     
        } // End check count
        else
            $packet = $cursor;
 
    return $packet;

    }

    function get_byid($id){

        $filter = array(
                            'anest.equipment_id' => $this->db->getObjectID($id),
                        );
        $cursor1 = $this->db->Query($filter);

        foreach ($cursor1 as $value) {
            $data1 = $value;
        }

        $filter = array(
                        'anest.problem.problem_online'=>1,
                        'anest.problem_group_ref'=>$data1['anest']['equipment_group_ref']
                        
                        );
        $cursor2 = $this->db->Query($filter);


        //print_r($data2);

        $packet = array($data1,$cursor2);

        return $packet;
    }

    function get_byrepairid($id){

        $where = array('anest.repair_id'=>$this->db->getObjectID($id));
        $cursor = $this->db->Query($where);

        foreach ($cursor as  $value) {
            $equipment_id = $value['anest']['repair_equipment_ref'];
            $problem_id = $value['anest']['repair_problem_ref'];
            $repair = $value['anest'];
        }

        $filter = array(
                        '$or' => array(
                                        array('anest.equipment_id'=>$this->db->getObjectID((string)$equipment_id)),
                                        array('anest.problem_id'=>$this->db->getObjectID((string)$problem_id)),
                                        ),
                        );
        $cursor = $this->db->Query($filter);

        foreach ($cursor as $value) {
            
            if($value['anest']['equipment_id'] != '')
                $equipment = $value['anest']['equipment'];
            if($value['anest']['problem_id'] != '')
                $problem = $value['anest'];

        }

        //print_r($repair);
        $packet = array(
                            'repair_id'=>$repair['repair_id'],
                            'repair_send'=>$repair['repair']['repair_date_send'],
                            'equipment_name'=>$equipment['equipment_nameEN'],
                            'equipment_sn'=>$equipment['equipment_sn'],
                            'equipment_pic'=>$equipment['pic_name'],
                            'problem'=>$problem['problem']['problem_name'],
                        );

        return $packet;
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
                                
                             ),

                    );
     
     $cursor = $this->db->Query($where);

     
     $i=0;$j=0;$k=0;$l=0;
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

    function send_repair($packet){

        $date = date('d-m-Y');
        $type = array('image/jpg','image/jpeg','image/gif','image/png');
        $check = true;
       
            
        if($packet['img']['name'] != ''){ 
        
        $file_name  = $packet['img']['name'];
        $file_tmp   = $packet['img']['tmp_name'];
        $file_type  = $packet['img']['type'];
        $file_size  = $packet['img']['size'];
        $file_error = $packet['img']['error'];

        }
        
        $target_file = $target_dir.$file_name;
        
        // Check image file [jpg,jpeg,gif,png]
            if(($file_type == $type[0]) || 
               ($file_type == $type[1]) ||
               ($file_type == $type[2]) || 
               ($file_type == $type[3])) {

                $check =true;

            }
                

            // Check image file large too 1MB
            if($file_size > 1024000)
                $check =false;
                
            if($check == true){

                $path = $_SERVER['DOCUMENT_ROOT'].'/anest_center/publics/images/repairs';

                $name = basename($file_name);

                if(move_uploaded_file($file_tmp, "$path/$name")){
                    
                    $online = 1;
                    $status = 1;  
                    /*
                            1 = แจ้งส่งซ่อม
                            2 = อยู่ระหว่างการซ่อม 
                    */

                    $data = [ 
                             [
                                'anest'=> [

                                    'repair_id'             => $this->db->getObjectID(),
                                    'repair_equipment_ref'  => $this->db->getObjectID($packet['equipment_id']),
                                    'repair_problem_ref'    => $this->db->getObjectID($packet['failure_id']),
                                    'repair_staff_send_ref' => $this->db->getObjectID($packet['staff_id']),
                                    'repair_staff_back_ref' => '',
                                    'repair'=>[
                                            
                                        'repair_date_send'     => $this->db->getISODateID($packet['date_send']),
                                        'repair_service'       => (string)$packet['service'],
                                        'repair_note'          => (string)$packet['note'], 
                                        'repair_registed'      => $this->db->getISODateID($date),

                                        'repair_date_back'     => '',
                                        'repair_improvement'   => '',
                                        'repair_cost'          => '',

                                        'repair_online'        => (int)$online,
                                        'repair_status'        => (int)$status,
                                        'pic_name'             => $file_name,
                                        'pic_tmp'              => $file_tmp, 
                                        'pic_type'             => $file_type,
                                        'pic_size'             => (int)$file_size,                            
                                        'pic_error'            => $file_error,
                                        ]
                                    ]
                                ],
                              ];

                        $insert = $this->db->Insert($data);

                        if($insert){

                             $status = '57f22412d702897f0058fdd9'; // อยู่ระหว่างส่งซ่อม
                             $param = [
                                        'anest.equipment_id'=> $this->db->getObjectID($packet['equipment_id']),
                            
                                    ];

                            $data1  = [
                                        '$set'=>[
                                            'anest.equipment_status_ref' => $this->db->getObjectID($status),   
                                                ]
                                        ];

                            $update = $this->db->Update($param,$data1);

                            if($update){
                                header('location:'.URL.'repair');

                             } // End update
                        }

                    
                } // End uploaded

              else {

                 $online = 1;
                 $status = 1;  
                    /*
                            1 = แจ้งส่งซ่อม
                            2 = อยู่ระหว่างการซ่อม 
                    */

                $data = [ 
                            [
                                'anest'=> [

                                    'repair_id'             => $this->db->getObjectID(),
                                    'repair_equipment_ref'  => $this->db->getObjectID($packet['equipment_id']),
                                    'repair_problem_ref'    => $this->db->getObjectID($packet['failure_id']),
                                    'repair_staff_send_ref' => $this->db->getObjectID($packet['staff_id']),
                                    'repair_staff_back_ref' => '',
                                    'repair'=>[
                                            
                                        'repair_date_send'     => $this->db->getISODateID($packet['date_send']),
                                        'repair_service'       => (string)$packet['service'],
                                        'repair_note'          => (string)$packet['note'], 
                                        'repair_registed'      => $this->db->getISODateID($date),

                                        'repair_date_back'     => '',
                                        'repair_improvement'   => '',
                                        'repair_cost'          => '',

                                        'repair_online'        => (int)$online,
                                        'repair_status'        => (int)$status,
                                        'pic_name'             => $file_name,
                                        'pic_tmp'              => '', 
                                        'pic_type'             => '',
                                        'pic_size'             => '',                            
                                        'pic_error'            => '',
                                        ]
                                ]
                    ],
                ];

                        $insert = $this->db->Insert($data);

                    if($insert){
                
                            $status = '57f22412d702897f0058fdd9'; // อยู่ระหว่างการส่งซ่อม
                            $param = [
                                        'anest.equipment_id'=> $this->db->getObjectID($packet['equipment_id']),
                            
                                    ];

                            $data1  = [
                                        '$set'=>[
                                            'anest.equipment_status_ref' => $this->db->getObjectID($status),   
                                                ]
                                        ];

                            $update = $this->db->Update($param,$data1);

                            if($update){
                                header('location:'.URL.'repair');

                             } // End update
                     } // insert

                } // End else


            } // End check
            
            
    }

    function accept($id){
        $status = 2; // ดำเนินการซ่อม
        $param = [
                            'anest.repair_id'=> $this->db->getObjectID($id)
                            
                         ];

        $data1  = ['$set'=>[
                            
                            'anest.repair.repair_status'  => (int)$status,     
    
                            ]

                          ];

        $update = $this->db->Update($param,$data1);

        if($update){
                    
            header('location:'.URL.'repair/approve');

        } // End update
        
    }

    function cancel($id){
        $status = 4; // ยกเลิกการซ่อม
        $param = [
                            'anest.repair_id'=> $this->db->getObjectID($id)
                            
                         ];

        $data1  = ['$set'=>[
                            
                            'anest.repair.repair_status'  => (int)$status,     
    
                            ]

                          ];

        $update = $this->db->Update($param,$data1);

        if($update){
              
              $filter = array('anest.repair_id'=> $this->db->getObjectID($id));

              $cursor = $this->db->Query($filter);

              foreach ($cursor as $value) {
                        $equipment_ref = $value['anest']['repair_equipment_ref'];

              }  

              if((string)$equipment_ref != ''){
                $status = '57f2240dd70289880158fdd3'; // พร้อมใช้งาน
                $where = array('anest.equipment_id'=> $this->db->getObjectID((string)$equipment_ref));

                
                
                $data1  = ['$set'=>[
                            
                            'anest.equipment_status_ref'  => $this->db->getObjectID($status),     
    
                            ]

                          ];

                $update = $this->db->Update($where,$data1);

                if($update){
                    header('location:'.URL.'repair/approve');
                }
                
              }
     

        } // End update
        
    }

    function back_repair($packet){
        $status = 3; // ซ่อมเสร็จแล้ว
        $param = [
                            'anest.repair_id'=> $this->db->getObjectID($packet['repair_id'])
                            
                         ];
                                       

        $data1  = ['$set'=>[
                            
                            'anest.repair.repair_status'      => (int)$status,
                            'anest.repair.repair_date_back'   =>$this->db->getISODateID($packet['repair_back']),
                            'anest.repair.repair_improvement' => $packet['repair_improvement'],    
                            'anest.repair.repair_cost'        => $packet['repair_cost'],
                            'anest.repair_staff_back_ref'     => $this->db->getObjectID($packet['staff_back']),
                            ]

                          ];

        $update = $this->db->Update($param,$data1);

        if($update){
                    
              $filter = array('anest.repair_id'=> $this->db->getObjectID($packet['repair_id']));

              $cursor = $this->db->Query($filter);

              foreach ($cursor as $value) {
                        $equipment_ref = $value['anest']['repair_equipment_ref'];

              }  

              if((string)$equipment_ref != ''){
                $status = '57f2240dd70289880158fdd3'; // พร้อมใช้งาน
                $where = array('anest.equipment_id'=> $this->db->getObjectID((string)$equipment_ref));

                
                
                $data1  = ['$set'=>[
                            
                            'anest.equipment_status_ref'  => $this->db->getObjectID($status),     
    
                            ]

                          ];

                $update = $this->db->Update($where,$data1);

                if($update){
                    header('location:'.URL.'repair/back');
                    //echo "Hello";
                }
             }//End if

        } // End update
        
    }//End function

}

?>