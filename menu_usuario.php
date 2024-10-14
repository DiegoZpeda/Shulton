<?session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'><link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Average:wght@400;700&display=swap"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


  <link rel="stylesheet" href="css/barra.css">
  <title>Document</title>
</head>




<nav class="navbar navbar-expand-md navbar-light">

<a class="navbar-brand" href="usuario.php">
            <span class="shulton">Shulton</span> <span class="parking">Parking</span>
        </a>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav ms-auto py-4 py-md-0">

<li class="nav-item">
                    <a class="nav-link" href="guardados.php"><i class="fas fa-save"></i>Estacionamiento Guardados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="quienes_somos.php"><i class="fas fa-users"></i> Quiénes somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="perfil.php"><i class="fas fa-user"></i> <?php echo $_SESSION['correo']; ?></a>
                </li>
                <li class="nav-item" onclick="salir()">
                    <a class="nav-link"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                </li>

</ul>
</div>


</nav>

<script>
(function($) { "use strict";

$(function() {
    var header = $(".start-style");
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
    
        if (scroll >= 10) {
            header.removeClass('start-style').addClass("scroll-on");
        } else {
            header.removeClass("scroll-on").addClass('start-style');
        }
    });
});		
    
//Animation

$(document).ready(function() {
    $('body.hero-anime').removeClass('hero-anime');
});

//Menu On Hover
    
$('body').on('mouseenter mouseleave','.nav-item',function(e){
        if ($(window).width() > 750) {
            var _d=$(e.target).closest('.nav-item');_d.addClass('show');
            setTimeout(function(){
            _d[_d.is(':hover')?'addClass':'removeClass']('show');
            },1);
        }
});	

//Switch light/dark

$("#switch").on('click', function () {
    if ($("body").hasClass("dark")) {
        $("body").removeClass("dark");
        $("#switch").removeClass("switched");
    }
    else {
        $("body").addClass("dark");
        $("#switch").addClass("switched");
    }
});  

})(jQuery); 
</script>
<script>
        function salir() {if (confirm('¿Estás seguro de que deseas salir?')) {
            // Envía una solicitud POST al servidor para destruir la sesión
            fetch(window.location.href, {
                method: 'POST',
                body: new URLSearchParams({
                    'salir': 'true'
                })
            }).then(response => {
                if (response.ok) {
                    // Redirige al usuario a la página de inicio después de destruir la sesión
                    window.location.href = 'index.php';
                } else {
                    console.error('Error al cerrar la sesión');
                }
            }).catch(error => console.error('Error:', error));
        }
    }
    </script>
<!-- Scripts -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script><script  src="./script.js"></script>


</body>
</html>




