<?php
require_once(__DIR__."/../../models/DAO/filaDAO.php");


function ingresarAFila($idUsuario) {
    $dao = new FilaDAO();
    $resultado = $dao->ingresarAFila($idUsuario);
    return $resultado;
}
function salirDeFila($idUsuario) {
    $dao = new FilaDAO();
    $resultado = $dao->salirDeFila($idUsuario);
    return $resultado;
}

function estaEnFila($idUsuario){
    $dao = new FilaDAO();
    $resultado = $dao->estaEnFila($idUsuario);
    return $resultado;
}
?>
