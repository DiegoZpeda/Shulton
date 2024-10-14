<?php
include_once('class/mapa.php');

// Inicializar la clase Mapa
$mapa = new Mapa();

// Manejar las acciones del formulario
if (isset($_POST['add'])) {
    $nombre = $_POST['nombre'];
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];
    $precio = "$" . $_POST['precio'] . " por hora";
    $horario = $_POST['horario'];  // Asumiendo que ya tienes este campo en el formulario
    $capacidad = $_POST['capacidad'];  // Agregando la descripción "Capacidad de Vehículos"
    $descripcion = $_POST['descripcion'];

    $imagen = '';
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['imagen']['tmp_name'];
        $fileName = $_FILES['imagen']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $uploadFileDir = './uploads/';
        if (!is_dir($uploadFileDir)) {
            mkdir($uploadFileDir, 0777, true);
        }
        $dest_path = $uploadFileDir . $newFileName;
        
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $imagen = $dest_path;
        }
    }
    
    // Asegúrate de que la función addMapa también maneje los nuevos campos "horario" y "capacidad"
    $mapa->addMapa($nombre, $latitud, $longitud, $precio, $imagen, $horario, $capacidad, $descripcion);
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $mapa->deleteMapa($id);
}

// Obtener todas las mapas
$mapas = $mapa->getAllMapas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shulton Parking</title>

    <!-- Google Maps API -->
    <script type="text/javascript" src=""></script>

    <!-- CSS y JS -->
    <link rel="stylesheet" href="<?=BASE_URL?>/css/base.css">
    <script type="text/javascript" src="<?=BASE_URL?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?=BASE_URL?>/js/functions.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/barra.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Average&display=swap" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Average&display=swap');

        /* Estilo adicional para el menú desplegable */
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

        .content1 {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #FFFFFF; 
            padding-top: 70px;
        }

        .container1 {
            background-color: #FFFFFF;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 1000px; /* Aumentar el ancho máximo */
            width: 100%;
            margin: 0 auto; /* Centrar horizontalmente */
        }

        h1 {
            text-align: center;
            color: #7ED957;
            font-weight: normal;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            background-color: #0B44B7;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            opacity: 0.8;
        }

        button.delete-btn {
            background-color: #dc3545;
        }

        button.delete-btn:hover {
            opacity: 0.8;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        td:last-child {
            text-align: center;
        }

        td button {
            margin-right: 5px;
        }

        .btn.btn-primary {
            background-color: #7ED957;
            color: white;
        }

        .btn.btn-primary:hover {
            background-color: darkgreen;
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

<body>
    <?php include 'menu_adm.php'; ?>

    <!-- Contenido principal -->
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="content1">
            <div class="container1">
                <h1>Agregar Estacionamientos</h1>
                
                <form method="post" action="" enctype="multipart/form-data">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" required>
                    
                    <label for="latitud">Latitud:</label>
                    <input type="text" name="latitud" id="latitud" required>
                    
                    <label for="longitud">Longitud:</label>
                    <input type="text" name="longitud" id="longitud" required>
                    
                    <label for="precio">Precio (por hora):</label>
                    <input type="text" name="precio" id="precio" placeholder="Solo el valor numérico" required>
                    
                    <label for="horario">Horario:</label>
                    <input type="text" name="horario" id="horario" required>
    
                    <label for="capacidad">Capacidad de Vehículos:</label>
                    <input type="text" name="capacidad" id="capacidad" placeholder="Capacidad de Vehículos" required>
    
                    <label for="descripcion">Descripción:</label>
                    <input type="text" name="descripcion" id="descripcion" placeholder="Descripción del estacionamiento" required>
                    
                    <label for="imagen">Imagen:</label>
                    <input type="file" name="imagen" id="imagen" accept="image/*">
                    
                    <button type="submit" name="add">Agregar</button>
                </form>

                <!-- Campo de búsqueda -->
                <input type="text" id="searchInput" class="form-control mb-3" placeholder="Buscar...">

                <!-- Tabla -->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Latitud</th>
                            <th>Longitud</th>
                            <th>Precio</th>
                            <th>Horario</th>
                            <th>Capacidad</th>
                            <th>Descripción</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mapas as $t): ?>
                            <tr>
                                <td><?= $t['mapa_id'] ?></td>
                                <td><?= $t['nombre'] ?></td>
                                <td><?= $t['latitud'] ?></td>
                                <td><?= $t['longitud'] ?></td>
                                <td><?= $t['precio'] ?></td>
                                <td><?= $t['horario'] ?></td>
                                <td><?= $t['capacidad'] ?></td>
                                <td><?= $t['descripcion'] ?></td>
                                <td>
                                    <?php if (!empty($t['imagen'])): ?>
                                        <img src="<?= $t['imagen'] ?>" alt="Imagen de <?= htmlspecialchars($t['nombre']) ?>" style="width: 100px; height: auto;">
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <form method="post" action="" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $t['mapa_id'] ?>">
                                        <button type="submit" name="delete" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
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

    <div class="text-center mt-4 mb-3">
        <a href="menu_admin.php" class="btn-salir1">
            Salir
        </a>
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

    <script src="js/scripts.js"></script>
</body>
</html>