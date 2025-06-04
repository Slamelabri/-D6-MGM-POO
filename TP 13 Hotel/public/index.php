<?php
require_once __DIR__ . '/../src/Interface/Billable.php';
require_once __DIR__ . '/../src/Interface/StrategiePrix.php';
require_once __DIR__ . '/../src/Exception/ReservationConflictException.php';
require_once __DIR__ . '/../src/Model/Room.php';
require_once __DIR__ . '/../src/Model/Customer.php';
require_once __DIR__ . '/../src/Model/Reservation.php';
require_once __DIR__ . '/../src/Service/VerificateurReservation.php';
require_once __DIR__ . '/../src/Service/CalculPrix.php';
require_once __DIR__ . '/../src/Service/GestionHotel.php';
require_once __DIR__ . '/../src/Strategy/PrixStandard.php';
require_once __DIR__ . '/../src/Strategy/PrixSaisonnier.php';

use Hotel\Model\Room;
use Hotel\Model\Customer;
use Hotel\Model\Reservation;
use Hotel\Service\GestionHotel;
use Hotel\Service\VerificateurReservation;
use Hotel\Service\CalculPrix;
use Hotel\Strategy\PrixSaisonnier;
use Hotel\Exception\ReservationConflictException;

// Création gestionnaire
$verificateur = new VerificateurReservation();
$calculPrix = new CalculPrix(new PrixSaisonnier());
$gestion = new GestionHotel($verificateur);

// Création chambres
$chambres = [
    new Room(1, "101", "simple", 50.0),
    new Room(2, "102", "simple", 50.0),
    new Room(3, "201", "double", 80.0),
    new Room(4, "202", "double", 80.0),
    new Room(5, "301", "suite", 150.0),
];
foreach ($chambres as $chambre) {
    $gestion->ajouterChambre($chambre);
}

// Création clients
$clients = [
    new Customer(1, "Jean Dupont", "jean@example.com"),
    new Customer(2, "Marie Martin", "marie@example.com"),
    new Customer(3, "Luc Durand", "luc@example.com"),
];
foreach ($clients as $client) {
    $gestion->ajouterClient($client);
}

// Création réservations
try {
    $reservations = [
        new Reservation(1, $chambres[0], $clients[0], new \DateTime('2025-06-01'), new \DateTime('2025-06-03'), $calculPrix), // 2 nuits
        new Reservation(2, $chambres[2], $clients[1], new \DateTime('2025-06-05'), new \DateTime('2025-06-08'), $calculPrix), // 3 nuits
        new Reservation(3, $chambres[4], $clients[2], new \DateTime('2025-06-10'), new \DateTime('2025-06-12'), $calculPrix), // 2 nuits
    ];

    foreach ($reservations as $reservation) {
        $gestion->creerReservation($reservation);
    }

    echo "<h2>Réservations créées avec succès :</h2>";
    foreach ($reservations as $reservation) {
        echo "Réservation #{$reservation->getId()} pour {$reservation->getCustomer()->getName()} dans la chambre {$reservation->getRoom()->getNumber()} ({$reservation->getStartDate()->format('d/m/Y')} - {$reservation->getEndDate()->format('d/m/Y')}) : {$reservation->calculateAmount()} €<br>";
    }

} catch (ReservationConflictException $e) {
    echo "Erreur : {$e->getMessage()}<br>";
}

// Test création conflit
try {
    $reservationConflit = new Reservation(4, $chambres[0], $clients[1], new \DateTime('2025-06-02'), new \DateTime('2025-06-04'), $calculPrix);
    $gestion->creerReservation($reservationConflit);
    echo "Erreur : La réservation en conflit n'a pas été détectée.<br>";
} catch (ReservationConflictException $e) {
    echo "<h2>Test de conflit :</h2>";
    echo "Conflit détecté (attendu) : {$e->getMessage()}<br>";
}

// historique réservations
echo "<h2>Historique des réservations par client :</h2>";
foreach ($gestion->getClients() as $client) {
    echo "<strong>{$client->getName()} :</strong><br>";
    $historique = $client->getReservationHistory();
    if (empty($historique)) {
        echo "Aucune réservation.<br>";
    } else {
        foreach ($historique as $reservation) {
            echo "Réservation #{$reservation->getId()} dans la chambre {$reservation->getRoom()->getNumber()} ({$reservation->getStartDate()->format('d/m/Y')} - {$reservation->getEndDate()->format('d/m/Y')}) : {$reservation->calculateAmount()} €<br>";
        }
    }
    echo "<br>";
}

// Chiffe d'affaires pour le mois de Juin
echo "<h2>Chiffre d'affaires (juin 2025) :</h2>";
$debutMois = new \DateTime('2025-06-01');
$finMois = new \DateTime('2025-06-30');
$chiffreAffaires = $gestion->calculerChiffreAffaires($debutMois, $finMois);
echo "Chiffre d'affaires total : {$chiffreAffaires} €<br>";

// Chambres disponibles
echo "<h2>Chambres disponibles (10/06/2025 - 12/06/2025) :</h2>";
$debutPeriode = new \DateTime('2025-06-10');
$finPeriode = new \DateTime('2025-06-12');
$chambresDisponibles = $gestion->getChambresDisponibles($debutPeriode, $finPeriode);
foreach ($gestion->getChambres() as $chambre) {
    $estDisponible = in_array($chambre, $chambresDisponibles);
    echo "Chambre {$chambre->getNumber()} ({$chambre->getType()}) : " . ($estDisponible ? "Disponible" : "Non disponible") . "<br>";
}
?>