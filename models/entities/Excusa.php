<?php
class Excusa {
    public $ID_excusa;
    public $convocatoria;
    public $descripcion;
    public $fecha;

    public function __construct($ID_excusa, $convocatoria, $descripcion, $fecha) {
        $this->ID_excusa = $ID_excusa;
        $this->convocatoria = $convocatoria;
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;
    }

    public function getID_excusa() {
        return $this->ID_excusa;
    }

    public function getConvocatoria() {
        return $this->convocatoria;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getFecha() {
        return $this->fecha;
    }
}
?>
