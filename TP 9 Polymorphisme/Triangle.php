<?php
require_once 'FormeGeometrique.php';

class Triangle extends FormeGeometrique {
    private $cote1;
    private $cote2;
    private $cote3;

    public function __construct($cote1, $cote2, $cote3) {
        $this->cote1 = floatval($cote1);
        $this->cote2 = floatval($cote2);
        $this->cote3 = floatval($cote3);
    }

    public function calculerAire() {
        if ($this->cote1 <= 0 || $this->cote2 <= 0 || $this->cote3 <= 0 ||
            $this->cote1 + $this->cote2 <= $this->cote3 ||
            $this->cote2 + $this->cote3 <= $this->cote1 ||
            $this->cote1 + $this->cote3 <= $this->cote2) {
            return 0;
        }
        $s = ($this->cote1 + $this->cote2 + $this->cote3) / 2;
        return sqrt($s * ($s - $this->cote1) * ($s - $this->cote2) * ($s - $this->cote3));
    }

    public function getDescription() {
        return "Triangle (côtés : {$this->cote1}, {$this->cote2}, {$this->cote3})";
    }
}
?>