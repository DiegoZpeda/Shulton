
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu.css">
    <title>Shulton Parking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Average&display=swap" rel="stylesheet">
    <style>
        /* Estilo general del cuerpo */
        body {
            font-family: 'Average Serif', serif;
            font-weight: 500;
            margin: 0;
            padding: 0;
        }

        /* Estilo para la imagen de fondo de "Quiénes Somos" */
        .background-image {
            width: 100%;
            height: 100vh; 
            height: 300px;
            background-image: url('img/quienes1.png');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Fondo para la sección "Contáctanos" */
        .background-contacto {
            background-image: url('img/image1.png'); /* Ruta de la imagen de fondo */
            background-size: cover;
            background-position: center;
            padding: 100px;
            width: 100%;
            position: relative;
        }

        /* Sección de contacto alineada en el centro con fondo transparente */
        .contacto {
            background-color: rgba(0, 0, 0, 0.7); /* Fondo oscuro transparente */
            padding: 20px;
            margin: 50px auto;
            width: 60%;
            text-align: center;
            border: 2px solid #8fbc8f;
            border-radius: 10px;
            color: white;
        }

        /* Estilo para el contenedor principal */
        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f4f4f4;
            padding: 20px;
        }

        /* Sección de contenido con imagen y texto alineado */
        .content-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 80px;
            text-align: left;
        }

        /* Imagen circular alineada */
        .circular-image {
            border-radius: 50%;
            width: 300px;
            height: 300px;
            object-fit: cover;
            margin-left: 20px;
        }

        /* Ajustes para que el texto se vea mejor organizado */
        .text-section {
            flex: 1;
            padding-right: 20px;
        }

        /* Estilos para Misión y Visión */
        .mision-vision-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 50px;
            text-align: center;
        }

        .mision, .vision {
            width: 45%;
            margin: 0 20px;
        }

        /* Sección Historia */
        .historia-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 50px;
        }

        .historia {
            flex: 1;
            padding-left: 20px;
        }

        .historia img {
            margin-right: 40px;
        }

        /* Ajustes para la imagen grande */
        .full-width-image {
            width: 80%;
            display: flex;
            align-items: center;
            height: 450px;
            margin: 100px auto;
        }

        /* Sección Nuestro Equipo */
        .nuestro-equipo {
            text-align: center;
            padding: 150px 0;
        }

        .equipo-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .equipo-item {
            background-color: #e3e3e3;
            padding: 20px;
            border-radius: 10px;
            width: 200px;
            text-align: center;
            margin: 20px;
        }

        .equipo-imagen {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
        }

        .equipo-nombre {
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <main>
        <!-- Sección de fondo de "Quiénes Somos" -->
        <div class="background-image">
            <h1>Quiénes Somos</h1>
        </div>

        <!-- Sección Shulton Parking -->
        <section class="content-section">
            <div class="text-section">
                <h2>¿Qué es Shulton Parking?</h2>
                <p>Shulton Parking es una plataforma web diseñada para simplificar la búsqueda de estacionamiento seguro para tu automóvil o motocicleta en el municipio de Usulután. Brindamos una solución eficiente para gestionar el tiempo y encontrar un lugar de manera rápida y segura.</p>
            </div>
            <img src="img/esta.jpg" alt="Imagen Shulton Parking" class="circular-image">
        </section>

        <!-- Sección Misión y Visión -->
        <div class="mision-vision-container">
            <div class="mision">
                <h3>Misión</h3>
                <p>Ser la plataforma de referencia en gestión de estacionamientos, liderando con innovación y compromiso hacia nuestros usuarios.</p>
            </div>
            <div class="vision">
                <h3>Visión</h3>
                <p>Proporcionar una herramienta eficiente y accesible que permita a los usuarios encontrar el estacionamiento perfecto en cualquier lugar y momento.</p>
            </div>
        </div>

        <!-- Imagen grande -->
        <div>
            <img src="img/mivi.png" alt="Estacionamiento" class="full-width-image">
        </div>

        <!-- Sección Historia -->
        <section class="content-section historia-container">
            <img src="img/historia.png" alt="Imagen Historia" class="circular-image">
            <div class="text-section historia">
                <h3>Historia</h3>
                <p>Shulton Parking nació con el propósito de brindar una solución tecnológica para facilitar la búsqueda de estacionamiento en Usulután, mejorando la experiencia de los conductores y promoviendo la seguridad de los vehículos.</p>
            </div>
        </section>

        <!-- Sección Nuestro Equipo -->
        <section class="nuestro-equipo">
            <h2>Nuestro Equipo</h2>
            <div class="equipo-container">
                <div class="equipo-item">
                    <img src="img/henry.jpg" alt="Miembro del equipo" class="equipo-imagen">
                    <p class="equipo-nombre">Henry Sanchez</p>
                    <p class="equipo-descripcion">Frontend.</p>
                </div>
                <div class="equipo-item">
                    <img src="img/tavo.jpg" alt="Miembro del equipo" class="equipo-imagen">
                    <p class="equipo-nombre">Gustavo Cerna</p>
                    <p class="equipo-descripcion">Testing</p>
                </div>
                <div class="equipo-item">
                    <img src="img/edwin.jpg" alt="Miembro del equipo" class="equipo-imagen">
                    <p class="equipo-nombre">Edwin López</p>
                    <p class="equipo-descripcion">Lider</p>
                </div>
                <div class="equipo-item">
                    <img src="img/carin.jpg" alt="Miembro del equipo" class="equipo-imagen">
                    <p class="equipo-nombre">Carin Sanchez</p>
                    <p class="equipo-descripcion">Diseñadora UI/UX</p>
                </div>
                <div class="equipo-item">
                    <img src="img/diego.jpg" alt="Miembro del equipo" class="equipo-imagen">
                    <p class="equipo-nombre">Diego Zepeda</p>
                    <p class="equipo-descripcion">Backend</p>
                </div>
            </div>
        </section>

        <!-- Sección de fondo para Contacto -->
        <div class="background-contacto">
            <!-- Sección de contacto -->
            <section class="contacto">
                <h2>Contáctanos</h2>
                <div class="container">
                    <p><i class="fas fa-envelope"></i>  soporteshultonparking@gmail.com</p>
                </div>
            </section>
        </div>
    </main>



    <script>
        // Cuando se carga la página, cargar la información sobre Quiénes Somos
        window.onload = function() {
            cargarInformacionQuienesSomos();
        };

        // Función para cargar la información sobre Quiénes Somos
        function cargarInformacionQuienesSomos() {
            fetch("obtener_quienes_somos.php")
                .then(response => response.text())
                .then(data => {
                    document.getElementById("informacionQuienesSomos").innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        }

        // Función para enviar el formulario de edición de Quiénes Somos
        document.getElementById("formQuienesSomos").addEventListener("submit", function(event) {
            event.preventDefault(); // Evitar el envío por defecto del formulario
            var formData = new FormData(this); // Obtener los datos del formulario
            fetch("guardar_quienes_somos.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                console.log(data); // Imprimir la respuesta del servidor en la consola
                cargarInformacionQuienesSomos(); // Volver a cargar la información sobre Quiénes Somos después de guardar los datos
            })
            .catch(error => console.error('Error:', error));
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <?php include 'menu.php'; ?>

    <script>
        function salir() {
            if (confirm('¿Estás seguro de que deseas salir?')) {
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
</body>
</html>