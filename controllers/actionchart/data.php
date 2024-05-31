
<?php
// En tu controlador PHP
session_start();
require_once(__DIR__ . '/../mdb/mdbUser.php');

// Realiza una consulta para obtener la cantidad de donaciones por mes
unset($_SESSION["cantidadEstudiantes"]);
unset($_SESSION["cantidadCalificaciones"]);
unset($_SESSION["cantidadDonaciones"]);
$cantidadEstudiantes = obtenerCantidadEstudiantes();
$cantidadCalificaciones = obtenerCantidadCalificaciones();
$cantidadDonaciones = obtenerCantidadDonaciones();

$_SESSION["cantidadEstudiantes"] = $cantidadEstudiantes;
$_SESSION["cantidadCalificaciones"] = $cantidadCalificaciones;
$_SESSION["cantidadDonaciones"] = $cantidadDonaciones;
