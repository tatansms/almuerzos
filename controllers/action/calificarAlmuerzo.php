<?php
session_start();
require_once("../../controllers/mdb/mdbCalificacion.php");
require_once("../../controllers/mdb/mdbUser.php");
require_once (__DIR__."/../../models/entities/Calificacion.php");

$idAlmuerzo = $_POST['idAlmuerzo'];
$calificacion = $_POST['calificacion'];
$descripcion = $_POST['descripcion'];
$fecha = date('Y-m-d');

if (isset($_SESSION['ID_USUARIO'])) {
    $idUsuario = $_SESSION['ID_USUARIO'];

    $calificacion = new Calificacion(NULL, $idUsuario, $idAlmuerzo, $calificacion, $descripcion, $fecha);
    $esAdministrador = esAdministrador($idUsuario);
    $haHechoCalificacionHoy = yaCalifico($idUsuario, $fecha);
    

    if (!$haHechoCalificacionHoy && !$esAdministrador) {
        $nuevaCalificacion = agregarCalificacion($calificacion);
        echo json_encode(array('status' => 'success', 'message' => '¡Gracias por calificarnos! Su calificación fue enviada con éxito.'));
    
    } else {
        $errorMessage = '';

        if ($haHechoCalificacionHoy){
            $errorMessage = '¡Ya has hecho una calificación el día de hoy!';
        } elseif ($esAdministrador){
            $errorMessage = '¡Eres administrador, no puedes realizar una calificación';
        } 

        echo json_encode(array('status' => 'error', 'message' => $errorMessage));
    }
} else {
    header("Location: ../../views/login.php");
}