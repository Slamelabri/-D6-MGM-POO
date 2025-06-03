<?php
require_once 'Voiture.php';
require_once 'Moto.php';
require_once 'Camion.php';


$voiture = new Voiture("Toyota", "Corolla", 2020, 45000, 5);
$moto = new Moto("Yamaha", "MT-07", 2018, 12000, 689);
$camion = new Camion("Volvo", "FH16", 2015, 200000, 20000);


echo "<h2>Informations des véhicules :</h2>";
echo "<strong>Voiture :</strong><br>" . $voiture->afficherInfos() . "<br><br>";
echo "<strong>Moto :</strong><br>" . $moto->afficherInfos() . "<br><br>";
echo "<strong>Camion :</strong><br>" . $camion->afficherInfos() . "<br><br>";


$voiture->programmerEntretien("15/06/2025");
$moto->programmerEntretien("20/07/2025");
$camion->programmerEntretien("10/08/2025");


echo "<h2>Prochains entretiens :</h2>";
echo "<strong>Voiture :</strong> " . $voiture->afficherProchainEntretien() . "<br>";
echo "<strong>Moto :</strong> " . $moto->afficherProchainEntretien() . "<br>";
echo "<strong>Camion :</strong> " . $camion->afficherProchainEntretien() . "<br><br>";


echo "<h2>Tests de chargement du camion :</h2>";
echo $camion->charger(5000) . "<br>";
echo $camion->charger(16000) . "<br>"; 
echo $camion->charger(10000) . "<br>";
echo "<strong>Camion après chargement :</strong><br>" . $camion->afficherInfos() . "<br>";
?>