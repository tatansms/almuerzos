<?php

require_once("datasource.php");
require_once(__DIR__ . "/../entities/DiaAlmuerzo.php");

/**
 * Description of ProgramaDAO
 */
class DiaDAO
{
    /* public function buscarDiaPorId($id)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM Programa WHERE ID_programa = :id", array(':id' => $id));
        $programa = null;

        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $programa = new Programa(
                    $data_table[$indice]["ID_programa"],
                    $data_table[$indice]["nombre"],
                    $data_table[$indice]["ID_facultad"]
                );
            }
            return $programa;
        } else {
            return null;
        }
    } */
    public function verDias()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT ID_dia, nombre FROM Dia_Almuerzo", null);

        if (!$data_table) {
            return array();
        }
        $diass = array();

        
        foreach ($data_table as $indice => $valor) {
            $dia = new Dia_Almuerzo(
                $data_table[$indice]["ID_dia"],
                $data_table[$indice]["nombre"]
            );
            array_push($diass, $dia);
        


        $diasArray = array();

        foreach ($diass as $dia) {
            $diaArray = array(
                'ID_dia' => $dia->getID_dia(),
                'nombre' => $dia->getNombre(),
            );

            $diasArray[] = $diaArray;
        }
        }
        return $diasArray;
    }
}
