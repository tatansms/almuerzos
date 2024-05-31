<?php

require_once("datasource.php");
require_once(__DIR__ . "/../entities/Estudiantes_En_Fila.php");

class FilaDAO{
    public function ingresarAFila($estudianteEnFila) {
        $data_source = new DataSource();
        $sql = "INSERT INTO Estudiantes_En_Fila (ID_estudiante, ID_fila, turno, hora_ingreso) 
                VALUES (:ID_estudiante, :ID_fila, :turno, :hora_ingreso)";
        $params = array(
            ':ID_estudiante' => $estudianteEnFila->getID_estudiante(),
            ':ID_fila' => $estudianteEnFila->getID_fila(),
            ':turno' => $estudianteEnFila->getTurno(),
            ':hora_ingreso' => $estudianteEnFila->getHora_ingreso()
        );
        $resultado = $data_source->ejecutarActualizacion($sql, $params);
        return $resultado;
    }
    
    public function salirDeFila($idUsuario){
        $data_source = new DataSource();
        $sql = "DELETE FROM Estudiantes_En_Fila WHERE ID_estudiante = :idUsuario";
        $params = array(':idUsuario' => $idUsuario);
        $resultado = $data_source->ejecutarActualizacion($sql, $params);
    
        return $resultado;
    }

    public function estaEnFila($idUsuario){
        $data_source = new DataSource();
        $sql = "SELECT COUNT(*) AS count_estudiantes FROM Estudiantes_En_Fila
        WHERE ID_estudiante = :idUsuario";
        $params = array(':idUsuario' => $idUsuario);
        $resultado = $data_source->ejecutarConsulta($sql, $params);

    if ($resultado !== false && count($resultado) > 0 && $resultado[0]['count_estudiantes'] > 0) {
        return true; 
    } else {
        return false;
    }
    }

    

}

?>
