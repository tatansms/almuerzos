<?php require_once("datasource.php");
require_once(__DIR__ . "/../entities/Donación.php");
class DonacionesDAO{
    public function verDonaciones($fechaActual){
        $fechaActual = date('Y-m-d');
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("
        SELECT D.ID_donacionPendiente, CONCAT(U.Nombre, ' ', U.Apellido) AS nombreDonante, P.nombre AS NombrePrograma, D.ID_donante
        FROM DonacionPendiente D
        INNER JOIN Usuario U ON D.ID_donante = U.ID_user
        INNER JOIN Programa P ON U.ID_programa = P.ID_programa
        WHERE DATE(D.fecha) = :fechaActual;
    ", array(':fechaActual' => $fechaActual));

        // Verificar si hay resultados
        if (!$data_table) {
            return array();
        }

        $donaciones = array(); 
        foreach ($data_table as $fila) {
            $idDonacionPendiente = isset($fila["ID_donacionPendiente"]) ? $fila["ID_donacionPendiente"] : null;
            $idDonante = isset($fila["ID_donante"]) ? $fila["ID_donante"] : null;
            $nombreDonante = isset($fila["nombreDonante"]) ? $fila["nombreDonante"] : null;
            $nombrePrograma = isset($fila["NombrePrograma"]) ? $fila["NombrePrograma"] : null;

            $donacion = array(
                'ID_donacionPendiente' => $idDonacionPendiente,
                'ID_donante' =>  $idDonante,
                'NombreDonante' => $nombreDonante,
                'NombrePrograma' => $nombrePrograma
            );
            $donaciones[] = $donacion;
        }
        return $donaciones;
    }

    
    public function haRecibidoDonacion($idUsuario) {
        $fechaActual = date('Y-m-d');
        $data_source = new DataSource();
        $sql = "SELECT COUNT(*) AS count_donaciones FROM Donacion WHERE ID_beneficiario = :idUsuario AND fecha = :fechaActual";
        $params = array(':idUsuario' => $idUsuario, ':fechaActual' => $fechaActual);
        $resultado = $data_source->ejecutarConsulta($sql, $params);
    
        if ($resultado !== false && $resultado[0]['count_donaciones'] == 1) {
            return true; 
        } else {
            return false; 
        }
    }

    public function agregarDonacion($idBeneficiario, $idDonante){
        $horaActual = date('H:i:s');
        $fechaActual = date('Y-m-d');
        $data_source = new DataSource();
        $sql = "INSERT INTO Donacion (ID_donante, ID_beneficiario, fecha, hora) VALUES (:idDonante, :idBeneficiario, :fecha, :hora)";
        $params = array(
            ':idDonante' => $idDonante,
            ':idBeneficiario' => $idBeneficiario,
            ':fecha' => $fechaActual,
            ':hora' => $horaActual
        );
        $resultado = $data_source->ejecutarActualizacion($sql, $params);
        return $resultado;
    }

    public function asignarAlmuerzoBeneficiario($idDia, $idBeneficiario) {
        $data_source = new DataSource();
        $sql = "INSERT INTO Dias_Almuerzos_Estudiante (ID_dia, ID_estudiante) VALUES (:idDia, :idEstudiante)";
        $params = array(':idDia' => $idDia, ':idEstudiante' => $idBeneficiario);
        $resultado = $data_source->ejecutarActualizacion($sql, $params);
        return $resultado; 
    }

    public function quitarAlmuerzoDonante($idDonante) {
        $data_source = new DataSource();
        $sql = "DELETE FROM Dias_Almuerzos_Estudiante WHERE ID_estudiante = :idEstudiante";
        $params = array(':idEstudiante' => $idDonante);
        $resultado = $data_source->ejecutarActualizacion($sql, $params);
        return $resultado; 
    }

    // function devolverDiaAlDonante($donacionesConFechaDiferente,$idDia) {
    //     $data_source = new DataSource();
    //     foreach ($donacionesConFechaDiferente as $donacion) {
    //         $idDonante = $donacion['ID_donante']; 
    //         $resultado = restaurarAlmuerzoDonante($idDonante, $idDia); // Utiliza tu función existente
    //         if ($resultado) {
    //             return true;
    //         } else {
    //             return false;
    //         }
    //     }
    // }

    public function restaurarAlmuerzoDonante($idDonante, $idDia) {
        $data_source = new DataSource();
        $sql = "INSERT INTO Dias_Almuerzos_Estudiante (ID_dia, ID_estudiante) VALUES (:idDia, :idEstudiante)";
        $params = array(':idDia' => $idDia, ':idEstudiante' => $idDonante);
        $data_source->ejecutarActualizacion($sql, $params);
    }

//LISTOOOOOOOOOO---------------------------
    public function comprobarPswdDonar($password, $idUsuario){
        $data_source = new DataSource();
        $sql = "SELECT ID_user FROM Usuario WHERE ID_user = :idUsuario AND Contrasena = :password";
        $params = array(':idUsuario' => $idUsuario, ':password' => $password);
    
        $resultado = $data_source->ejecutarConsulta($sql, $params);
        if ($resultado && count($resultado) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function agregarDonacionPendiente($idUsuario){
        $fechaActual = date('Y-m-d');
        $data_source = new DataSource();
        $sql = "INSERT INTO DonacionPendiente (ID_donante, fecha) VALUES (:idDonante, :fecha)";
        $params = array(':idDonante' => $idUsuario, ':fecha' => $fechaActual);
        $resultado = $data_source->ejecutarActualizacion($sql, $params);
        return $resultado;
    }

    public function comprobarSiDonó($idUsuario){
        $data_source = new DataSource();
        $sql = "SELECT COUNT(*) AS count_donaciones FROM DonacionPendiente WHERE ID_donante = :idUsuario";
        $params = array(':idUsuario' => $idUsuario);

        $resultado = $data_source->ejecutarConsulta($sql, $params);
        if ($resultado !== false && $resultado[0]['count_donaciones'] > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function cancelarDonación($idUsuario){
        $data_source = new DataSource();
        $sql = "DELETE FROM DonacionPendiente WHERE ID_donante = :idDonante";
        $params = array(':idDonante' => $idUsuario);
        $resultado = $data_source->ejecutarActualizacion($sql, $params);
    
        return $resultado;
    }
    // En tu archivo mdbDonacion.php
function obtenerCantidadDonacionesPorMes()
{
    // Realiza la consulta SQL necesaria para obtener la cantidad de donaciones por mes
    $data_source = new DataSource();
    $data_table = $data_source->ejecutarConsulta("SELECT MONTH(fecha) AS Mes, COUNT(ID_donacionPendiente) AS CantidadDonaciones
        FROM DonacionPendiente
        GROUP BY MONTH(fecha)
    ", NULL);

    // Retorna los resultados
    return $data_table;
}

    
}