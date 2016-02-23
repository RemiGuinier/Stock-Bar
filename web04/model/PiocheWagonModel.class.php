<?php
/*
* Root class of all my classes
*/
class PiocheWagonModel extends Model { 

	public $pioche;
	public $cartesRestantes;

	public function __construct(){
		
		//pioche = array (cartes random)
		$cartesRestantes=110;
		
	}

	public function populate(){
	
			//pioche = array (cartes random)
			$cartesRestantes=110;
	}
	
	public function draw(){
		
		if($cartesRestantes>0){
			$cartesRestantes--;
			return array_pop(array_reverse($pioche));
		}
		
		else{
			self::populate();
			self::draw();
		}
		
		
	
	}
}
