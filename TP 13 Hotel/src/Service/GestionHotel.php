<?php
namespace Hotel\Service;

use Hotel\Model\Room;
use Hotel\Model\Customer;
use Hotel\Model\Reservation;
use Hotel\Service\VerificateurReservation;

class GestionHotel {
    private array $chambres;
    private array $clients;
    private VerificateurReservation $verificateur;

    public function __construct(VerificateurReservation $verificateur) {
        $this->chambres = [];
        $this->clients = [];
        $this->verificateur = $verificateur;
    }

    public function ajouterChambre(Room $chambre): void {
        $this->chambres[$chambre->getId()] = $chambre;
    }

    public function ajouterClient(Customer $client): void {
        $this->clients[$client->getId()] = $client;
    }

    public function creerReservation(Reservation $reservation): void {
        $this->verificateur->verifier($reservation, $reservation->getRoom()->getReservations());
        $reservation->getRoom()->addReservation($reservation);
        $reservation->getCustomer()->addReservation($reservation);
        $reservation->confirm();
    }

    public function getChambres(): array {
        return $this->chambres;
    }

    public function getClients(): array {
        return $this->clients;
    }

    public function calculerChiffreAffaires(\DateTime $debut, \DateTime $fin): float {
        $total = 0;
        foreach ($this->chambres as $chambre) {
            foreach ($chambre->getReservations() as $reservation) {
                if ($reservation->getStatus() === 'confirmed' &&
                    $reservation->getStartDate() <= $fin &&
                    $reservation->getEndDate() >= $debut) {
                    $total += $reservation->calculateAmount();
                }
            }
        }
        return $total;
    }

    public function getChambresDisponibles(\DateTime $debut, \DateTime $fin): array {
        $disponibles = [];
        foreach ($this->chambres as $chambre) {
            $estDisponible = true;
            foreach ($chambre->getReservations() as $reservation) {
                if ($reservation->getStatus() !== 'canceled' &&
                    $this->datesSeChevauchent($debut, $fin, $reservation->getStartDate(), $reservation->getEndDate())) {
                    $estDisponible = false;
                    break;
                }
            }
            if ($estDisponible) {
                $disponibles[] = $chambre;
            }
        }
        return $disponibles;
    }

    private function datesSeChevauchent(\DateTime $debut1, \DateTime $fin1, \DateTime $debut2, \DateTime $fin2): bool {
        return $debut1 <= $fin2 && $fin1 >= $debut2;
    }
}
?>