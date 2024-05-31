<?php

class Programa{
    private $ID_programa;
    private $nombre;
    private $ID_facultad;

    public function __construct($ID_programa, $nombre, $ID_facultad) {
        $this->ID_programa = $ID_programa;
        $this->nombre = $nombre;
        $this->ID_facultad = $ID_facultad;
    }
        
    public function getID_programa() {
        return $this->ID_programa;
    }

    public function getNombre() {
        return $this->nombre;
    }
    
    public function getID_facultad() {
        return $this->ID_facultad;
    }
}
?>