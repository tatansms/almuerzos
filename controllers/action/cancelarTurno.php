<?php
session_start();
require_once("../../controllers/mdb/mdbFila.php");
require_once (__DIR__."/../../models/entities/Estudiantes_En_Fila.php");
require_once("../../controllers/mdb/mdbUser.php");

if (isset($_SESSION['ID_USUARIO'])) {
    $idUsuario = $_SESSION['ID_USUARIO'];

    $estaEnFila = estaEnFila($idUsuario);
    $esAdministrador = esAdministrador($idUsuario);
    
    if ($estaEnFila && !$esAdministrador) {
        salirDeFila($idUsuario);
        echo json_encode(array('status' => 'success', 'message' => '¡Saliste correctamente de la fila!'));
    
    } else {
        $errorMessage = '';

        if (!$estaEnFila){
            $errorMessage = '¡No estás en la fila!';
        } elseif ($esAdministrador){
            $errorMessage = '¡Eres administrador, no puedes entrar a la fila!';
        } 
        echo json_encode(array('status' => 'error', 'message' => $errorMessage));
    }
} else {
    header("Location: ../../views/login.php");
}