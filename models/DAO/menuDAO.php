<?php
require_once("datasource.php");
require_once(__DIR__ . "/../entities/AlmuerzosEnMenu.php");

class AlmuerzoEnMenuDAO
{
    public function leerAlmuerzosMenu(){
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT a.ID_almuerzo, a.nombre AS nombreAl, m.ID_menu, d.nombre AS dia
                  FROM Almuerzo a
                  INNER JOIN Almuerzos_En_Menu am ON a.ID_almuerzo = am.ID_almuerzo
                  INNER JOIN Menu m ON am.ID_menu = m.ID_menu
                  INNER JOIN Dia_almuerzo d ON m.ID_dia = d.ID_dia", null);

        if (!$data_table) {
            return array();
        }

        $almuerzosEnMenu = array();

        foreach($data_table as $fila){
            $almuerzoEnMenu = array(
                'ID_almuerzo' => $fila["ID_almuerzo"],
                'nombre' => $fila["nombreAl"],
                'ID_menu' => $fila["ID_menu"],
                'dia' => $fila["dia"]
            );
            $almuerzosEnMenu[] = $almuerzoEnMenu;
        }
        
        return $almuerzosEnMenu;
    }
    public function buscarAlmuerzoMenuPorId($id,$menu){
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT a.ID_almuerzo, a.nombre AS nombreAl, m.ID_menu, d.ID_dia, d.nombre AS dia
                  FROM Almuerzo a
                  INNER JOIN Almuerzos_En_Menu am ON a.ID_almuerzo = am.ID_almuerzo
                  INNER JOIN Menu m ON am.ID_menu = m.ID_menu
                  INNER JOIN Dia_almuerzo d ON m.ID_dia = d.ID_dia
                  WHERE am.ID_almuerzo = :ID_almuerzo and am.ID_menu = :ID_menu", array(':ID_almuerzo' => $id, ':ID_menu' => $menu));

        if (!$data_table) {
            return array();
        }

        $almuerzosEnMenu = array();

        foreach($data_table as $fila){
            $almuerzoEnMenu = array(
                'ID_almuerzo' => $fila["ID_almuerzo"],
                'nombre' => $fila["nombreAl"],
                'ID_menu' => $fila["ID_menu"],
                'ID_dia' => $fila["ID_dia"],
                'dia' => $fila["dia"]
            );
            $almuerzosEnMenu[] = $almuerzoEnMenu;
        }
        
        return $almuerzosEnMenu;
    }

    public function borrarAlmuerzoMenu($ID, $menu)
    {
        $data_source = new DataSource();
        $resultado = $data_source->ejecutarActualizacion("DELETE FROM Almuerzos_En_Menu WHERE ID_almuerzo = :ID_almuerzo and ID_menu = :ID_menu", array(':ID_almuerzo' => $ID, ':ID_menu' => $menu));

        return $resultado;
    }
    public function insertarAlmuerzoMenu($almuerzo){
        $data_source = new DataSource();
        $sql = "INSERT INTO Almuerzos_En_Menu (ID_menu,ID_almuerzo) VALUES (:ID_menu,:ID_almuerzo)";
        $resultado = $data_source->ejecutarActualizacion(
            $sql,
            array(
                ':ID_almuerzo' => $almuerzo->getID_almuerzo(),
                ':ID_menu' => $almuerzo->getID_menu(),
            )
        );


        return $resultado;
    }
}

?>
