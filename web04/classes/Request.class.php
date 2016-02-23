<?php

class Request extends MyObject{

	protected static $instance;

	
	public function __construct() {
	} 
	
	public static function has($arg){
		return isset($_GET[$arg]);
	}

	public static function getCurrentRequest()
	{
		if (!isset(self::$instance)) 
		{
			self::$instance = new self; 
		}
		
		return self::$instance;
	}
	
	public static function construireLien($controller, $action, $params){
		$string='index.php?controller='.$controller.'&action='.$action.'&params='.$params;
		return ($string);
		
	}

	public function getCurrentController(){

		if(isset($_GET['controller'])){
			return $_GET['controller'];
		}

		else{
			return 'Anonymous';
		}
	}

	public function read($parametre){
		
		return $_POST[$parametre];
		
	}	


	protected static function getActionName(){

		if(isset($_GET['action'])){
			return $_GET['action'];
		}

		else{
			return 'defaultAction';
		}
	}


	
}
