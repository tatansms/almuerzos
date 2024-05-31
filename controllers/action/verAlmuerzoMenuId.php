<?php
session_start();
require_once (__DIR__.'/../mdb/mdbMenu.php');

    $idAlmuerzo = $_GET['idAlmuerzo'];
    $idMenu = $_GET['idMenu'];
    $almuerzo = buscarAlmuerzoMenuPorId($idAlmuerzo,$idMenu);

    echo json_encode($almuerzo);

?>
