<?php
namespace Agence\Model;

use Agence\Model\Task;

class Developer {
    private int $id;
    private string $nom;
    private array $competences;
    private array $tachesAssignees = [];

    public function __construct(int $id, string $nom, array $competences) {
        $this->id = $id;
        $this->nom = $nom;
        $this->competences = $competences;
    }

    public function assignTask(Task $tache): void {
        $this->tachesAssignees[] = $tache;
        $tache->setAssigneA($this);
    }

    public function getWorkload(): int {
        $tachesNonCompletes = 0;
        foreach ($this->tachesAssignees as $tache) {
            if (!$tache->isCompleted()) {
                $tachesNonCompletes++;
            }
        }
        return $tachesNonCompletes;
    }


    public function getId(): int {
        return $this->id;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getCompetences(): array {
        return $this->competences;
    }

    public function getTachesAssignees(): array {
        return $this->tachesAssignees;
    }
}
?>