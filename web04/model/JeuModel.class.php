<?php

class JeuModel extends Model {
    public $partie;
    
    //CODER UNE FONCTION QUI VERIFIE QU'ON JOUE BIEN DANS LA BONNE PARTIE AVEC UNE VARIABLE DE SESSION !
    public function verify($partie){
        return ($partie==$_SESSION['PARTIE']);
    }
    
    public function verifyWagons($partie){
        //si moins de 3 wagons, dernier tour pour tous
    }
    
}
