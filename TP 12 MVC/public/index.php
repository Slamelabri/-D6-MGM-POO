<?php
require_once __DIR__ . '../../config/config.php';
require_once __DIR__ . '../../src/Controller/TacheController.php';
require_once __DIR__ . '../../src/View/TacheVue.php';

$controller = new TacheController();
$vue = new TacheVue();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'ajouter':
                $controller->ajouterTache($_POST['nom'], $_POST['description']);
                break;
            case 'supprimer':
                $controller->supprimerTache($_POST['id']);
                break;
            case 'modifier':
                $controller->modifierTache($_POST['id'], $_POST['nom'], $_POST['description']);
                break;
        }
    }
}

$taches = $controller->getTaches();
$vue->afficherTaches($taches);
?>