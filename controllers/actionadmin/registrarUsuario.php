<?php
   
    session_start();
    
    require_once (__DIR__."/../mdb/mdbUser.php");
    require_once (__DIR__."/../../models/entities/Usuario.php");
    
        $nombres = filter_input(INPUT_POST,'nombres');
        $apellidos = filter_input(INPUT_POST,'apellidos');
        $email = filter_input(INPUT_POST,'email');
        $contrasena = filter_input(INPUT_POST,'contrasena');
        $celular = filter_input(INPUT_POST,'celular');
        $idRol = filter_input(INPUT_POST,'rol');
        $idPrograma = filter_input(INPUT_POST,'programa');
        $nemail="Email";
        $ntele="Celular";
        // Verificar existencia de email
        if (verificarExistencia($email, $nemail)) {
            $estado = false;
            $msg = "Este email ya está siendo utilizado, ingrese un email distinto";
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
        if (verificarExistencia($celular, $ntele)) {
            $estado = false;
            $msg = "Este celular ya está siendo utilizado, ingrese un celular distinto";
            $resultado = [
                'estado' => $estado,
                'msg' => $msg
            ];
            if (!$estado) {
                echo json_encode($resultado);
                exit;
            }
        
        }

        $usuario = new Usuario(NULL, $nombres, $apellidos, $email, $contrasena, $celular, $idPrograma, $idRol);
        $success  = insertarUsuario($usuario);

            $estado=true;
        
        
        $msg =  "El usuario ha sido registrado correctamente";
        $resultado = [
            'estado' => $estado,
            'msg' => $msg
        ];
    
    echo json_encode($resultado);
        
        

