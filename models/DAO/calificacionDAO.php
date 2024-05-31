<?php
require_once("datasource.php");
require_once(__DIR__ . "/../entities/Calificacion.php");

class CalificacionDAO{
    public function yaCalifico($idUsuario, $fecha) {
        $fecha = date('Y-m-d');
        $data_source = new DataSource();
        $sql = "SELECT COUNT(*) AS count_calificaciones FROM Calificacion 
                WHERE ID_estudiante = :idUsuario AND fecha_calificacion = :fecha";
        $params = array(':idUsuario' => $idUsuario, ':fecha' => $fecha);
    
        $resultado = $data_source->ejecutarConsulta($sql, $params);
        if ($resultado !== false && count($resultado) > 0 && $resultado[0]['count_calificaciones'] > 0) {
            return true; 
        } else {
            return false;
        }
    }

    public function agregarCalificacion(Calificacion $calificacion){
        $data_source = new DataSource();
        $sql = "INSERT INTO Calificacion (ID_estudiante, ID_almuerzo, calificacion, descripcion, fecha_calificacion) 
                VALUES (:ID_estudiante, :ID_almuerzo, :calificacion, :descripcion, :fecha_calificacion)";
        $resultado = $data_source->ejecutarActualizacion(
            $sql,
            array(
                ':ID_estudiante' => $calificacion->getID_estudiante(),
                ':ID_almuerzo' => $calificacion->getID_almuerzo(),
                ':calificacion' => $calificacion->getCalificacion(),
                ':descripcion' => $calificacion->getDescripción(),
                ':fecha_calificacion' => $calificacion->getFecha_calificación()
            )
        );
        return $resultado;
    }
    
    
    
}