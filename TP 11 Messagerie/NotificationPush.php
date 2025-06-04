<?php
require_once 'Notifiable.php';

class NotificationPush implements Notifiable {
    // Implémentation de la méthode de l'interface (polymorphisme)
    public function envoyerNotification() {
        return "Envoi d'une notification push.";
    }
}
?>