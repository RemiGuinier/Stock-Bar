<?php
/*
* Root class of all my classes
*/
class JoueurModel extends Model { 

public $score;
public $couleur;
public $wagonsRestants;
public $estJoueurCourant;
public $nom;
public $countPioche;
public $numero;

//inclure nombre de wagons dans des association clés/valeurs
public $cartesWagons;

public $cartesDestinations=array();
public $destinationsTerminees=array();

    public function __construct($nomChoisi, $couleurChoisie) {
        
        $this->cartesWagons= array(
            "blanc" => 0,
            "noir" => 0,
            "rouge" => 0,
            "violet" => 0,
            "bleu" => 0,
            "orange" => 0,
            "jaune" => 0,
            "vert" => 0,
            "locomotive" => 0,
        );
        $this->cartesDestinations=array();
        $this->destinationsTerminees=array();
        $this->wagonsRestants=45;
        $this->estJoueurCourant=0;
        $this->score=0;
        $this->couleur=$couleurChoisie;
        $this->nom=$nomChoisi;
    
        
    }


}
