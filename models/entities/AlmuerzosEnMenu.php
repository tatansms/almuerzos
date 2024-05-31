<?php

class Almuerzos_En_Menu{
    private $ID_menu;
    private $ID_almuerzo;

    public function __construct($ID_menu, $ID_almuerzo) {
        $this->ID_menu = $ID_menu;
        $this->ID_almuerzo = $ID_almuerzo;
    }

    public function getID_menu() {
        return $this->ID_menu;
    }

    public function getID_almuerzo() {
        return $this->ID_almuerzo;
    }
}
?>