<?php
class Etudiant {

    private $nom;
    private $prenom;
    private $notes;


    public function __construct($nom, $prenom) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->notes = [];
    }

    public function ajouterNote($note) {
        if (is_numeric($note) && $note >= 0 && $note <= 20) {
            $this->notes[] = floatval($note);
            return true;
        }
        return false;
    }

    public function getNotes() {
        return $this->notes;
    }

    public function calculerMoyenne() {
        if (empty($this->notes)) {
            return 0;
        }
        return array_sum($this->notes) / count($this->notes);
    }

    public function afficherInformations() {
        $notes = implode(", ", $this->notes);
        $moyenne = $this->calculerMoyenne();
        return "Étudiant : {$this->prenom} {$this->nom}<br>" .
               "Notes : " . ($notes ?: "Aucune note") . "<br>" .
               "Moyenne : " . number_format($moyenne, 2) . "/20";
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }
}
?>