<?php
/*
* Root class of all my classes
*/
class Ville extends MyObject { 

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
