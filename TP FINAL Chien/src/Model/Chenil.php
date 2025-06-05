<?php
namespace Chiens\Model;

use Chiens\Service\GestionSession;
use Chiens\Exception\ChienNonTrouveException;

class Chenil {
    private GestionSession $session;
    private const SESSION_KEY = 'chiens';

    public function __construct(GestionSession $session) {
        $this->session = $session;
        if (!$this->session->exists(self::SESSION_KEY)) {
            $this->session->set(self::SESSION_KEY, []);
        }
    }

    public function ajouterChien(Chien $chien): void {
        $chiens = $this->session->get(self::SESSION_KEY);
        $chiens[$chien->getNom()] = $chien;
        $this->session->set(self::SESSION_KEY, $chiens);
    }

    public function mettreAJour(Chien $chien): void {
        $chiens = $this->session->get(self::SESSION_KEY);
        if (!isset($chiens[$chien->getNom()])) {
            throw new ChienNonTrouveException("Chien {$chien->getNom()} non trouvé.");
        }
        $chiens[$chien->getNom()] = $chien;
        $this->session->set(self::SESSION_KEY, $chiens);
    }

    public function supprimerChien(string $nom): void {
        $chiens = $this->session->get(self::SESSION_KEY);
        if (!isset($chiens[$nom])) {
            throw new ChienNonTrouveException("Chien {$nom} non trouvé.");
        }
        unset($chiens[$nom]);
        $this->session->set(self::SESSION_KEY, $chiens);
    }

    public function recupererChien(string $nom): ?Chien {
        $chiens = $this->session->get(self::SESSION_KEY);
        return $chiens[$nom] ?? null;
    }

    public function recupererTousChiens(): array {
        return $this->session->get(self::SESSION_KEY);
    }
}
?>