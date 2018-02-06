<?php
	require "configs/path.php";
	require "configs/database.php";
	require "configs/param.php";
	//require "config/param.php";
	//require "config/graph.php";
	
	function __autoload($class){
		require LIBS.$class.".php";
	}
	
	//require "config/secure.php";
	
	$app = new Bootstrap();
	
?>