<?php
require_once 'Vehicule.php';

class Voiture extends Vehicule {
    private $nombrePortes;
    public function __construct($marque, $modele, $annee, $kilometrage, $nombrePortes) {
        parent::__construct($marque, $modele, $annee, $kilometrage); 
        $this->nombrePortes = intval($nombrePortes);
    }


    

    public function afficherInfos() {
        return parent::afficherInfos() . "<br>" .
               "Nombre de portes : {$this->nombrePortes}";
    }
}
?>