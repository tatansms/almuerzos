<?php
session_start();
require_once(__DIR__ . "/../mdb/mdbExcusas.php");

if (isset($_SESSION['ID_USUARIO'])) {
    $id_usuario = $_SESSION['ID_USUARIO'];
    $excusas_usuario = buscarExcusasPorUsuario($id_usuario);
    echo json_encode($excusas_usuario);
} else {
    echo json_encode(array('error' => 'No se ha iniciado sesión'));
}
