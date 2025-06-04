<?php
namespace Hotel\Strategy;

use Hotel\Interface\StrategiePrix;

class PrixSaisonnier implements StrategiePrix {
    public function calculerPrix(float $prixBase, int $nuits): float {
        // exemple choisi : 10% de réduction général pour les réservations au mois de Juin
        return $prixBase * $nuits * 0.9;
    }
}
?>