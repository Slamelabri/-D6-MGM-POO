<?php
class CompteBancaire {
    private $solde;
    private $titulaire;

    public function __construct($titulaire, $solde = 0.0) {
        $this->titulaire = $titulaire;
        $this->solde = floatval($solde);
    }

    public function depot($montant) {
        if ($montant > 0) {
            $this->solde += floatval($montant);
            return true;
        }
        return false;
    }

    public function retrait($montant) {
        if ($montant > 0 && $this->solde >= $montant) {
            $this->solde -= floatval($montant);
            return true;
        }
        return false;
    }

    public function afficherSolde() {
        return "Solde du compte de {$this->titulaire} : " . number_format($this->solde, 2) . " €";
    }

    public function getTitulaire() {
        return $this->titulaire;
    }

    public function calculerInterets($tauxAnnuel) {
        if ($tauxAnnuel >= 0) {
            $interets = $this->solde * ($tauxAnnuel / 100);
            return "Intérêts calculés (taux {$tauxAnnuel}%): " . number_format($interets, 2) . " €";
        }
        return "Taux d'intérêt invalide";
    }
}
?>
