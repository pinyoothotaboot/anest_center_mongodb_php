<?php

class Department extends Controller{
	public function __construct(){
		parent::__construct();

		$this->view->css =array('css/bootstrap/bootstrap.min.css',
								'plugins/datatables/dataTables.bootstrap.css',
								'css/dist/AdminLTE.min.css',
								'css/skins/_all-skins.min.css'
								
								);

		$this->view->js =array( 'plugins/jQuery/jquery-2.2.3.min.js',
								
								
								'js/bootstrap/bootstrap.min.js',
								'plugins/datatables/jquery.dataTables.min.js',
								'plugins/datatables/dataTables.bootstrap.min.js',
								
								'plugins/slimScroll/jquery.slimscroll.min.js',
								'plugins/fastclick/fastclick.js',
								'js/dist/app.min.js',
								
								'js/dist/demo.js',

								'js/pages/department.js'
							    );
	
	}

	public function index(){
	
		$this->model = new Department_Model();
		$this->view->data = $this->model->get_department();
		$this->view->render('department/index');
	}
	
	public function create(){
		
		if(isset($_POST['department-save'])){


			
				$data = [
							'department-name'     =>   $this->secure($_POST['department-name'],''),
							'department-boss'     =>   $this->secure($_POST['department-boss'],''),
							'department-contact'  =>   $this->secure($_POST['department-contact'],''),
							'department-tel'      =>   $this->secure($_POST['department-tel'],'')
						
						];
			}

			$this->model = new Department_Model();

			$this->model->create($data);
	}
	
	public function delete($id){
		
			$this->model = new Department_Model();

			$this->model->delete($id);
	}
	
	
	public function edit($id){
			

		$this->model = new Department_Model();
		$this->view->data = $this->model->get_departmentBy($id);
		$this->view->data1 = $this->model->get_department();
		$this->view->render('department/edit');

	
	}
	
	public function update(){
		
		if(isset($_POST['department-update'])){

			$data = [
							'department_name'        =>   $this->secure($_POST['department-name'],''),
							'department_boss'        =>   $this->secure($_POST['department-boss'],''),
							'department_contact'     =>   $this->secure($_POST['department-contact'],''),
							'department_tel'         =>   $this->secure($_POST['department-tel'],''),
							'department_id'			 =>	 $this->secure($_POST['department-id'],'')
							
						];

		}


		
		
		$this->model = new Department_Model();
		$this->model->update($data);
		
		$this->view->render('department/index');
	}
}
?>