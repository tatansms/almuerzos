<?php
// En tu controlador PHP
require_once("../../controllers/mdb/mdbDonaciones.php");

// Realiza una consulta para obtener la cantidad de donaciones por mes
$donacionesPorMes = obtenerCantidadDonacionesPorMes();

// Convierte el resultado a formato JSON para que sea consumido por Chart.js
echo json_encode($donacionesPorMes);
