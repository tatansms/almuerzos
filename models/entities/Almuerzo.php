<?php

class Almuerzo{
    private $ID_almuerzo;
    private $nombre;
    private $descripcion;
    private $promedioCalificacion;

    public function __construct($ID_almuerzo, $nombre, $descripcion, $promedioCalificacion = null) {
        $this->ID_almuerzo = $ID_almuerzo;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->promedioCalificacion = $promedioCalificacion;
    }

    public function getID_almuerzo() {
        return $this->ID_almuerzo;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPromedioCalificacion() {
        return $this->promedioCalificacion;
    }

}

?>