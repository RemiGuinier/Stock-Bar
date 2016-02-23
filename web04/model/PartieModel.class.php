<?php

class PartieModel extends Model {

// Variables de partie
    public $piocheDestination;
    public $piocheWagon;
    public $joueurCourant;
    public $numeroPartie;
    public $cartesWagonsVisibles;
// Statut partie
    public $enCours;
    public $terminee;
// Statistiques
    public $locomotivesJouees;
    public $destinationsJouees;
    public $destinationsPiochees;
    public $nombreJoueurs;
// Tableau des joueurs
    public $joueurs = array();

    public function __construct() {

        $this->cartesWagonsVisibles = array(
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
        $this->joueurs = array();
        $this->locomotivesJouees = 0;
        $this->destinationsJouees = 0;
        $this->nombreJoueurs = 0;
        $this->enCours = 0;
        $this->terminee = 0;
        $this->piocheDestination = new PiocheDestinationModel();
        $this->piocheWagon = NULL;
        $this->joueurCourant = 0;
    }

    public function create($arrayJoueurs) {
        
        $i = 0;
        //creation des joueurs
        for ($i = 0; $i < count($arrayJoueurs); $i++) {
            //ajoute a la fin du array joueur le joueur courant de la liste
            $res=new JoueurModel($arrayJoueurs[$i]->nom, $arrayJoueurs[$i]->couleur);
            
            $this->joueurs[]=$res;
            //Donne 4 wagons aux joueurs
            $tmp=$this->randomWagon();
            $this->joueurs[$i]->cartesWagons[$tmp]++;
            $this->joueurs[$i]->cartesWagons[$this->randomWagon()]++;
            $this->joueurs[$i]->cartesWagons[$this->randomWagon()]++;
            $this->joueurs[$i]->cartesWagons[$this->randomWagon()]++;
            
        }

        //construction des cartes visibles
        $this->remplirCartesVisibles();
        $this->verifierCartesVisibles();
        

        //Distribution des destinations
        $this->distribuerDestination();
        var_dump($this->joueurs);
        
        $this->definePremierJoueur();
        }

    //----------------------------------------------------------
    //                  Initialisation Wagons
    //----------------------------------------------------------
    //implementer algorithme de controle de randomness

    public function randomWagon() {
        $couleurWagons = array('blanc', 'noir', 'rouge', 'violet', 'bleu', 'orange', 'jaune', 'vert', 'locomotive');
        $i = rand(0, 8);
        return $couleurWagons[$i];
    }

    public function remplirCartesVisibles() {
        while (array_sum($this->cartesWagonsVisibles) < 5) {
            $this->cartesWagonsVisibles[$this->randomWagon()] ++;
        }
    }

    public function viderCartesVisibles() {
        
        foreach ($this->cartesWagonsVisibles as $key => $value) {
            
        $this->cartesWagonsVisibles[$key] = 0;
        }
    }

    public function verifierCartesVisibles() {
        if ($this->cartesWagonsVisibles["locomotive"] > 2) {
            $this->viderCartesVisibles();
            $this->remplirCartesVisibles();
            $this->verifierCartesVisibles();
        }
    }

    //----------------------------------------------------------
    //               Initialisations Destinations
    //----------------------------------------------------------

    public function remplirPileDestination() {
        $piocheDestination = new PiocheDestination();
    }

    public function distribuerDestination() {
        for ($i = 0; $i < count($this->joueurs); $i++) {
            //pour chaque joueur
            for ($j = 0; $j < 3; $j++) {
                //piocher 3 destinations
                $this->piocherDestination($i);
            }
        }
    }

    //----------------------------------------------------------
    //              Determination variables parties
    //----------------------------------------------------------

    public function definePremierJoueur() {
        
        $this->joueurCourant = rand(0, count($this->joueurs) - 1);
        $this->joueurs[$this->joueurCourant]->estJoueurCourant=1;
    }

    public function changeJoueur() {
        $this->joueurs[$this->joueurCourant]->estJoueurCourant=0;
        if ($this->joueurCourant == (count($this->joueurs) - 1)) {
            $this->joueurCourant = 0;
        } else {
            $this->joueurCourant++;
        }
        $this->joueurs[$this->joueurCourant]->estJoueurCourant=1;
        $this->newTour($this->joueurCourant);
    }

    //----------------------------------------------------------
    //                       Action joueurs
    //----------------------------------------------------------
    //
    //----------------------------------------------------------
    //                       Pioche Wagons
    //----------------------------------------------------------

    public function piocherWagonCache($numeroJoueur) {
        $res=$this->randomWagon();
        var_dump($res);
        var_dump($numeroJoueur);
        $this->joueurs[$numeroJoueur]->cartesWagon[$res]++;
    }

    public function piocherWagonVisible($numeroJoueur, $couleurWagon) {
        if ($this->cartesWagonsVisibles[$couleurWagon] > 0) {
            $this->cartesWagonsVisibles[$couleurWagon] --;
            $this->joueurs[$numeroJoueur]->$cartesWagon[$couleurWagon] ++;
            $this->remplirCartesVisibles();
            return $couleurWagon;
            //controle de pioche de locomotive via piocherAction 
        }
        return "Erreur, pas de wagon de couleur "+$couleurWagon;
    }

    public function piocherAction($numeroJoueur, $couleurWagon) {
        //gere la pioche de locomotive
        if ($this->joueurs[$numeroJoueur]->countPioche < 2) {

            if ($couleurWagon != "locomotive") {
                $res = piocherWagonVisible($numeroJoueur, $couleurWagon);
                $this->joueurs[$numeroJoueur]->countPioche++;
                return "Pioche de wagon " + $couleurWagon + " effectuée";
            }

            if ($couleurWagon == "locomotive" && $this->joueurs[$numeroJoueur]->countPioche = 0) {
                $res = piocherWagonVisible($numeroJoueur, $couleurWagon);
                $this->joueurs[$numeroJoueur]->countPioche = 2;
                return "Pioche de locomotive effectuée";
            }
            return "Erreur de pioche";
        }
    }

    // Réinitialisation de la pioche et changement de joueur courant
    public function newTour($numeroJoueur) {
        $this->joueurs[$numeroJoueur]->countPioche = 0;
        $this->joueurs[$numeroJoueur]->estJoueurCourant = 1;
    }

    //----------------------------------------------------------
    //                   Pioche Destinations
    //----------------------------------------------------------

    public function piocherDestination($numeroJoueur) {
        $res=$this->piocheDestination->draw();
        
        array_push($this->joueurs[$numeroJoueur]->cartesDestinations, $res);
        $this->incrementerDestinationPiochees();
    }

    public function discardDestination($numeroJoueur, $numeroDestination){
        $this->joueurs[$numeroJoueur]->$cartesDestinations[$numeroDestination]->discard();
    }
    
    //----------------------------------------------------------
    //                      Jouer wagons
    //----------------------------------------------------------
    
    public function jouerChemin($numeroJoueur, $numeroChemin){
        if ($this->chemins[$numeroChemin]->rempli!=1){
            if($this->chemins[$numeroChemin]->couleur=="gris"){
                $this->remplirCheminIncolore($numeroJoueur, $numeroChemin, $this->chemins[$numeroChemin]->couleur);
            }
            else{
                $this->remplirCheminColore($numeroJoueur, $numeroChemin);
            }
        }
    }
    
    public function remplirCheminIncolore($numeroJoueur, $numeroChemin,$couleur){
        //si l'array couleurs possibles ne contient pas couleur rien, sinon
        remplirCheminColore($numeroJoueur, $numeroChemin, $couleur);
    }
    
    public function couleursPossibles($numeroJoueur, $numeroChemin) {
        foreach ($this->joueurs[$numeroJoueur]->$cartesWagon as $key => $value) {
        $res=array();    
        if($this->joueurs[$numeroJoueur]->$cartesWagon[$key]+$this->joueurs[$numeroJoueur]->$cartesWagon["locomotive"]>=$this->chemins[$numeroChemin]->nombreWagons){
            array_push($res, $key);
        }
        }
    //return les couleurs qui peuvent paver un chemin 
        return $res;
    }
    
    public function remplirCheminColore($numeroJoueur, $numeroChemin, $couleur){
        if($this->joueurs[$numeroJoueur]->$cartesWagon[$couleur]+$this->joueurs[$numeroJoueur]->$cartesWagon["locomotive"]>=$this->chemins[$numeroChemin]->nombreWagons){
           $retire=min($this->joueurs[$numeroJoueur]->$cartesWagon[$couleur],$this->chemins[$numeroChemin]->nombreWagons);
           
           $this->joueurs[$numeroJoueur]->$cartesWagon["locomotive"]=$this->joueurs[$numeroJoueur]->$cartesWagon["locomotive"]-($this->chemins[$numeroChemin]->nombreWagons-$retire);
           $this->joueurs[$numeroJoueur]->$cartesWagon[$couleur]=$this->joueurs[$numeroJoueur]->$cartesWagon[$couleur]-$retire;
           
           $this->addScoreWagons($numeroJoueur, $this->chemins[$numeroChemin]->nombreWagons);
           $this->chemins[$numeroChemin]->rempli=1;
        }
        
    }
    
    public function addScoreWagons($numeroJoueur, $nombreWagons){
        switch ($nombreWagons) {
    case 1:
        $this->joueurs[$numeroJoueur]->score+=1;
        break;
    case 2:
        $this->joueurs[$numeroJoueur]->score+=2;
        break;
    case 3:
        $this->joueurs[$numeroJoueur]->score+=4;
        break;
    case 4:
        $this->joueurs[$numeroJoueur]->score+=7;
        break;
    case 5:
        $this->joueurs[$numeroJoueur]->score+=10;
        break;
    case 6:
        $this->joueurs[$numeroJoueur]->score+=15;
        break;
    
    default:
                                }
    }
    
    public function addScoreDestination($numeroJoueur, $numeroDestination){
        $this->joueurs[$numeroJoueur]->score+=$this->joueurs[$numeroJoueur]->destination[$numeroDestination]->score;
    }
    
    //----------------------------------------------------------
    //                      Statistiques
    //----------------------------------------------------------

    public function incrementerDestinationPiochees() {
        $this->destinationsPiochees++;
    }
    
    public function incrementerDestinationJouees() {
        $this->destinationsJouees++;
    }
    
    public function incrementerLocomotiveJouees() {
        $this->locomotivesJouees++;
    }
    
    }
