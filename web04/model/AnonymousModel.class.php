<?php

class AnonymousModel extends Model{

	protected static $table_name = 'USER';
	
	public static function isLoginUsed($login){
		
		return count(parent::exec('LOGIN_USED', array(':login' => $login))) != 0;
		
	}
	
	
	
	public static function tryLogin($login, $pwd){
		$sth = parent::exec('USER_LOGIN',
		array( ':login' => $login,
		':password' => $pwd));	
		
		//var_dump($sth);
		//var_dump($sth[0]);
		//var_dump($sth[0]->PSEUDO);
		
		if(count($sth) > 0)
		{
			$user = $sth[0];
			
			$_SESSION['nom'] = $user->PSEUDO;
			$_SESSION['password'] = $user->PASSWORD;
			$_SESSION['email'] = $user->EMAIL;
			$_SESSION['login'] = $user->LOGIN;
			return $user;
			

		}

		return NULL;
	}
	
	public static function getBestUsers(){
		return self::exec('MEILLEURS_COMPTES',NULL); 
	}
        
        public static function getPartieEnCours(){
		return self::exec('NOMBRE_PARTIES_EN_COURS',NULL);
                
	}
        public static function getPartieTerminees(){
                 
		 return self::exec('NOMBRE_PARTIES_TERMINEES',NULL);
                 
		
	}
	
}