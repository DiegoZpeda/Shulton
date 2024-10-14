<?php


extract($_POST);
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
$correo = $_POST['correo'];
$passwor = $_POST['passwor'];
$id_rol = $_POST['id_rol'];


// Insertar la información del archivo en la base de datos
include "../db.php";
$sql = "INSERT INTO usuarios (nombre, apellido, edad, correo, passwor, id_rol) 
VALUES ( '$nombre', '$apellido', '$edad','$correo','$passwor','$id_rol')";
$resultado = mysqli_query($conexion, $sql);
if ($resultado) {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script language='JavaScript'>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Usuario Ingresado con Exito',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            timer: 1500
          }).then(() => {
            location.assign('../usuarios/crud_usuarios.php');
          });
});
    </script>";
} else {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script language='JavaScript'>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Algo salio mal. Intenta de nuevo',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            timer: 1500
          }).then(() => {
            location.assign('../usuarios/crud_usuarios.php');
          });
});
    </script>";
}
        
   

