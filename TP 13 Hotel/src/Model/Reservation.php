<?php
namespace Hotel\Model;

use Hotel\Interface\Billable;
use Hotel\Model\Room;
use Hotel\Model\Customer;
use Hotel\Service\CalculPrix;

class Reservation implements Billable {
    private int $id;
    private Room $room;
    private Customer $customer;
    private \DateTime $startDate;
    private \DateTime $endDate;
    private string $status;
    private CalculPrix $calculPrix;

    public function __construct(
        int $id,
        Room $room,
        Customer $customer,
        \DateTime $startDate,
        \DateTime $endDate,
        CalculPrix $calculPrix
    ) {
        $this->id = $id;
        $this->room = $room;
        $this->customer = $customer;
        $this->startDate = clone $startDate;
        $this->endDate = clone $endDate;
        $this->status = 'pending';
        $this->calculPrix = $calculPrix;
    }

    public function calculateAmount(): float {
        return $this->calculPrix->calculer(
            $this->room->getPricePerNight(),
            $this->getDurationInNights()
        );
    }

    public function cancel(): void {
        $this->status = 'canceled';
    }

    public function getDurationInNights(): int {
        $interval = $this->startDate->diff($this->endDate);
        return $interval->days;
    }


    public function getId(): int {
        return $this->id;
    }

    public function getRoom(): Room {
        return $this->room;
    }

    public function getCustomer(): Customer {
        return $this->customer;
    }

    public function getStartDate(): \DateTime {
        return clone $this->startDate;
    }

    public function getEndDate(): \DateTime {
        return clone $this->endDate;
    }

    public function getStatus(): string {
        return $this->status;
    }


    public function confirm(): void {
        $this->status = 'confirmed';
    }
}
?>