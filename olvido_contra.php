<!DOCTYPE html>
<html>
<head>
    <title>Recuperar contraseña</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/contraseña.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com"> <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> <link href="https: //fonts.googleapis.com/css2?family=Average&display=swap" rel="stylesheet">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Average&display=swap');
</style>
</head>
<body>
</br>
</br>
</br>
<?php include 'menu.php'; ?>
</br>
    </br>   
<div class="contenedor-formularios">
    
    <div class="contenedor-dos-partes">
        <div class="izquierda">
        <img src="img/3.png" alt="Descripción de la imagen" class="imagen-log">
        <?php
            session_start();
            if (isset($_SESSION['error_message'])) {
                echo '<div class="alert alert-danger text-center" role="alert" style="max-width: 600px; margin: auto;">
                        <div>' . $_SESSION['error_message'] . '</div>
                    </div>
                    <br>';
                unset($_SESSION['error_message']);
            }
            $correo_value = '';
            if (isset($_SESSION['correo'])) {
                $correo_value = $_SESSION['correo'];
                unset($_SESSION['correo']);
            }
            ?>
            <form action="enviar_contrasena_reset.php" method="post">
                
                <div class="contenedor-input">
                    
                    <input type="email" id="correo" name="correo" value="<?php echo htmlspecialchars($correo_value); ?>" required>
                    <label for="correo"><span class="req">*</span>Ingrese su correo</label>
                </div>
                </br>
    </br>
                <div style="text-align: center;">
                    <button type="submit" class="btn0 btn1">Enviar</button>
                    </br>
                    </br>
                    </br>
                    </br>
                    <a href="login.php"  class="boton-atras">Regresar</a>
                    </br>
                    </br>
                </div>
            </form>
        </div>



        <div class="derecha">
    <div class="contenido">
    <img src="img/password.png" alt="Olvidé mi contraseña" class="imagen-olvido-contrasena">
        <h2>Restablecer Contraseña</h2>
        <p>Si olvidaste tu contraseña, puedes restablecerla utilizando el correo electrónico asociado a tu cuenta. Te enviaremos un enlace seguro para que puedas crear una nueva contraseña.</p>
    </div>
</div>
    </div>
</div>
</body>
</html>