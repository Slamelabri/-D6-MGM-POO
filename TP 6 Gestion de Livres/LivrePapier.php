<?php
require_once 'Livre.php';

class LivrePapier extends Livre {
   
    private $nombrePages;
    private $estEmprunte; 
  
    public function __construct($titre, $auteur, $anneePublication, $nombrePages) {
        parent::__construct($titre, $auteur, $anneePublication); 
        $this->nombrePages = intval($nombrePages); 
        $this->estEmprunte = false; 
    }


    public function afficherDetails() {
        return parent::afficherDetails() . "<br>" .
               "Nombre de pages : {$this->nombrePages}" .
               ($this->estEmprunte ? "<br>Statut : Emprunté" : "<br>Statut : Disponible");
    }


    public function emprunter() {
        if ($this->estEmprunte) {
            return "Erreur : Le livre '{$this->getTitre()}' est déjà emprunté.";
        }
        $this->estEmprunte = true;
        return "Succès : Le livre '{$this->getTitre()}' a été emprunté.";
    }
}
?>