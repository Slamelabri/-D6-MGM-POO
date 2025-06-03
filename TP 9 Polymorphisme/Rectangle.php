<?php
require_once 'FormeGeometrique.php';

class Rectangle extends FormeGeometrique {
    private $longueur;
    private $largeur;

    public function __construct($longueur, $largeur) {
        $this->longueur = floatval($longueur);
        $this->largeur = floatval($largeur);
    }

    public function calculerAire() {
        return $this->longueur * $this->largeur;
    }

    public function getDescription() {
        return "Rectangle (longueur : {$this->longueur}, largeur : {$this->largeur})";
    }
}
?>