<?php
/*
* Root class of all my classes
*/
class Ville extends Model { 

    public $nom;
    public $jouee;
    
    public function __construct($param) {
     $nom="";
     $jouee=0;
    }
    
    public function jouer(){
        $this->$jouee++;
    }
}
