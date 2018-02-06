<?php

class Group extends Controller{
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

								'js/pages/group.js'
							    );
	
	}

	public function index(){
	
		$this->model = new Group_Model();
		$this->view->data = $this->model->get_group();
		$this->view->render('group/index');
	}
	
	public function create(){
		
		if(isset($_POST['group-save'])){


			
				$data = [
							'group-name'     =>   $this->secure($_POST['group-name'],''),
							'group-pm'       =>   $this->secure($_POST['group-pm'] ,''),
							'group-risk'     =>   $this->secure($_POST['group-risk'],'')
						
						];
			}

			$this->model = new Group_Model();

			$this->model->create($data);
	}
	
	public function delete($id){
		
			$this->model = new Group_Model();

			$this->model->delete($id);
	}
	
	
	public function edit($id){
			

		$this->model = new Group_Model();
		$this->view->data = $this->model->get_groupBy($id);
		$this->view->render('group/edit');

	
	}
	
	public function update(){
		
		if(isset($_POST['group-update'])){

			$data = [
							'group_name'        =>   $this->secure($_POST['group-name'],''),
							'group_pm'          =>   $this->secure($_POST['group-pm'],''),
							'group_risk'        =>   $this->secure($_POST['group-risk'],''),
							'group_id'			=>	 $this->secure($_POST['group-id'],'')	
						];

		}


		
		
		$this->model = new Group_Model();
		$this->model->update($data);
		
		$this->view->render('group/index');
	}
}
?>