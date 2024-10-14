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
<title>Shulton Parking</title>
<link rel="stylesheet" href="css/Principal.css">
<link rel="stylesheet" href="css/stylechat.css">
<link rel="stylesheet" href="css/styles_chat.css">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<style>

body {
font-family: 'Average Serif', serif;
font-weight: 500;
margin: 0;
padding: 0;
}

.background-image {
width: 100%;
height: 100vh;
background-image: url('img/menu_principal.png'); /* Cambia por la ruta de tu imagen */
background-size: cover;
background-position: center;
display: flex;
justify-content: left;
align-items: center;
position: relative;
}

/* Contenedor de texto sobre la imagen */
.background-image .content {
margin-left: 50px;
color: white;
font-size: 2rem;
text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
}

.background-image h1 {
margin: 0;
font-size: 3rem;
}

/* Estilo del botón sobre la imagen */
.background-image .btn {
margin-top: 20px;
padding: 10px 20px;
font-size: 1.2rem;
background-color: #007bff;
color: white;
border: none;
border-radius: 5px;
text-decoration: none;
display: inline-block;
}

.background-image .btn:hover {
background-color: #0056b3;
}

/* Estilos para las tarjetas */
.card {
margin-bottom: 20px;
}

.card img {
height: 150px;
object-fit: cover;
}

/* Estilo para el botón de "Ruta" */
.btn-primary {
display: block;
width: 100%;
text-align: center;
padding: 10px;
background-color: #007bff;
border-color: #007bff;
font-size: 1.2rem;
font-weight: bold;
}

/* Estilos para las secciones de información */
.info-section {
padding: 20px;
text-align: center;
background-color: #f8f9fa;
margin-top: 20px;
}

.info-section h4 {
margin-bottom: 15px;
font-weight: bold;
}

.info-section i {
font-size: 2rem;
color: #28a745;
margin-bottom: 10px;
}

/* Estilos para la sección "Por qué elegir Shulton Parking" */
.why-shulton {
margin-top: 40px;
padding: 40px 0;
background-color: #f8f9fa;
text-align: center;
}

.why-shulton h2 {
font-weight: bold;
margin-bottom: 30px;
}

.why-shulton img {
width: 100%;
max-width: 400px;
margin-bottom: 20px;
}

.why-shulton .text-left {
text-align: left;
}

.why-shulton ul {
list-style-type: none;
padding: 0;
}

.why-shulton ul li {
margin-bottom: 15px;
font-size: 1.2rem;
display: flex;
align-items: center;
}

.why-shulton ul li i {
color: #28a745;
font-size: 1.5rem;
margin-right: 10px;
}

.why-shulton .btn-register {
background-color: #28a745;
color: white;
padding: 10px 20px;
border: none;
border-radius: 5px;
font-size: 1.2rem;
text-decoration: none;
}
/* Estilos para el contenedor del contenido */
.content-wrapper {
display: flex;
justify-content: center; 
padding: 20px; 
box-sizing: border-box;
}

.card-container {
display: flex;
overflow-x: auto;
gap: 20px;
padding: 10px;
box-sizing: border-box;
width: 100%;
}

.card {
background: #fff;
border: 1px solid #ddd;
border-radius: 10px;
overflow: hidden;
width: 300px;
height: 400px;
box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
display: flex;
flex-direction: column;
align-items: center;
text-align: center;
padding: 10px;
box-sizing: border-box;
}
/* card */
.card-img {
width: 100%;
height: 150px; 
object-fit: cover;
display: block; 
}
.card-content {
flex: 1;
}

.card-content h2 {
margin: 0 0 10px;
font-size: 198px;
color: #333;
}

/* Estilos para botones */
.card-buttons {
display: flex;
justify-content: center;
padding: 10px;
background-color: #f8f8f8;
border-top: 1px solid #ddd;
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



.card-buttons:hover {

opacity: 0.8;


}
@media (max-width: 600px) {
.card-buttons {
flex-direction: column; 
gap: 10px; 
}
}


.card-buttons .btn-rutas:hover, .card-buttons .btn-ver:hover {
opacity: 0.8; 
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

/* Chatt */
.floating-button {
position: fixed;
bottom: 20px;
right: 20px;
background-color: #007bff;
color: white;
border-radius: 50px;
display: flex;
align-items: center;
padding: 10px 20px;
box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
cursor: pointer;
font-size: 16px;
transition: background-color 0.3s ease;
}

.floating-button i {
margin-right: 10px;
}

.floating-button span {
font-size: 16px;
}

.floating-button:hover {
    opacity: 0.8;

}



</style>
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=console.debug&libraries=maps,marker&v=beta"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</head>
<!-- chatt -->

<?php include 'menu_usuario.php'; ?>
<body>

<main>



<div class="background-image">
<div class="content">
<h1>ENCONTRAR ESTACIONAMIENTOS <br> NUNCA FUE MÁS FÁCIL </h1>
<a href="mapalistaregistrado.php" class="btn">Mapa</a>
</div>
</div>

<!-- Sección de Tarjetas -->

<!-- carusel -->
<div class="content-wrapper">
<div class="card-container slick-carousel">
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
    <p><strong>Descripción del Estacionamiento:</strong> <?= htmlspecialchars($t['descripcion']) ?></p>
    <p><strong>Capacidad de Vehículos:</strong> <?= htmlspecialchars($t['capacidad']) ?></p>
    <div class="card-buttons">
        <a href="park-info-regis.php?lat=<?= htmlspecialchars($t['latitud']) ?>&lng=<?= htmlspecialchars($t['longitud']) ?>&nombre=<?= urlencode($t['nombre']) ?>&latitud=<?= urlencode($t['latitud']) ?>&longitud=<?= urlencode($t['longitud']) ?>&precio=<?= urlencode($t['precio']) ?>&imagen=<?= urlencode($t['imagen']) ?>&horario=<?= urlencode($t['horario']) ?>&capacidad=<?= urlencode($t['capacidad']) ?>&descripcion=<?= urlencode($t['descripcion']) ?>" class="btn-rutas">Ruta</a>
    </div>
</div>
<?php endforeach; ?>
<?php else: ?>
<p>No hay Parqueos disponibles.</p>
<?php endif; ?>
</div>
</div>


<a href="chatpage.php" class="floating-button">
<i class="fas fa-comments"></i>
<span>Chatt</span>
</a>



<!-- Secciones de información -->
<div class="container mt-5">
<div class="row">
<div class="col-md-4">
<div class="info-section">
<i class="fas fa-clock"></i>
<h4>Ahorra Tiempo</h4>
<p>Es más fácil encontrar estacionamientos a tu alrededor.</p>
</div>
</div>
<div class="col-md-4">
<div class="info-section">
<i class="fas fa-thumbs-up"></i>
<h4>Evita Estrés</h4>
<p>Reduce el estrés de encontrar un lugar para tu vehículo.</p>
</div>
</div>
<div class="col-md-4">
<div class="info-section">
<i class="fas fa-info-circle"></i>
<h4>Información sobre los estacionamientos</h4>
<p>Todo los detalles sobre el estacionamiento.</p>
</div>
</div>
</div>
</div>






<!-- Sección "Por qué elegir Shulton Parking" -->
<div class="why-shulton container mt-5">
<div class="row">
<div class="col-md-6">
    <img src="img/porque_elegir.png" alt="Estacionamiento Imagen">
</div>
<div class="col-md-6 text-left">
    <h2>¿Por qué elegir <span style="color:#28a745;">Shulton</span> Parking?</h2>
    <ul>
        <li><i class="fas fa-check-circle"></i>Somos la primera plataforma web que te ofrece estacionamientos disponibles en el municipio de Usulután.</li>
        <li><i class="fas fa-check-circle"></i>Desde tu ubicación actual, te mostramos los estacionamientos más cercanos y su respectiva ruta.</li>
        <li><i class="fas fa-check-circle"></i>Guardar tus estacionamientos preferidos para acceder a ellos rápidamente.</li>
        <li><i class="fas fa-check-circle"></i>Mensajería integrada para que realicen sus consultas.</li>
    </ul>
    
</div>
</div>
</div>
</main>
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
$(document).ready(function(){
var $carousel = $('.slick-carousel');
if ($carousel.children().length > 2) {
$carousel.slick({
slidesToShow: 3,
slidesToScroll: 1,
autoplay: true,
autoplaySpeed: 2000,
arrows: true,
dots: true,
responsive: [
{
    breakpoint: 1024,
    settings: {
        slidesToShow: 2
    }
},
{
    breakpoint: 600,
    settings: {
        slidesToShow: 1
    }
}
]
});
}
});
</script>

</body>

</html>