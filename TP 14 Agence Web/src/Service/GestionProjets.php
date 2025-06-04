<?php
namespace Agence\Service;

use Agence\Model\Project;
use Agence\Model\Developer;
use Agence\Model\Task;

class GestionProjets {
    private array $projets = [];
    private array $developpeurs = [];

    public function ajouterProjet(Project $projet): void {
        $this->projets[$projet->getId()] = $projet;
    }

    public function ajouterDeveloppeur(Developer $developpeur): void {
        $this->developpeurs[$developpeur->getId()] = $developpeur;
    }

    public function assignerTache(Task $tache, Developer $developpeur): void {
        $developpeur->assignTask($tache);
        foreach ($this->projets as $projet) {
            if (in_array($tache, $projet->getTaches(), true)) {
                return;
            }
        }
        if (!empty($this->projets)) {
            reset($this->projets)->addTask($tache);
        }
    }

    public function calculerCoutTotal(): float {
        $total = 0.0;
        foreach ($this->projets as $projet) {
            foreach ($projet->getTaches() as $tache) {
                if ($tache instanceof \Agence\Interface\Billable) {
                    $total += $tache->calculateCost();
                }
            }
        }
        return $total;
    }

    public function getProjets(): array {
        return $this->projets;
    }

    public function getDeveloppeurs(): array {
        return $this->developpeurs;
    }
}
?>