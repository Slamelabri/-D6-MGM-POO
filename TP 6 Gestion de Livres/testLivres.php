<?php
require_once 'LivrePapier.php';
require_once 'Ebook.php';

        // livre papier
        $livrePapier = new LivrePapier("Le Petit Prince", "Antoine de Saint-Exupéry", 1943, 96);
        // ebook
        $ebook = new Ebook("1984", "George Orwell", 1949, "PDF");


echo "<h2>Détails des livres :</h2>";
echo "<strong>Livre papier :</strong><br>" . $livrePapier->afficherDetails() . "<br><br>";
echo "<strong>Ebook :</strong><br>" . $ebook->afficherDetails() . "<br><br>";

echo "<h2>Test des emprunts :</h2>";
echo $livrePapier->emprunter() . "<br>";
echo $livrePapier->emprunter() . "<br>"; 
echo $ebook->emprunter() . "<br>";


echo "<h2>Détails après emprunt :</h2>";
echo "<strong>Livre papier :</strong><br>" . $livrePapier->afficherDetails() . "<br><br>";
echo "<strong>Ebook :</strong><br>" . $ebook->afficherDetails() . "<br>";
?>