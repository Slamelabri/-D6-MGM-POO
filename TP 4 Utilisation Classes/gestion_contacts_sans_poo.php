<?php
$contact1 = [
    'nom' => 'Renault',
    'prenom' => 'Alicia',
    'email' => 'alicia@gmail.com'
];

$contact2 = [
    'nom' => 'Martin',
    'prenom' => 'Matin',
    'email' => 'Martin@gmail.com'
];

$listeContacts = [$contact1, $contact2];

echo "<h2>Liste des contacts :</h2>";
foreach ($listeContacts as $index => $contact) {
    echo "Contact " . ($index + 1) . ":<br>";
    echo "Nom : " . $contact['nom'] . "<br>";
    echo "Prénom : " . $contact['prenom'] . "<br>";
    echo "Email : " . $contact['email'] . "<br><br>";
}
?>