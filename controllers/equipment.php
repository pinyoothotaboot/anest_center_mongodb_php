<?php

class Equipment extends Controller{
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
								'js/pages/equipment8.js'
							    );
	
	}

	public function index(){
		
		
	
		$this->model = new Equipment_Model();
		$this->view->data = $this->model->get_equipment();
		$this->view->data1 = $this->model->get_list();
		$this->view->render('equipment/index');
	}

	function create(){


		if(isset($_POST['equipment-save'])){

				$data = [
							'sap'             =>   $this->secure($_POST['equipment-sap'],'tel'),
							'code'            =>   $this->secure($_POST['equipment-code'],''),
							'nameTH'          =>   $this->secure($_POST['equipment-nameTH'],'name'),
							'budget'          =>   $this->secure($_POST['equipment-budget'],'name'),
							'building'        =>   $this->secure($_POST['equipment-building'],''),
							'floor'           =>   $this->secure($_POST['equipment-floor'],''),
							'room'            =>   $this->secure($_POST['equipment-room'],''),
							'begin'           =>   $this->secure($_POST['equipment-begin'],'tel'),
							'department'      =>   $this->secure($_POST['equipment-department'],''),

							'sn'              =>   $this->secure($_POST['equipment-sn'],''),
							'nameEN'          =>   $this->secure($_POST['equipment-nameEN'],'en'),
							'brand'           =>   $this->secure($_POST['equipment-brand'],''),
							'model'           =>   $this->secure($_POST['equipment-model'],''),
							'type'            =>   $this->secure($_POST['equipment-type'],''),
							'group'           =>   $this->secure($_POST['equipment-group'],''),
							'status'          =>   $this->secure($_POST['equipment-status'],''),

							'company_name'    =>   $this->secure($_POST['equipment-company_name'],'name'),
							'company_tel'     =>   $this->secure($_POST['equipment-company_tel'],'tel'),
							'company_fax'     =>   $this->secure($_POST['equipment-company_fax'],'tel'),
							'company_sales'   =>   $this->secure($_POST['equipment-company_sales'],'name'),
							'company_mobile'  =>   $this->secure($_POST['equipment-company_mobile'],'tel'),
							'company_waranty' =>   $this->secure($_POST['equipment-company_waranty'],'tel'),

							'cost'            =>   $this->secure($_POST['equipment-cost'],'tel'),
							'drop'            =>   $this->secure($_POST['equipment-drop'],'tel'),
							'year'            =>   $this->secure($_POST['equipment-year'],'tel'),

							'pic'      	      =>   $_FILES['equipment-pic'],
						];
			}

			$this->model = new Equipment_Model();

			$this->model->create($data);
			
			
	}

	function edit($id){

		$this->model = new Equipment_Model();
		$this->view->data = $this->model->edit($id);
		$this->view->data1 = $this->model->get_list();
		$this->view->render('equipment/edit');
	}


	function update(){

		$img = NULL;
		if(isset($_POST['equipment-update'])){

			$data = [
							'sap'             =>   $this->secure($_POST['equipment-sap'],'tel'),
							'code'            =>   $this->secure($_POST['equipment-code'],''),
							'nameTH'          =>   $this->secure($_POST['equipment-nameTH'],'name'),
							'budget'          =>   $this->secure($_POST['equipment-budget'],'name'),
							'building'        =>   $this->secure($_POST['equipment-building'],''),
							'floor'           =>   $this->secure($_POST['equipment-floor'],''),
							'room'            =>   $this->secure($_POST['equipment-room'],''),
							'begin'           =>   $this->secure($_POST['equipment-begin'],'tel'),
							'department'      =>   $this->secure($_POST['equipment-department'],''),

							'sn'              =>   $this->secure($_POST['equipment-sn'],''),
							'nameEN'          =>   $this->secure($_POST['equipment-nameEN'],'en'),
							'brand'           =>   $this->secure($_POST['equipment-brand'],''),
							'model'           =>   $this->secure($_POST['equipment-model'],''),
							'type'            =>   $this->secure($_POST['equipment-type'],''),
							'group'           =>   $this->secure($_POST['equipment-group'],''),
							'status'          =>   $this->secure($_POST['equipment-status'],''),

							'company_name'    =>   $this->secure($_POST['equipment-company_name'],'name'),
							'company_tel'     =>   $this->secure($_POST['equipment-company_tel'],'tel'),
							'company_fax'     =>   $this->secure($_POST['equipment-company_fax'],'tel'),
							'company_sales'   =>   $this->secure($_POST['equipment-company_sales'],'name'),
							'company_mobile'  =>   $this->secure($_POST['equipment-company_mobile'],'tel'),
							'company_waranty' =>   $this->secure($_POST['equipment-company_waranty'],'tel'),

							'cost'            =>   $this->secure($_POST['equipment-cost'],'tel'),
							'drop'            =>   $this->secure($_POST['equipment-drop'],'tel'),
							'year'            =>   $this->secure($_POST['equipment-year'],'tel'),
							'id'			  =>   $this->secure($_POST['equipment-id'],''),

						];
					
					
						$img = $_FILES['equipment-pic'];
		}


		
		
		$this->model = new Equipment_Model();
		$this->model->update($data,$img);
		$this->view->data = $this->model->edit($data['id']);
		$this->view->render('equipment/edit/');
	}

	public function delete($id){
		
			$this->model = new Equipment_Model();

			$this->model->delete($id);
	}
	
}

?>