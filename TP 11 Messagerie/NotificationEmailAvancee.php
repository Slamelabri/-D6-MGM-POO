<?php
require_once 'NotificationEmail.php';

class NotificationEmailAvancee extends NotificationEmail {
    // Erreur Provoqué
    public function configurerServeurSMTP() {
        return "Tentative de reconfiguration du serveur SMTP.";
    }
}
?>