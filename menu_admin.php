<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shulton Parking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/barra.css">
    <style>
        .nav-link {
            color: #87CEEB !important;
        }

        .nav-item {
            margin: 0 10px;
        }

        .dropdown-menu {
            min-width: 150px;
            background-color: #4873C9;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
        }

        .dropdown-item {
            color: #ffffff;
        }

        .dropdown-item:hover {
            background-color: #e9ecef;
            color: #000;
        }

        .content-container {
            display: flex;
            justify-content: flex-start; /* Justificar contenido al inicio */
            align-items: flex-start; /* Alinear los elementos al inicio */
            height: 100vh;
            padding: 20px;
            margin-top: 20px; /* Espacio entre el contenedor y la parte superior */
        }

        .column {
            padding: 20px; /* Reducido para acercar más al logo */
        }

        .box {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            padding: 50px;
            margin-bottom: 20px;
            text-align: center;
            cursor: pointer;
        }

        .column-left {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .column-right {
            flex: 1;
            display: flex;
            flex-direction: column;
            height: 55vh;
            gap: 20px;
        }

        .box i {
            color: #4873C9;
        }

        .menu-administrador {
            background-color: #4873C9;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-size: 20px;
            height: 100px;
            width: 100%;
            margin-top: 20px; /* Ajusta para pegar más al logo */
        }

        .logo-titulo {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>
<?php include 'menu_adm.php'; ?>
<body>
    <header>
        <div class="padre-sup">
            <div class="hijo-sup">
                <div class="logo-titulo">
                    <a class="hipervinculo-h" href="menu_admin.php">
                        <img src="img/3.png" alt="Descripción del logo" style="width: 300px; height: 250px;">
                    </a>
                    <div class="menu-administrador">
                        <h2>Menu Administrador</h2>
                    </div>
                </div>

               
    </header>

    <div class="content-container">
        <div class="column column-left">
            <div class="box" onclick="location.href='usuarios/crud_usuarios.php'">
                <i class="fas fa-users mr-2"></i> Administrar Usuarios
            </div>
            <div class="box" onclick="location.href='chatpage_admin.php'">
                <i class="fas fa-comment mr-2"></i> Chat
            </div>
        </div>
        <div class="column column-right">
            <div class="box" onclick="location.href='crud_rutas.php'">
                <i class="fas fa-parking mr-2"></i> Administrar Estacionamientos
            </div>
            <div class="box" onclick="location.href='opiniones_usuarios.php'">
                <i class="fas fa-comment-dots mr-2"></i> Opiniones Usuarios
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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
</body>

</html>
