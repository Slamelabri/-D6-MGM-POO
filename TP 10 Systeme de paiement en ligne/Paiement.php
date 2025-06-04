<?php
abstract class Paiement {

    private $montant;

    public function __construct($montant) {
        $this->montant = floatval($montant);
    }

 
    public function afficherMontant() {
        return "Montant a payer : " . number_format($this->montant, 2) . " euros";
    }

   
    abstract public function effectuerPaiement();

   
    public function getMontant() {
        return $this->montant;
    }
}
?>