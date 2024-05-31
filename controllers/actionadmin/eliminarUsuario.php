<?php
session_start();
require_once(__DIR__ . '/../mdb/mdbUser.php');
$idUsuario = $_GET['idUsuario'];
$success = borrarUsuario($idUsuario);


$estado=true;

$msg = "El usuario ha sido eliminado correctamente";
$resultado = [
    'estado' => $estado,
    'msg' => $msg
];
echo json_encode($resultado);
