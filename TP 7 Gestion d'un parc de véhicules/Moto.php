<?php
require_once 'Vehicule.php';

class Moto extends Vehicule {

    private $cylindree;


    public function __construct($marque, $modele, $annee, $kilometrage, $cylindree) {
        parent::__construct($marque, $modele, $annee, $kilometrage); 
        $this->cylindree = intval($cylindree);
    }


    public function afficherInfos() {
        return parent::afficherInfos() . "<br>" .
               "Cylindrée : {$this->cylindree} cc";
    }
}
?>