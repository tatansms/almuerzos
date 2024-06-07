<?php
session_start();
require_once(__DIR__ . "/../mdb/mdbFallas.php");

if (isset($_SESSION['ID_USUARIO'])) {
    $id_usuario = $_SESSION['ID_USUARIO'];
    $fallas_usuario = buscarFallasPorUsuario($id_usuario);
    echo json_encode($fallas_usuario);
} else {
    echo json_encode(array('error' => 'No se ha iniciado sesión'));

}


