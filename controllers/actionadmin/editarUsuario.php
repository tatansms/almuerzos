<?php

session_start();

require_once(__DIR__ . '/../mdb/mdbUser.php');
require_once(__DIR__ . '/../../models/entities/Usuario.php');
    $idUsuario =  filter_input(INPUT_POST, 'IdUsuario');
    $nombres = filter_input(INPUT_POST, 'nombres');
    $apellidos = filter_input(INPUT_POST, 'apellidos');
    $email = filter_input(INPUT_POST, 'email');
    $contrasena = filter_input(INPUT_POST, 'contrasena');
    $celular = filter_input(INPUT_POST, 'celular');
    $idRol = filter_input(INPUT_POST, 'rol');
    $idPrograma = filter_input(INPUT_POST, 'programa');
    $nemail="Email";
    $ntele="Celular";

    // Verificar existencia de email
    // $usuarioExistenteEmail = verificarExistencia($email, $nemail);
    // $e=$usuarioExistenteEmail['ID_user'] ;
    // if ($usuarioExistenteEmail && $e!== $idUsuario) {
    //     $estado = false;
    //     $msg = "Este email ya está siendo utilizado, ingrese un email distinto";
    //     $resultado = [
    //         'estado' => $estado,
    //         'msg' => $msg
    //     ];
    //     if (!$estado) {
    //         echo json_encode($resultado);
    //         exit;
    //     }
    
    // }

    // // Verificar existencia de celular
    // $usuarioExistenteCelular = verificarExistencia($celular, $ntele);
    // if ($usuarioExistenteCelular && $usuarioExistenteCelular['ID_user'] !== $idUsuario) {
    //     $estado = false;
    //     $msg = "Este celular ya está siendo utilizado, ingrese un celular distinto";
    //     $resultado = [
    //         'estado' => $estado,
    //         'msg' => $msg
    //     ];
    //     if (!$estado) {
    //         echo json_encode($resultado);
    //         exit;
    //     }
    
    // }
    $usuario = new Usuario($idUsuario, $nombres, $apellidos, $email, $contrasena, $celular, $idPrograma, $idRol);
    $user = modificarUsuario($usuario);

    $estado = true;
    $msg = "Usuario actualizado";
   

    $resultado = [
        'estado' => $estado,
        'msg' => $msg
    ];
    echo json_encode($resultado);