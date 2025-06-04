<?php
namespace Hotel\Interface;

interface Billable {
    public function calculateAmount(): float;
}
?>