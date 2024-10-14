<?php
session_start();
header("Cache-control: private");
header("Cache-control: no-cache, must-revalidate");
header("Pragma: no-cache");

if (!isset($_SESSION['correo'])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['salir'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shulton Parking</title>
    <!-- CSS de Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<!-- FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<!-- Fuentes -->
<link href="https://fonts.googleapis.com/css2?family=Average&display=swap" rel="stylesheet">

 
    <link href="https://fonts.googleapis.com/css2?family=Average&display=swap" rel="stylesheet">
    
    
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Average&display=swap');

/* Mantener el navbar fijo en la parte superior */
.navbar {
    position: fixed; 
    top: 0; 
    left: 0; 
    width: 100%; 
    background-color: #393939; 
    z-index: 1000; 
}
/* Letras Shulton Parking */
.navbar .navbar-brand {
	margin-right: auto;
	font-family: 'Average', sans-serif; 
	font-size: 2.5rem; 
}

.navbar .navbar-brand .shulton {
	color: #ffffff; 
}
.navbar .navbar-brand .parking {
	color: #36d330;
	font-weight: bold; 
}


/* Alinea el contenido dentro del navbar */
.navbar .container {
    display: flex;
    justify-content: space-between; 
    align-items: center; 
}

/* Alinea el logotipo a la izquierda */
.navbar .navbar-brand {
    margin-right: auto; 
}

/* Estilo para los enlaces de navegación */
.navbar-nav .nav-link {
	
    color: #f0f0f0 !important;
    font-size: 1.1rem; 
    font-weight: bold; 
}

/* Efecto de hover para los enlaces */
.navbar-nav .nav-link:hover {
    color: #36d330 !important; 
}

/* Añadir margen superior al contenido principal para evitar que quede oculto detrás del navbar */
body {
    padding-top: 56px; 
}
.navbar-nav .nav-link i {
	margin-right: 8px; /* Espacio entre el icono y el texto */
}






        body {
            padding-top: 120px;
            font-family: 'Average', serif;
            font-weight: 500;
        }

        .container-fluid {
            margin-top: 60px;
        }

        .btn.btn-primary {
            background-color: #7ED957;
            border-color: #7ED957;
            color: #FFFFFF;
            font-family: 'Average', serif;
        }

        .btn.btn-primary:hover {
            background-color: #6BBE43;
            border-color: #6BBE43;
        }

        .btn.btn-secondary i.fa-edit {
            color: #7ED957;
        }

        .btn.btn-dark i.fa-trash {
            color: #FF5733;
        }

        .btn-salir1 {
            background-color: #0B44B7; 
            color: #fff;
            border: none;
            padding: 15px 30px; 
            border-radius: 15px;
            text-decoration: none; 
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-salir1:hover {
            background-color: #0056b3; /* Azul oscuro para hover */
            color: #f4f4f4;
            transform: scale(1.05); /* Efecto de aumento */
        }
    </style>
</head>
<header>
<nav class="navbar navbar-expand-md navbar-light">

<a class="navbar-brand" href="../menu_admin.php">
            <span class="shulton">Shulton</span> <span class="parking">Parking</span>
        </a>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav ms-auto py-4 py-md-0">

<li class="nav-item"></li>
<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="administrarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-cogs"></i> Administrar
        </a>
        <!-- Menú Desplegable -->
        <ul class="dropdown-menu" aria-labelledby="administrarDropdown">
            <li><a class="dropdown-item" href="crud_usuarios.php">Administrar Usuario</a></li>
            <li><a class="dropdown-item" href="../chatpage_admin.php">Chat</a></li>
            <li><a class="dropdown-item" href="../crud_rutas.php">Administrar Estacionamiento</a></li>
            <li><a class="dropdown-item" href="../opiniones_usuarios.php">Opiniones Usuarios</a></li>
        </ul>
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
                    window.location.href = 'login.php';
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

</header>
<body>


<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-md-4">
            <div>
                <?php
                if (isset($_SESSION['msj'])) {
                    $respuesta = $_SESSION['msj'];
                ?>
                    <script>
                        Swal.fire({
                            title: "Good job!",
                            text: '<?php echo $respuesta; ?>',
                            icon: "success"
                        });
                    </script>
                <?php
                    unset($_SESSION['msj']);
                }
                ?>

                <button type="button" class="btn btn-primary boton-derecha" data-toggle="modal" data-target="#agregar">Agregar Usuario</button>
                <br><br>

                <div class="container">
                    <input type="text" id="searchInput" class="form-control mb-3" placeholder="Buscar...">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Edad</th>
                                <th>Correo</th>
                                <th>Contraseña</th>
                                <th>Rol</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once("../db.php");
                            $result = mysqli_query($conexion, "SELECT * FROM usuarios");
                            while ($fila = mysqli_fetch_assoc($result)) :
                            ?>
                                <tr>
                                    <td><?php echo $fila['id']; ?></td>
                                    <td><?php echo $fila['nombre']; ?></td>
                                    <td><?php echo $fila['apellido']; ?></td>
                                    <td><?php echo $fila['edad']; ?></td>
                                    <td><?php echo $fila['correo']; ?></td>
                                    <td><?php echo $fila['passwor']; ?></td>
                                    <td><?php echo $fila['id_rol']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editar<?php echo $fila['id']; ?>">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#delete<?php echo $fila['id']; ?>">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php include "../includes_crudusers/editar.php"; ?>
                                <?php include "../includes_crudusers/eliminar.php"; ?>
                            <?php endwhile; ?>
                        </tbody>
                    </table>

                    <script>
                        document.getElementById('searchInput').addEventListener('keyup', function() {
                            const searchValue = this.value.toLowerCase();
                            const rows = document.querySelectorAll('#dataTable tbody tr');

                            rows.forEach(row => {
                                const cells = row.querySelectorAll('td');
                                const rowText = Array.from(cells).map(cell => cell.textContent.toLowerCase()).join(' ');

                                if (rowText.includes(searchValue)) {
                                    row.style.display = '';
                                } else {
                                    row.style.display = 'none';
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </main>
    </div>
</div>

<div class="text-center mt-4 mb-3">
        <a href="../menu_admin.php" class="btn-salir1">
            Salir
        </a>
    </div>

<?php include "agregar.php"; ?>

<script src="../js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>


<script>
    function salir() {
        if (confirm('¿Estás seguro de que deseas salir?')) {
            fetch(window.location.href, {
                method: 'POST',
                body: new URLSearchParams({
                    'salir': 'true'
                })
            }).then(response => {
                if (response.ok) {
                    window.location.href = 'login.php';
                } else {
                    console.error('Error al cerrar la sesión');
                }
            }).catch(error => console.error('Error:', error));
        }
    }
</script>
<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<!-- JavaScript de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

</body>

</html>
