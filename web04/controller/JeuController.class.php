<?php

class JeuController extends Controller {

//$numeroJoueur=numéro du joueur dans la partie !
//CREER FONCTION PUBLIQUE PRIVEE POUR VERIFIER LES INVITATIONS
    
    public function __construct($request) {

        parent::__construct($request);
        $userId = NULL;
        if (($request->has('user')))
            $userId = $request->read('user');
        if (!is_null($userId))
            $this->user = User::getWithId($userId);
    }

    //----------------------------------------------------------
    //                 Creation de la partie
    //----------------------------------------------------------
    
    public function create($loginJoueur, $invitations) {
        PartieModel::createBlankGameInDB($numeroPartie, $idJoueur);
        
        foreach ($invitations as $key => $value) {
            PartieModel::createInvitationDB($numeroPartie, $invitations[$key]);
        }
        
        $view = new JeuView($this, 'plateau');
        $view->render();
    }
    
    //----------------------------------------------------------
    //                   Fonctions d'acces
    //----------------------------------------------------------
    
    public function quit($numeroPartie, $idJoueur) {
        PartieModel::quit($numeroPartie, $idJoueur);
        //execute quitter la partie		
    }

    public function join($numeroPartie, $idJoueur) {
        //verifier que le joueur courant est bien dans la table invitations
        PartieModel::verifiyInvit($numeroPartie, $idJoueur);
        PartieModel::joinGame($numeroPartie);
        PartieModel::deleteInvitationDB($numeroPartie, $idJoueur);
        $view = new JeuResumeView($this, 'ResumePartie', $numeroPartie);
        $view->render();
    }

    public function play($numeroPartie) {

        $view = new JeuView($this, 'Jeu', $numeroPartie);
        $view->render();
    }
    
    public function abandon($numeroPartie) {
        PartieModel::abandonGame($numeroPartie, $_SESSION['login']);
        $view = new JeuResumeView($this, 'abandon', $numeroPartie);
        $view->render();
    }
    
    //----------------------------------------------------------
    //                   Fonctions de jeu
    //----------------------------------------------------------
    
    public function chooseColor($numeroPartie, $couleur) {
        //vérifie que la couleur est dispo et modifie dans la DB 
        PartieModel::chooseColor($numeroPartie, $couleur);
    }

    public function drawCachee($numeroPartie, $numeroJoueur) {
        //Pioche une carte random et modifie dans la DB 
        PartieModel::drawCachee($numeroPartie, $numeroJoueur);
        $this->joueurSuivant();
    }

    public function drawDestination($numeroPartie, $numeroJoueur) {
        //Pioche une carte random et modifie dans la DB 
        PartieModel::drawDestination($numeroPartie, $numeroJoueur);
        $this->joueurSuivant();
    }

    public function discardDestination($numeroPartie, $numeroJoueur) {
        //Pioche une carte random et modifie dans la DB 
        PartieModel::discardDestination($numeroPartie, $numeroJoueur);
        $this->joueurSuivant();
    }

    public function drawWagonVisible($numeroPartie, $numeroJoueur, $couleur) {
        //Pioche une carte random et modifie dans la DB 
        PartieModel::drawWagonVisible($numeroPartie, $numeroJoueur, $couleur);
        $this->joueurSuivant();
    }

    public function joueurSuivant($numeroPartie) {

        PartieModel::joueurSuivant($numeroPartie);
        $this->saveState($numeroPartie);
    }

    public function jouerChemin($numeroPartie, $numeroJoueur, $couleur, $chemin) {
        //Pioche une carte random et modifie dans la DB 
        PartieModel::jouerChemin($numeroPartie, $numeroJoueur, $couleur, $chemin);
        $this->joueurSuivant();
    }

    
    
    //----------------------------------------------------------
    //                   Fonctions de controle
    //----------------------------------------------------------
    
    public function calculerScores($numeroPartie) {
        //a utiliser en partie pour recapituler les scores
        PartieModel::calculerScores($numeroPartie);
    }

    public function endGame($numeroPartie) {
        PartieModel::setGagnant($numeroPartie);
        PartieModel::endGame($numeroPartie);

        $view = new JeuResumeView($this, 'FinDePartie', $numeroPartie);
        $view->render();
    }
    
    //----------------------------------------------------------
    //                  Fonctions de sauvegarde  
    //----------------------------------------------------------

    public function saveState($numeroPartie) {
            //Update le score les wagons et les stats
            PartieModel::updateDBJoueurCourant();
            PartieModel::updateDBPioches();
            PartieModel::updateDBChemins();
            PartieModel::updateDBDestinations();
        }

    // action
    public function game($args) {
        $v = new UserView($this->user);
        $v->renderGame();
    }

    public function defaultAction() {

        $view = new JeuView($this, 'plateau');
        $view->render();
    }
    
}
