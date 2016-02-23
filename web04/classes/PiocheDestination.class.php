<?php

class PiocheDestination extends MyObject { 

public $pioche;
public $cartesRestantes;

	public function __construct(){
	
		//pioche = array (cartes random)
		$cartesRestantes=30;
	
	}
	
	public function populate(){
	
			//pioche = array (cartes random)
			$cartesRestantes=30;
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
?>