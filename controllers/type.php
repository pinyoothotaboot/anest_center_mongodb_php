<?php

class Type extends Controller{
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

								'js/pages/type.js'
							    );
	
	}

	public function index(){
	
		$this->model = new Type_Model();
		$this->view->data = $this->model->get_type();
		$this->view->render('type/index');
	}
	
	public function create(){
		
		if(isset($_POST['type-save'])){


			
				$data = [
							'type-name'     =>   $this->secure($_POST['type-name'],'')
						
						];
			}

			$this->model = new Type_Model();

			$this->model->create($data);
	}
	
	public function delete($id){
		
			$this->model = new Type_Model();

			$this->model->delete($id);
	}
	
	
	public function edit($id){
			

		$this->model = new Type_Model();
		$this->view->data = $this->model->get_typeBy($id);
		$this->view->render('type/edit');

	
	}
	
	public function update(){
		
		if(isset($_POST['type-update'])){

			$data = [
							'type_name'        =>   $this->secure($_POST['type-name'],''),
							'type_id'			=>	 $this->secure($_POST['type-id'],'')
							
						];

		}


		
		
		$this->model = new Type_Model();
		$this->model->update($data);
		
		$this->view->render('type/index');
	}
}
?>