<?php
session_start();
header("Cache-control: private");
header("Cache-control: no-cache, must-revalidate");
header("Pragma: no-cache");
if (!isset($_SESSION['correo'])) {
    header('Location: login.php');
    exit; 
} 
?>
<?php
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Average&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/barra.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Average&display=swap');

        .nav-link {
            color: #87CEEB !important; /* Color celeste para los enlaces */
        }

        .nav-item {
            margin: 0 10px; /* Separación horizontal entre los botones */
        }

        .dropdown-menu {
            min-width: 150px;
            background-color: #4873C9; /* Color de fondo del menú */
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
        }

        .dropdown-item {
            color: #ffffff; /* Color del texto de los elementos */
        }

        .dropdown-item:hover {
            background-color: #e9ecef; /* Color de fondo al pasar el mouse */
            color: #000; /* Color del texto al pasar el mouse */
        }
        
        .h2 {
            color: #7ED957; 
            font-size: 18px;
            font-family: 'Average', serif; 
        }

        #content {
            padding: 20px;
        }

        .container1 {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #0B44B7;
            padding: 10px 20px;
            border-radius: 8px;
            width: 100%;
            box-sizing: border-box;
            height: 80px;
        }

        .tipe {
            text-align: center;
        }

        .tipe h1 {
            font-size: 2.0rem;
            color: white;
            margin: 0;
        }

        main {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            margin: 60px auto; /* Incrementa el margen superior */
            padding: 20px;
        }

        .contenido-formulario {
            margin-bottom: 20px;
        }

        .contenido-formulario h2 {
            font-size: 1.40rem;
            color: #656565;
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #dddddd;
            border-radius: 5px;
            color: #7B7B7B;
            box-sizing: border-box;
            resize: vertical; 
            font-size: 1.2rem;
            font-family: 'Almarai', sans-serif;
        }

        .buttons {
            display: flex;
            justify-content: center; 
            gap: 10px; 
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .btn {
            background-color: #0B44B7;
            width: 40%;
            padding: 10px;
            border: none;
            border-radius: 15px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            padding: 12px 30px;
            color: #fff;
            min-width: 120px;
        }

        .btn:hover {
            opacity: 0.8;
            color: #fff;
        }

        .btn-cancel {
            background-color: #F03E3E;
        }

        .btn-cancel:hover {
            opacity: 0.8;
            color: #fff;
        }

        #informacionQuienesSomos {
            padding: 20px;
            font-size: 18px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

    <header>
        <div class="padre-sup">
            <div class="hijo-sup">
                <div class="logo-titulo">
                    <a class="hipervinculo-h" href="index.php">
                        <img src="img/3.png" alt="Descripción del logo" style="width: 300px; height: 250px;">
                    </a>
                    <h1 id="titulo-h"><a class="hipervinculo-h" href="index.php"></a></h1>
                </div>

                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <!-- Botón Desplegable Administrar -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="administrarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-cog fa-spin fa-lg fa-fw"></i> Administrar
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="administrarDropdown">
                                    <li><a class="dropdown-item" href="usuarios/crud_usuarios.php">Administrar Usuario</a></li>
                                    <li><a class="dropdown-item" href="chatpage_admin.php">Chat</a></li>
                                    <li><a class="dropdown-item" href="crud_rutas.php">Administrar Estacionamiento</a></li>
                                    <li><a class="dropdown-item" href="#">Opiniones Usuarios</a></li>
                                    <li><a class="dropdown-item" href="quienesomos_admin.php">Quiénes Somos</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" onclick="salir()">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div id="franja-amarilla-h"></div>
    </header>

    <section id="content">
        <main>
            <div class="container1">
                <div class="tipe">
                    <h1>Quiénes Somos</h1>             
                </div>
            </div>
            <br/><br/>
            <div class="contenido-formulario">
                <h2>Editar información sobre Quiénes Somos</h2>
                <form id="formQuienesSomos">
                    <div class="form-group">
                        <textarea rows="12" id="contenidoInput" name="contenido" placeholder="Ingrese la información"></textarea>
                        <span id="contenidoError" style="display: none;">Por favor, ingrese la información.</span>
                    </div>
                    <div class="buttons">
                        <button class="btn" type="submit">Guardar</button>
                        <a href="menu_admin.php" class="btn btn-cancel">Cancelar</a>
                    </div>
                </form>
            </div>
        </main>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        window.onload = function() {
            cargarInformacionQuienesSomos();
        };

        function cargarInformacionQuienesSomos() {
            fetch("obtener_quienes_somos.php")
                .then(response => response.text())
                .then(data => {
                    document.getElementById("contenidoInput").innerText = data;
                })
                .catch(error => console.error('Error:', error));
        }

        function salir() {
            if (confirm("¿Estás seguro de que deseas cerrar sesión?")) {
                document.getElementById('formCerrarSesion').submit();
            }
        }

        document.getElementById('formQuienesSomos').addEventListener('submit', function(event) {
            event.preventDefault(); 
            const contenido = document.getElementById('contenidoInput').value.trim();

            if (contenido === '') {
                document.getElementById('contenidoError').style.display = 'block';
                return;
            } else {
                document.getElementById('contenidoError').style.display = 'none';
            }

            const formData = new FormData();
            formData.append('contenido', contenido);

            fetch('guardar_quienes_somos.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert('Información guardada exitosamente.');
            })
            .catch(error => console.error('Error al guardar:', error));
        });
    </script>
</body>
</html>
