<?php

class Menu{
    private $ID_Menu;
    private $ID_dia;

    public function __construct($ID_Menu,$ID_dia) {
        $this->ID_Menu = $ID_Menu;
        $this->ID_dia = $ID_dia;
    }

    public function getID_Menu() {
        return $this->ID_Menu;
    }
    public function getID_dia() {
        return $this->ID_dia;
    }
}
?>