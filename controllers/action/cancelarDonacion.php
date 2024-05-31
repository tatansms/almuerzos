<?php
session_start();
require_once("../../controllers/mdb/mdbDonaciones.php");

$password = $_POST['password'];

if (isset($_SESSION['ID_USUARIO'])) {
    $idUsuario = $_SESSION['ID_USUARIO'];

    $esCorrecto = comprobarPswdDonar($password, $idUsuario);
    $yaDono = comprobarSiDonó($idUsuario);

    if($esCorrecto && $yaDono){
        $cancelada = cancelarDonación($idUsuario);
        if ($cancelada) {
            echo json_encode(array('status' => 'success', 'message' => '¡Cancelación realizada con éxito!'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Hubo un error al cancelar la donación.'));
        }
    }else {
        $errorMessage = '';

        if ($password == NULL){
            $errorMessage = '¡Ingresa tu contraseña!';
        } elseif (!$esCorrecto) {
            $errorMessage = '¡Contraseña incorrecta!';
        }elseif (!$yaDono) {
            $errorMessage = '¡No has realizado una donación!';
        } 

        echo json_encode(array('status' => 'error', 'message' => $errorMessage));
    }

}else {
    header("Location: ../../views/login.php");
}