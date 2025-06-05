<?php
namespace Chiens\Controller;

use Chiens\Model\Chien;
use Chiens\Model\ChienDeChasse;
use Chiens\Model\Chenil;
use Chiens\Service\RechercheChiens;
use Chiens\Service\GestionSession;
use Chiens\Exception\ChienNonTrouveException;
use Chiens\View\VueListeChiens;
use Chiens\View\VueChien;

class ChienController {
    private Chenil $chenil;
    private RechercheChiens $recherche;
    private VueListeChiens $vueListe;
    private VueChien $vueChien;

    public function __construct(Chenil $chenil, RechercheChiens $recherche) {
        $this->chenil = $chenil;
        $this->recherche = $recherche;
        $this->vueListe = new VueListeChiens();
        $this->vueChien = new VueChien();
    }

    public function gererRequete(): void {
        $action = $_GET['action'] ?? 'lister';
        switch ($action) {
            case 'lister':
                $nomRecherche = $_GET['recherche'] ?? '';
                $chiens = $this->chenil->recupererTousChiens();
                if ($nomRecherche) {
                    $chiens = $this->recherche->chercherParNom($chiens, $nomRecherche);
                }
                $this->vueListe->afficher($chiens, $nomRecherche);
                break;

            case 'voir':
                $nom = $_GET['nom'] ?? '';
                $chien = $this->chenil->recupererChien($nom);
                if ($chien) {
                    $this->vueChien->afficherDetails($chien);
                } else {
                    echo "Chien non trouvé.";
                }
                break;

            case 'creer':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $this->creerChien();
                }
                $this->vueChien->afficherFormulaireCreation();
                break;

            case 'modifier':
                $nom = $_GET['nom'] ?? '';
                $chien = $this->chenil->recupererChien($nom);
                if (!$chien) {
                    echo "Chien non trouvé.";
                    break;
                }
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $this->mettreAJourChien($chien);
                }
                $this->vueChien->afficherFormulaireModification($chien);
                break;

            case 'supprimer':
                $nom = $_GET['nom'] ?? '';
                try {
                    $this->chenil->supprimerChien($nom);
                    header('Location: index.php');
                } catch (ChienNonTrouveException $e) {
                    echo "Erreur : {$e->getMessage()}";
                }
                break;
        }
    }

    private function creerChien(): void {
        $nom = $_POST['nom'] ?? '';
        $age = (int)($_POST['age'] ?? 0);
        $race = $_POST['race'] ?? '';
        $couleur = $_POST['couleur'] ?? '';
        $sexe = $_POST['sexe'] ?? '';
        $poids = (float)($_POST['poids'] ?? 0.0);
        $type = $_POST['type'] ?? 'Chien';

        if ($nom && $age > 0 && $race && $couleur && $sexe && $poids > 0) {
            $chien = $type === 'ChienDeChasse' ? new ChienDeChasse($nom, $age, $race, $couleur, $sexe, $poids) : new Chien($nom, $age, $race, $couleur, $sexe, $poids);
            $this->chenil->ajouterChien($chien);
            header('Location: index.php');
        }
    }

    private function mettreAJourChien(Chien $chien): void {
        $age = (int)($_POST['age'] ?? 0);
        $race = $_POST['race'] ?? '';
        $couleur = $_POST['couleur'] ?? '';
        $sexe = $_POST['sexe'] ?? '';
        $poids = (float)($_POST['poids'] ?? 0.0);

        if ($age > 0 && $race && $couleur && $sexe && $poids > 0) {
            $chien->setAge($age);
            $chien->setRace($race);
            $chien->setCouleur($couleur);
            $chien->setSexe($sexe);
            $chien->setPoids($poids);
            $this->chenil->mettreAJour($chien);
            header('Location: index.php');
        }
    }
}
?>