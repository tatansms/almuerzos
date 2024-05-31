<?php

class Fila_Virtual{
    private $ID_Fila;
    private $fecha_realización;
    private $num_personas;

    public function __construct($ID_Fila, $num_personas){
        $this->ID_Fila = $ID_Fila;
        $this->fecha_realización = date('d-m-y');
        $this->num_personas = $num_personas; 
    }

    public function getID_Fila() {
        return $this->ID_Fila;
    }
        
    public function getFechaRealizacion() {
        return $this->fecha_realización;
    }
        
    public function getNumPersonas() {
        return $this->num_personas;
    }
}
?>