<?php
// Conectar a la base de datos (ajusta los valores según tu configuración)
$conexion = new mysqli("localhost", "root", "", "shulton_parking");

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Preparar la consulta SQL para obtener la información más reciente sobre "Quiénes Somos"
$query = "SELECT contenido FROM quienes_somos ORDER BY id DESC LIMIT 1";

// Ejecutar la consulta
$resultado = $conexion->query($query);

// Verificar si se obtuvieron resultados
if ($resultado->num_rows > 0) {
    // Obtener el resultado como un array asociativo
    $fila = $resultado->fetch_assoc();
    
    // Mostrar el contenido de "Quiénes Somos"
    echo $fila["contenido"];
} else {
    // Si no se encontró información, mostrar un mensaje indicando que no hay datos disponibles
    echo "No hay información disponible sobre Quiénes Somos.";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
