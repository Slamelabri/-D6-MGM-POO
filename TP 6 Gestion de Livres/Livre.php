<?php
class Livre {

    private $titre;
    private $auteur;
    private $anneePublication;


    public function __construct($titre, $auteur, $anneePublication) {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->anneePublication = intval($anneePublication); 
    }


    public function afficherDetails() {
        return "Titre : {$this->titre}<br>" .
               "Auteur : {$this->auteur}<br>" .
               "Année de publication : {$this->anneePublication}";
    }


    public function getTitre() {
        return $this->titre;
    }

    public function getAuteur() {
        return $this->auteur;
    }

    public function getAnneePublication() {
        return $this->anneePublication;
    }
}
?>