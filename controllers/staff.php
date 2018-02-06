<?php

class Staff extends Controller{
	public function __construct(){
		parent::__construct();

		$this->view->css =array('css/bootstrap/bootstrap.min.css',
								'plugins/datatables/dataTables.bootstrap.css',
								'plugins/select2/select2.min.css',
								'css/dist/AdminLTE.min.css',
								
								'css/skins/_all-skins.min.css'
								
								);

		$this->view->js =array( 'plugins/jQuery/jquery-2.2.3.min.js',
								
								
								'js/bootstrap/bootstrap.min.js',
								'plugins/select2/select2.full.min.js',
								'plugins/datatables/jquery.dataTables.min.js',
								'plugins/datatables/dataTables.bootstrap.min.js',
								
								'plugins/slimScroll/jquery.slimscroll.min.js',
								'plugins/fastclick/fastclick.js',
								'js/dist/app.min.js',
								
								'js/dist/demo.js',
								'js/pages/select.js',
								'js/pages/member.js'
							    );
	
	}

	public function index(){
		
		
	
		$this->model = new Staff_Model();
		$this->view->data = $this->model->get_staff();
		$this->view->data1 = $this->model->get_department();
		$this->view->render('staff/index');
	}

	function create(){


		if(isset($_POST['staff-save'])){

				$data = [
							'staff-name'            =>   $this->secure($_POST['staff-name'],''),
							'staff-email'           =>   $this->secure($_POST['staff-email'] ,''),
							'staff-position'        =>   $this->secure($_POST['staff-position'],''),
							'staff-department'      =>   $this->secure($_POST['staff-department'],''),
							'staff-permission'      =>   $this->secure($_POST['staff-permission'],''),
							'staff-pass'            =>   $this->secure($_POST['staff-pass'],''),
							
							'staff-pic'      	    =>   $_FILES['staff-pic'],
						];
			}

			$this->model = new Staff_Model();

			$this->model->create($data);
			
			
	}

	function edit($id){

		$this->model = new Staff_Model();
		$this->view->data = $this->model->edit($id);
		$this->view->data1 = $this->model->get_department();
		$this->view->render('staff/edit');
	}


	function update(){

		$img = NULL;
		if(isset($_POST['staff-update'])){

			$data = [
							'staff_name'        =>   $this->secure($_POST['staff-name'],''),
							'staff_position'    =>   $this->secure($_POST['staff-position'],'name'),
							'staff_tel'         =>   $this->secure($_POST['staff-tel'],'tel'),
							'staff_id'			=>	 $this->secure($_POST['staff-id'],''),
							'staff_permission'  =>   $this->secure($_POST['staff-permission'],''),
							'staff_department'  =>   $this->secure($_POST['staff-department'],'')	
						];

						
						$img = $_FILES['staff-pic'];	
					
			
		}


		
		
		$this->model = new Staff_Model();
		$this->model->update($data,$img);
		$this->view->data = $this->model->edit((string)$this->secure($_POST['staff-id'],''));
		$this->view->render('staff/edit');
	}

	public function delete($id){
		
			$this->model = new Staff_Model();

			$this->model->delete($id);
	}
	
}

?>