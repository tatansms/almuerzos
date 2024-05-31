<?php
session_start();
require_once(__DIR__ . "/../mdb/mdbUser.php");


    $userID = $_SESSION['ID_USUARIO'];

    // Lógica para eliminar el usuario
    $resultado = borrarUsuario($userID);
    // Eliminación exitosa, cierra la sesión y redirige a la página de inicio o a una página de despedida
    session_unset();
    session_destroy();
    unset($_SESSION["ID_USUARIO"]);
    unset($_SESSION["NOMBRE"]);
    unset($_SESSION["APELLIDO"]);
    unset($_SESSION["CELULAR"]);
    unset($_SESSION["EMAIL"]);
    unset($_SESSION['ID_PROGRAMA']);
    unset($_SESSION['ROL']);
    unset($_SESSION['CONTRASENA']);

    $estado=true;
    $msg =  "Cuenta eliminada, redireccionando...";
    $resultado = [
        'estado' => $estado,
        'msg' => $msg
    ];
    
    echo json_encode($resultado);

?>

