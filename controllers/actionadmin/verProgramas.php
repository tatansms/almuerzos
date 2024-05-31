<?php
    session_start();
    require_once (__DIR__.'/../mdb/mdbPrograma.php');
    $programas = verProgramas();

    echo json_encode($programas);  