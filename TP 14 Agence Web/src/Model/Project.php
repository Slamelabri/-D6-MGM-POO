<?php
namespace Agence\Model;

use Agence\Model\Task;

class Project {
    private int $id;
    private string $nom;
    private string $nomClient;
    private \DateTime $dateDebut;
    private ?\DateTime $dateFin;
    private array $taches = [];

    public function __construct(int $id, string $nom, string $nomClient, \DateTime $dateDebut, ?\DateTime $dateFin = null) {
        $this->id = $id;
        $this->nom = $nom;
        $this->nomClient = $nomClient;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
    }

    public function addTask(Task $tache): void {
        $this->taches[] = $tache;
    }

    public function getProgress(): float {
        if (empty($this->taches)) {
            return 0.0;
        }
        $totalTaches = count($this->taches);
        $tachesCompletes = 0;
        foreach ($this->taches as $tache) {
            if ($tache->isCompleted()) {
                $tachesCompletes++;
            }
        }
        return ($tachesCompletes / $totalTaches) * 100;
    }


    public function getId(): int {
        return $this->id;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getNomClient(): string {
        return $this->nomClient;
    }

    public function getDateDebut(): \DateTime {
        return $this->dateDebut;
    }

    public function getDateFin(): ?\DateTime {
        return $this->dateFin;
    }

    public function getTaches(): array {
        return $this->taches;
    }
}
?>