<?php
session_start();
require_once(__DIR__ . '/../mdb/mdbMenu.php');
$idAlmue = $_GET['idAlmuerzo'];
$idMenu = $_GET['idMenu'];
$success = borrarAlmuerzoMenu($idAlmue,$idMenu);

// Prepara el mensaje
$estado=true;
$msg =  "El almuerzo ha sido eliminado correctamente";
$resultado = [
    'estado' => $estado,
    'msg' => $msg
];
echo json_encode($resultado);