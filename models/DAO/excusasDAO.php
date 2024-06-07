<?php
require_once("datasource.php"); // Asegúrate de que el archivo de DataSource se incluya correctamente
require_once(__DIR__ . "/../entities/Excusa.php"); // Ajusta la ruta según la estructura de tu proyecto

class ExcusaDAO {

    public function buscarExcusasPorUsuario($ID_user) {
        $data_source = new DataSource();    
        $data_table = $data_source->ejecutarConsulta("SELECT e.ID_excusa, e.convocatoria, e.descripcion, e.fecha 
                                             FROM Excusa e 
                                             JOIN excusa_dia_almuerzo ida ON e.ID_excusa = ida.ID_excusa 
                                             WHERE ida.ID_user = :id_user", array(':id_user' => $ID_user));

        $excusas = array();
        if (!$data_table) {
            return array();
        }

        foreach ($data_table as $indice => $valor) {
            $excusa = new Excusa(
                $data_table[$indice]["ID_excusa"],
                $data_table[$indice]["convocatoria"],
                $data_table[$indice]["descripcion"],
                $data_table[$indice]["fecha"]
            );
            array_push($excusas, $excusa);
        }

        $excusasArray = array();
        foreach ($excusas as $excusa) {
            $excusaArray = array(
                'ID_excusa' => $excusa->getID_excusa(),
                'convocatoria' => $excusa->getConvocatoria(),
                'descripcion' => $excusa->getDescripcion(),
                'fecha' => $excusa->getFecha(),
            );
            $excusasArray[] = $excusaArray;
        }
        return $excusasArray;
    }

    public function agregarNuevaExcusa($ID_user, $ID_dia, $descripcion, $fecha, $convocatoria) {
        $data_source = new DataSource();
        try {
            $data_source->beginTransaction(); // Iniciar la transacción

            // Paso 1: Insertar en la tabla principal
            $sql = "INSERT INTO Excusa (descripcion, fecha, convocatoria) VALUES (:descripcion, :fecha, :convocatoria)";
            $params = array(
                ':descripcion' => $descripcion,
                ':fecha' => $fecha,
                ':convocatoria' => $convocatoria
            );
            $data_source->ejecutarActualizacion($sql, $params);
            $ID_excusa = $data_source->lastInsertId(); // Obtener el ID de la última inserción

            // Paso 2: Insertar en la tabla de relaciones
            $sql = "INSERT INTO excusa_dia_almuerzo (ID_dia, ID_user, ID_excusa) VALUES (:ID_dia, :ID_user, :ID_excusa)";
            $params = array(
                ':ID_dia' => $ID_dia,
                ':ID_user' => $ID_user,
                ':ID_excusa' => $ID_excusa
            );
            $data_source->ejecutarActualizacion($sql, $params);

            $data_source->commit(); // Confirmar la transacción
            $data_source->closeConnection(); // Cerrar la conexión manualmente
            return true;
        } catch (Exception $e) {
            $data_source->rollback(); // Revertir la transacción en caso de error
            $data_source->closeConnection(); // Cerrar la conexión manualmente
            throw $e;
        }
    }
}
?>
