<?php
require_once 'Animal.php';

class Chien extends Animal {
   
    private $race;

   
    public function __construct($nom, $age, $race) {
        parent::__construct($nom, $age);
        $this->race = $race;
    }

    
    public function decrire() {
        return parent::decrire() . " Je suis un chien de race {$this->race}.";
    }


    public function crier() {
        return "Wouf!";
    }
}
?>