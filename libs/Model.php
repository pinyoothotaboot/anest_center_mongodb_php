<?php
class Model{
	
	public function __construct(){
		
		$this->db = new Database(DB_TYPE,DB_HOST,DB_PORT,DB_DATABASE,DB_COLLECTION);
		$this->hash = new Hash();
	}
	
	
	public function secure($str){
		if(get_magic_quotes_gpc())
			{
				$str=stripslashes(trim($str));
			}
		return  mysql_real_escape_string( trim($str )) ;
	}
	
	 public function x_week_range($date) {
    		$ts = strtotime($date);
    		$start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
    		
    		return array(date('d-M-Y', $start),
                 date('d-M-Y', strtotime('next saturday', $start)));
	}

	function random_string($length){
    	return substr(str_repeat(md5(rand()), ceil($length/32)), 0, $length);
	}
	
}
?>