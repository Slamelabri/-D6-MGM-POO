<?php
require_once __DIR__ . '/../src/Interface/Billable.php';
require_once __DIR__ . '/../src/Exception/TaskAlreadyCompletedException.php';
require_once __DIR__ . '/../src/Model/Project.php';
require_once __DIR__ . '/../src/Model/Task.php';
require_once __DIR__ . '/../src/Model/DevelopmentTask.php';
require_once __DIR__ . '/../src/Model/DesignTask.php';
require_once __DIR__ . '/../src/Model/Developer.php';
require_once __DIR__ . '/../src/Service/GestionProjets.php';

use Agence\Model\Project;
use Agence\Model\Developer;
use Agence\Model\DevelopmentTask;
use Agence\Model\DesignTask;
use Agence\Service\GestionProjets;
use Agence\Exception\TaskAlreadyCompletedException;

// Création gestionnaire
$gestion = new GestionProjets();

// Création développeurs
$dev1 = new Developer(1, "Alice Dupont", ['PHP', 'Symfony', 'JS']);
$dev2 = new Developer(2, "Bob Martin", ['UX', 'Figma']);
$gestion->ajouterDeveloppeur($dev1);
$gestion->ajouterDeveloppeur($dev2);

// Création projets
$projet1 = new Project(1, "Site E-commerce", "Client A", new \DateTime('2025-06-01'), new \DateTime('2025-12-01'));
$projet2 = new Project(2, "Application Mobile", "Client B", new \DateTime('2025-07-01'));
$gestion->ajouterProjet($projet1);
$gestion->ajouterProjet($projet2);

// Création taches
$tache1 = new DevelopmentTask(1, "Développement Backend", $dev1, 20.0);
$tache2 = new DevelopmentTask(2, "Développement Frontend", $dev1, 15.0);
$tache3 = new DesignTask(3, "Maquette UX", $dev2, "Figma");
$tache4 = new DesignTask(4, "Design Graphique", $dev2, "Photoshop");

// Assignation taches
$gestion->assignerTache($tache1, $dev1);
$gestion->assignerTache($tache2, $dev1);
$gestion->assignerTache($tache3, $dev2);
$gestion->assignerTache($tache4, $dev2);

// Compléter une taches
try {
    $tache1->completeTask();
    $tache3->completeTask();
    // Test, compléter tache déja complétée
    $tache1->completeTask();
} catch (TaskAlreadyCompletedException $e) {
    echo "<h2>Erreur de complétion :</h2>";
    echo "Erreur (attendue) : {$e->getMessage()}<br><br>";
}

// Progression projets
echo "<h2>Progression des projets :</h2>";
foreach ($gestion->getProjets() as $projet) {
    echo "Projet {$projet->getNom()} ({$projet->getNomClient()}) : {$projet->getProgress()}% complété<br>";
}

// CDT développeurs
echo "<h2>Charge de travail des développeurs :</h2>";
foreach ($gestion->getDeveloppeurs() as $developpeur) {
    echo "Développeur {$developpeur->getNom()} : {$developpeur->getWorkload()} tache(s) en cours<br>";
}

// Cout final
echo "<h2>Cout total des taches de développement :</h2>";
echo "Cout total : {$gestion->calculerCoutTotal()} €<br>";
?>