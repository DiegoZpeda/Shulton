<?php
session_start();

if (!isset($_SESSION['correo'])) {
    header('Location: index.php');
    exit;
}

try {
    $pdoParking = new PDO('mysql:host=localhost;dbname=shulton_parking', 'root', '');
    $pdoParking->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}

$correo = $_SESSION['correo'];

$stmt = $pdoParking->prepare('SELECT favoritos FROM usuarios WHERE correo = :correo');
$stmt->bindParam(':correo', $correo);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && $user['favoritos']) {
    // Devolver los favoritos como un array JSON
    $favoritos = explode(',', $user['favoritos']);
    echo json_encode($favoritos);
} else {
    echo json_encode([]);
}
?>
