<?php

class Chemin extends MyObject { 
    
    public $villes=array(
        villeDepart => NULL,
        villeArrivee => NULL,
    );
    public $couleur;
    
    public $nombreWagons;
    
    public function __construct($villeArray, $couleur, $wagons) {
        $this->$villes=$villeArray;
        $this->$couleur=$couleur;
        $this->$nombreWagons=$wagons;
    }
    
}

