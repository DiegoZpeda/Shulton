<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include('db.php');

$nombre = $_POST['txtnombre'];
$apellido = $_POST['txtapeido'];
$edad = $_POST['txtedad'];
$correo = $_POST['txtcorreo'];
$passwor = $_POST['txtpasswor'];
$passwor_encriptada = password_hash($passwor, PASSWORD_BCRYPT);

$consulta = "INSERT INTO `usuarios` (`nombre`, `apellido`, `edad`, `correo`, `passwor`, `id_rol`)
VALUES ('$nombre', '$apellido', '$edad', '$correo', '$passwor_encriptada', '2')";

if (mysqli_query($conexion, $consulta)) {
// Cargar la configuración de PHPMailer desde mailer.php
$mail = require __DIR__ . "/mailer.php";

try {
  // Configura los detalles del correo
  $mail->setFrom("noreply@example.com", "Shulton Parking");
  $mail->addAddress($correo);
  $mail->Subject = "Bienvenido a Shulton Parking";
  $mail->Body = <<<END
  <div style="font-family: Arial, sans-serif; color: #333;">
      <h1 style="color: #2E86C1;">¡Hola $nombre!</h1>

      <p>¡Gracias por unirte a <strong>Shulton Parking</strong>! Estamos encantados de que formes parte de nuestra comunidad.</p>

      <p>Con <strong>Shulton Parking</strong>, tendrás acceso fácil y rápido a los mejores estacionamientos en Usulután, con rutas dinámicas y todos los estacionamientos marcados en un mapa interactivo.</p>

      <h2 style="color: #2980B9;">¿Qué puedes hacer en Shulton Parking?</h2>
      <ul style="line-height: 1.6;">
          <li><strong>Encuentra estacionamientos</strong>: Usa nuestro mapa interactivo donde cada estacionamiento está claramente señalado para que siempre encuentres el lugar perfecto.</li>
          <li><strong>Guarda tus favoritos</strong>: Mantén a mano tus estacionamientos preferidos en una sección especial y accede a ellos rápidamente cuando lo necesites.</li>
      </ul>

      <p>Si tienes alguna pregunta o necesitas ayuda, no dudes en contactarnos. Estamos aquí para hacer tu experiencia más sencilla.</p>

      <p style="margin-top: 40px;">¡Bienvenido de nuevo y disfruta de <strong>Shulton Parking</strong>!</p>

      <p>Saludos cordiales,<br><em>El equipo de Shulton Parking</em></p>

      <div style="margin-top: 30px;">
          <p style="color: #999; font-size: 12px;">Shulton Parking | Usulután | Contacto: soporte@shultonparking.com</p>
      </div>
  </div>
  END;
  $mail->send();


//Mensaje de Exito al crear la cuenta
echo "
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<script language='JavaScript'>
document.addEventListener('DOMContentLoaded', function() {
  Swal.fire({
      icon: 'success',
      title: 'Cuenta Creada con Éxito',
      showCancelButton: false,
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Aceptar',
      timer: 2500
  }).then(() => {
      location.assign('login.php');
  });
});
</script>";
//Error al enviar el correo de bienvenida
} catch (Exception $e) {
echo "
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<script language='JavaScript'>
document.addEventListener('DOMContentLoaded', function() {
  Swal.fire({
      icon: 'error',
      title: 'Error al Enviar el Correo',
      text: 'Hubo un error al enviar el correo de bienvenida. Por favor, intenta de nuevo.',
      showCancelButton: false,
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Aceptar',
      timer: 2500
  }).then(() => {
      location.assign('registrarse.php');
  });
});
</script>";
}
} else {
//Error
echo "
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<script language='JavaScript'>
document.addEventListener('DOMContentLoaded', function() {
Swal.fire({
  icon: 'error',
  title: 'Error de Registro',
  text: 'Hubo un problema al registrar la cuenta. Intenta nuevamente.',
  showCancelButton: false,
  confirmButtonColor: '#3085d6',
  confirmButtonText: 'Aceptar',
  timer: 2500
}).then(() => {
  location.assign('registrarse.php');
});
});
</script>";
}

mysqli_close($conexion);
?>
