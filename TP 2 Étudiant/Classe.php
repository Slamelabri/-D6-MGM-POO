<?php
require_once 'Etudiant.php';

class Classe {

    private $etudiants;

    public function __construct() {
        $this->etudiants = [];
    }
    public function ajouterEtudiant(Etudiant $etudiant) {
        $this->etudiants[] = $etudiant;
    }

    public function supprimerEtudiant($nom, $prenom) {
        foreach ($this->etudiants as $index => $etudiant) {
            if ($etudiant->getNom() === $nom && $etudiant->getPrenom() === $prenom) {
                unset($this->etudiants[$index]);
                $this->etudiants = array_values($this->etudiants);
                return true;
            }
        }
        return false;
    }


    public function afficherEtudiants() {
        $result = "<h2>Liste des étudiants :</h2>";
        if (empty($this->etudiants)) {
            $result .= "Aucun étudiant.";
        } else {
            foreach ($this->etudiants as $etudiant) {
                $result .= $etudiant->afficherInformations() . "<br><br>";
            }
        }
        return $result;
    }
}
?>