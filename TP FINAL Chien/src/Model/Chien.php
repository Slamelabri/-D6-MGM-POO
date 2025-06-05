<?php
namespace Chiens\Model;

use Chiens\Interface\Animal;

class Chien implements Animal {
    private string $nom;
    private int $age;
    private string $race;
    private string $couleur;
    private string $sexe;
    private float $poids;

    public function __construct(string $nom, int $age, string $race, string $couleur, string $sexe, float $poids) {
        $this->nom = $nom;
        $this->age = $age;
        $this->race = $race;
        $this->couleur = $couleur;
        $this->sexe = $sexe;
        $this->poids = $poids;
    }

    public function afficherDetails(): string {
        return "Nom : {$this->nom}<br>" .
               "Age : {$this->age} ans ({$this->calculerAgeHumain()} ans humains)<br>" .
               "Race : {$this->race}<br>" .
               "Couleur : {$this->couleur}<br>" .
               "Sexe : {$this->sexe}<br>" .
               "Poids : {$this->poids} kg (" . ($this->estEnSurpoids() ? "Surpoids" : "Poids normal") . ")";
    }

    public function calculerAgeHumain(): int {
        return $this->age * 7;
    }

    public function crier(): string {
        return "Crie de chien normal";
    }

    public function estEnSurpoids(): bool {
        return $this->poids > 20;
    }


    public function getNom(): string {
        return $this->nom;
    }

    public function getAge(): int {
        return $this->age;
    }

    public function getRace(): string {
        return $this->race;
    }

    public function getCouleur(): string {
        return $this->couleur;
    }

    public function getSexe(): string {
        return $this->sexe;
    }

    public function getPoids(): float {
        return $this->poids;
    }


    public function setAge(int $age): void {
        $this->age = $age;
    }

    public function setRace(string $race): void {
        $this->race = $race;
    }

    public function setCouleur(string $couleur): void {
        $this->couleur = $couleur;
    }

    public function setSexe(string $sexe): void {
        $this->sexe = $sexe;
    }

    public function setPoids(float $poids): void {
        $this->poids = $poids;
    }
}
?>