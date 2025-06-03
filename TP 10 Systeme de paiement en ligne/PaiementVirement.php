<?php
require_once 'Paiement.php';

class PaiementVirement extends Paiement {
   
    public function effectuerPaiement() {
        return "Paiement par virement bancaire effectué.";
    }
}
?>