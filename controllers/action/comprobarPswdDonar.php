<?php
session_start();
require_once("../../controllers/mdb/mdbDonaciones.php");
require_once("../../controllers/mdb/mdbAlmuerzo.php");
require_once("../../controllers/mdb/mdbUser.php");

$password = $_POST['password'];
$diaActual = $_POST['dia'];

if (isset($_SESSION['ID_USUARIO'])) {
    $idUsuario = $_SESSION['ID_USUARIO'];

    $esCorrecto = comprobarPswdDonar($password, $idUsuario);
    $tieneAlmuerzo = obtenerAlmuerzosUsuario($idUsuario, $diaActual);
    $yaDono = comprobarSiDonó($idUsuario);
    $esAdministrador = esAdministrador($idUsuario);

    if ($esCorrecto && $tieneAlmuerzo && !$yaDono && !$esAdministrador) {
        $agregada = agregarDonacionPendiente($idUsuario);

        if ($agregada) {
            echo json_encode(array('status' => 'success', 'message' => '¡Qué gran gesto! Has asegurado un almuerzo para alguien que lo necesitaba.'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Hubo un error al agregar la donación.'));
        }
    } else {
        $errorMessage = '';

        if ($esAdministrador){
            $errorMessage = '¡Eres administrador, no puedes hacer una donación!';
        }elseif ($password == NULL){
            $errorMessage = '¡Ingresa tu contraseña!';
        } elseif (!$esCorrecto) {
            $errorMessage = '¡Contraseña incorrecta!';
        } elseif (!$tieneAlmuerzo) {
            $errorMessage = '¡No tienes almuerzo disponible el día de hoy!';
        } elseif ($yaDono) {
            $errorMessage = '¡Ya has donado previamente!';
        } 

        echo json_encode(array('status' => 'error', 'message' => $errorMessage));
    }

}else {
    header("Location: ../../views/login.php");
}