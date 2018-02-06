<?php

class Building extends Controller{
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

								'js/pages/building.js'
							    );
	
	}

	public function index(){
	
		$this->model = new Building_Model();
		$this->view->data = $this->model->get_building();
		$this->view->render('building/index');
	}
	
	public function create(){
		
		if(isset($_POST['building-save'])){


			
				$data = [
							'building-name'     =>   $this->secure($_POST['building-name'],'')
						
						];
			}

			$this->model = new Building_Model();

			$this->model->create($data);
	}
	
	public function delete($id){
		
			$this->model = new Building_Model();

			$this->model->delete($id);
	}
	
	
	public function edit($id){
			

		$this->model = new Building_Model();
		$this->view->data = $this->model->get_buildingBy($id);
		$this->view->render('building/edit');

	
	}
	
	public function update(){
		
		if(isset($_POST['building-update'])){

			$data = [
							'building_name'        =>   $this->secure($_POST['building-name'],''),
							'building_id'			=>	 $this->secure($_POST['building-id'],'')
							
						];

		}


		
		
		$this->model = new Building_Model();
		$this->model->update($data);
		
		$this->view->render('building/index');
	}
}
?>