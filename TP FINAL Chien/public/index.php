<?php
require_once __DIR__ . '/../src/Interface/Animal.php';
require_once __DIR__ . '/../src/Exception/ChienNonTrouveException.php';
require_once __DIR__ . '/../src/Model/Chien.php';
require_once __DIR__ . '/../src/Model/ChienDeChasse.php';
require_once __DIR__ . '/../src/Model/Chenil.php';
require_once __DIR__ . '/../src/Service/GestionSession.php';
require_once __DIR__ . '/../src/Service/RechercheChiens.php';
require_once __DIR__ . '/../src/Controller/ChienController.php';
require_once __DIR__ . '/../src/View/VueListeChiens.php';
require_once __DIR__ . '/../src/View/VueChien.php';

use Chiens\Controller\ChienController;
use Chiens\Model\Chenil;
use Chiens\Service\GestionSession;
use Chiens\Service\RechercheChiens;

$session = new GestionSession();
$chenil = new Chenil($session);
$recherche = new RechercheChiens();
$controller = new ChienController($chenil, $recherche);
$controller->gererRequete();
?>