<?php

class Error extends Controller{
	public function __construct(){
		parent::__construct();
		

		$this->view->css =array('css/bootstrap/bootstrap.min.css',
								'css/dist/AdminLTE.min.css',
								'css/skins/_all-skins.min.css',
								'plugins/iCheck/flat/blue.css',
								'plugins/morris/morris.css',
								'plugins/jvectormap/jquery-jvectormap-1.2.2.css',
								'plugins/datepicker/datepicker3.css',
								'plugins/daterangepicker/daterangepicker.css',
								'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'
								);

		$this->view->js =array( 'plugins/jQuery/jquery-2.2.3.min.js',
								'js/pages/jquery-ui.min.js',
								'js/bootstrap/bootstrap.min.js',
								'js/pages/raphael-min.js',
								'plugins/morris/morris.min.js',
								'plugins/sparkline/jquery.sparkline.min.js',
								'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
								'plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
								'plugins/knob/jquery.knob.js',
								'js/pages/moment.min.js',
								'plugins/daterangepicker/daterangepicker.js',
								'plugins/datepicker/bootstrap-datepicker.js',
								'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
								'plugins/slimScroll/jquery.slimscroll.min.js',
								'plugins/fastclick/fastclick.js',
								'js/dist/app.min.js'
								
								
							    );
	}
	public function index(){
			$this->view->msg ="This page doesnt exist";
			$this->view->render('error/index');
	}
}
?>