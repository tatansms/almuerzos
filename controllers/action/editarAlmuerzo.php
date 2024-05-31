<?php

session_start();

require_once(__DIR__ . '/../mdb/mdbAlmuerzo.php');
require_once(__DIR__ . '/../../models/entities/ALmuerzo.php');
$idAlmue =  filter_input(INPUT_POST, 'ID_almuerzo');
$nombre = filter_input(INPUT_POST, 'nombre');
$descripcion = filter_input(INPUT_POST, 'descripcion');

$almuerzo = new Almuerzo($idAlmue, $nombre, $descripcion);
modificarAlmuerzo($almuerzo);

 // No puede iniciar sesión
    $estado = true;
    $msg = "Almuerzo actualizado";
    $resultado = [
        'estado' => $estado,
        'msg' => $msg
    ];


    echo json_encode($resultado);

