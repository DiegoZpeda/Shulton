<?php
include("../shulton_parking/db.php");

session_start();
$user = $_SESSION['correo'];

// Verificar si se está enviando la imagen correctamente
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Comprobar si se ha enviado una imagen
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $foto = $_FILES['foto'];
        $nombreFoto = $foto['name'];
        $rutaDestino = 'uploads/' . $nombreFoto; // Ruta donde se guardará la imagen

        // Mover la imagen subida a la carpeta de destino
        if (move_uploaded_file($foto['tmp_name'], $rutaDestino)) {
            // Actualizar en la base de datos la ruta de la imagen
            $sql = "UPDATE usuarios SET foto = ? WHERE correo = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("ss", $rutaDestino, $user);
            $stmt->execute();
            $stmt->close();

            // Redirigir al perfil del usuario con un mensaje de éxito
            header("Location: perfil.php?mensaje=Imagen actualizada con éxito");
        } else {
            // Si hubo un error al subir la imagen
            header("Location: perfil.php?mensaje=Error al subir la imagen");
        }
    } else {
        // Si no se subió ninguna imagen
        header("Location: perfil.php?mensaje=No se seleccionó ninguna imagen");
    }

    $conexion->close();
}
?>
