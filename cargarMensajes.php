<?php
    include "db.php"; // Incluye la conexión a la base de datos

    // Selecciona los mensajes de la tabla `chat`
    $sql = "SELECT * FROM `chat` ORDER BY id ASC"; // Ordena por ID para mostrarlos en orden cronológico
    $query = mysqli_query($conexion, $sql);

    // Verifica si hay mensajes y los muestra
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            echo '<div class="message">';
            echo '<p><span>' . htmlspecialchars($row['nombre']) . ':</span> ' . htmlspecialchars($row['message']) . '</p>';
            echo '</div>';
        }
    } else {
        echo '<div class="message"><p>No hay ninguna conversación previa.</p></div>';
    }
?>
