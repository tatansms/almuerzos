<?php

class Dia_Almuerzo{
    private $ID_dia;
    private $nombre;

    public function __construct($ID_dia, $nombre) {
        $this->ID_dia = $ID_dia;
        $this->nombre = $nombre;
    }

    public function getID_dia() {
        return $this->ID_dia;
    }

    public function getNombre() {
        return $this->nombre;
    }

}
?>