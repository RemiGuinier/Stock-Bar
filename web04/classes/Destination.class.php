<?php

class Destination extends MyObject { 

public $nom;
public $score;
public $terminee=0;
public $jouee;

    public function __construct($name, $valeur, $state){
        $nom =  $name;
        $score = $valeur;
        $state = $terminee;
    }
    
    public function jouer($param) {
        $this->$terminee=1;
        $this->$jouee++;
    }
    
}
