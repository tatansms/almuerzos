<?php
session_start();
unset($_SESSION["ID_USUARIO"]);
unset($_SESSION["NOMBRE"]);
unset($_SESSION["APELLIDO"]);
unset($_SESSION["CELULAR"]);
unset($_SESSION["EMAIL"]);
unset($_SESSION['ID_PROGRAMA']);
unset($_SESSION['ROL']);
unset($_SESSION['CONTRASENA']);
session_destroy();
header("Location: /../../index.php");
?>