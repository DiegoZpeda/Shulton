<?php
$servername = "localhost";
$username = "root"; // Cambia esto a tu usuario
$password = ""; // Cambia esto a tu contraseña
$dbname = "shulton_parking";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar los datos de feedback
$sql = "SELECT rating_question_1, rating_question_2, rating_question_3, comment FROM feedback ORDER BY id DESC LIMIT 10";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/barra.css">
    <style>
        /* Estilo de los enlaces y el menú desplegable */
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

        /* Estilo del cuerpo y la tabla */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            
            padding: 90px 5px 5px; /* Aumenta el margen superior */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            margin-top: 50px;
            background-color: #fff;
            border-radius: 5px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
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
<?php include 'menu_adm.php'; ?>
<body>
   
    </br>
    </br>
    </br>
        <div class="container">
        <h1>Comentarios de Usuarios</h1>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>¿Cómo calificarías tu experiencia general con nuestra plataforma?</th>
                                <th>¿Qué tan fácil fue para ti utilizar nuestra plataforma?</th>
                                <th>¿Qué tan precisa consideras que es la información sobre los estacionamientos disponibles?</th>
                                <th>¿Tienes algún comentario o sugerencia para mejorar nuestra plataforma?</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Asume que $result es una instancia de mysqli_result que contiene los datos
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row["rating_question_1"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["rating_question_2"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["rating_question_3"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["comment"]) . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No hay feedback disponible.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="text-center mt-4 mb-3">
        <a href="menu_admin.php" class="btn-salir1">
            Salir
        </a>
    </div>

    <!-- Scripts de Bootstrap y tu script personalizado -->
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

<?php
$conn->close();
?>
