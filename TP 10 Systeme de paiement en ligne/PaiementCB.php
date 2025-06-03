<?php
require_once 'Paiement.php';

class PaiementCB extends Paiement {
 
    public function effectuerPaiement() {
        return "Paiement par carte bancaire effectué.";
    }
}
?>