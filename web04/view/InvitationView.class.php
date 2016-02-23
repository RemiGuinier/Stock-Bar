<?php

class InvitationView extends View {

    protected $args;
    protected $templateName;

    public function __construct($controller, $templateName, $args = array()) {

        $this->templateNames = array();
        $this->templateNames['head'] = 'head';
        $this->templateNames['top'] = 'top';
        $this->templateNames['menu'] = 'menuJeu';
        $this->templateNames['foot'] = 'foot';
        $this->templateNames['content'] = $templateName;
        $this->args = $args;
        $this->args['controller'] = $controller;
    }

    public function createTabParties($sth) {
        if (count($sth) > 0) {
            echo '<table class="table"><thead>';

            echo '<tr><th>', implode('</th><th>', array("Numéro de Partie", "Créateur de la Partie", "Nombre de Joueurs", "Date de création", "Rejoindre ?")), '</th></tr></thead></tbody>';

            for ($i = 0; $i < count($sth) - 1; $i++) {
                echo '<tr><td>', implode('</td><td>', array($sth[$i]->ID_PARTIE, $sth[$i]->LOGIN, $sth[$i]->NOMBRE_DE_JOUEURS, $sth[$i]->DATE_CREATION, "Inserer deux boutons ici controller=jeu&action=join&numero=12 envoyer sessionlogin ou supprimer")), '</td></tr>';
            }

            echo '</table>';
        }
    }

}
