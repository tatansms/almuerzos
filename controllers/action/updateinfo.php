<?php
session_start();
require_once("../../controllers/mdb/mdbUser.php");
require_once("../../models/entities/Usuario.php");

// Obtén los datos del formulario
$nombre = $_POST['nuevoNombre'];
$apellido = $_POST["nuevoApellido"];
$email = $_POST['nuevoEmail'];
$telefono = $_POST['nuevoTelefono'];
$email = $_POST['nuevoEmail'];
$nuevaContraseña = $_POST['nuevaContraseña'];
$confirmarContraseña = $_POST['confirmarContraseña'];

// Inicializa el mensaje de error
$estado;
$msg = '';

/* 
    $userID = $_SESSION['ID_USUARIO'];
    $usuarioExistenteEmail = verificarExistencia($email, $nemail);
if ($usuarioExistenteEmail && $usuarioExistenteEmail['ID_user'] != $userID) {
    $estado = false;
    $msg = "Este email ya está siendo utilizado, ingrese un email distinto";
    $resultado = [
        'estado' => $estado,
        'msg' => $msg
    ];
    
        echo json_encode($resultado);
        exit;
    

}

// Verificar existencia de celular
$usuarioExistenteCelular = verificarExistencia($telefono, $ntele);
if ($usuarioExistenteCelular && $usuarioExistenteCelular['ID_user'] != $userID) {
    $estado = false;
    $msg = "Este celular ya está siendo utilizado, ingrese un celular distinto";
    $resultado = [
        'estado' => $estado,
        'msg' => $msg
    ];
    
        echo json_encode($resultado);
        exit;
    

}
 */
// Comprueba si se proporcionó una nueva contraseña
if (!empty($nuevaContraseña) && !empty($confirmarContraseña) ) {
    // Comprueba la coincidencia con la confirmación
    if ($nuevaContraseña == $confirmarContraseña) {
        // Actualiza la contraseña solo si se proporciona y coincide con la confirmación
        $usuario = new Usuario(
            $_SESSION["ID_USUARIO"],
            $nombre,
            $apellido,
            $email,
            $nuevaContraseña, // Hashea la nueva contraseña
            $telefono,
            $_SESSION["ID_PROGRAMA"],
            $_SESSION["ID_ROL"]
        );
    } else {
        // Muestra un mensaje de error si las contraseñas no coinciden
        $estado=false;
        $msg = 'Las contraseñas no coinciden';
    }
} else {
    // Si no se proporciona una nueva contraseña, mantiene la contraseña actual
    $usuario = new Usuario(
        $_SESSION["ID_USUARIO"],
        $nombre,
        $apellido,
        $email,
        $_SESSION["CONTRASENA"],
        $telefono,
        $_SESSION["ID_PROGRAMA"],
        $_SESSION["ID_ROL"]
    );
}

// Actualiza el usuario si no hay errores
if (empty($msg)) {
    $resultado = modificarUsuario($usuario);

    unset($_SESSION["NOMBRE"]);
    unset($_SESSION["APELLIDO"]);
    unset($_SESSION["CELULAR"]);
    unset($_SESSION["EMAIL"]);
    unset($_SESSION['ID_PROGRAMA']);
    unset($_SESSION['CONTRASENA']);

    $_SESSION['NOMBRE'] = $usuario->getNombre();
    $_SESSION['APELLIDO'] = $usuario->getApellido();
    $_SESSION['CELULAR'] = $usuario->getCelular();
    $_SESSION['EMAIL'] = $usuario->getEmail();
    $_SESSION['ID_PROGRAMA'] = $usuario->getID_programa();
    $_SESSION['CONTRASENA'] = $usuario->getContrasena();

    // Redirige según el resultado
    $estado=true;
    $msg =  "Los cambios han sido registrados correctamente";
    $resultado = [
        'estado' => $estado,
        'msg' => $msg
    ];
} 

echo json_encode($resultado);
?>