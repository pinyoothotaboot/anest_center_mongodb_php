<?php

class Repair extends Controller{
	public function __construct(){
		parent::__construct();

		$this->view->css =array('css/bootstrap/bootstrap.min.css',
								'plugins/datatables/dataTables.bootstrap.css',
								'plugins/daterangepicker/daterangepicker.css',
								'plugins/datepicker/datepicker3.css',
								'plugins/timepicker/bootstrap-timepicker.min.css',
								'css/dist/AdminLTE.min.css',
								'plugins/select2/select2.min.css',
								'css/skins/_all-skins.min.css'
								
								);
		$this->view->js =array( 'plugins/jQuery/jquery-2.2.3.min.js',
								'js/bootstrap/bootstrap.min.js',
								'plugins/select2/select2.full.min.js',
								'plugins/datatables/jquery.dataTables.min.js',
								'plugins/datatables/dataTables.bootstrap.min.js',
								'plugins/daterangepicker/daterangepicker.js',
								'plugins/datepicker/bootstrap-datepicker.js',

								'plugins/slimScroll/jquery.slimscroll.min.js',
								'plugins/fastclick/fastclick.js',
								'js/dist/app.min.js',
								
								'js/dist/demo.js',
								'js/pages/select.js',
								'js/pages/repair-send.js'
							    );


	
	}

	public function index(){
	
	
		$this->model = new Repair_Model();
		$this->view->data = $this->model->get_equipment();
		$this->view->render('repair/index');
	}

	public function send($id){
		
	
		$this->model = new Repair_Model();
		$this->view->data = $this->model->get_byid($id);
		$this->view->render('repair/send');

	}

	public function send_repair(){

		if(isset($_POST['repair-save'])){

			$data = array(
							'equipment_id' => $this->secure($_POST['equipment-id'],''),
							'failure_id'   => $this->secure($_POST['repair-failure'],''),
							'service'      => $this->secure($_POST['repair-service'],'name'),
							'date_send'    => $this->secure($_POST['repair-date'],''),
							'staff_id'     => $this->secure($_POST['staff-id'],''),
							'note'         => $this->secure($_POST['repair-note'],'name'),
							'img'		   => $_FILES['repair-pic'],
						 );
		}

		$this->model = new Repair_Model();

		$this->model->send_repair($data);

	}


	public function approve(){
		$this->model = new Repair_Model();
		$this->view->data = $this->model->get_repair(1);
		$this->view->render('repair/approve');
	}

	public function accept($id){

		$this->model = new Repair_Model();
		$this->model->accept($id);

	}

	public function cancel($id){
		$this->model = new Repair_Model();
		$this->model->cancel($id);
	}

	public function back(){
		$this->model = new Repair_Model();
		$this->view->data = $this->model->get_repair(2);
		$this->view->render('repair/back');
	}

	public function getback($id){
		$this->model = new Repair_Model();
		$this->view->data = $this->model->get_byrepairid($id);
		$this->view->render('repair/getback');
	}

	public function back_update(){
		Session::init();
		if(isset($_POST['back-save'])){

			$data = array(
							'repair_id'          => $this->secure($_POST['repair-id'],''),
							'repair_cost'        => $this->secure($_POST['repair-cost'],''),
							'repair_improvement' => $this->secure($_POST['repair-improvement'],'name'),
							'repair_back'        => $this->secure($_POST['back-date'],''),
							'staff_back'         => Session::get('user_id'),
						 );
		}

		$this->model = new Repair_Model();

		$this->model->back_repair($data);
	}
}

?>