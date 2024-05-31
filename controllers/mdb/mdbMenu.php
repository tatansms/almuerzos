<?php
require_once(__DIR__."/../../models/DAO/menuDAO.php");
function leerAlmuerzosMenu() {
    $dao = new AlmuerzoEnMenuDAO();
    $almuerzos = $dao->leerAlmuerzosMenu();
    return $almuerzos;
}

/* function modificarAlmuerzoMenu($almuerzo) {
    $dao = new AlmuerzoEnMenuDAO();
    $resultado = $dao->modificarAlmuerzo($almuerzo);
    return $resultado;
} */
function buscarAlmuerzoMenuPorId($almuerzo, $menu) {
    $dao = new AlmuerzoEnMenuDAO();
    $resultado = $dao->buscarAlmuerzoMenuPorId($almuerzo, $menu);
    return $resultado;
}
function borrarAlmuerzoMenu($almuerzo, $menu) {
    $dao = new AlmuerzoEnMenuDAO();
    $resultado = $dao->borrarAlmuerzoMenu($almuerzo, $menu);
    return $resultado;
}
function insertarAlmuerzoMenu($almuerzo) {
    $dao = new AlmuerzoEnMenuDAO();
    $resultado = $dao->insertarAlmuerzoMenu($almuerzo);
    return $resultado;
}
?>
