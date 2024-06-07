<?php
require_once(__DIR__ . "/../../models/DAO/fallasDAO.php");

function buscarFallasPorUsuario($idUsuario){
    $dao = new FallaDAO();
    $fallas = $dao->buscarFallasPorUsuario($idUsuario);
    return $fallas;
}