<?php
require_once(__DIR__ . "/../../models/DAO/excusasDAO.php");

function buscarExcusasPorUsuario($idUsuario){
    $dao = new ExcusaDAO();
    $excusas = $dao->buscarExcusasPorUsuario($idUsuario);
    return $excusas;
}

function agregarNuevaExcusa($ID_user, $ID_dia, $descripcion, $fecha, $convocatoria) {
    $dao = new ExcusaDAO();
    return $dao->agregarNuevaExcusa($ID_user, $ID_dia, $descripcion, $fecha, $convocatoria);
}
?>
