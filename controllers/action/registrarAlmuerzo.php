<?php
   
    session_start();
    
    require_once (__DIR__."/../mdb/mdbAlmuerzo.php");
    require_once (__DIR__."/../../models/entities/Almuerzo.php");
    
        $nombre = filter_input(INPUT_POST,'nombre');
        $descripcion = filter_input(INPUT_POST,'descripcion');

        
        $almuerzo = new Almuerzo(NULL, $nombre, $descripcion);
        $success  = insertarAlmuerzo($almuerzo);

            $estado=true;
        

        $msg =  "El almuerzo ha sido registrado correctamente";
        $resultado = [
            'estado' => $estado,
            'msg' => $msg
        ];
    
    echo json_encode($resultado);
        
        

