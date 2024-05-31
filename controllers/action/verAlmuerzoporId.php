<?php
    session_start();
    require_once(__DIR__ . "/../mdb/mdbAlmuerzo.php");
    require_once("../../models/entities/Programa.php");
    $idAlmue = $_GET['ID_almuerzo'];
    
    $almuerzo = buscarAlmuerzoPorId($idAlmue);
   
    echo json_encode($almuerzo);  