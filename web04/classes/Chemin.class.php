<?php

class Chemin extends MyObject { 
    
    public $villes=array(
        villeDepart => NULL,
        villeArrivee => NULL,
    );
    public $couleur=array(
        sens1 => NULL,
        sens2 => NULL,
    );
    
    public $doubleSens;
    public $nombreWagons;
    
    public function __construct($villeArray, $couleurArray, $double, $wagons) {
        $this->$villes=$villeArray;
        $this->$couleur=$couleurArray;
        $this->$doubleSens=$double;
        $this->$nombreWagons=$wagons;
    }
    
}

