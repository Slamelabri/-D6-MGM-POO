<?php
class Produit {

    private $nom;
    private $prix;
    private $quantite; 

    public function __construct($nom, $prix) {
        $this->nom = $nom;
        $this->prix = floatval($prix); 
        $this->quantite = 0;
    }


    public function getNom() {
        return $this->nom;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function afficherProduit() {
        return "Produit : {$this->nom}, Prix : {$this->prix} €" . 
               ($this->quantite > 0 ? ", Quantité : {$this->quantite}" : "");
    }


    public function ajouterAuPanier($quantite) {
        if ($quantite > 0) {
            $this->quantite += $quantite;
            return true;
        }
        return false;
    }


    public function getQuantite() {
        return $this->quantite;
    }
}
?>