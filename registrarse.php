<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Shulton Parking</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway|Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="css/desin1.css"> 
    <link rel="stylesheet" href="css/registro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
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

        .error-msg {
            color: red;
            font-size: 0.875em;
            display: none;
        }

        .password-requirements {
            margin-top: 5px;
            font-size: 0.875em;
        }

        .password-requirements li {
            color: red;
            list-style: none;
        }

        .password-requirements li.valid {
            color: green;
        }
    </style>
</head>
<body>
    <?php include 'menu.php'; ?>
    </br>
    </br>
    </br>
    </br>
    <div class="contenedor-formularios">
        <div class="titulo">
            <h1>Registrarse en Shulton Parking</h1>
        </div>
        <br><br>
        <div class="inputs">
            <form action="registro.php" method="post" novalidate id="registro-form">
                <div class="contenedor-input">
                    <label for="nombre">
                        Nombre <span class="req">*</span>
                    </label>
                    <input type="text" id="nombre" name="txtnombre" required>
                </div>

                <div class="contenedor-input">
                    <label for="apellidos">
                        Apellido <span class="req">*</span>
                    </label>
                    <input type="text" id="apellidos" name="txtapeido" required>
                </div>

                <div class="contenedor-input">
                    <label for="edad">
                        Edad <span class="req">*</span>
                    </label>
                    <input type="number" id="edad" name="txtedad" min="15" max="100" required title="La edad mínima permitida es de 15 años y la máxima es de 100 años.">
                    <span id="edad-error" class="error-msg">Debes tener al menos 15 años para poder registrarte.</span>
                </div>

                <div class="contenedor-input">
                    <label for="correo">
                        Correo Electrónico <span class="req">*</span>
                    </label>
                    <input type="email" id="correo" name="txtcorreo" required>
                </div>

                <div class="contenedor-input">
                    <label for="contrasena">
                        Contraseña <span class="req">*</span>
                    </label>
                    <input type="password" id="passwor" name="txtpasswor" required>
                    <span class="icono-mostrar" onclick="togglePasswordVisibility()">
                        <i class="fas fa-eye" id="eye-icon"></i>
                    </span>
                    <ul class="password-requirements">
                        <li id="length" class="invalid">Debe tener al menos 8 caracteres</li>
                        <li id="uppercase" class="invalid">Debe contener una letra mayúscula</li>
                        <li id="lowercase" class="invalid">Debe contener una letra minúscula</li>
                    </ul>
                </div> 

                <div style="text-align: center;">
                    <button type="submit" class="btn0 btn1">Registrarse</button>
                    <br><br>
                    <div class="my-3">
                        <div style="text-align: center;">
                            <a class="login-link center-text">¿Tienes una cuenta?</a>
                            <a class="login-link center-text" href="login.php">Iniciar Sesión</a>
                            <br>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <br>
        <br>
        <br>       
    </div>

    <script>
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

        function validatePassword(password) {
            const lengthValid = password.length >= 8;
            const uppercaseValid = /[A-Z]/.test(password);
            const lowercaseValid = /[a-z]/.test(password);
            
            document.getElementById('length').classList.toggle('valid', lengthValid);
            document.getElementById('uppercase').classList.toggle('valid', uppercaseValid);
            document.getElementById('lowercase').classList.toggle('valid', lowercaseValid);

            return lengthValid && uppercaseValid && lowercaseValid;
        }

        document.getElementById('registro-form').addEventListener('submit', function(event) {
            const edadInput = document.getElementById('edad');
            const edadError = document.getElementById('edad-error');
            const passwordInput = document.getElementById('passwor');
            const passwordValid = validatePassword(passwordInput.value);

            if (edadInput.value < 15 || edadInput.value > 100) {
                edadError.style.display = 'inline';
                event.preventDefault(); // Evita el envío del formulario
            } else {
                edadError.style.display = 'none';
            }

            if (!passwordValid) {
                alert('La contraseña no cumple con los requisitos.');
                event.preventDefault(); // Evita el envío del formulario
            }
        });

        const passwordInput = document.getElementById('passwor');
        passwordInput.addEventListener('input', function() {
            validatePassword(this.value);
        });

        const inputs = document.querySelectorAll('.contenedor-input input');

        inputs.forEach(input => {
            input.addEventListener('input', function() {
                const label = this.previousElementSibling;
                label.style.display = this.value ? 'none' : 'inline';
            });
        });
    </script>
</body>
</html>