<?php

class Dias_Almuerzos_Estudiantes{
    private $ID_dia;
    private $ID_estudiante;

    public function __construct($ID_dia, $ID_estudiante) {
        $this->ID_dia = $ID_dia;
        $this->ID_estudiante = $ID_estudiante;
    }

    public function getID_dia() {
        return $this->ID_dia;
    }

    public function getID_estudiante() {
        return $this->ID_estudiante;
    }
}
?>