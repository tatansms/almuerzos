<?php
session_start();
require_once("../../controllers/mdb/mdbAlmuerzo.php");
require_once(__DIR__ . '/../mdb/mdbExcusas.php'); // Asegúrate de que mdbExcusas.php esté incluido correctamente
require_once(__DIR__ . '/../../models/entities/Excusa.php');

$convocatoria = filter_input(INPUT_POST, 'convocatoria');
$descripcion = filter_input(INPUT_POST, 'descripcion');
$fecha = filter_input(INPUT_POST, 'fecha');
$id_dia = filter_input(INPUT_POST, 'idDia');
$dia = filter_input(INPUT_POST, 'nombreDia');

$response = []; // Inicializar la respuesta

if (isset($_SESSION['ID_USUARIO'])) {
    $id_user = $_SESSION['ID_USUARIO'];

    try {
        // Verificar si el usuario ya tiene almuerzo para ese día
        $tieneAlmuerzo = obtenerAlmuerzosUsuario($id_user, $dia);
        $id_dia++;
        if ($tieneAlmuerzo) {
            // Si tiene almuerzo, intentar agregar la nueva excusa
            $excusa = new Excusa(null, $descripcion, $fecha, $convocatoria);
            $resultado = agregarNuevaExcusa($id_user, $id_dia, $descripcion, $fecha, $convocatoria);

            if ($resultado) {
                $estado = true;
                $msg = "Excusa agregada correctamente";
            } else {
                $estado = false;
                $msg = "Error al agregar la excusa";
            }
        } else {
            // Si no tiene almuerzo, definir un mensaje de error
            $estado = false;
            $msg = "No tienes almuerzo para el día seleccionado";
        }
    } catch (Exception $e) {
        // Capturar cualquier excepción que pueda surgir
        $estado = false;
        $msg = "Error: " . $e->getMessage();
    }

    // Construir la respuesta JSON
    $response = [
        'estado' => $estado,
        'msg' => $msg
    ];
} else {
    // Si no hay sesión válida, redirigir a la página de inicio de sesión
    $response = [
        'estado' => false,
        'msg' => 'No hay sesión activa. Por favor inicia sesión.'
    ];
}

// Devolver respuesta JSON al cliente
echo json_encode($response);
?>
