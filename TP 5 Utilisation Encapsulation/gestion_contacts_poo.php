<?php
require_once 'Contact.php';

$contact1 = new Contact("Renault", "Alicia", "alicia@gmail.com");
$contact2 = new Contact("Martin", "Matin", "Martin@gmail.com");

$listeContacts = [$contact1, $contact2];

echo "<h2>Liste des contacts (POO) :</h2>";
foreach ($listeContacts as $index => $contact) {
    echo "Contact " . ($index + 1) . ":<br>";
    echo "Nom : " . $contact->getNom() . "<br>";
    echo "Prénom : " . $contact->getPrenom() . "<br>";
    echo "Email : " . $contact->getEmail() . "<br><br>";
}
?>