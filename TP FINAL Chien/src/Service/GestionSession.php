<?php
namespace Chiens\Service;

class GestionSession {
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function get(string $key): mixed {
        return $_SESSION[$key] ?? [];
    }

    public function set(string $key, mixed $value): void {
        $_SESSION[$key] = $value;
    }

    public function exists(string $key): bool {
        return isset($_SESSION[$key]);
    }
}
?>