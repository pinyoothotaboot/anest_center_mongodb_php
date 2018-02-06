<?php
class Index_Model extends Model{
	function __construct(){
		parent::__construct();
		
	}


	function get_index(){

		$filter = array('anest.equipment.equipment_online'=>1);



		$count_equipment = $this->db->Count($filter);

		$status = '57f2241ad70289880158fdd5'; // ส่งคืนพัสดุ

		$filter = array('anest.equipment_status_ref' => $this->db->getObjectID($status));

		$count_pacel = $this->db->Count($filter);

		$filter = array(
							'anest.repair.repair_status'=>2,
							'anest.repair.repair_online'=>1,
						);

		$count_repair_now = $this->db->Count($filter);

		$filter = array(
							'anest.repair.repair_status'=>3,
							'anest.repair.repair_online'=>1,
						);

		$count_repair_finished = $this->db->Count($filter);

		$packet = array(
							'equipment'=>$count_equipment,
							'repair_now' => $count_repair_now,
							'repair_finished' => $count_repair_finished,
							'parcel'=>$count_pacel,
						);

		return $packet;
	}

} // End class
?>