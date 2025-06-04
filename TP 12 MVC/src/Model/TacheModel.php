<?php
class TacheModel {
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['taches'])) {
            $_SESSION['taches'] = [];
        }
    }

    public function ajouterTache($nom, $description) {
        $id = count($_SESSION['taches']) + 1;
        $_SESSION['taches'][$id] = [
            'nom' => $nom,
            'description' => $description
        ];
    }

    public function getTaches() {
        return $_SESSION['taches'];
    }

    public function supprimerTache($id) {
        if (isset($_SESSION['taches'][$id])) {
            unset($_SESSION['taches'][$id]);
        }
    }

    public function modifierTache($id, $nom, $description) {
        if (isset($_SESSION['taches'][$id])) {
            $_SESSION['taches'][$id] = [
                'nom' => $nom,
                'description' => $description
            ];
        }
    }
}
?>