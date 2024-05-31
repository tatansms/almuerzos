<?php

class Donación{
    private $ID_donación;
    private $ID_donante;
    private $ID_beneficiario;
    private $fecha;
    private $hora;
    private $ID_estado;

    public function __construct($ID_donación, $ID_donante, $ID_beneficiario, $ID_estado) {
        $this->ID_donación = $ID_donación;
        $this->ID_donante = $ID_donante;
        $this->ID_beneficiario = $ID_beneficiario;
        $this->fecha = date('d-m-y');
        $this->hora = date('h:m:s');
        $this->ID_estado = $ID_estado;
    }

    public function getID_donación() {
        return $this->ID_donación;
    }

    public function getID_donante() {
        return $this->ID_donante;
    }

    public function getID_beneficiario() {
        return $this->ID_beneficiario;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getHora() {
        return $this->hora;
    }

    public function getID_estado() {
        return $this->ID_estado;
    }
}
?>