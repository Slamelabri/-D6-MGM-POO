<?php
require_once 'PaiementCB.php';
require_once 'PaiementPaypal.php';
require_once 'PaiementVirement.php';


$paiementCB = new PaiementCB(150.75);
$paiementPaypal = new PaiementPaypal(89.99);
$paiementVirement = new PaiementVirement(250.00);


$paiements = [$paiementCB, $paiementPaypal, $paiementVirement];

echo "<h2>Traitement des paiements :</h2>";
foreach ($paiements as $index => $paiement) {
    echo "Paiement " . ($index + 1) . ":<br>";
    echo $paiement->afficherMontant() . "<br>";
    echo $paiement->effectuerPaiement() . "<br><br>";
}
?>  