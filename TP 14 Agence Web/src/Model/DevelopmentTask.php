<?php
namespace Agence\Model;

use Agence\Interface\Billable;
use Agence\Model\Developer;

class DevelopmentTask extends Task implements Billable {
    private float $heuresEstimees;

    public function __construct(int $id, string $titre, Developer $assigneA, float $heuresEstimees) {
        parent::__construct($id, $titre, $assigneA);
        $this->heuresEstimees = $heuresEstimees;
    }

    public function calculateCost(): float {
        return $this->heuresEstimees * 50; // 50e/heure
    }

    public function getHeuresEstimees(): float {
        return $this->heuresEstimees;
    }
}
?>