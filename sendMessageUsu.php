<?php
    include "db.php";

    if (!isset($_POST['msg']) || empty($_POST['msg'])) {
        // Si no hay mensaje, redirecciona o muestra un error
        echo "No se puede enviar un mensaje vacío.";
        exit;
    }

    // Mensaje predeterminado para usuario no registrado
    $nombre = "Usuario  Invitado";
    $msg = mysqli_real_escape_string($conexion, $_POST['msg']);

    // Inserta el mensaje en la base de datos
    $sql = "INSERT INTO chat (nombre, message) VALUES ('$nombre', '$msg')";
    
    if (mysqli_query($conexion, $sql)) {
        // Redirigir al chat o refrescar la página
        header('Location: chatusuario.php');
    } else {
        echo "Error al enviar el mensaje: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
?>
