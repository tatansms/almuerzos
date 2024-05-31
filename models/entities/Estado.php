<?php

class Estado{
    private $ID_estado;
    private $nombre;

    public function __construct($ID_estado, $nombre) {
        $this->ID_estado = $ID_estado;
        $this->nombre = $nombre;
    }

    public function getID_estado() {
        return $this->ID_estado;
    }

    public function getNombre() {
        return $this->nombre;
    }
}
?>