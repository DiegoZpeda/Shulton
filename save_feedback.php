<?php
$servername = "localhost";
$username = "root"; // Cambia esto a tu usuario
$password = ""; // Cambia esto a tu contraseña
$dbname = "shulton_parking";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del POST
$ratings = $_POST['ratings'];
$comment = $_POST['comment'];

// Mapear valores numéricos a texto
function mapRating($value) {
    switch ($value) {
        case '1':
            return 'Muy Malo';
        case '2':
            return 'Malo';
        case '3':
            return 'Bueno';
        case '4':
            return 'Muy Bueno';
        case '5':
            return 'Excelente';
        default:
            return 'No Calificado';
    }
}

$rating_question_1 = mapRating($ratings['question1']);
$rating_question_2 = mapRating($ratings['question2']);
$rating_question_3 = mapRating($ratings['question3']);

// Insertar datos en la base de datos
$sql = "INSERT INTO feedback (rating_question_1, rating_question_2, rating_question_3, comment)
VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $rating_question_1, $rating_question_2, $rating_question_3, $comment);

if ($stmt->execute()) {
    echo "Feedback guardado correctamente.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>