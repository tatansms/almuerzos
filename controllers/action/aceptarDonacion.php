<?php
session_start();
require_once("../../controllers/mdb/mdbDonaciones.php");
require_once("../../controllers/mdb/mdbAlmuerzo.php");
require_once("../../controllers/mdb/mdbUser.php");

$diaActual = $_POST['dia'];
$idDiaActual = $_POST['idDia'];
$idDonante = $_POST['idDonante'];
$idDonacion = $_POST['idDonacion'];

if (isset($_SESSION['ID_USUARIO'])) {
    $idUsuario = $_SESSION['ID_USUARIO'];

    $haRecibidoDonacion = haRecibidoDonacion($idUsuario);
    $tieneAlmuerzo = obtenerAlmuerzosUsuario($idUsuario, $diaActual);
    $esAdministrador = esAdministrador($idUsuario);

    if ($idUsuario != $idDonante && !$haRecibidoDonacion && !$tieneAlmuerzo && !$esAdministrador) {
        
        $nuevaDonacion = agregarDonacion($idUsuario, $idDonante);
        
        if($nuevaDonacion){
            $quitarFila = cancelarDonación($idDonante);
            $asignado = asignarAlmuerzoBeneficiario($idDiaActual, $idUsuario);
            $quitado = quitarAlmuerzoDonante($idDonante);
            if($quitarFila && $asignado && $quitado){
                echo json_encode(array('status' => 'success', 'message' => '¡Has adquirido un almuerzo! Puedes acercarte para recibirlo. ¡Disfrútalo!'));
            }else{
                echo json_encode(array('status' => 'error', 'message' => 'Hubo un error al recibir el almuerzo.'));
            }
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Hubo un error al recibir el almuerzo.'));
        }
    } else {
        $errorMessage = '';

        if ($idUsuario == $idDonante){
            $errorMessage = '¡No puedes recibir tu propia donación!';
        } elseif ($haRecibidoDonacion){
            $errorMessage = '¡Ya has recibido una donación!';
        } elseif ($tieneAlmuerzo) {
            $errorMessage = '¡Ya tienes almuerzo el día de hoy!';
        } elseif ($esAdministrador){
            $errorMessage = '¡Eres administrador, no puedes recibir un almuerzo!';
        }

        echo json_encode(array('status' => 'error', 'message' => $errorMessage));
    }

    // $donacionesConFechaDiferente = obtenerDonacionesConFechaDiferente(); 
    // if (!empty($donacionesConFechaDiferente)) {
    //     devolverDiaAlDonante($donacionesConFechaDiferente);
    // }

    
} else {
    header("Location: ../../views/login.php");
}