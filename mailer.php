<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . "/vendor/autoload.php";

function createMailer($provider) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->isHTML(true);

    switch ($provider) {
        case 'gmail':
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->Username = "soporteshultonparking@gmail.com";
            $mail->Password = "kcrwkfvzkczfccsi";
            break;

        case 'outlook':
            $mail->Host = "smtp.office365.com";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->Username = "soporte_shultonparking@outlook.com";
            $mail->Password = "9Bd$7nm#R!tkJ#s";
            break;

        default:
            throw new Exception("Proveedor no soportado: " . $provider);
    }

    return $mail;
}

return createMailer('gmail'); 

