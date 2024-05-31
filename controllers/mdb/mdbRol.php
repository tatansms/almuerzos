<?php
require_once(__DIR__."/../../models/DAO/rolDAO.php");

function buscarRolPorId($id){
    $dao=new RolDAO();
    $programas = $dao->buscarRolPorId($id);
    return $programas;
}
