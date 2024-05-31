<?php

class Rol
{
    private $ID_rol;
    private $Nombre;

    public function __construct($ID_rol, $Nombre)
    {
        $this->ID_rol = $ID_rol;
        $this->Nombre = $Nombre;
    }

    public function getIDRol()
    {
        return $this->ID_rol;
    }

    public function getNombre()
    {
        return $this->Nombre;
    }
}

?>
