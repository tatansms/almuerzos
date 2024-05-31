<?php

class Estudiantes_En_Fila{
    private $ID_estudiante;
    private $ID_fila;
    private $turno;
    private $hora_ingreso;

    public function __construct($ID_estudiante, $ID_fila, $turno,$hora){
        $this->ID_estudiante = $ID_estudiante;
        $this->ID_fila= $ID_fila;
        $this->turno = $turno;
        $this->hora_ingreso = $hora;
    }

    public function getID_estudiante() {
        return $this->ID_estudiante;
    }

    public function getID_fila() {
        return $this->ID_fila;
    }

    public function getTurno() {
        return $this->turno;
    }

    public function getHora_ingreso() {
        return $this->hora_ingreso;
    } 
}

?>