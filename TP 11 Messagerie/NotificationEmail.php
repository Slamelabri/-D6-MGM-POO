<?php
require_once 'Notifiable.php';

class NotificationEmail implements Notifiable {
    // Implémentation de la méthode de l'interface (polymorphisme)
    public function envoyerNotification() {
        return "Envoi d'un email de notification.";
    }

    // Méthode final (partie 5)
    final public function configurerServeurSMTP() {
        return "Configuration du serveur SMTP pour l'email.";
    }
}
?>