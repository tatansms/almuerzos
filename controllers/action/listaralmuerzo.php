<?php
session_start();
require_once(__DIR__ . "/../mdb/mdbAlmuerzo.php");
header('Content-Type: application/json');

if (isset($_POST['dia'])) {
    $dia = $_POST['dia'];
    
   
    // if (isset($_SESSION['ID_USUARIO'])) {
    //     $usuarioID = $_SESSION['ID_USUARIO'];
    //     // Verificar si el estudiante tiene almuerzo para el día actual
    //     $tieneAlmuerzoHoy = $diasAlmuerzoEstudianteDAO->obtenerAlmuerzosUsuario($usuarioID, $dia);
    //      if($tieneAlmuerzoHoy){
    //         $_SESSION['TORF']=1;
    //      }
    //     // Más lógica de tu aplicación...
    // }
    $almuerzos = obtenerAlmuerzosPorDia($dia);
    echo json_encode($almuerzos);
} else {
    echo json_encode(array("error" => "Parámetros no proporcionados"));
}
