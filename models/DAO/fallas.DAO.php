<?php
require_once("datasource.php"); // Asegúrate de que el archivo de DataSource se incluya correctamente
require_once(__DIR__ . "/../entities/Falla.php"); // Ajusta la ruta según la estructura de tu proyecto

class FallaDAO {

    public function buscarFallasPorUsuario($ID_user) {
        $data_source = new DataSource();    
        $data_table = $data_source->ejecutarConsulta("SELECT f.ID_falla, f.fecha 
                                             FROM falla f 
                                             JOIN falla_dia_almuerzo fda ON f.ID_falla = fda.ID_falla 
                                             WHERE fda.ID_user = :id_user", array(':id_user' => $ID_user));

        $fallas = array();
        if (!$data_table) {
            return array();
        }

        foreach ($data_table as $indice => $valor) {
            $falla = new Falla(
                $data_table[$indice]["ID_falla"],
                $data_table[$indice]["fecha"]
            );
            array_push($fallas, $falla);
        }

        $fallasArray = array();
        foreach ($fallas as $falla) {
            $fallaArray = array(
                'ID_falla' => $falla->getID_falla(),
                'fecha' => $falla->getFecha(),
            );
            $fallasArray[] = $fallaArray;
        }
        return $fallasArray;
    }
}
?>
