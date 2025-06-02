<?php
require_once 'Etudiant.php';
require_once 'Classe.php';

$etudiant1 = new Etudiant("Matin", "Martin");
$etudiant2 = new Etudiant("Kulki", "Jean");
$etudiant3 = new Etudiant("Curie", "Marie");

$etudiant1->ajouterNote(15);
$etudiant1->ajouterNote(18);
$etudiant1->ajouterNote(12);

$etudiant2->ajouterNote(10);
$etudiant2->ajouterNote(14);
$etudiant2->ajouterNote(16);

$etudiant3->ajouterNote(8);
$etudiant3->ajouterNote(9);

$classe = new Classe();
$classe->ajouterEtudiant($etudiant1);
$classe->ajouterEtudiant($etudiant2);
$classe->ajouterEtudiant($etudiant3);

echo $classe->afficherEtudiants();

$classe->supprimerEtudiant("Matin", "Jean");
echo "    

    <h2>Apres suppression :</h2>
     
    ";
    echo $classe->afficherEtudiants();
?>