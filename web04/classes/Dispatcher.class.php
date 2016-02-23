<?php

class Dispatcher extends MyObject{

	protected static $instance;

	
	public function __construct() {
	} 
        
        
	public static function dispatch($request){
	
		$controllerName=$request->getCurrentController();
		$controllerClassName=ucfirst($controllerName).'Controller';
		
		
		//Test de sécurité
		if(!class_exists($controllerClassName)){
		
		throw new Exception("$controllerName n'existe pas");
		
		}
		
		
		$controller = new $controllerClassName($request);
		
		return $controller;
	
	}
        
        	public static function getCurrentDispatcher()
	{
		if (!isset(self::$instance)) 
		{
			self::$instance = new self; 
		}
		
		return self::$instance;
	}

}
