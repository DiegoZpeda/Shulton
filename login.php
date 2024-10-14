<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shulton Parking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/desin1.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Average&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Average&display=swap');

        .contenedor-input {
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .contenedor-input input {
            padding-right: 40px; /* Espacio para el ícono */
        }

        .icono-mostrar {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px;
        }
    </style>
</head>

<body>
    </br>
    </br>
    </br>
    <?php include 'menu.php'; ?>   
    <div class="contenedor-formularios">
        <div class="titulo">
            <h1>Iniciar Sesión en Shulton Parking</h1>
        </div>
        <br><br>
        <div class="inputs">
            <form action="validar.php" method="post" id="login-form">
                <div class="contenedor-input">
                    <?php
                    if(isset($_GET['error']) && $_GET['error'] == 1) {
                        echo '<div id="error-msg" class="alert alert-danger" role="alert">
                                Error de autentificación: Correo o contraseña incorrectos
                            </div>';
                    }
                    ?>
                    <!-- Mensaje de error para campos vacíos -->
                    <div id="custom-error-msg" class="alert alert-danger" style="display: none;">
                        Por favor, complete todos los campos.
                    </div>

                    <label for="correo">
                     <span class="req"></span>
                    </label>
                    <input type="text" id="correo" name="correo" placeholder="Correo*" required>
                </div>

                <br><br>
                <div class="contenedor-input">
                    <label for="passwor">
                        <span class="req"></span>
                    </label>
                    <input type="password" id="passwor" name="passwor" placeholder="Contraseña*" required>
                    <span class="icono-mostrar" onclick="togglePasswordVisibility()">
                        <i class="fas fa-eye" id="eye-icon"></i>
                    </span>
                </div>

                <div style="text-align: center;">
                    <a class="login-link center-text" href="olvido_contra.php">¿Olvidó su contraseña?</a>
                    <br>
                </div>

                <div style="text-align: center;">
                    <button type="submit" class="btn0 btn1">Iniciar</button>
                    <br><br>
                    <div class="my-3">
                        <div style="text-align: center;">
                            <a class="login-link center-text" href="registrarse.php">Registrarse</a>
                            <br>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script>
        $(document).ready(function(){
            $('#login-form').submit(function(e) {
                var correo = $('#correo').val().trim();
                var passwor = $('#passwor').val().trim();

                if (correo === '' || passwor === '') {
                    e.preventDefault();

                    // Mostrar mensaje de error
                    $('#custom-error-msg').show();
                } else {
                    $('#custom-error-msg').hide();  // Ocultar el mensaje de error si se completan los campos
                }
            });
        });

        // JavaScript para ocultar la alerta 
        setTimeout(function() {
            document.getElementById('error-msg').style.display = 'none';
        }, 10000); // 10000 milisegundos = 10 segundos

        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('passwor');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
        </script>
    </div>
</body>
</html>