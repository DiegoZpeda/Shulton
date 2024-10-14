<?php
session_start();
header("Cache-control: private");
header("Cache-control: no-cache, must-revalidate");
header("Pragma: no-cache");

if (!isset($_SESSION['correo'])) {
    header('Location: index.php');
    exit;
}

include("../shulton_parking/db.php");

$user = $_SESSION['correo'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $correo = $_POST['correo'];
    $passwor = $_POST['passwor'];

    // Procesar la subida de la imagen
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $foto = $_FILES['foto'];
        $nombreFoto = $foto['name'];
        $rutaDestino = 'uploads/' . $nombreFoto;

        // Mover la imagen subida a la carpeta de destino
        move_uploaded_file($foto['tmp_name'], $rutaDestino);

        // Actualizar en la base de datos
        $sql = "UPDATE usuarios SET nombre = ?, apellido = ?, edad = ?, correo = ?, passwor = ?, foto = ? WHERE correo = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssissss", $nombre, $apellido, $edad, $correo, $passwor, $rutaDestino, $correo);
    } else {
        // Si no hay imagen, solo actualizar los otros campos
        $sql = "UPDATE usuarios SET nombre = ?, apellido = ?, edad = ?, correo = ?, passwor = ? WHERE correo = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssisss", $nombre, $apellido, $edad, $correo, $passwor, $correo);
    }

    $stmt->execute();
    $stmt->close();
    
}


$sql = "SELECT id, nombre, apellido, edad, correo, passwor, foto FROM usuarios WHERE correo = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$resultado = $stmt->get_result();
$data = $resultado->fetch_assoc();

$nombre = $data['nombre'];
$apellido = $data['apellido'];
$edad = $data['edad'];
$correo = $data['correo'];
$passwor = $data['passwor'];
$rutaDestino= $data['foto'];

$stmt->close();
$conexion->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Average&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="css/registro.css">
    <title>Información Personal</title>
    <style>
        body {
            font-family: 'Raleway', sans-serif;
            background-color: #f8f9fa;
        }
        .contenedor-formularios {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .titulo {
            margin-bottom: 20px;
        }
        .datos-usuario h3 {
            margin-bottom: 15px;
        }
        .btn.btn2 {
            background-color: #007bff;
            color: white;
            transition: background-color 0.3s;
        }
        .btn.btn2:hover {
            background-color: #0056b3;
        }
        .form-group {
            text-align: left;
        }
        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        
        .foto-perfil {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            cursor: pointer;
            background-color: #ccc;
            display: flex;
            justify-content: center;
            position: Relative;
            
        }
        #foto {
            display: none; /* esto oculta la wea de cambiar imagen */
        }
        /* Estilos para la ventana modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4); /* Color más suave */
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(5px); /* Fondo desenfocado */
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px; /* Bordes más redondeados */
            text-align: center;
            max-width: 300px; /* Tamaño más pequeño */
            width: 90%; /* Acomoda el modal dentro de la pantalla */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra sutil */
        }

        .modal-content h3 {
            margin-bottom: 20px;
            font-size: 1.2em;
        }

        .modal-buttons {
            display: flex;
            justify-content: space-around;
        }

        .modal-content button {
            background-color: #007bff; /* Color de botón */
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .modal-content button:hover {
            background-color: #0056b3; /* Color de botón en hover */
        }
        .perfil-usuario {
        width: 50%;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        }
    </style>
</head>
<body>
    <?php include 'menu_usuario.php'; ?>
    <br>
    <br>
    <br>
    <br>

    <div class="contenedor-formularios">
        <h2 class="titulo">Perfil del Usuario</h2>
        <form action="procesar_foto.php" method="POST" enctype="multipart/form-data" id="form-perfil">
            <div class="perfil-usuario">
                <!-- Mostrar la foto actual -->
                <img src="<?php echo htmlspecialchars($data['foto']); ?>" alt="" class="foto-perfil" id="img-perfil">
                <br>
                <!--Esto es para el cambio de fotos-->
                <div class="form-group">
                    <label for="foto"></label>
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                </div>
            </div>
        </form>
        
        <div id="modalConfirmar" class="modal">
            <div class="modal-content">
                <h3>¿Quieres cambiar tu foto de perfil?</h3>
                <button id="confirmar">Sí, cambiar</button>
                <button id="cancelar">No, cancelar</button>
            </div>
        </div>

        <div class="datos-usuario">
            <h3>Nombre: <span id="nombre-texto"><?php echo htmlspecialchars($nombre); ?></span></h3>
            <h3>Apellido: <span id="apellido-texto"><?php echo htmlspecialchars($apellido); ?></span></h3>
            <h3>Edad: <span id="edad-texto"><?php echo htmlspecialchars($edad); ?></span></h3>
            <h3>Correo: <span id="correo-texto"><?php echo htmlspecialchars($correo); ?></span></h3>
            
        </div>
        
        <div class="btn-group">
            <button id="btn-editar" class="btn btn2">Editar</button>
        </div>
        <div class="btn-group">
            <a id="btn-regresar" href="usuario.php" class="btn btn2">Regresar</a>
        </div>
        <script>
            // Detectar el clic en la imagen y activar el input file
            document.getElementById('img-perfil').addEventListener('click', function() {
                document.getElementById('foto').click();
            });

            document.getElementById('foto').addEventListener('change', function(event) {
                const input = event.target;
                if (input.files && input.files[0]) {
                    // No se asigna la imagen al elemento 'img-perfil'

                    // Muestra el modal
                    document.getElementById('modalConfirmar').style.display = 'flex';
                }
            });

            // Funcionalidad del modal
            document.getElementById('confirmar').addEventListener('click', function() {
                document.getElementById('modalConfirmar').style.display = 'none';
                document.getElementById('form-perfil').submit();
            });

            document.getElementById('cancelar').addEventListener('click', function() {
                document.getElementById('modalConfirmar').style.display = 'none';
            });
        </script>


        <form id="form-editar" method="POST" action="" enctype="multipart/form-data" style="display: none;">
            
            <div class="form-group">
                <label for="nombre"></label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" required>
            </div>
            <div class="form-group">
                <label for="apellido"></label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo htmlspecialchars($apellido); ?>" required>
            </div>
            <div class="form-group">
                <label for="edad"></label>
                <input type="number" class="form-control" id="edad" name="edad" value="<?php echo htmlspecialchars($edad); ?>" required>
            </div>
            <div class="form-group">
                <label for="correo"></label>
                <input type="email" class="form-control" id="correo" name="correo" value="<?php echo htmlspecialchars($correo); ?>" required>
            </div>
            <div class="form-group">
                <label for="passwor"></label>
                <input type="password" class="form-control" id="passwor" name="passwor" value="<?php echo htmlspecialchars($passwor); ?>" required>
            </div>
            <div class="btn-group">
                <button type="submit" name="guardar" class="btn btn2">Guardar Cambios</button>
            </div>
            <div class="btn-group">
                <button type="button" id="btn-cancelar" class="btn btn2">Cancelar</button>
            </div>
        </form>
        
    </div>

    <?php if (isset($mensaje)): ?>
        <script>
            Swal.fire({
                title: 'Resultado',
                text: '<?php echo $mensaje; ?>',
                icon: '<?php echo $mensaje == "Tus datos han sido actualizados correctamente." ? "success" : "error"; ?>'
            });
        </script>
    <?php endif; ?>

    <script>
        document.getElementById('btn-editar').addEventListener('click', function() {
            document.getElementById('form-editar').style.display = 'block';
            document.getElementById('btn-editar').style.display = 'none';
            document.getElementById('btn-regresar').style.display = 'none'; // Oculta el botón "Regresar"
            document.querySelector('.datos-usuario').style.display = 'none';
        });

        document.getElementById('btn-cancelar').addEventListener('click', function() {
            document.getElementById('form-editar').style.display = 'none';
            document.getElementById('btn-editar').style.display = 'block';
            document.getElementById('btn-regresar').style.display = 'block'; // Muestra nuevamente el botón "Regresar"
            document.querySelector('.datos-usuario').style.display = 'block';
        });
    </script>
</body>
</html>