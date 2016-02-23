<?php
/*
* Root class of all my classes
*/
class Joueur extends MyObject { 

public $score;
public $couleur;
public $wagonsrRestants=45;
public $joueurCourant=0;

//inclure nombre de wagons dans des association clés/valeurs
public $cartesWagons=array(
    "blanc" => 0,
    "noir" => 0,
    "rouge" => 0,
    "violets" => 0,
    "bleus" => 0,
    "oranges" => 0,
    "jaunes" => 0,
    "verts" => 0,
    "locomotive" => 0,
);

public $cartesDestinations=array();
public $destinationsTerminees=array();




}
