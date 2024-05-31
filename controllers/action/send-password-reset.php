<?php

$email = $_POST["email"];

$token = bin2hex(random_bytes(16));
$expiry = date("Y-m-d H:i:s", time() + 60 * 30);
$token_hash = hash("sha256", $token);

require_once("../../controllers/mdb/mdbUser.php");
require_once("../../models/entities/Token.php");  // Importa la clase DataSource

$nemail="Email";

// Obtén el ID_user correspondiente al correo electrónico

$userexiste = verificarExistencia($email,$nemail);

// Verifica si se encontró el usuario
if ($userexiste) {
    $userId = $userexiste[0]['ID_user'];

    $tokenuser= new Token($userId,$token,$expiry);
    
    // Actualiza la tabla Token
    $result=agregarToken($tokenuser);
    if ($result) {
        $mail = require __DIR__ . "/mailer.php";

        $mail->setFrom("noreply@example.com");
        $mail->addAddress($email);
        $mail->Subject = "Password Reset";
        $mail->Body = <<<END
        Click <a href="http://example.com/reset-password.php?token=$token">here</a> 
        to reset your password.
        END;

        try {
            $mail->send();
            echo "Message sent, please check your inbox.";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error updating Token table.";
    }
} else {
    echo "User not found with the provided email.";
}
