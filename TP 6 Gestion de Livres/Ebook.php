<?php
require_once 'Livre.php';

class Ebook extends Livre {
    // Propriété spécifique
    private $format;
    private $estEmprunte; // Pour la gestion de l'emprunt (bonus)

    // Constructeur
    public function __construct($titre, $auteur, $anneePublication, $format) {
        parent::__construct($titre, $auteur, $anneePublication); // Appeler le constructeur parent
        $this->format = $format;
        $this->estEmprunte = false; // Initialiser l'état d'emprunt
    }

    // Redéfinition de la méthode afficherDetails (polymorphisme)
    public function afficherDetails() {
        return parent::afficherDetails() . "<br>" .
               "Format : {$this->format}" .
               ($this->estEmprunte ? "<br>Statut : Emprunté" : "<br>Statut : Disponible");
    }

    // Méthode bonus : emprunter le livre
    public function emprunter() {
        if ($this->estEmprunte) {
            return "Erreur : L'ebook '{$this->getTitre()}' est déjà emprunté.";
        }
        $this->estEmprunte = true;
        return "Succès : L'ebook '{$this->getTitre()}' a été emprunté.";
    }
}
?>