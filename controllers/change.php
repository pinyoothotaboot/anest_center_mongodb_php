<?php

class Change extends Controller{
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
								'js/pages/change1.js'
							    );

	
	}

	public function index(){
	
	
		$this->model = new Change_Model();
		$this->view->data = $this->model->get_equipment();
		$this->view->render('change/index');
	}


	public function switching($id){
		$this->model = new Change_Model();
		$this->view->data = $this->model->get_byid($id);
		$this->view->data1 = $this->model->get_address();
		$this->view->render('change/changes');
	}

	public function send_change(){

		if(isset($_POST['change-save'])){

		$data = array(
							'id'        => $this->secure($_POST['equipment-id'],''),
							'date'      => $this->secure($_POST['change-date'],''),
							'staff'     => $this->secure($_POST['staff-id'],''),
							'note'      => $this->secure($_POST['change-note'],'name'),
							'building'  => $this->secure($_POST['building-change'],''),
							'floor'     => $this->secure($_POST['floor-change'],''),
							'room'      => $this->secure($_POST['room-change'],''),
							'obuilding' => $this->secure($_POST['old-building'],''),
							'ofloor'    => $this->secure($_POST['old-floor'],''),
							'oroom'     => $this->secure($_POST['old-room'],''),
						 );
		}

		$this->model = new Change_Model();

		$this->model->send_change($data);

	}

}
?>