<?php
namespace Hotel\Model;

use Hotel\Model\Reservation;

class Room {
    private int $id;
    private string $number;
    private string $type;
    private float $pricePerNight;
    private array $reservations;

    public function __construct(int $id, string $number, string $type, float $pricePerNight) {
        $this->id = $id;
        $this->number = $number;
        $this->type = $type;
        $this->pricePerNight = $pricePerNight;
        $this->reservations = [];
    }

    public function addReservation(Reservation $reservation): void {
        $this->reservations[] = $reservation;
    }

    public function getReservations(): array {
        return $this->reservations;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getNumber(): string {
        return $this->number;
    }

    public function getType(): string {
        return $this->type;
    }

    public function getPricePerNight(): float {
        return $this->pricePerNight;
    }
}
?>