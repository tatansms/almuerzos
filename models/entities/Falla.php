<?php
class Falla {
    public $ID_falla;
    public $fecha;

    public function __construct($ID_falla, $fecha) {
        $this->ID_falla = $ID_falla;
        $this->fecha = $fecha;
    }

    public function getID_falla() {
        return $this->ID_falla;
    }

    public function getFecha() {
        return $this->fecha;
    }
}
?>
