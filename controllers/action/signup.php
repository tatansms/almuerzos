<?php
require_once("../../controllers/mdb/mdbUser.php");
require_once("../../models/entities/Usuario.php");


    $nombre = $_POST['name'];
    $apellido = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['pswd'];
    $telefono = $_POST['phone'];
    $ID_programa = $_POST['programa'];
    $ID_rol = 1;
    $msg="por default";
    $nemail="Email";
    $ntele="Celular";
    // Verificar existencia de email
    if (verificarExistencia($email, $nemail)) {
        $estado = false;
        $msg = "Este email ya está siendo utilizado, inicie sesión o ingrese un email distinto";
        $resultado = [
            'estado' => $estado,
            'msg' => $msg
        ];
        if (!$estado) {
            echo json_encode($resultado);
            exit;
        }
    
    }

    // Verificar existencia de celular
    if (verificarExistencia($telefono, $ntele)) {
        $estado = false;
        $msg = "Este celular ya está siendo utilizado,inicie sesión o ingrese un celular distinto";
        $resultado = [
            'estado' => $estado,
            'msg' => $msg
        ];
        if (!$estado) {
            echo json_encode($resultado);
            exit;
        }
    
    }



    $usuario = new Usuario(NULL, $nombre, $apellido, $email, $password, $telefono, $ID_programa, $ID_rol);
    $success = insertarUsuario($usuario);


    $estado=true;
    
    $msg =  "El usuario ha sido registrado correctamente, Inicia sesion";
    $resultado = [
        'estado' => $estado,
        'msg' => $msg
    ];
    echo json_encode($resultado);


?>
