<?php

$passwor = $_POST["password"];
$password_confirmation = $_POST["password_confirmation"];

$token = $_POST["token"];

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
    header("Location: enlace_caducado.php");
    exit();
}
/*
if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}
*/
if ($_POST["password"] !== $_POST["password_confirmation"]) {
    //die("Passwords must match");
    $_SESSION['error_messagecontra'] = "¡Error! Las contraseñas no coinciden";
    $_SESSION['password'] = $passwor;
    $_SESSION['password_confirmation'] = $password_confirmation;
    header("Location: reestablecer_contrasena.php?token=$token");
    exit();

}else{
    $sql = "UPDATE usuarios
    SET passwor = ?,
        reset_token_hash = NULL,
        reset_token_expires_at = NULL
    WHERE id = ?";

    $stmt = $mysqli->prepare($sql);

    $stmt->bind_param("ss", $passwor, $usuarios["id"]);

    $stmt->execute();

    //header("Location: login.php");
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script language='JavaScript'>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Contraseña Reestablecida con Exito',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar',
            timer: 2500
          }).then(() => {
            location.assign('login.php');
          });
        });
    </script>";
    
    exit();
}



