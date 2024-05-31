<?php
    session_start();
    require_once (__DIR__.'/../mdb/mdbDia.php');
    $dias = verDias();

    echo json_encode($dias);  