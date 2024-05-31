<?php

class Modificaciones_Menu{
    private $ID_administrador;
    private $ID_menu;
    private $fecha;
    private $hora;

    public function __construct($ID_administrador, $ID_menu) {
        $this->ID_administrador = $ID_administrador;
        $this->ID_menu = $ID_menu;
        $this->fecha = date('d-m-y');
        $this->hora = date('h:m:s');
    }

    public function getID_administrador() {
        return $this->ID_administrador;
    }

    public function getID_menu() {
        return $this->ID_menu;
    }

    public function getFecha() {
        return $this->fecha;
    }
    
    public function getHora() {
        return $this->hora;
    }
}
?>