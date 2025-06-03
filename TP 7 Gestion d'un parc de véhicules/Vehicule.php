<?php
class Vehicule {

    private $marque;
    private $modele;
    private $annee;
    private $kilometrage;
    private $dernierEntretien;

    public function __construct($marque, $modele, $annee, $kilometrage) {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->annee = intval($annee);
        $this->kilometrage = floatval($kilometrage);
        $this->dernierEntretien = null;
    }


    public function afficherInfos() {
        return "Marque : {$this->marque}<br>" .
               "Modèle : {$this->modele}<br>" .
               "Année : {$this->annee}<br>" .
               "Kilométrage : {$this->kilometrage} km";
    }

    
    public function programmerEntretien($date) {
        
        $dateAss = date_create($date);
        if ($dateAss) {
            $this->dernierEntretien = $dateAss->format('d/m/Y');
            return true;
        }
        return false;
    }

    public function afficherProchainEntretien() {
        if ($this->dernierEntretien === null) {
            return "Aucun entretien programmé pour ce véhicule.";
        }

        $dateParts = explode('/', $this->dernierEntretien);
        $anneeSuivante = intval($dateParts[2]) + 1;
        $prochainEntretien = "{$dateParts[0]}/{$dateParts[1]}/{$anneeSuivante}";
        return "Prochain entretien prévu le : {$prochainEntretien}";
    }

    public function getMarque() {
        return $this->marque;
    }

    public function getModele() {
        return $this->modele;
    }
}
?>