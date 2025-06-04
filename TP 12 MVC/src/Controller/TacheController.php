<?php
require_once __DIR__ . '/../Model/TacheModel.php';

class TacheController {
    private $model;

    public function __construct() {
        $this->model = new TacheModel();
    }

    public function ajouterTache($nom, $description) {
        if (!empty($nom)) {
            $this->model->ajouterTache($nom, $description);
        }
    }

    public function getTaches() {
        return $this->model->getTaches();
    }

    public function supprimerTache($id) {
        $this->model->supprimerTache($id);
    }

    public function modifierTache($id, $nom, $description) {
        if (!empty($nom)) {
            $this->model->modifierTache($id, $nom, $description);
        }
    }
}
?>