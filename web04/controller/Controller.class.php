<?php



abstract class Controller extends MyObject{

	

	public function __construct($request){
	
		$currentRequest=$request;
	
	}

	public abstract function defaultAction();
	
	public function execute(){
	
			
		if(isset($_GET['action'])){
			$methode=$_GET['action'];
		}
			
		else{
			$methode='defaultAction';
		}
		$this->$methode();
	
	}
	
}
