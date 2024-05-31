<?php
   
    session_start();
    
    require_once (__DIR__."/../mdb/mdbMenu.php");
    require_once (__DIR__."/../../models/entities/AlmuerzosEnMenu.php");
    
        $almuer = filter_input(INPUT_POST,'ID_almuerzo');
        $menu = filter_input(INPUT_POST,'dia');

        $comprobar=buscarAlmuerzoMenuPorId($almuer,$menu);
        if($comprobar===null){
            $estado=false;
            $msg =  "El almuerzo ya existe, inserta uno distinto";
                $resultado = [
                    'estado' => $estado,
                    'msg' => $msg
                ];
            
            echo json_encode($resultado);
            exit;
        }
        $almuerzo = new Almuerzos_En_Menu($almuer, $menu);
        $success  = insertarAlmuerzoMenu($almuerzo);

            $estado=true;
        

        $msg =  "Se ingresó el almuerzo al dia correctamente";
        $resultado = [
            'estado' => $estado,
            'msg' => $msg
        ];
    
    echo json_encode($resultado);
        
        

