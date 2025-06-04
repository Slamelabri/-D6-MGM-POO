<?php
namespace Agence\Interface;

interface Billable {
    public function calculateCost(): float;
}
?>