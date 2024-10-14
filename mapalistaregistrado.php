<?php 
	include_once('class/config.php');
	include_once('class/google.php');
	$google = new Google;
?>
<?php
include_once('class/mapa.php');
$mapa = new Mapa();
$mapas = $mapa->getAllMapas();
?>
<?php
session_start();
header("Cache-control: private");
header("Cache-control: no-cache, must-revalidate");
header("Pragma: no-cache");
if (!isset($_SESSION['correo'])) {
    header('Location: index.php');
    exit; 
} 
?>
<?php
if (isset($_POST['salir'])) {
    session_destroy();
    header('Location: index.php'); 
    exit; 
} 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa y Estacionamientos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        header {
            background: #333;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .main-content {
            display: flex;
            flex: 1;
            overflow: hidden;
        }

        #map {
            height: 100%;
            width: 70%; 
            flex-shrink: 0;
            transition: width 0.3s ease;
        }

        .sidebar {
            width: 30%;
            height: 100%;
            margin-top: 25px; 
            overflow-y: auto;
            padding: 10px;
            background-color: #ffffff;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            transition: transform 0.3s ease;
            position: relative;
        }

        .sidebar.hidden {
            width: 0;
            overflow: hidden;
            padding: 0;
        }

        .sidebar-header {
            background: #ffffff;
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

    
        .header-text {
            margin: 0;
            font-family: 'Average', sans-serif;
            color: #ffffff;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            flex-grow: 1;
        }

        .btn-exit {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
            color: #7ED957;
            text-decoration: none;
            font-size: 16px;
            margin: 10px;
            box-sizing: border-box;
        }

        .btn-exit:hover {
            background-color: #ddd;
        }

        .fa-chevron-left, .fa-chevron-right {
            font-size: 16px;
        }

        .card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 10px;
            box-sizing: border-box;
            width: 100%;
        }

        .card-img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .card-content h2 {
            font-size: 20px;
            margin: 10px 0;
        }

        .card-buttons {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .btn-ver {
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

        .btn-ver:hover {
            opacity: 0.8;
            color: #f0f0f0;
        }

        .btn-rutas, .btn-ver {
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            border-radius: 8px;
            font-size: 14px;
            margin: 5px;
        }

        .btn-rutas {
            background-color: #7ED957;
        }

        .btn-ver {
            background-color: #0B44B7;
        }

        .btn-rutas:hover, .btn-ver:hover {
            opacity: 0.8;
        }

        .toggle-info-btn {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 15px;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
            display: flex;
            align-items: center;
            z-index: 10;
        }

        .toggle-info-btn i {
            margin-left: 8px;
        }

        .toggle-info-btn:hover {
            opacity: 0.8;
            transform: scale(1.05);
        }

        .container2 {
            text-align: left;
            padding: 3px;
            background-color: #ffffff;
        }

        .container2 p2 {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin: 0;
            display: inline-block;
        }
            /* Icono de favoritos */
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

    .title {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(50, 205, 50, 0.5); /* Fondo verde con transparencia */
            color: #fff; /* Texto blanco */
            padding: 10px 20px;
            margin: 0;
            cursor: pointer; /* Cursor de puntero para indicar que es clicable */
            transition: background-color 0.3s, opacity 0.3s; /* Transición suave */
            border-radius: 1px; /* Bordes redondeados */
        }

        .title:hover {
            background-color: rgba(50, 205, 50, 1); /* Fondo verde opaco al pasar el cursor */
            opacity: 0.9; /* Reduce la opacidad para el hover */
        }

        .title a {
            text-decoration: none; /* Elimina el subrayado del enlace */
            color: inherit; /* Hereda el color del elemento padre */
            margin-right: 10px; /* Espacio entre el ícono y el texto */
        }

        .title p {
            margin: 0;
            font-family: 'Average', sans-serif;
            font-weight: bold;
            font-size: 24px;
            text-align: center;
        }

        .header-text {
            margin: 0;
            font-family: 'Average', sans-serif;
            color: #ffffff;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            flex-grow: 1;
        }


    </style>
</head>
<body>

<?php include 'menu_usuario.php'; ?>

<div class="main-content">
    <div class="sidebar" id="sidebar">

    <div class="title" id="title-container">
    <a href="usuario.php" class="btn-exit" id="feedback-btn"><i class="fas fa-chevron-left"></i></a>
    <p class="header-text">Regresar</p>

</div>

        <br>
        <div class="container2">
            <p2>Estacionamientos Disponibles</p2>
        </div>



        <?php if (!empty($mapas)): ?>
            <?php foreach ($mapas as $t): ?>
                <div class="card">
                    <img src="<?= htmlspecialchars($t['imagen']) ?>" alt="Imagen de <?= htmlspecialchars($t['nombre']) ?>" class="card-img">
                        <!-- Esto muestra el icono en la parte de la izquierda -->
                    <span class="favorite-icon" data-id="<?= htmlspecialchars($t['mapa_id']) ?>">
                    <i class="fa-solid fa-bookmark"></i>
                    </span>

                    <h2><?= htmlspecialchars($t['nombre']) ?></h2>
                    <i class="fas fa-map-marker-alt"></i>
                    <p><strong>Precio:</strong> <?= htmlspecialchars($t['precio']) ?></p>
                    <p><strong>Horario:</strong> <?= htmlspecialchars($t['horario']) ?></p>
                    <p><strong>Descripción:</strong> <?= htmlspecialchars($t['descripcion']) ?></p>
                    <p><strong>Capacidad de Vehículos:</strong> <?= htmlspecialchars($t['capacidad']) ?></p>
                    <div class="card-buttons">
                        <a href="park-info-regis.php?lat=<?= htmlspecialchars($t['latitud']) ?>&lng=<?= htmlspecialchars($t['longitud']) ?>&nombre=<?= urlencode($t['nombre']) ?>&latitud=<?= urlencode($t['latitud']) ?>&longitud=<?= urlencode($t['longitud']) ?>&precio=<?= urlencode($t['precio']) ?>&imagen=<?= urlencode($t['imagen']) ?>&horario=<?= urlencode($t['horario']) ?>&capacidad=<?= urlencode($t['capacidad']) ?>&descripcion=<?= urlencode($t['descripcion']) ?>" class="btn-ver">Ruta</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay Parqueos disponibles.</p>
        <?php endif; ?>
    </div>


    <div id="map"></div>
    <button class="toggle-info-btn" onclick="toggleInfo()"><i class="fas fa-chevron-left"></i> Ocultar Información</button>

</div>

<script src=""></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Esto verifica que se haya dado click en el icono y cambia el color del icono -->
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
<script>
    var map;
    var directionsService;
    var directionsRenderer;
    var infoVisible = true;

 // boton para terminar ruta
 document.getElementById('title-container').addEventListener('click', function() {
    window.location.href = 'usuario.php'; // Redirige a la URL
});


    function start_map() {
        var america_lat = 13.345090170204365;
        var america_lng = -88.44264317585964;

        map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: america_lat, lng: america_lng },
            zoom: 13
        });

        directionsService = new google.maps.DirectionsService();
        directionsRenderer = new google.maps.DirectionsRenderer({ 
            polylineOptions: { strokeColor: '#2E9AFE' }
        });
        directionsRenderer.setMap(map);

        load_all_stores();
        get_my_location();
    }

    function load_all_stores() {
        $.ajax({
            type: 'POST',
            url: 'class/google.php',
            data: { action: 'get_all_stores' },
            dataType: 'JSON',
            success: function(response) {
                response.forEach(function(store) {
                    var position = new google.maps.LatLng(store.lat, store.lng);
                    var marker = new google.maps.Marker({
                        map: map,
                        position: position,
                        animation: google.maps.Animation.DROP,
                        icon: {
                            url: "https://cdn-icons-png.flaticon.com/128/3005/3005359.png",
                            scaledSize: new google.maps.Size(35, 35),
                            origin: new google.maps.Point(0, 0),
                            anchor: new google.maps.Point(25, 50)
                        }
                    });

                    var infoWindow = new google.maps.InfoWindow({
                        content: `
                            <div style="display: flex; align-items: center; padding: 10px; max-width: 300px;">
                                <img src="${store.imagen}" alt="Imagen del Estacionamiento" style="width: 90px; height: auto; margin-right: 10px; border-radius: 5px;">
                                <div style="flex: 1;">
                                    <strong>${store.nombre}</strong><br>
                                    <span>Precio: ${store.precio}</span><br>
                                    <span>Horario: ${store.horario}</span><br>
                                    <span>Capacidad de Vehículos: ${store.capacidad}</span><br>
                                </div>
                            </div>
                        `
                    });
                    marker.addListener('mouseover', function() {
                        infoWindow.open(map, marker);
                    });

                    marker.addListener('mouseout', function() {
                        infoWindow.close();
                    });
                    marker.addListener('click', function() {
                        draw_route(position.lat(), position.lng());
                    });
                });
            }
        });
    }

    function get_my_location(callback) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;
                var pos = { lat: lat, lng: lng };
                if (callback) callback(pos);

                new google.maps.Marker({
                    map: map,
                    position: pos,
                    animation: google.maps.Animation.DROP
                });
            }, function(error) {
                console.error("Error al obtener la ubicación: ", error.message);
            });
        } else {
            alert("Geolocalización no es soportada por este navegador.");
        }
    }

    function draw_route(lat, lng) {
        get_my_location(function(currentPosition) {
            var start = new google.maps.LatLng(currentPosition.lat, currentPosition.lng);
            var end = new google.maps.LatLng(lat, lng);

            var request = {
                origin: start,
                destination: end,
                travelMode: google.maps.TravelMode.DRIVING
            };

            directionsService.route(request, function(response, status) {
                if (status === google.maps.DirectionsStatus.OK) {
                    directionsRenderer.setDirections(response);
                } else {
                    console.error("No se pudo calcular la ruta: ", status);
                }
            });
        });
    }

    function toggleInfo() {
        var sidebar = document.getElementById('sidebar');
        var mapElement = document.getElementById('map');
        var button = document.querySelector('.toggle-info-btn');

        if (infoVisible) {
            sidebar.classList.add('hidden');
            mapElement.style.width = '100%'; 
            button.innerHTML = '<i class="fas fa-chevron-right"></i> Mostrar Información';
        } else {
            sidebar.classList.remove('hidden');
            mapElement.style.width = '70%'; 
            button.innerHTML = '<i class="fas fa-chevron-left"></i> Ocultar Información';
        }
        infoVisible = !infoVisible;
    }

    window.onload = start_map;
</script>
</body>
</html>