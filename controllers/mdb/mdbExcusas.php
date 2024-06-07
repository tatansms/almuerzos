
<?php
require_once(__DIR__ . "/../../models/DAO/excusasDAO.php");

function buscarExcusasPorUsuario($idUsuario){
    $dao = new ExcusaDAO();
    $excusas = $dao->buscarExcusasPorUsuario($idUsuario);
    return $excusas;
}









