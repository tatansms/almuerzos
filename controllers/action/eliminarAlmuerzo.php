<?php
session_start();
require_once(__DIR__ . '/../mdb/mdbAlmuerzo.php');
$idAlmue = $_GET['ID_almuerzo'];
$success = borrarAlmuerzo($idAlmue);

// Prepara el mensaje

    $estado=true;

$msg = "El almuerzo ha sido eliminado correctamente" ;
$resultado = [
    'estado' => $estado,
    'msg' => $msg
];
echo json_encode($resultado);
