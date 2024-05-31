<?php
session_start();
require_once("../../controllers/mdb/mdbFila.php");
require_once (__DIR__."/../../models/entities/Estudiantes_En_Fila.php");
require_once("../../controllers/mdb/mdbUser.php");

$horaActual = date('H:i:s');
$idFila = 1;
$turnoTemp = 1;


if (isset($_SESSION['ID_USUARIO'])) {
    $idUsuario = $_SESSION['ID_USUARIO'];

    $estaEnFila = estaEnFila($idUsuario);
    $esAdministrador = esAdministrador($idUsuario);
    $estudianteEnFila = new Estudiantes_En_Fila($idUsuario, $idFila,$turnoTemp , $horaActual);
    
    if (!$estaEnFila && !$esAdministrador) {
        ingresarAFila($estudianteEnFila);
        echo json_encode(array('status' => 'success', 'message' => '¡Ingresaste correctamente a la fila!'));
    
    } else {
        $errorMessage = '';

        if ($estaEnFila){
            $errorMessage = '¡Ya estás en la fila!';
        } elseif ($esAdministrador){
            $errorMessage = '¡Eres administrador, no puedes entrar a la fila!';
        } 

        echo json_encode(array('status' => 'error', 'message' => $errorMessage));
    }
} else {
    header("Location: ../../views/login.php");
}