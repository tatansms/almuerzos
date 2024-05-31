<?php
require_once(__DIR__."/../../models/DAO/diaDAO.php");

function verDias(){
    $dao=new DiaDAO();
    $dias = $dao->verDias();
    return $dias;
}
/* function buscarDiaPorId($id){
    $dao=new DiaDAO();
    $programas = $dao->buscarDiaPorId($id);
    return $programas;
} */