<?php

class Floor extends Controller{
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

								'js/pages/floor.js'
							    );
	
	}

	public function index(){
	
		$this->model = new Floor_Model();
		$this->view->data = $this->model->get_floor();
		$this->view->render('floor/index');
	}
	
	public function create(){
		
		if(isset($_POST['floor-save'])){


			
				$data = [
							'floor-name'     =>   $this->secure($_POST['floor-name'],'')
						
						];
			}

			$this->model = new Floor_Model();

			$this->model->create($data);
	}
	
	public function delete($id){
		
			$this->model = new Floor_Model();

			$this->model->delete($id);
	}
	
	
	public function edit($id){
			

		$this->model = new Floor_Model();
		$this->view->data = $this->model->get_floorBy($id);
		$this->view->render('floor/edit');

	
	}
	
	public function update(){
		
		if(isset($_POST['floor-update'])){

			$data = [
							'floor_name'        =>   $this->secure($_POST['floor-name'],''),
							'floor_id'			=>	 $this->secure($_POST['floor-id'],'')
							
						];

		}


		
		
		$this->model = new Floor_Model();
		$this->model->update($data);
		
		$this->view->render('floor/index');
	}
}
?>