<?php
    session_start();
    require_once(__DIR__ . "/../mdb/mdbDonaciones.php");
    $fechaActual = date('Y-m-d');
    $donaciones = verDonaciones($fechaActual);//Solo se listan las donaciones del día
    echo json_encode($donaciones);