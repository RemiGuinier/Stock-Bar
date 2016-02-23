<?php

class Partie extends MyObject {

// Variables de partie
public $piocheDestination;
public $piocheWagon;
public $joueurCourant;

public $cartesWagonsVisibles=array(
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

// Statut partie
public $enCours;
public $terminee;

// Statistiques
public $locomotivesJouees;
public $destinationsJouees;
public $nombreJoueurs;

// Tableau des joueurs
public $joueurs = array();





 }
