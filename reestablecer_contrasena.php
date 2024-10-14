<?php

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM usuarios
        WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$usuarios = $result->fetch_assoc();

if ($usuarios === null) {
    //die("token not found");
    header("Location: enlace_caducado.php");
    exit();
}

if (strtotime($usuarios["reset_token_expires_at"]) <= time()) {
    //die("token has expired");
    header("Location: enlace_caducado.php");
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Reestablecer Contraseña</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/desin2.css"> 
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
<div class="contenedor-formularios">
<div class="titulo">
        <h1>Reestablecer Contraseña</h1>
        

    </div>
    
    <br>
    <br>
    <div class="inputs">
    <?php
            session_start();
            if (isset($_SESSION['error_messagecontra'])) {
                echo '<div class="alert alert-danger text-center" role="alert" style="max-width: 600px; margin: auto;">
                        <div>' . $_SESSION['error_messagecontra'] . '</div>
                    </div>
                    <br>';
                unset($_SESSION['error_messagecontra']);
            }
            
            $password_value = '';
            $password_confirvalue = '';
            if (isset($_SESSION['password'])) {
                $password_value = $_SESSION['password'];
                unset($_SESSION['password']);
            }
            if (isset($_SESSION['password_confirmation'])) {
                $password_confirvalue = $_SESSION['password_confirmation'];
                unset($_SESSION['password_confirmation']);
            }
                
            ?>
    <form action="proceso_reestablecer_contrasena.php" method="post" >
    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
    <p>Nueva contraseña</p>
            <div class="contenedor-input">
        <label for="password"><span class="req"></span>
                </label>
            <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($password_value); ?>"  required>
        </div>
    <p>Confirmar contraseña</p>
            <div class="contenedor-input">
        <label for="password_confirmation"><span class="req"></span>
                </label>
            <input type="password" id="password_confirmation" name="password_confirmation" value="<?php echo htmlspecialchars($password_confirvalue); ?>" required>
        </div>
        <div style="text-align: center;">
        <button type="submit" class="btn0 btn1">Guardar</button>
        </br>
                    </br>
                    <a href="login.php"  class="boton-atras">Regresar</a>
                    </br>
                    </br>
    </div>

    </form>
</div>
</body>
</html>