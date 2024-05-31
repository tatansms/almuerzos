<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . "/../../vendor/autoload.php";  // Ruta al archivo autoload.php

$mail = new PHPMailer(true);

//mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->SMTPDebug = 3;
$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->Username = "myemail17241798@gmail.com";
$mail->Password = "3002794868";
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
    );
$mail->isHtml(true);

return $mail;
 