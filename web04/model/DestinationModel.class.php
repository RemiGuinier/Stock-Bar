<?php

class DestinationModel extends MyObject {

    public $nom;
    public $score;
    public $terminee = 0;
    public $jouee;
    public $discarded = 0;

    public function __construct($name, $valeur) {
        $this->nom = $name;
        $this->score = $valeur;
    }

    public function terminee() {
        if($this->terminee!=1){
        $this->terminee = 1;
        $this->jouee++;
        return "Destination "+$this->nom+" terminée !";
        }
        return "Erreur : destination "+$this->nom+" déja terminée !";
    }

    public function getScore() {
        if ($this->terminee == 0 && $this->discarded == 0) {
            return (-$score);
        }
        if ($this->terminee == 0 && $this->discarded == 1) {
            return 0;
        }
        if ($this->terminee == 1 && $this->discarded == 0) {
            return ($score);
        }
    }

    public function discard() {
        if ($this->terminee == 0) {
            $this->discarded = 1;
            return "Destination " + $this->nom + " abandonée";
        }
        return "Erreur lors de l'abandon de la destination";
    }

}
