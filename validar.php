<form action="validar.php" method="post">
    <h1 class="animate__animated animate__backInLeft">Sistema de login</h1>
    <p>Correo <input type="text" placeholder="ingrese su Correo" name="correo"></p>
    <p>Contraseña <input type="password" placeholder="ingrese su contraseña" name="passwor"></p>
    <input type="submit" value="Ingresar">

<?php
include('db.php');

$correo = $_POST['correo'];
$passwor = $_POST['passwor'];

session_start();
$_SESSION['correo'] = $correo;

$conexion = mysqli_connect("localhost", "root", "", "shulton_parking");

$consulta = "SELECT * FROM usuarios WHERE correo='$correo'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_fetch_array($resultado);

if ($filas != null) { 
    // Verificar la contraseña ingresada con el hash almacenado en la base de datos
    if (password_verify($passwor, $filas['passwor'])) {
        // Contraseña es correcta
        if ($filas['id_rol'] == 1) { // Entra como admin
            header("location:menu_admin.php");
        } elseif ($filas['id_rol'] == 2) { // Entra como usuario
            header("location:usuario.php");
        } else {
            include("login.php");
            echo "<h1 class='bad'>ERROR DE AUTENTIFICACIÓN</h1>";
        }
    } else {
        header("location:login.php?error=1");
    }
} else {
    header("location:login.php?error=1");
}

mysqli_close($conexion);
?>

