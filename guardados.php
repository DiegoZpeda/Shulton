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
    // Solo necesitas una conexión a la base de datos 'shulton_parking'
    $pdoParking = new PDO('mysql:host=localhost;dbname=shulton_parking', 'root', '');
    $pdoParking->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}

$correo = $_SESSION['correo'];

// Obtener los favoritos del usuario
$stmt = $pdoParking->prepare('SELECT favoritos FROM usuarios WHERE correo = :correo');
$stmt->bindParam(':correo', $correo);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && !empty($user['favoritos'])) {
    $favoritos = explode(',', $user['favoritos']);
    if (!empty($favoritos)) {  
        // Crear placeholders para los favoritos
        $placeholders = str_repeat('?,', count($favoritos) - 1) . '?';
        
        // Consultar desde la tabla 'tbl_mapa' dentro de 'shulton_parking'
        $stmt = $pdoParking->prepare("SELECT * FROM tbl_mapa WHERE mapa_id IN ($placeholders)");
        $stmt->execute($favoritos);
        $mapas_favoritas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $mapas_favoritas = [];
    }
} else {
    $mapas_favoritas = [];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Tiendas Favoritas</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 300px;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card h2 {
            font-size: 1.5rem;
            margin: 10px 15px;
            color: #333;
        }

        .card p {
            margin: 5px 15px;
            color: #555;
        }

        .card-buttons {
            display: flex;
            justify-content: center;
            padding: 10px;
            background-color: #f8f8f8;
            border-top: 1px solid #ddd;
        }

        .btn-rutas {
            display: block;
            width: 100%;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            border-radius: 8px;
            font-size: 14px;
            background-color: #0B44B7;
        }

        .btn-rutas:hover {

            opacity: 0.8;
        }

        .empty-message {
            text-align: center;
            font-size: 1.2rem;
            color: #777;
        }
        .mensaje {
            
            font-size: 1.2rem;
            color: #777;
        }
        .favorite-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #7ED957;
            font-size: 24px;
            cursor: pointer;
        }

        .favorite-icon.favorited {
            color: #0B44B7; 
        }
            
    </style>
</head>
<?php include 'menu_usuario.php'; ?>
<body>
</br></br>

</br></br>

<div class="mensaje">
    <h1>Estacionamientos Guardados </h1>
    </div>

</br></br>
    <div class="card-container">
        <?php if (!empty($mapas_favoritas)): ?>
            <?php foreach ($mapas_favoritas as $t): ?>
                <div class="card">
                    <img src="<?= htmlspecialchars($t['imagen']) ?>" alt="Imagen de <?= htmlspecialchars($t['nombre']) ?>" class="card-img">
                    <span class="favorite-icon" data-id="<?= htmlspecialchars($t['mapa_id']) ?>">
                        <i class="fa-solid fa-bookmark"></i>
                    </span>
                    <h2><?= htmlspecialchars($t['nombre']) ?></h2>
                    <p><strong>Precio:</strong> <?= htmlspecialchars($t['precio']) ?></p>
                    <p><strong>Horario:</strong> <?= htmlspecialchars($t['horario']) ?></p>
                    <p><strong>Descripción:</strong> <?= htmlspecialchars($t['descripcion']) ?></p>
                    <p><strong>Capacidad:</strong> <?= htmlspecialchars($t['capacidad']) ?></p>
                    
                    <div class="card-buttons">
                        <a href="park-info-regis.php?lat=<?= htmlspecialchars($t['latitud']) ?>&lng=<?= htmlspecialchars($t['longitud']) ?>&nombre=<?= urlencode($t['nombre']) ?>&latitud=<?= urlencode($t['latitud']) ?>&longitud=<?= urlencode($t['longitud']) ?>&precio=<?= urlencode($t['precio']) ?>&imagen=<?= urlencode($t['imagen']) ?>&horario=<?= urlencode($t['horario']) ?>&capacidad=<?= urlencode($t['capacidad']) ?>&descripcion=<?= urlencode($t['descripcion']) ?>" class="btn-rutas">Ver</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="empty-message">No tienes mapas guardadas como favoritas.</p>
        <?php endif; ?>
    </div>
    <script>
$(document).ready(function() {
    // Cargar los favoritos al cargar la página
    $.ajax({
        url: 'load_favorites.php',
        type: 'GET',
        success: function(response) {
            var favoritos = JSON.parse(response);
            // Para cada ID de mapa favorita, añadir la clase 'favorited' al icono
            favoritos.forEach(function(mapaId) {
                $('.favorite-icon[data-id="' + mapaId + '"]').addClass('favorited');
            });
        },
        error: function() {
            alert('Hubo un error al cargar los favoritos.');
        }
    });

    // Evento para agregar o quitar de favoritos
    $('.favorite-icon').click(function() {
        var mapaId = $(this).data('id');
        var icon = $(this);

        $.ajax({
            url: 'add_to_favorites.php',
            type: 'POST',
            data: { mapa_id: mapaId },
            success: function(response) {
                if (response === 'added') {
                    icon.addClass('favorited'); 
                } else if (response === 'removed') {
                    icon.removeClass('favorited'); 
                } else {
                    alert('Hubo un error al actualizar los favoritos.');
                }
            }
        });
    });
});
</script>
</body>
</html>
