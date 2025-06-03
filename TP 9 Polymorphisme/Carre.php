<?php
require_once 'FormeGeometrique.php';

class Carre extends FormeGeometrique {
    private $cote;

    public function __construct($cote) {
        $this->cote = floatval($cote);
    }

    public function calculerAire() {
        return $this->cote * $this->cote;
    }

    public function getDescription() {
        return "Carré (côté : {$this->cote})";
    }
}
?>