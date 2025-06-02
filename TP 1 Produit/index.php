<?php
require_once 'Produit.php';


$produit1 = new Produit("Laptop", 6666.66);
$produit2 = new Produit("Smartphone", 555.55);
$produit3 = new Produit("Écouteurs", 44.44);


$produit1->ajouterAuPanier(2);
$produit2->ajouterAuPanier(1);
$produit3->ajouterAuPanier(3);

$panier = [$produit1, $produit2, $produit3];

echo "<h2>Contenu du panier :</h2>";
$total = 0;
foreach ($panier as $produit) {
    echo $produit->afficherProduit() . "<br>";
    $total += $produit->getPrix() * $produit->getQuantite();
}

echo "<br><strong>Total du panier : {$total} €</strong>";
?>