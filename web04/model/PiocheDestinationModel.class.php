<?php

class PiocheDestinationModel extends Model { 

public $pioche;
public $cartesRestantes;

	public function __construct(){
	
            $this->populate();
	
	}

	public function populate(){
	
                        $this->pioche= array(
            array("nom"=>"Los Angeles vers New York City","valeur"=>0,"score"=>21),
            array("nom"=>"Duluth vers Houston","valeur"=>1,"score"=>8),
            array("nom"=>"Sault Ste Marie vers Nashville","valeur"=>2,"score"=>8),
            array("nom"=>"New York vers Atlanta","valeur"=>3,"score"=>6),
            array("nom"=>"Portland vers Nashville","valeur"=>4,"score"=>17),
            array("nom"=>"Vancouver vers Montréal","valeur"=>5,"score"=>20),
            array("nom"=>"Duluth vers El Paso","valeur"=>6,"score"=>10),
            array("nom"=>"Toronto vers Miami","valeur"=>7,"score"=>10),
            array("nom"=>"Portland vers Phoenix","valeur"=>8,"score"=>11),
            array("nom"=>"Dallas vers New York City","valeur"=>9,"score"=>11),
            array("nom"=>"Calgary vers Salt Lake City","valeur"=>10,"score"=>8),
            array("nom"=>"Calgary vers Phoenix","valeur"=>11,"score"=>13),
            array("nom"=>"Los Angeles vers Miami","valeur"=>12,"score"=>20),
            array("nom"=>"Winnipeg vers Little Rock","valeur"=>13,"score"=>11),
            array("nom"=>"San Francisco vers Atlanta","valeur"=>14,"score"=>17),
            array("nom"=>"Kansas City vers Houston","valeur"=>15,"score"=>5),
            array("nom"=>"Los Angeles vers Chicago","valeur"=>16,"score"=>16),
            array("nom"=>"Denver vers Pittsburgh","valeur"=>17,"score"=>11),
            array("nom"=>"Chicago vers Santa Fe","valeur"=>18,"score"=>9),
            array("nom"=>"Vancouver vers Santa Fe","valeur"=>19,"score"=>13),
            array("nom"=>"Boston vers Miami","valeur"=>20,"score"=>12),
            array("nom"=>"Chicago vers New Orleans","valeur"=>21,"score"=>7),
            array("nom"=>"Montreal vers Atlanta","valeur"=>22,"score"=>9),
            array("nom"=>"Seattle vers New York","valeur"=>23,"score"=>22),
            array("nom"=>"Denver vers El Paso","valeur"=>24,"score"=>4),
            array("nom"=>"Helena vers Los Angeles","valeur"=>25,"score"=>8),
            array("nom"=>"Winnipeg vers Houston","valeur"=>26,"score"=>12),
            array("nom"=>"Montreal vers New Orleans","valeur"=>27,"score"=>13),
            array("nom"=>"Sault Ste. Marie vers Oklahoma City","valeur"=>28,"score"=>9),
            array("nom"=>"Seattle vers Los Angeles","valeur"=>29,"score"=>9),
            );
                shuffle($this->pioche);
                $this->cartesRestantes=30;
	}
	
	public function draw(){
		
		if($this->cartesRestantes>0){
			$this->cartesRestantes--;
                        $res=array_shift($this->pioche);
                        $tmp=new DestinationModel($res['nom'],$res['score']);
			return $tmp;
		}		
                return "Pioche vide !";
	}	
	
}
?>