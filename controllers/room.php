<?php

class Room extends Controller{
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

								'js/pages/room.js'
							    );
	
	}

	public function index(){
	
		$this->model = new Room_Model();
		$this->view->data = $this->model->get_room();
		$this->view->render('room/index');
	}
	
	public function create(){
		
		if(isset($_POST['room-save'])){


			
				$data = [
							'room-name'     =>   $this->secure($_POST['room-name'],'')
						
						];
			}

			$this->model = new Room_Model();

			$this->model->create($data);
	}
	
	public function delete($id){
		
			$this->model = new Room_Model();

			$this->model->delete($id);
	}
	
	
	public function edit($id){
			

		$this->model = new Room_Model();
		$this->view->data = $this->model->get_roomBy($id);
		$this->view->render('room/edit');

	
	}
	
	public function update(){
		
		if(isset($_POST['room-update'])){

			$data = [
							'room_name'        =>   $this->secure($_POST['room-name'],''),
							'room_id'		   =>	 $this->secure($_POST['room-id'],'')
							
						];

		}


		
		
		$this->model = new Room_Model();
		$this->model->update($data);
		
		$this->view->render('room/index');
	}
}
?>