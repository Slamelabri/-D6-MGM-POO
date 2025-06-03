<?php
class Animal {
    private $nom;
    private $age;

    public function __construct($nom, $age) {
        $this->nom = $nom;
        $this->age = intval($age);
    }

    public function decrire() {
        return "Je suis un animal nommé {$this->nom}, j'ai {$this->age} ans.";
    }

    public function getNom() {
        return $this->nom;
    }

    public function getAge() {
        return $this->age;
    }
}
?>