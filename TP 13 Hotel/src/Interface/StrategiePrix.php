<?php
namespace Hotel\Interface;

interface StrategiePrix {
    public function calculerPrix(float $prixBase, int $nuits): float;
}
?>