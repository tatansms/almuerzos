<?php

class Usuario {
    private $ID_user;
    private $Nombre;
    private $Apellido;
    private $Email;
    private $Contrasena;
    private $Celular;
    private $ID_programa;
    private $ID_rol;


    public function __construct($ID_user, $Nombre, $Apellido, $Email, $Contrasena, $Celular, $ID_programa, $ID_rol) {
        $this->ID_user = $ID_user;
        $this->Nombre = $Nombre;
        $this->Apellido = $Apellido;
        $this->Email = $Email;
        $this->Contrasena = $Contrasena;
        $this->Celular = $Celular;
        $this->ID_programa = $ID_programa;
        $this->ID_rol = $ID_rol;
    }

    public function getID_User() {
        return $this->ID_user;
    }

    public function getNombre() {
        return $this->Nombre;
    }

    public function getApellido() {
        return $this->Apellido;
    }

    public function getEmail() {
        return $this->Email;
    }

    public function getContrasena() {
        return $this->Contrasena;
    }

    public function getCelular() {
        return $this->Celular;
    }

    public function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }

    public function setApellido($Apellido) {
        $this->Apellido = $Apellido;
    }

    public function setEmail($Email) {
        $this->Email = $Email;
    }

    public function setContraseña($Contrasena) {
        $this->Contrasena = $Contrasena;
    }

    public function setCelular($Celular) {
        $this->Celular = $Celular;
    }

    public function setID_programa($ID_programa) {
        $this->ID_programa = $ID_programa;
    }

    public function getID_programa() {
        return $this->ID_programa;
    }

    public function setID_rol($ID_rol) {
        $this->ID_rol = $ID_rol;
    }

    public function getID_rol() {
        return $this->ID_rol;
    }

    public function toArray() {
        $vars = get_object_vars ( $this );
        $array = array ();
        foreach ( $vars as $key => $value ) {
            $array [ltrim ( $key, '_' )] = $value;
        }
        return $array;
    }
}
?>


       