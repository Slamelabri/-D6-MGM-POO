<?php
namespace Chiens\Service;

use Chiens\Model\Chien;

class RechercheChiens {
    public function chercherParNom(array $chiens, string $nom): array {
        $resultats = [];
        $nom = strtolower(trim($nom));
        foreach ($chiens as $chien) {
            if (stripos($chien->getNom(), $nom) !== false) {
                $resultats[] = $chien;
            }
        }
        return $resultats;
    }
}
?>