<?php
require_once 'NotificationEmail.php';
require_once 'NotificationSMS.php';
require_once 'NotificationPush.php';
require_once 'NotificationSystem.php';

// Création des objets de notification
$email = new NotificationEmail();
$sms = new NotificationSMS();
$push = new NotificationPush();

// Création du tableau de notifications
$notifications = [$email, $sms, $push];

// Création du système de notification
$system = new NotificationSystem();

// Affichage des notifications avec log
echo "<h2>Envoi des notifications :</h2>";
foreach ($notifications as $index => $notification) {
    $message = $notification->envoyerNotification();
    echo "Notification " . ($index + 1) . ": {$message}<br>";
    echo $system->log($message) . "<br><br>";
}

// Test de la méthode final dans NotificationEmail
echo "<h2>Test de la méthode final :</h2>";
echo $email->configurerServeurSMTP() . "<br>";

// Note : Les lignes suivantes provoqueraient des erreurs fatales si décommentées
// require_once 'NotificationEmailAvancee.php'; // Tentative de redéfinition de méthode final
// require_once 'InvalidExtension.php'; // Tentative d'héritage de classe final
?>