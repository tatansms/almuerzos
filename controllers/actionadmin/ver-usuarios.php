<?php
    session_start();
    require_once(__DIR__ . "/../mdb/mdbUser.php");
    $usuarios = leerUsuarios();
    echo json_encode($usuarios);