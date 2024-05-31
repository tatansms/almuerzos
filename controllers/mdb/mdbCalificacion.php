<?php
require_once(__DIR__."/../../models/DAO/calificacionDAO.php");

function yaCalifico($idUsuario, $fecha) {
    $dao = new CalificacionDAO;
    $yaCalifico = $dao->yaCalifico($idUsuario, $fecha);
    return $yaCalifico;
}
function agregarCalificacion($calificacion) {
    $dao = new CalificacionDAO;
    $resultado = $dao->agregarCalificacion($calificacion);
    return $resultado;
}
?>
