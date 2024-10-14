<?php
session_start();
header("Cache-control: private");
header("Cache-control: no-cache, must-revalidate");
header("Pragma: no-cache");


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

if (isset($_POST['mapa_id'])) {
    $mapa_id = $_POST['mapa_id'];

    
    $stmt = $pdoParking->prepare('SELECT favoritos FROM usuarios WHERE correo = :correo');
    $stmt->bindParam(':correo', $correo);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $favoritos = $user['favoritos'] ? explode(',', $user['favoritos']) : [];

        if (in_array($mapa_id, $favoritos)) {
            
            $favoritos = array_diff($favoritos, [$mapa_id]);
            $response = 'removed';
        } else {
            
            $favoritos[] = $mapa_id;
            $response = 'added';
        }
        $favoritos_actualizados = implode(',', $favoritos);
        $stmt = $pdoParking->prepare('UPDATE usuarios SET favoritos = :favoritos WHERE correo = :correo');
        $stmt->bindParam(':favoritos', $favoritos_actualizados);
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();
        echo $response;
    } else {
        
        echo 'error';
    }
} else {
    
    echo 'error';
}
?>
