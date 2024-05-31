<?php
// En tu controlador PHP (por ejemplo, actionadmin/ver-usuarios.php)
require_once (__DIR__.'/../mdb/mdbPrograma.php');

// Realiza una consulta para obtener la cantidad de usuarios por programa
$usuariosPorPrograma = obtenerCantidadUsuariosPorPrograma();

// Convierte el resultado a formato JSON para que sea consumido por Chart.js
echo json_encode($usuariosPorPrograma);
