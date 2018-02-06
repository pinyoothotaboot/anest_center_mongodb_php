<?php
class Equipment_Model extends Model{
	function __construct(){
		parent::__construct();
	}

	function get_equipment(){

  
  	$filter = array('anest.equipment.equipment_online'=>1);

	$cursor = $this->db->Count($filter);

    
    
    $group_id = array();
    
    $group = array();
   
    
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
                        'online'=>'',
                        'id'=>''
                      ]
                    );
    $num = 0;

    if($cursor != 0){

     $where = array(
                     '$or'=> array(
                                
                               
                                array('anest.group.group_online'=>1),
                                
                             )
                    );
     
     $cursor = $this->db->Query($where);
         
         
         foreach($cursor as $value){
             $group_id[$num] =   $value['anest']['group_id'];
             $group[$num] =   $value['anest']['group']['group_name'];
             $num++;
         }
         
  
        
              $filter = array(
                              'anest.equipment_group_ref'=> array('$in'=>$group_id),
                              
                        );
             
              $cursor = $this->db->Query($filter);
                 
                 $i=0;
                 foreach($cursor as $value){
                     
                     $equipment[$i]['id'] = $value['anest']['equipment_group_ref'];
                     $equipment[$i]['equipment'] = $value['anest'];
                     $i++;
                     
                 }

             $count = 0;
             for($i=0;$i<count($group);$i++){
                     for($j=0;$j<count($equipment);$j++){
                            if((string)$group_id[$i] == (string)$equipment[$j]['id']){
                            $packet[$count]['group'] = $group[$i];
                            $packet[$count]['sap'] = $equipment[$j]['equipment']['equipment']['equipment_sap'];
                            $packet[$count]['sn'] = $equipment[$j]['equipment']['equipment']['equipment_sn'];
                            $packet[$count]['name'] = $equipment[$j]['equipment']['equipment']['equipment_nameEN'];
                            //
                            $packet[$count]['online'] = $equipment[$j]['equipment']['equipment']['equipment_online'];
                            $packet[$count]['id'] = $equipment[$j]['equipment']['equipment_id'];
                            $count++;
                         }
                         
                       
                        
                     }
                  
             }
 
    	} // End check count
    	else
    		$packet = $cursor;
 
 	return $packet;
  
	}
	
	function get_list(){
		
		$online = 1;
		
		$filter =  [
						'$or'=> [
									array('anest.type.type_online' => (int)$online),
									array('anest.room.room_online' => (int)$online),
									array('anest.floor.floor_online' => (int)$online),
									array('anest.building.building_online' => (int)$online),
									array('anest.group.group_online' => (int)$online),
									array('anest.department.department_online' => (int)$online),
									array('anest.status.status_online' => (int)$online),
								]
						
					];
		
		$cursor = $this->db->Query($filter);

		return $cursor;


		
		
	}




	function edit($id){


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
							
					array('anest.department_id' => $data1['anest']['equipment_department_ref']),
					array('anest.group_id' => $data1['anest']['equipment_group_ref']),
					array('anest.type_id' => $data1['anest']['equipment_type_ref']), 
					array('anest.status_id' => $data1['anest']['equipment_status_ref'],),
					array('anest.building_id' => $data1['anest']['equipment_building_ref'],),
					array('anest.floor_id' => $data1['anest']['equipment_floor_ref'],),	 
					array('anest.room_id' => $data1['anest']['equipment_room_ref'],),	  
				]
			);
		$cursor1 = $this->db->Query($where);

		
		$data2 = array( 
						 		'department' => array('id'=>'','name'=>''),
						 		'group' => array('id'=>'','name'=>''),
						 		'type' => array('id'=>'','name'=>''),
						 		'status' => array('id'=>'','name'=>''),
						 		'building' => array('id'=>'','name'=>''),
						 		'floor' => array('id'=>'','name'=>''),
						 		'room' => array('id'=>'','name'=>''),
						 		
						);
		$i= 0;
		foreach ($cursor1 as $value) {

				if($value['anest']['department']['department_online'] != '' ){
						$data2['department']['id'] = $value['anest']['department_id'];
						$data2['department']['name'] = $value['anest']['department']['department_name'];
						
				}

				else if($value['anest']['group']['group_online'] != ''){
				
						$data2['group']['id'] = $value['anest']['group_id'];
						$data2['group']['name'] = $value['anest']['group']['group_name'];
				}

				else if($value['anest']['status']['status_online'] != ''){

						$data2['status']['id'] = $value['anest']['status_id'];
						$data2['status']['name'] = $value['anest']['status']['status_name'];
				}
				else if($value['anest']['building']['building_online'] != ''){

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
				else if($value['anest']['type']['type_online'] != ''){
						$data2['type']['id'] = $value['anest']['type_id'];
						$data2['type']['name'] = $value['anest']['type']['type_name'];

				}
			}


			$packet = array($data1,$data2);

			
		return $packet;
	}


	

	function create($packet){
	$check = true;
	$type = array('image/jpg','image/jpeg','image/gif','image/png');
	$date = date('d-m-Y');
	$begin = (int)$packet['begin'];
  	$year  = (int)$packet['year'];
  	$price = $packet['cost'];
  	$drop =  $packet['drop'];
  
    $now =  (int)date('Y')+543;
    $section = (int)($year*($year+1))/2;
    $price_drop = $price - $drop;
    $num = 0;
            do {
                
                $result +=($price_drop*($year-$num))/$section;
                $total = $price-$result;
                //echo $price_drop .'x'.($year-$num).'/'.$section.'   '.($price_drop*($year-$num))/$section;
                //echo '    '.$result.'    ';
                
                //echo '          '.$total;
                //echo "</br>";
                $num ++;
                $begin++;
            }
            while((int)$begin < (int)$now && $num < $year);

        $file_name  = $packet['pic']['name'];
		$file_tmp   = $packet['pic']['tmp_name'];
		$file_type  = $packet['pic']['type'];
		$file_size  = $packet['pic']['size'];
		$file_error = $packet['pic']['error'];


		//var_dump($packet);

				
			

			$target_file = $target_dir.$file_name;
		
		// Check image file [jpg,jpeg,gif,png]
			if(($file_type == $type[0]) || 
			   ($file_type == $type[1]) ||
			   ($file_type == $type[2]) || 
			   ($file_type == $type[3]))
				$check = true;

			// Check image file large too 1MB
			if($file_size > 1024000)
				$check =false;
				
			if($check == true){

				$path = $_SERVER['DOCUMENT_ROOT'].'/anest_center/publics/images/equipments';

				//echo $path;
        		$tmp_name = $packet['pic']["tmp_name"];
        
        		$name = basename($file_name);

        	
				if(move_uploaded_file($file_tmp, "$path/$name")){
					
					$online = 1;
					

					$data = array(
						array(
								'anest' => array(

									'equipment_id'			  => $this->db->getObjectID(),
									'equipment_building_ref'  => $this->db->getObjectID($packet['building']),
									'equipment_floor_ref'     => $this->db->getObjectID($packet['floor']),
									'equipment_room_ref'      => $this->db->getObjectID($packet['room']),
									'equipment_department_ref'=> $this->db->getObjectID($packet['department']),
									'equipment_group_ref'     => $this->db->getObjectID($packet['group']),
									'equipment_status_ref'    => $this->db->getObjectID($packet['status']),
									'equipment_type_ref'      => $this->db->getObjectID($packet['type']),
									
									'equipment'=> array(

												'equipment_sap'            => $packet['sap'], 
												'equipment_code'           => $packet['code'],
												'equipment_nameTH'         => $packet['nameTH'],
												'equipment_budget'         => $packet['budget'],
												
												'equipment_begin'          => $packet['begin'],
												
							
												'equipment_sn'             => $packet['sn'],
												'equipment_nameEN'         => $packet['nameEN'],
												'equipment_brand'          => $packet['brand'],
												'equipment_model'          => $packet['model'],
	 											'equipment_registed'       => $this->db->getISODateID($date),
							
												'equipment_company_name'   => $packet['company_name'],
												'equipment_company_tel'    => $packet['company_tel'],
												'equipment_company_fax'    => $packet['company_fax'],
												'equipment_company_sales'  => $packet['company_sales'],
												'equipment_company_mobile' => $packet['company_mobile'],
												'equipment_company_waranty'=> $packet['company_waranty'],
												'equipment_cost'           => $packet['cost'],
												'equipment_drop'           => $packet['drop'],
												'equipment_year'           => $packet['year'],
												'equipment_online'         => $online,
												'equipment_total'          => $total,
												'pic_name'   		   	   => $file_name,   
												'pic_tmp'                  => $file_tmp,                           
												'pic_type'                 => $file_type,   
												'pic_size'                 => (int)$file_size, 
												'pic_error'                => $file_error   
												)
											)
									)
						);

						$insert = $this->db->Insert($data);

						if($insert){
    			
    						header('location:'.URL.'equipment');

						}
					
					} // End upload
				//else
					//echo "Can't upload pic";


			} // End check == true

	}

	function update($packet,$img){

			$type = array('image/jpg','image/jpeg','image/gif','image/png');
			$check = true;

			
		if($img['name'] != ''){		
			
			$file_name = $img['name'];
			$file_tmp  = $img['tmp_name'];
			$file_type = $img['type'];
			$file_size = $img['size'];
			$file_error =$img['error']; 
			
		}	

			// Check image file [jpg,jpeg,gif,png]
			if(($file_type == $type[0]) || 
			   ($file_type == $type[1]) ||
			   ($file_type == $type[2]) || 
			   ($file_type == $type[3]))
				$check = true;

			// Check image file large too 1MB
			if($file_size > 1024000)
				$check =false;
  			
		if($check== true && $img['name'] != ''){

		
				$path = $_SERVER['DOCUMENT_ROOT'].'/anest_center/publics/images/equipments';


        		
        
        		$name = basename($file_name);

        	//if(is_uploaded_file($tmp_name)) {
			if(move_uploaded_file($file_tmp, "$path/$name")){


				$param = [
						'anest.equipment_id'=> $this->db->getObjectID($packet['id']),
							
						    
						];


				$data1  = ['$set'=>[
							'anest.equipment.equipment_sap' 	=> $packet['sap'],      
							'anest.equipment.equipment_code' 	=> $packet['code'],   
							'anest.equipment.equipment_nameTH'	=> $packet['nameTH'],
							'anest.equipment.equipment_budget'	=> $packet['budget'],
							'anest.equipment.equipment_begin'	=> (int)$packet['begin'],
							'anest.equipment.equipment_sn'		=> $packet['sn'],
							'anest.equipment.equipment_nameEN'	=> $packet['nameEN'],
							'anest.equipment.equipment_brand'	=> $packet['brand'],
							'anest.equipment.equipment_model'	=> $packet['model'],
							'anest.equipment.equipment_company_name'    => $packet['company_name'],
							'anest.equipment.equipment_company_tel'	    => $packet['company_tel'],
							'anest.equipment.equipment_company_fax'	    => $packet['company_fax'],
							'anest.equipment.equipment_company_sales'	=> $packet['company_sales'],
							'anest.equipment.equipment_company_mobile'	=> $packet['company_mobile'],
							'anest.equipment.equipment_company_waranty'	=> (int)$packet['company_waranty'],
							'anest.equipment.equipment_cost'	=> $packet['cost'],
							'anest.equipment.equipment_drop'	=> $packet['drop'],
							'anest.equipment.equipment_year'	=> (int)$packet['year'],

							
							'anest.equipment_building_ref'		=> $this->db->getObjectID($packet['building']),
							'anest.equipment_floor_ref'			=> $this->db->getObjectID($packet['floor']),
							'anest.equipment_room_ref'			=> $this->db->getObjectID($packet['room']),
							'anest.equipment_department_ref'    => $this->db->getObjectID($packet['department']),
							'anest.equipment_type_ref'			=> $this->db->getObjectID($packet['type']),
							'anest.equipment_group_ref'			=> $this->db->getObjectID($packet['group']),
							'anest.equipment_status_ref'        => $this->db->getObjectID($packet['status']),

							'anest.equipment.equipment_online'	=> 1,  
							'anest.equipment.pic_name'   	 	=> $file_name,                          
							'anest.equipment.pic_tmp'        	=> $file_tmp,                          
							'anest.equipment.pic_type'       	=> $file_type,                          
							'anest.equipment.pic_size'       	=> (int)$file_size,                    
							'anest.equipment.pic_error'      	=> $file_error                        
							]

				];

				$update = $this->db->Update($param,$data1);

				if($update){

					//echo "Update with Pic";
					header('location:'.URL.'equipment/edit/'.$packet['id']);

				} // End Result
			
			
			} // End Check
			else {


				$param = [
						'anest.equipment_id'=> $this->db->getObjectID($packet['id']),
							
						    
						];


				$data1  = ['$set'=>[
							'anest.equipment.equipment_sap' 	=> $packet['sap'],      
							'anest.equipment.equipment_code' 	=> $packet['code'],   
							'anest.equipment.equipment_nameTH'	=> $packet['nameTH'],
							'anest.equipment.equipment_budget'	=> $packet['budget'],
							'anest.equipment.equipment_begin'	=> (int)$packet['begin'],
							'anest.equipment.equipment_sn'		=> $packet['sn'],
							'anest.equipment.equipment_nameEN'	=> $packet['nameEN'],
							'anest.equipment.equipment_brand'	=> $packet['brand'],
							'anest.equipment.equipment_model'	=> $packet['model'],
							'anest.equipment.equipment_company_name'    => $packet['company_name'],
							'anest.equipment.equipment_company_tel'	    => $packet['company_tel'],
							'anest.equipment.equipment_company_fax'	    => $packet['company_fax'],
							'anest.equipment.equipment_company_sales'	=> $packet['company_sales'],
							'anest.equipment.equipment_company_mobile'	=> $packet['company_mobile'],
							'anest.equipment.equipment_company_waranty'	=> (int)$packet['company_waranty'],
							'anest.equipment.equipment_cost'	=> $packet['cost'],
							'anest.equipment.equipment_drop'	=> $packet['drop'],
							'anest.equipment.equipment_year'	=> (int)$packet['year'],

							
							'anest.equipment_building_ref'		=> $this->db->getObjectID($packet['building']),
							'anest.equipment_floor_ref'			=> $this->db->getObjectID($packet['floor']),
							'anest.equipment_room_ref'			=> $this->db->getObjectID($packet['room']),
							'anest.equipment_department_ref'    => $this->db->getObjectID($packet['department']),
							'anest.equipment_type_ref'			=> $this->db->getObjectID($packet['type']),
							'anest.equipment_group_ref'			=> $this->db->getObjectID($packet['group']),
							'anest.equipment_status_ref'        => $this->db->getObjectID($packet['status']),

							'anest.equipment.equipment_online'	=> 1,  
							'anest.equipment.pic_name'   	 	=> $file_name,                          
							'anest.equipment.pic_tmp'        	=> $file_tmp,                          
							'anest.equipment.pic_type'       	=> $file_type,                          
							'anest.equipment.pic_size'       	=> (int)$file_size,                    
							'anest.equipment.pic_error'      	=> $file_error                        
							]

				];

				$update = $this->db->Update($param,$data1);

				if($update){

					header('location:'.URL.'equipment/edit/'.$packet['id']);
				} // End Result
			}

		}
		
		else {

			//Session::init();

		

				$param = [
							'anest.equipment_id'=> $this->db->getObjectID($packet['id'])
						    
						 ];

				$data1  = ['$set'=>[
							
							'anest.equipment.equipment_sap' 	=> $packet['sap'],      
							'anest.equipment.equipment_code' 	=> $packet['code'],   
							'anest.equipment.equipment_nameTH'	=> $packet['nameTH'],
							'anest.equipment.equipment_budget'	=> $packet['budget'],
							'anest.equipment.equipment_begin'	=> (int)$packet['begin'],
							'anest.equipment.equipment_sn'		=> $packet['sn'],
							'anest.equipment.equipment_nameEN'	=> $packet['nameEN'],
							'anest.equipment.equipment_brand'	=> $packet['brand'],
							'anest.equipment.equipment_model'	=> $packet['model'],
							'anest.equipment.equipment_company_name'    => $packet['company_name'],
							'anest.equipment.equipment_company_tel'	    => $packet['company_tel'],
							'anest.equipment.equipment_company_fax'	    => $packet['company_fax'],
							'anest.equipment.equipment_company_sales'	=> $packet['company_sales'],
							'anest.equipment.equipment_company_mobile'	=> $packet['company_mobile'],
							'anest.equipment.equipment_company_waranty'	=> (int)$packet['company_waranty'],
							'anest.equipment.equipment_cost'	=> $packet['cost'],
							'anest.equipment.equipment_drop'	=> $packet['drop'],
							'anest.equipment.equipment_year'	=> (int)$packet['year'],

							
							'anest.equipment_building_ref'		=> $this->db->getObjectID($packet['building']),
							'anest.equipment_floor_ref'			=> $this->db->getObjectID($packet['floor']),
							'anest.equipment_room_ref'			=> $this->db->getObjectID($packet['room']),
							'anest.equipment_department_ref'    => $this->db->getObjectID($packet['department']),
							'anest.equipment_type_ref'			=> $this->db->getObjectID($packet['type']),
							'anest.equipment_group_ref'			=> $this->db->getObjectID($packet['group']),
							'anest.equipment_status_ref'        => $this->db->getObjectID($packet['status']),

							'anest.equipment.equipment_online'	=> 1, 
										                        

									]

						  ];

				$update = $this->db->Update($param,$data1);

				if($update){
						header('location:'.URL.'equipment/edit/'.$packet['id']);
					//echo "Update no Pic";
					
				} // End update

		}


	} // End function


	function delete($id){
			
				$online = 0;
				$param = [
							'anest.equipment_id'=> $this->db->getObjectID($id)
						    
						 ];

				$data1  = ['$set'=>[
										'anest.equipment.equipment_online'           => (int)$online     
										                       

									]

						  ];

				$update = $this->db->Update($param,$data1);

				if($update){
					
					header('location:'.URL.'equipment');

				} // End update
	}
}
?>