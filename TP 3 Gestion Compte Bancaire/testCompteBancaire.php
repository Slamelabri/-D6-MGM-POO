<?php
require_once 'CompteBancaire.php';

$compte = new CompteBancaire("Jean Dupont", 1000.00);

echo "Titulaire du compte : " . $compte->getTitulaire() . "<br>";

echo $compte->afficherSolde() . "<br>";

if ($compte->depot(500.50)) {
    echo "Dépôt de 500.50 € effectué avec succès<br>";
} else {
    echo "Erreur : Dépôt invalide<br>";
}

echo $compte->afficherSolde() . "<br>";

if ($compte->retrait(300.00)) {
    echo "Retrait de 300.00 € effectué avec succès<br>";
} else {
    echo "Erreur : Retrait invalide ou solde insuffisant<br>";
}

echo $compte->afficherSolde() . "<br>";

if ($compte->retrait(2000.00)) {
    echo "Retrait de 2000.00 € effectué avec succès<br>";
} else {
    echo "Erreur : Solde insuffisant pour un retrait de 2000.00 €<br>";
}

echo $compte->calculerInterets(2) . "<br>";
?>
