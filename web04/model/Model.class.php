<?php
/*
* Root class des modèles
*/
class Model extends MyObject{
	
	protected $proprietes;
	protected static $queries = array();

	public function __construct($proprietes = array()){
		
		$this->proprietes = $proprietes;
		
	}

	public function __get($prop){
		
		return $this->proprietes[$prop];

	}

	public function __set($prop, $val){
		
		$this->proprietes[$prop] = $val;
		
	}
	
	public function __isset($prop) {
		
		return isset($this->proprietes[$prop]);

	}
	
	protected static function db(){
		return DatabasePDO::getDB();
	} 

	protected static function query($sql){
		$st = static::db()->prepare($sql) or die("sql query error ! request : " . $sql);
		$st->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
		return $st;
	}
	
	public static function addSqlQuery($id,$request){
		
		static::$queries[$id]=$request;
		
	}
	
	public static function exec($request, $params){
		
		$preparedQuery = static::query(static::$queries[$request]);
		//var_dump($preparedQuery);
		$preparedQuery->execute($params);
		//print_r($preparedQuery->errorInfo());
		return $preparedQuery->fetchAll();
		
	}
	
	public static function getBestUsers(){
		return $sth=self::exec('MEILLEURS_COMPTES',NULL);
	}
}
