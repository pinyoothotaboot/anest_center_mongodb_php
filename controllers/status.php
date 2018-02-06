<?php

class Status extends Controller{
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

								'js/pages/status.js'
							    );
	
	}

	public function index(){
	
		$this->model = new Status_Model();
		$this->view->data = $this->model->get_status();
		$this->view->render('status/index');
	}
	
	public function create(){
		
		if(isset($_POST['status-save'])){


			
				$data = [
							'status-name'     =>   $this->secure($_POST['status-name'],'')
						
						];
			}

			$this->model = new Status_Model();

			$this->model->create($data);
	}
	
	public function delete($id){
		
			$this->model = new Status_Model();

			$this->model->delete($id);
	}
	
	
	public function edit($id){
			

		$this->model = new Status_Model();
		$this->view->data = $this->model->get_statusBy($id);
		$this->view->render('status/edit');

	
	}
	
	public function update(){
		
		if(isset($_POST['status-update'])){

			$data = [
							'status_name'        =>   $this->secure($_POST['status-name'],''),
							'status_id'			=>	 $this->secure($_POST['status-id'],'')
							
						];

		}


		
		
		$this->model = new Status_Model();
		$this->model->update($data);
		
		$this->view->render('status/index');
	}
}
?>