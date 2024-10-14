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
<?php
include_once('class/mapa.php');
$tienda = new Mapa();
$tiendas = $tienda->getAllMapas();
?>

    <br><br><br>

    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <title>Información del Estacionamiento</title>
    <style>
        /* Estilos generales */
        body {
            margin: 0 ;
            font-family: 'Average', sans-serif;
            margin: 0;
            background-color: #f4f4f4;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Contenedor principal */
        .container12 {
            display: flex;
            flex: 1;
            height: 100%;
            width: 100%;
            margin: 1;
            margin-top: -90px; 
            padding: 1px;
            background: #fff;
            border-radius: 0px;
            position: relative; /* Necesario para el posicionamiento absoluto de elementos hijos */
            overflow: hidden;  /* Evita el scroll si el contenido se adapta correctamente */
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        /* Estilos para la columna de información */
        .info-column {
           
            flex: 0 0 560px;
            padding: 0px;
            border-right: 1px solid #ddd;
            box-sizing: border-box;
            overflow-y: auto;
            height: 100%;
        }

        /* Estilos para la columna del mapa */
        .map-column {
            position: relative; /* Necesario para el posicionamiento absoluto de elementos hijos */
            overflow: hidden;  /* Evita el scroll si el contenido se adapta correctamente */
            flex: 1;
            box-sizing: border-box;
            height: 100%;
        }
        /* Mapa */
        #map {
            height: 100%;
            width: 100%;
        }

        /* Botón para ocultar/mostrar información */
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

      
        /* Botón de salida */
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

        /* Estilo para la sección de información */
        .info-section1 {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        /* Estilo para la imagen del estacionamiento */
        #estacionamiento-img {
            max-width: 50%;
            height: auto;
            display: block;
            margin: 0 auto 20px auto;
            border-radius: 5px;
        }

        /* Contenedor de detalles de la información */
        .info-details {
            font-family: 'Average', sans-serif;
            text-align: left;
            line-height: 1.6;
        }

        /* Estilo para los párrafos de información */
        .info-details p {
            margin: 8px 0;
            font-size: 20px;
            color: #000;
        }

        /* Estilo para los valores de la información */
        .info-value {
            font-size: 16px;
            color: #333;
            font-weight: normal;
        }

        .container2 {
            text-align: center;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }

        .container2 p2 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin: 0;
            display: inline-block;
        }

        .info-nombre {
            font-size: 29px;
            font-weight: bold;
            color: #333;
            margin-left: 5px;
            display: inline-block;
        }

        /* Estilos para el modal */
        .modal {
    position: fixed; /* Cambiado de relative a fixed */
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: auto; /* Asegura que el contenido se pueda desplazar si es necesario */
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    max-width: 35%; /* Ajusta el tamaño máximo para que se ajuste mejor */
    width: 500px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    max-height: 90vh; /* Limita la altura máxima para permitir desplazamiento */
    overflow-y: auto; /* Permite el desplazamiento si el contenido excede la altura */
}

        .close-btn {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-btn:hover,
        .close-btn:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .feedback-title {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .feedback-subtitle {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .feedback-form {
            text-align: left;
        }

        .feedback-form-item {
            margin-bottom: 20px;
        }

        .star-rating {
            display: flex;
            justify-content: center;
            margin-bottom: 5px;
        }

        .star-container {
            font-size: 28px;
            margin: 0 42px; /* Aumenta el margen entre las estrellas */
            cursor: pointer;
        }

        .star-container.checked {
            color: #FFD700;
        }

        .rating-labels {
            display: flex;
            justify-content: space-between;
        }

        .rating-labels span {
            font-size: 14px;
        }

        .button-container {
    display: flex;
    justify-content: center; /* Centra horizontalmente los botones */
    align-items: center;     /* Centra verticalmente los botones */
    gap: 10px;               /* Espacio entre los botones */
    padding: 20px;           /* Espacio alrededor del contenedor, opcional */
}

.feedback-btn, .feedback-cancel-btn {
    background-color: #28a745; /* Color de fondo por defecto */
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    text-align: center;
}

.feedback-cancel-btn {
    background-color: #dc3545; /* Color de fondo para el botón de cancelar */
}

.feedback-btn:hover, .feedback-cancel-btn:hover {
    opacity: 0.9; /* Efecto al pasar el ratón sobre los botones */
}

        textarea {
            width: 100%;
            height: 100px;
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
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
   /* Texto del título */
   .header-text {
            margin: 0;
            font-family: 'Average', sans-serif;
            color: #fff;
            font-weight: bold;
            font-size: 24px;
            text-align: center;
            flex-grow: 1;
        }


    </style>
</head>
<body>

<?php include 'menu_usuario.php'; ?>
<br><br>

<div class="container12">
    <div class="info-column">

    <div class="title" id="title-container">
    <a href="#" class="btn-exit" id="feedback-btn"><i class="fas fa-chevron-left"></i></a>
    <p class="header-text">Terminar Ruta</p>

</div>

        <div class="container2">
            <p2>Información del Estacionamiento</p2>
        </div>
        <div class="info-section1">
            <?php
            // Capturar los datos de la URL
            $nombre = isset($_GET['nombre']) ? htmlspecialchars($_GET['nombre']) : '';
            $precio = isset($_GET['precio']) ? htmlspecialchars($_GET['precio']) : '';
            $imagen = isset($_GET['imagen']) ? htmlspecialchars($_GET['imagen']) : '';
            $horario = isset($_GET['horario']) ? htmlspecialchars($_GET['horario']) : '';
            $descripcion = isset($_GET['descripcion']) ? htmlspecialchars($_GET['descripcion']) : '';
            $capacidad = isset($_GET['capacidad']) ? htmlspecialchars($_GET['capacidad']) : '';
            $direccion = isset($_GET['direccion']) ? htmlspecialchars($_GET['direccion']) : ''; // dirección
            ?>
            <img src="<?= $imagen ?>" id="estacionamiento-img" alt="Imagen del Estacionamiento">
            <div class="info-details">
                <p><span class="info-nombre"><?= $nombre ?></span></p>
                <p><i class="fas fa-map-marker-alt"></i> <strong></strong> <span class="info-value"><?= $direccion ?></span></p>
                <p><strong>Precio:</strong> <span class="info-value"><?= $precio ?></span></p>
                <p><strong>Horario:</strong> <span class="info-value"><?= $horario ?></span></p>
                <p><strong>Descripción del estacionamiento:</strong> <span class="info-value"><?= $descripcion ?></span></p>
                <p><strong>Capacidad de Vehículos:</strong> <span class="info-value"><?= $capacidad ?></span></p>
            </div>
        </div>
    </div>
    <div class="map-column">
        <!-- Div para mostrar el mapa -->
        <div id="map"></div>
        <button class="toggle-info-btn" onclick="toggleInfo()"><i class="fas fa-chevron-left"></i> Ocultar Información</button>
    </div>
</div>

<!-- Modal para feedback -->


<div id="feedback-modal" class="modal">
    <div class="modal-content">
        <span class="close-btn" id="close-modal">&times;</span>
        <h2 class="feedback-title">¡Queremos escuchar tu opinión sobre nuestra plataforma!</h2>
        <p class="feedback-subtitle">Por favor, responde a las siguientes preguntas para que podamos conocer tu opinión:</p>
        <div class="feedback-form">
            
            <div class="feedback-form-item">
            <p class="feedback-subtitle">¿Cómo calificarías tu experiencia general con nuestra plataforma?</p>
                <div class="star-rating">
                    <span class="star-container" data-question="1" data-value="1">&#9733;</span>
                    <span class="star-container" data-question="1" data-value="2">&#9733;</span>
                    <span class="star-container" data-question="1" data-value="3">&#9733;</span>
                    <span class="star-container" data-question="1" data-value="4">&#9733;</span>
                    <span class="star-container" data-question="1" data-value="5">&#9733;</span>
                </div>
                <div class="rating-labels">
                    <span>Muy Malo</span>
                    <span>Malo</span>
                    <span>Bueno</span>
                    <span>Muy Bueno</span>
                    <span>Excelente</span>
                </div>
                <input type="hidden" id="rating-question-1" value="0">
            </div>


            <br>
            <div class="feedback-form-item">
            <p class="feedback-subtitle">¿Qué tan fácil fue para ti utilizar nuestra plataforma?</p>
                <div class="star-rating">
                    <span class="star-container" data-question="2" data-value="1">&#9733;</span>
                    <span class="star-container" data-question="2" data-value="2">&#9733;</span>
                    <span class="star-container" data-question="2" data-value="3">&#9733;</span>
                    <span class="star-container" data-question="2" data-value="4">&#9733;</span>
                    <span class="star-container" data-question="2" data-value="5">&#9733;</span>
                </div>
                <div class="rating-labels">
                    <span>Muy Malo</span>
                    <span>Malo</span>
                    <span>Bueno</span>
                    <span>Muy Bueno</span>
                    <span>Excelente</span>
                </div>
                <input type="hidden" id="rating-question-2" value="0">
            </div>
            <br>
            <div class="feedback-form-item">
            <p class="feedback-subtitle">¿Qué tan precisa consideras que es la información sobre los estacionamientos disponibles?</p>
                <div class="star-rating">
                    <span class="star-container" data-question="3" data-value="1">&#9733;</span>
                    <span class="star-container" data-question="3" data-value="2">&#9733;</span>
                    <span class="star-container" data-question="3" data-value="3">&#9733;</span>
                    <span class="star-container" data-question="3" data-value="4">&#9733;</span>
                    <span class="star-container" data-question="3" data-value="5">&#9733;</span>
                </div>
                <div class="rating-labels">
                    <span>Muy Malo</span>
                    <span>Malo</span>
                    <span>Bueno</span>
                    <span>Muy Bueno</span>
                    <span>Excelente</span>
                </div>
                <input type="hidden" id="rating-question-3" value="0">
            </div>
            <br>
            <div class="feedback-form-item">
                <label for="feedback-comment">¿Tienes algún comentario o sugerencia para mejorar nuestra plataforma?</label>
                <textarea id="feedback-comment"></textarea>
            </div>
            <div class="button-container">
    <a href="mapalistaregistrado.php" class="feedback-btn" id="submit-feedback">Terminar</a>
    <a href="mapalistaregistrado.php" class="feedback-cancel-btn" id="cancel-feedback">Cancelar</a>
</div>
        </div>
    </div>

</div>



<script src=""></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    var map;
    var directionsService;
    var directionsRenderer;
    var infoVisible = true;

 // boton para terminar ruta
document.getElementById('title-container').addEventListener('click', function() {
    document.getElementById('feedback-btn').click(); // Simula un clic en el botón del modal
});
    // Inicializar el mapa y los servicios de rutas
    function start_map() {
        var america_lat = 13.345090170204365;
        var america_lng = -88.44264317585964;

        map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: america_lat, lng: america_lng },
            zoom: 14
        });

        directionsService = new google.maps.DirectionsService();
        directionsRenderer = new google.maps.DirectionsRenderer({
            polylineOptions: { strokeColor: '#2E9AFE' }
        });
        directionsRenderer.setMap(map);

        // Obtener la ubicación actual y dibujar la ruta hacia la tienda
        get_my_location(function(currentPosition) {
            // Obtener las coordenadas de la tienda desde la URL
            var urlParams = new URLSearchParams(window.location.search);
            var storeLat = parseFloat(urlParams.get('lat'));
            var storeLng = parseFloat(urlParams.get('lng'));
            var storeLocation = { lat: storeLat, lng: storeLng };
            
            draw_route(currentPosition, storeLocation);
        });
    }

    // Obtener la ubicación actual del usuario
    function get_my_location(callback) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;
                var pos = { lat: lat, lng: lng };
                if (callback) callback(pos);

                // Colocar un marcador en la ubicación actual del usuario
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

    function draw_route(start, end) {
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
    }

    function toggleInfo() {
        var infoColumn = document.querySelector('.info-column');
        var button = document.querySelector('.toggle-info-btn');

        if (infoVisible) {
            infoColumn.style.display = 'none';
            button.innerHTML = '<i class="fas fa-chevron-right"></i> Mostrar Información';
        } else {
            infoColumn.style.display = 'block';
            button.innerHTML = '<i class="fas fa-chevron-left"></i> Ocultar Información';
        }
        infoVisible = !infoVisible;
    }


    //                                        FEEDBACK

    // Mostrar el modal de feedback
    document.getElementById('feedback-btn').onclick = function(event) {
        event.preventDefault();
        document.getElementById('feedback-modal').style.display = 'flex';
    };

    // Cerrar el modal de feedback
    document.getElementById('close-modal').onclick = function() {
        document.getElementById('feedback-modal').style.display = 'none';
    };

    // Capturar la selección de estrellas
    document.querySelectorAll('.star-container').forEach(function(star) {
        star.onclick = function() {
            var question = this.getAttribute('data-question');
            var rating = this.getAttribute('data-value');
            document.getElementById('rating-question-' + question).value = rating;

            document.querySelectorAll('.star-container[data-question="' + question + '"]').forEach(function(star) {
                star.classList.remove('checked');
            });
            this.classList.add('checked');
        };
    });

   // Enviar el feedback
document.getElementById('submit-feedback').onclick = function() {
    var ratings = {
        question1: document.getElementById('rating-question-1').value,
        question2: document.getElementById('rating-question-2').value,
        question3: document.getElementById('rating-question-3').value
    };
    var comment = document.getElementById('feedback-comment').value;

    $.post('save_feedback.php', {
        ratings: ratings,
        comment: comment
    }, function(response) {
        alert('Gracias por tu feedback!');
        document.getElementById('feedback-modal').style.display = 'none';
    }).fail(function() {
        alert('Hubo un error al enviar tu feedback.');
    });
};


    // Cancelar el feedback
    document.getElementById('cancel-feedback').onclick = function() {
        document.getElementById('feedback-modal').style.display = 'none';
    };

    // Iniciar el mapa
    window.onload = start_map;
</script>
</body>
</html>

