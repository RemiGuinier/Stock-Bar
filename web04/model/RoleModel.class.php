<?php

class RoleModel extends Model{

	public function getWithId($int){
	
		switch ($int){
		
		case 1:
		return 'User';
		break;
		
		case 2:
		return 'Admin';
		break;
		
		case 3:
		return 'Super Admin';
		break;
		
		default:
		return 'Utilisateur Non Enregistré';
		
		}
	}
	
	public function isAdmin($int){
	
		if ($int==2 || $int==3){
		return true;
		}
	
		return false;
	
	}
	
	public function isSuperAdmin($int){
	
		if ($int==3){
		return true;
		}
	
		return false;
	
	}
	
}