<?php
    session_start();
    require_once(__DIR__ . "/../mdb/mdbMenu.php");
    $almuerzos = leerAlmuerzosMenu();
    if($almuerzos!==null){
        
    }
    echo json_encode($almuerzos);