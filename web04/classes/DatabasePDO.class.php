<?php

class DatabasePDO extends PDO{

	protected static $instance=NULL;

	
	public function __construct() {
		parent::__construct('mysql:host=localhost;dbname=web04', 'web04', 'sio0ohw');
	}
	
	

	public static function getDB()
	{
		if (!isset(self::$instance)) 
		{
			self::$instance = new self; 
		}
		
		return self::$instance;
	}

}
