<?php
require_once 'Chien.php';
require_once 'Chat.php';
require_once 'Oiseau.php';


$chien = new Chien("Rex", 5, "Berger Allemand");
$chat = new Chat("Minou", 3, "Noir");
$oiseau = new Oiseau("Titi", 2, "Canari");


$animaux = [$chien, $chat, $oiseau];


echo "<h2>Animaux du zoo :</h2>";
foreach ($animaux as $index => $animal) {
    echo "Animal " . ($index + 1) . ":<br>";
    echo $animal->decrire() . "<br>";
    echo "Cri : " . $animal->crier() . "<br><br>";
}
?>