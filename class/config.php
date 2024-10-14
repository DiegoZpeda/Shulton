<?php 
	define('BASE_URL', 'http://localhost:85/shulton_parking/');
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'shulton_parking');
	define('DB_CHARSET', 'utf8');
?>
<?php
// Conexión a la base de datos shulton_parking
try {
    $pdoParking = new PDO('mysql:host=localhost;dbname=shulton_parking', 'root', '');
    $pdoParking->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar con la base de datos shulton_parking: " . $e->getMessage());
}

