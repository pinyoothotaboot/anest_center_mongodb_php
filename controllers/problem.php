<?php

class Problem extends Controller{
	public function __construct(){
		parent::__construct();

		$this->view->css =array('css/bootstrap/bootstrap.min.css',
								'plugins/datatables/dataTables.bootstrap.css',
								'plugins/select2/select2.min.css',
								'css/dist/AdminLTE.min.css',
								'css/skins/_all-skins.min.css'
								
								);

		
	
	}

	public function index(){
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
								'js/pages/problem6.js',

							    );
	
		$this->model = new Problem_Model();
		$this->view->data  = $this->model->get_problem();
		$this->view->data1 = $this->model->get_group();
		$this->view->render('problem/index');
	}

	public function create(){

		if(isset($_POST['problem-save'])){


			
				$data = [
							'problem-name'     =>   $this->secure($_POST['problem-name'],''),
							'problem-group'    =>   $this->secure($_POST['problem-group'],'')
						
						];
		}

			$this->model = new Problem_Model();

			$this->model->create($data);

	}

	public function delete($id){
		
			$this->model = new Problem_Model();

			$this->model->delete($id);
	}
	
	
	public function edit($id){
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

							    );
			

		$this->model = new Problem_Model();
		$this->view->data = $this->model->edit($id);
		$this->view->data1 = $this->model->get_group();
		$this->view->render('problem/edit');

	
	}
	
	public function update(){
		
		if(isset($_POST['problem-update'])){

			$data = [
							'problem_name'      =>   $this->secure($_POST['problem-name'],''),
							'problem_group'     =>   $this->secure($_POST['problem-group'],''),
							'problem_id'	    =>	 $this->secure($_POST['problem-id'],'')
							
						];

		}


		
		
		$this->model = new Problem_Model();
		$this->model->update($data);
		
		$this->view->render('problem/index');
	}
	
}

?>