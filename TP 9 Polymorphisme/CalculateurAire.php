<?php
require_once 'FormeGeometrique.php';

class CalculateurAire {
    public function calculerAireTotale($formes) {
        $total = 0;
        echo "<h2>Aires des formes :</h2>";
        foreach ($formes as $forme) {
            $aire = $forme->calculerAire();
            echo "{$forme->getDescription()} : " . number_format($aire, 2) . " unités²<br>";
            $total += $aire;
        }
        return $total;
    }
}
?>