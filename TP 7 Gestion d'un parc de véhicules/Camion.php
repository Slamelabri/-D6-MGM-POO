<?php
require_once 'Vehicule.php';

class Camion extends Vehicule {
 
    private $poidsMax;
    private $chargeActuelle;

    // Constructeur
    public function __construct($marque, $modele, $annee, $kilometrage, $poidsMax) {
        parent::__construct($marque, $modele, $annee, $kilometrage);
        $this->poidsMax = floatval($poidsMax);
        $this->chargeActuelle = 0.0;
    }


    public function afficherInfos() {
        return parent::afficherInfos() . "<br>" .
               "Poids maximum : {$this->poidsMax} kg<br>" .
               "Charge actuelle : {$this->chargeActuelle} kg";
    }


    public function charger($poids) {
        $poids = floatval($poids);
        if ($poids <= 0) {
            return "Erreur : Le poids à charger doit être positif.";
        }
        if ($this->chargeActuelle + $poids > $this->poidsMax) {
            return "Erreur : La charge de {$poids} kg dépasse le poids maximum de {$this->poidsMax} kg.";
        }
        $this->chargeActuelle += $poids;
        return "Succès : {$poids} kg chargés. Charge actuelle : {$this->chargeActuelle} kg.";
    }
}
?>