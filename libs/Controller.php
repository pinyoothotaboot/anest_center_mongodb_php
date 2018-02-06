<?php
class Controller{
	
	public function __construct(){
		$this->view = new View();
	}
	
	/**
	 * loadModel
	 * @param String $name A name is filename to loading
	 * @return none
	*/
	public function loadModel($name){
		$path =require 'models/'.$name.'_model.php';
		if(file_exists($path)){
			require 'models/'.$name.'_model.php';
			$modelName = $name.'_Model';
			$this->model = new $modelName();
		}
	}


	public function secure($str,$check){

			$check = '';
			if(get_magic_quotes_gpc())
			{
				$str=stripslashes(trim($str));
				$str = strip_tags($str);
			}
			
			if($check === 'name'){
				 $str =  preg_replace("/([^a-zA-Zก-ฮ])/", '',$str);
			}	

			if($check === 'tel'){
				 $str =  preg_replace("/([^0-9])/", '',$str);
			}	
			
			if($check === 'en'){
				 $str =  preg_replace("/([^a-zA-Z])/", '',$str);
			}

			return $str;

	}




	
 
}
?>