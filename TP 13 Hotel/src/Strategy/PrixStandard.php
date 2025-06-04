<?php
namespace Hotel\Strategy;

use Hotel\Interface\StrategiePrix;

class PrixStandard implements StrategiePrix {
    public function calculerPrix(float $prixBase, int $nuits): float {
        return $prixBase * $nuits;
    }
}
?>