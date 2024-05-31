<?php
require_once(__DIR__."/../../models/DAO/programaDAO.php");

function verProgramas(){
    $dao=new ProgramaDAO();
    $programas = $dao->verProgramas();
    return $programas;
}
function buscarProgramaPorId($id){
    $dao=new ProgramaDAO();
    $programas = $dao->buscarProgramaPorId($id);
    return $programas;
}
function obtenerCantidadUsuariosPorPrograma(){
    $dao=new ProgramaDAO();
    $programas = $dao->obtenerCantidadUsuariosPorPrograma();
    return $programas;
}
