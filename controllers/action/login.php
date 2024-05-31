
<?php
session_start();
require_once(__DIR__ . "/../mdb/mdbUser.php");
require_once(__DIR__ . "/../mdb/mdbPrograma.php");
require_once(__DIR__ . "/../mdb/mdbRol.php");
if (isset($_POST['email']) && isset($_POST['pswd'])) {
    // Username y password enviados por formulario
    $username = $_POST['email'];
    $password = $_POST['pswd'];

    $usuario = autenticarUsuario($username, $password);

    if ($usuario != null) { // Puede iniciar sesión
        $_SESSION['ID_USUARIO'] = $usuario->getID_User();
        $_SESSION['NOMBRE'] = $usuario->getNombre();
        $_SESSION['APELLIDO'] = $usuario->getApellido();
        $_SESSION['CELULAR'] = $usuario->getCelular();
        $_SESSION['EMAIL'] = $usuario->getEmail();
        $_SESSION['ID_PROGRAMA'] = $usuario->getID_programa();
        $_SESSION['ID_ROL'] = $usuario->getID_rol();
        $_SESSION['CONTRASENA'] = $usuario->getContrasena();

        $programa = buscarProgramaPorId($usuario->getID_programa());
        $_SESSION['NOMBRE_PROGRAMA'] = $programa->getNombre();
        
        $rol = buscarRolPorId($usuario->getID_rol());
        $_SESSION['NOMBRE_ROL'] = $rol->getNombre();
        
        $estado = true;
        $msg = "Bienvenido ".$_SESSION['NOMBRE'];
        $resultado = [
            'estado' => $estado,
            'msg' => $msg
        ];
       
    } else { // No puede iniciar sesión
        $estado = false;
        $msg = "Error de credenciales";
        $resultado = [
            'estado' => $estado,
            'msg' => $msg
        ];
		}
    
        
        echo json_encode($resultado);
    }
?>

