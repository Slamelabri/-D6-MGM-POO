<?php
namespace Agence\Model;

use Agence\Model\Developer;
use Agence\Exception\TaskAlreadyCompletedException;

abstract class Task {
    private int $id;
    private string $titre;
    private Developer $assigneA;
    private bool $estComplete = false;

    public function __construct(int $id, string $titre, Developer $assigneA) {
        $this->id = $id;
        $this->titre = $titre;
        $this->assigneA = $assigneA;
    }

    public function completeTask(): void {
        if ($this->estComplete) {
            throw new TaskAlreadyCompletedException("La tache '{$this->titre}' est déja complétée.");
        }
        $this->estComplete = true;
    }

    public function isCompleted(): bool {
        return $this->estComplete;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getTitre(): string {
        return $this->titre;
    }

    public function getAssigneA(): Developer {
        return $this->assigneA;
    }

    public function setAssigneA(Developer $developpeur): void {
        $this->assigneA = $developpeur;
    }
}
?>