<?php

require_once("datasource.php");
require_once(__DIR__ . "/../entities/Programa.php");

/**
 * Description of ProgramaDAO
 */
class ProgramaDAO
{
    public function buscarProgramaPorId($id)
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
    }
    public function verProgramas()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT ID_programa, nombre FROM Programa", null);

        if (!$data_table) {
            return array();
        }
        $programas = array();

        foreach ($data_table as $fila) {
            $idPrograma = isset($fila["ID_programa"]) ? $fila["ID_programa"] : null;
            $nombrePrograma = isset($fila["nombre"]) ? $fila["nombre"] : null;
            $programa = array(
                'ID_programa' => $idPrograma,
                'nombre' => $nombrePrograma
            );
            $programas[] = $programa;
        }
        return $programas;
    }

    // En tu mdbUser.php
    // En tu archivo mdbUser.php
    function obtenerCantidadUsuariosPorPrograma()
    {
        // Realiza la consulta SQL necesaria para obtener la cantidad de usuarios por programa
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT programa.nombre AS Programa, COUNT(usuario.ID_user) AS CantidadUsuarios
        FROM Usuario
        JOIN Programa ON Usuario.ID_programa = Programa.ID_programa
        GROUP BY Programa.ID_programa
    ", NULL);

        // Retorna los resultados
        return $data_table;
    }

    
}
