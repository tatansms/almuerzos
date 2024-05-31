<?php

class Calificacion{
    private $ID_calificación;
    private $ID_estudiante;
    private $ID_almuerzo;
    private $calificacion;
    private $descripción;
    private $fecha_calificación;

    public function __construct($ID_calificación, $ID_estudiante, $ID_almuerzo, $calificacion, $descripción, $fecha_calificación) {
        $this->ID_calificación = $ID_calificación;
        $this->ID_estudiante = $ID_estudiante;
        $this->ID_almuerzo = $ID_almuerzo;
        $this->calificacion = $calificacion;
        $this->descripción = $descripción;
        $this->fecha_calificación = $fecha_calificación;
    }

    public function getID_calificación() {
        return $this->ID_calificación;
    }

    public function getID_estudiante() {
        return $this->ID_estudiante;
    }

    public function getID_almuerzo() {
        return $this->ID_almuerzo;
    }

    public function getCalificacion() {
        return $this->calificacion;
    }

    public function getDescripción() {
        return $this->descripción;
    }

    public function getFecha_calificación() {
        return $this->fecha_calificación;
    }
}
?>