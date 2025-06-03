<?php
require_once 'Cercle.php';
require_once 'Rectangle.php';
require_once 'Triangle.php';
require_once 'Carre.php';
require_once 'CalculateurAire.php';

$cercle = new Cercle(5); // Rayon 5
$rectangle = new Rectangle(10, 4); // Longueur 10, largeur 4
$triangle = new Triangle(3, 4, 5); // Cotés 3, 4, 5 (triangle rectangle)
$carre = new Carre(6); // Coté 6 

$formes = [$cercle, $rectangle, $triangle, $carre];

$calculateur = new CalculateurAire();

echo $calculateur->calculerAireTotale($formes) . " unités²<br>";
echo "<strong>Aire totale : " . number_format($calculateur->calculerAireTotale($formes), 2) . " unités²</strong>";
?>