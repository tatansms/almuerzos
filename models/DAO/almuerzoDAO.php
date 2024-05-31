<?php
require_once("datasource.php");
require_once(__DIR__ . "/../entities/Almuerzo.php");

class AlmuerzoDAO
{
    function obtenerAlmuerzosPorDia($dia)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT al.ID_almuerzo, al.nombre, al.descripcion, COALESCE(ROUND(AVG(ca.calificacion), 2), 0) AS promedioCalificacion 
        FROM Almuerzo al
        LEFT JOIN Calificacion ca ON al.ID_almuerzo = ca.ID_almuerzo
        INNER JOIN Almuerzos_En_Menu am ON al.ID_almuerzo = am.ID_almuerzo 
        INNER JOIN Menu me ON me.ID_menu = am.ID_menu 
        INNER JOIN Dia_almuerzo d ON me.ID_dia = d.ID_dia 
        WHERE d.nombre = :dia
        GROUP BY al.ID_almuerzo, al.nombre, al.descripcion;", array(':dia' => $dia)
        );
        $almuerzos = array();

        foreach ($data_table as $indice => $valor) {
            $almuerzoObj = new Almuerzo(
                $data_table[$indice]["ID_almuerzo"],
                $data_table[$indice]["nombre"],
                $data_table[$indice]["descripcion"],
                $data_table[$indice]["promedioCalificacion"]
            );
            array_push($almuerzos, $almuerzoObj);
        }
        $almuerzosArray = array();

        foreach ($almuerzos as $almuerzo) {
            $almuerzoArray = array(
                'ID_almuerzo'=> $almuerzo->getID_almuerzo(),
                'nombre' => $almuerzo->getNombre(),
                'descripcion' => $almuerzo->getDescripcion(),
                'promedioCalificacion' => $almuerzo->getPromedioCalificacion()
            );

            $almuerzosArray[] = $almuerzoArray;
        }
        return $almuerzosArray;
    }


    public function obtenerAlmuerzosUsuario($usuarioID, $dia)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM Dias_Almuerzos_Estudiante e
            INNER JOIN Dia_almuerzo d ON d.ID_dia = e.ID_dia WHERE e.ID_estudiante = :usuarioID AND d.nombre = :dia",
            array(':usuarioID' => $usuarioID, ':dia' => $dia)
        );

        if (count($data_table) == 1) {
            return true; // El estudiante tiene almuerzo para el día específico
        } else {
            return false; // El estudiante no tiene almuerzo para el día específico
        }
    }
    public function leerAlmuerzos()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM Almuerzo",NULL);
        $almuerzos = array();
        if (!$data_table) {
            return array();
        }
        foreach ($data_table as $indice => $valor) {
            $almuerzo = new Almuerzo(
                $data_table[$indice]["ID_almuerzo"],
                $data_table[$indice]["nombre"],
                $data_table[$indice]["descripcion"]
            );
            array_push($almuerzos, $almuerzo);
        }
        $almuerzosArray = array();

        foreach ($almuerzos as $almuerzo) {
            $almuerzoArray = array(

                'ID_almuerzo' => $almuerzo->getID_almuerzo(),
                'nombre' => $almuerzo->getNombre(),
                'descripcion' => $almuerzo->getDescripcion(),
            );

            $almuerzosArray[] = $almuerzoArray;
        }
        return $almuerzosArray;
    }
    public function modificarAlmuerzo(Almuerzo $almuerzo)
    {
        $data_source = new DataSource();
        $sql = "UPDATE Almuerzo SET ID_almuerzo=:ID_almuerzo, nombre = :nombre, descripcion = :descripcion WHERE ID_almuerzo = :ID_almuerzo";
        $resultado = $data_source->ejecutarActualizacion(
            $sql,
            array(
                ':ID_almuerzo' => $almuerzo->getID_almuerzo(),
                ':nombre' => $almuerzo->getNombre(),
                ':descripcion' => $almuerzo->getDescripcion(),
            )
        );
        return $resultado;
    }
    public function buscarAlmuerzoPorId($ID_almuerzo){
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * 
            FROM Almuerzo
            WHERE ID_almuerzo = :ID_almuerzo",
            array(':ID_almuerzo' => $ID_almuerzo));
    
        if (!$data_table || empty($data_table)) {
            return null; 
        }

        $fila = $data_table[0];
    
        return [
            'ID_almuerzo' => $fila["ID_almuerzo"],
            'nombre' => $fila["nombre"],
            'descripcion' => $fila["descripcion"]
        ];
    }

    public function borrarAlmuerzo($ID)
    {
        $data_source = new DataSource();
        $resultado = $data_source->ejecutarActualizacion("DELETE FROM Almuerzo WHERE ID_almuerzo = :ID_almuerzo", array('ID_almuerzo' => $ID));

        return $resultado;
    }

    public function insertarAlmuerzo(Almuerzo $Almuerzo)
    {
        $data_source = new DataSource();
        $sql = "INSERT INTO Almuerzo (ID_almuerzo, nombre, descripcion) VALUES (:ID_almuerzo, :nombre, :descripcion)";
        $resultado = $data_source->ejecutarActualizacion(
            $sql,
            array(
                ':ID_almuerzo' => $Almuerzo->getID_almuerzo(),
                ':nombre' => $Almuerzo->getNombre(),
                ':descripcion' => $Almuerzo->getDescripcion(),
            )
        );


        return $resultado;
    }
}
