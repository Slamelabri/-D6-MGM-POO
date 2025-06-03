<?php
require_once 'Paiement.php';

class PaiementPaypal extends Paiement {
    
    public function effectuerPaiement() {
        return "Paiement via PayPal effectué.";
    }
}
?>