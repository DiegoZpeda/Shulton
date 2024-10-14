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
    </style>
</head>
<body>
    <main>
      <div class="background-image">
            <div class="content">
                <h1>ENCONTRAR ESTACIONAMIENTOS <br>NUNCA FUE MÁS FÁCIL</h1>
                <a href="mapalista.php" class="btn">Mapa</a>
            </div>
        </div>

        <!-- Sección de Tarjetas -->
        <div class="container mt-5">
        <div class="row">
            <!-- Tarjeta 1 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="img/estacionamiento.png" class="card-img-top" alt="Estacionamiento 1">
                    <div class="card-body">
                        <h5 class="card-title">Estacionamiento 1</h5>
                        <p class="card-text">Ubicación: 8HW6+2R8, Usulután</p>
                        <p class="card-text">Horario: lun-dom de 05:00 am - 04:00 pm</p>
                        <p class="card-text">Capacidad: 15 automóviles</p>
                        <p class="card-text">Descripcion General:</p>
                        <ul class="card-text">
                            <li><i class="fas fa-shield-alt" style="color:#4873C9;"></i> Personal de seguridad</li>
                            <li><i class="fas fa-wheelchair" style="color: #4873C9;"></i> Accesible para discapacitados</li>
                            <li><i class="fas fa-umbrella" style="color: #4873C9;"></i> Techado</li>
                        </ul>
                        <a href="#" class="btn btn-primary">Ruta</a>
                    </div>
                </div>
            </div>
            <!-- Tarjeta 2 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="img/estacionamiento.png" class="card-img-top" alt="Estacionamiento 2">
                    <div class="card-body">
                        <h5 class="card-title">Estacionamiento 2</h5>
                        <p class="card-text">Ubicación: 8HW6+2R8, Usulután</p>
                        <p class="card-text">Horario: lun-dom de 05:00 am - 04:00 pm</p>
                        <p class="card-text">Capacidad: 15 automóviles</p>
                        <p class="card-text">Descripcion General:</p>
                        <ul class="card-text">
                           <li><i class="fas fa-shield-alt" style="color: #4873C9;"></i> Personal de seguridad</li>
                           <li><i class="fas fa-wheelchair" style="color: #4873C9;"></i> Accesible para discapacitados</li>
                           <li><i class="fas fa-umbrella" style="color:#4873C9;"></i> Techado</li>
                        </ul>
                        <a href="#" class="btn btn-primary">Ruta</a>
                    </div>
                </div>
            </div>
            <!-- Tarjeta 3 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="img/estacionamiento.png" class="card-img-top" alt="Estacionamiento 3">
                    <div class="card-body">
                        <h5 class="card-title">Estacionamiento 3</h5>
                        <p class="card-text">Ubicación: 8HW6+2R8, Usulután</p>
                        <p class="card-text">Horario: lun-dom de 05:00 am - 04:00 pm</p>
                        <p class="card-text">Capacidad: 15 automóviles</p>
                        <p class="card-text">Descripcion General:</p>
                        <ul class="card-text">
                          <li><i class="fas fa-shield-alt" style="color:#4873C9;"></i> Personal de seguridad</li>
                          <li><i class="fas fa-wheelchair" style="color: #4873C9;"></i> Accesible para discapacitados</li>
                          <li><i class="fas fa-umbrella" style="color: #4873C9;"></i> Techado</li>
                        </ul>
                        <a href="#" class="btn btn-primary">Ruta</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                    <a href="#" class="btn-register" style="text-align: center;">Regístrate Gratis</a>
                </div>
            </div>
        </div>
    </main>

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
