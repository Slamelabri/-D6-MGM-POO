<?php
require_once 'Notifiable.php';

class NotificationSMS implements Notifiable {
    // Implémentation de la méthode de l'interface (polymorphisme)
    public function envoyerNotification() {
        return "Envoi d'un SMS de notification.";
    }
}
?>