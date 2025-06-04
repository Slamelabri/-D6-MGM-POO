<?php
namespace Agence\Model;

use Agence\Model\Developer;

class DesignTask extends Task {
    private string $outilUtilise;

    public function __construct(int $id, string $titre, Developer $assigneA, string $outilUtilise) {
        parent::__construct($id, $titre, $assigneA);
        $this->outilUtilise = $outilUtilise;
    }

    public function getOutilUtilise(): string {
        return $this->outilUtilise;
    }
}
?>