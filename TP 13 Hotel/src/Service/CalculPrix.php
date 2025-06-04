<?php
namespace Hotel\Service;

use Hotel\Interface\StrategiePrix;

class CalculPrix {
    private StrategiePrix $strategie;

    public function __construct(StrategiePrix $strategie) {
        $this->strategie = $strategie;
    }

    public function calculer(float $prixBase, int $nuits): float {
        return $this->strategie->calculerPrix($prixBase, $nuits);
    }
}
?>