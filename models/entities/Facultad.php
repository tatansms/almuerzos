<?php

class Facultad{
    private $ID_facultad;
    private $nombre;

    public function __construct($ID_facultad, $nombre) {
        $this->ID_facultad = $ID_facultad;
        $this->nombre = $nombre;
    }

    public function getID_facultad() {
        return $this->ID_facultad;
    }

    public function getNombre() {
        return $this->nombre;
    }
}
?>