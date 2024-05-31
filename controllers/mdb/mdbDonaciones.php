<?php
require_once(__DIR__."/../../models/DAO/donacionesDAO.php");

function verDonaciones($fechaActual){
    $dao=new DonacionesDAO();
    $donaciones = $dao->verDonaciones($fechaActual);;
    return $donaciones;
} 

function agregarDonacion($idUsuario, $idDonante){
    $dao=new DonacionesDAO();
    $donaciones = $dao->agregarDonacion($idUsuario, $idDonante);
    return $donaciones;
}

function asignarAlmuerzoBeneficiario($idDia, $idBeneficiario) {
    $dao=new DonacionesDAO();
    $resultado = $dao->asignarAlmuerzoBeneficiario($idDia, $idBeneficiario);
    return $resultado;
}

function quitarAlmuerzoDonante($idDonante) {
    $dao=new DonacionesDAO();
    $resultado = $dao->quitarAlmuerzoDonante($idDonante);
    return $resultado;
}

// function restaurarAlmuerzoDonante($Dia, $idDonante) {
//     $dao=new DonacionesDAO();
//     $resultado = $dao->restaurarAlmuerzoDonante($Dia, $idDonante);
//     return $resultado;
// }


// function obtenerFechaDonacion($idDonacion){
//     $dao=new DonacionesDAO();
//     $fecha = $dao->obtenerFechaDonacion($idDonacion);
//     return $fecha;
// }

function haRecibidoDonacion($idUsuario) {
    $dao=new DonacionesDAO();
    $recibido = $dao->haRecibidoDonacion($idUsuario);
    return $recibido;
}

// function actualizarEstadoDonacion($idDonacion){
//     $dao=new DonacionesDAO();
//     $actualizado = $dao->actualizarEstadoDonacion($idDonacion);
//     return $actualizado;
// }

// function DonacionFueAceptada($idDonacion){
//     $dao=new DonacionesDAO();
//     $aceptada = $dao->DonacionFueAceptada($idDonacion);
//     return $aceptada;
// }

function comprobarPswdDonar($password, $idUsuario){
    $dao=new DonacionesDAO();
    $resultado = $dao->comprobarPswdDonar($password, $idUsuario);
    return $resultado;
}

function agregarDonacionPendiente($idUsuario){
    $dao=new DonacionesDAO();
    $resultado = $dao->agregarDonacionPendiente($idUsuario);
    return $resultado;
}

function comprobarSiDonó($idUsuario){
    $dao=new DonacionesDAO();
    $resultado = $dao->comprobarSiDonó($idUsuario);
    return $resultado;
}

function cancelarDonación($idUsuario){
    $dao=new DonacionesDAO();
    $resultado = $dao->cancelarDonación($idUsuario);
    return $resultado;
}
function obtenerCantidadDonacionesPorMes(){
    $dao=new DonacionesDAO();
    $programas = $dao->obtenerCantidadDonacionesPorMes();
    return $programas;
}
