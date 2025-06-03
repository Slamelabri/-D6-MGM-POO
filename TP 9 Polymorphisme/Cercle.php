<?php
require_once 'FormeGeometrique.php';

class Cercle extends FormeGeometrique {
    private $rayon;

    public function __construct($rayon) {
        $this->rayon = floatval($rayon);
    }

    public function calculerAire() {
        return pi() * $this->rayon * $this->rayon;
    }

    public function getDescription() {
        return "Cercle (rayon : {$this->rayon})";
    }
}
?>