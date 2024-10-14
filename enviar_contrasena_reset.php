<?php
session_start();
$correo = $_POST["correo"];

// Generar un token y su hash para la seguridad
$token = bin2hex(random_bytes(16));
$token_hash = hash("sha256", $token);
$expiry = date("Y-m-d H:i:s", time() + 60 * 30); // 30 minutos de validez

// Conectar a la base de datos y actualizar el token de restablecimiento
$mysqli = require __DIR__ . "/database.php";

$sql = "UPDATE usuarios
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE correo = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sss", $token_hash, $expiry, $correo);
$stmt->execute();

if ($stmt->affected_rows) {
    // Cargar la configuración de PHPMailer desde mailer.php
    $mail = require __DIR__ . "/mailer.php";

    try {
        // Configura los detalles del correo
        $mail->setFrom("noreply@example.com", "Shulton Parking");
        $mail->addAddress($correo);
        $mail->Subject = "Restablecer Cuenta Shulton Parking";
        $mail->Body = <<<END
        <h1>Hemos recibido una solicitud para restablecer la contraseña de tu cuenta en Shulton Parking. Para completar este proceso, por favor sigue el enlace:</h1>
        <p><a href="http://localhost/shulton_parking/reestablecer_contrasena.php?token=$token">Haz clic aquí para restablecer tu contraseña</a></p>
        <p>Si no has solicitado restablecer tu contraseña, por favor ignora este correo o ponte en contacto con nuestro equipo de soporte.</p>
        <p>Gracias por confiar en Shulton Parking.</p>
        <p>Saludos cordiales,<br>El equipo de Shulton Parking</p>
        END;

        // Envía el correo
        $mail->send();
        header("Location: correo_enviado.php");
        exit();
    } catch (Exception $e) {
        $_SESSION['error_message'] = "¡Error! No se ha podido enviar su mensaje. Por favor, inténtelo de nuevo.";
        $_SESSION['correo'] = $correo;
        header("Location: olvido_contra.php");
        exit();
    }
} else {
    $_SESSION['error_message'] = "¡Error! El correo electrónico ingresado no es válido. Por favor, revise la dirección de correo y vuelva a intentarlo.";
    $_SESSION['correo'] = $correo;
    header("Location: olvido_contra.php");
    exit();
}
?>