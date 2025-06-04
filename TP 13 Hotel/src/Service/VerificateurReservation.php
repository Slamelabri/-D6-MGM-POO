<?php
namespace Hotel\Service;

use Hotel\Model\Reservation;
use Hotel\Exception\ReservationConflictException;

class VerificateurReservation {
    public function verifier(Reservation $reservation, array $reservationsExistantes): void {
        foreach ($reservationsExistantes as $existante) {
            if ($existante->getStatus() !== 'canceled' &&
                $this->datesSeChevauchent(
                    $reservation->getStartDate(),
                    $reservation->getEndDate(),
                    $existante->getStartDate(),
                    $existante->getEndDate()
                )) {
                throw new ReservationConflictException(
                    "Conflit de réservation pour la chambre {$reservation->getRoom()->getNumber()} sur la période demandée."
                );
            }
        }
    }

    private function datesSeChevauchent(\DateTime $debut1, \DateTime $fin1, \DateTime $debut2, \DateTime $fin2): bool {
        return $debut1 <= $fin2 && $fin1 >= $debut2;
    }
}
?>