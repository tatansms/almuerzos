<?php
require_once(__DIR__."/../../models/DAO/almuerzoDAO.php");

function obtenerAlmuerzosPorDia($dia) {
    $dao = new AlmuerzoDAO();
    $almuerzos = $dao->obtenerAlmuerzosPorDia($dia);
    return $almuerzos;
}
function obtenerAlmuerzosUsuario($usuario,$dia) {
    $dao = new AlmuerzoDAO();
    $tienealmuerzo = $dao->obtenerAlmuerzosUsuario($usuario,$dia);
    return $tienealmuerzo;
}

function leerAlmuerzos() {
    $dao = new AlmuerzoDAO();
    $almuerzos = $dao->leerAlmuerzos();
    return $almuerzos;
}

function modificarAlmuerzo($almuerzo) {
    $dao = new AlmuerzoDAO();
    $resultado = $dao->modificarAlmuerzo($almuerzo);
    return $resultado;
}

function buscarAlmuerzoPorId($id) {
    $dao = new AlmuerzoDAO();
    $resultado = $dao->buscarAlmuerzoPorId($id);
    return $resultado;
}

function borrarAlmuerzo($id) {
    $dao = new AlmuerzoDAO();
    $resultado = $dao->borrarAlmuerzo($id);
    return $resultado;
}

function insertarAlmuerzo($almuerzo) {
    $dao = new AlmuerzoDAO();
    $resultado = $dao->insertarAlmuerzo($almuerzo);
    return $resultado;
}
?>
