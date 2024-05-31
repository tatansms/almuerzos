<?php

class Estados_Donaciones{
    private $ID_donación;
    private $ID_estado;

    public function __construct($ID_donación, $ID_estado) {
        $this->ID_donación = $ID_donación;
        $this->ID_estado = $ID_estado;
    }

    public function getID_donación() {
        return $this->ID_donación;
    }
    
    public function getID_estado() {
        return $this->ID_estado;
    }
}
?>