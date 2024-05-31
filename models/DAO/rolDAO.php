<?php

require_once("datasource.php");
require_once(__DIR__ . "/../entities/Rol.php");

class RolDAO
{
    public function buscarRolPorId($ID_rol)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM Rol WHERE ID_rol = :ID_rol", array(':ID_rol' => $ID_rol));

        $rol = null;
        if (count($data_table) == 1) {
            foreach ($data_table as $indice => $valor) {
                $rol = new Rol(
                    $data_table[$indice]["ID_rol"],
                    $data_table[$indice]["Nombre"]
                );
            }
        }

        return $rol;
    }
}

?>
