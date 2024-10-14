<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["contenido"]) && !empty(trim($_POST["contenido"]))) {

    $conexion = new mysqli("localhost", "root", "", "shulton_parking");


    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }


    $contenido = trim($_POST["contenido"]);


    $query = "INSERT INTO quienes_somos (contenido) VALUES ('$contenido')";


    if ($conexion->query($query) === TRUE) {
        echo "Información guardada correctamente.";
        /*
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Quines Somos Actualizado con Exito',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Aceptar',
                    timer: 2500
                }).then(() => {
                    location.assign('login.php');
                });
                });
            </script>";
        */
    } else {
        echo "Error al guardar la información: " . $conexion->error;
    }


    $conexion->close();
} else {

    echo "Error: No se recibieron datos válidos del formulario.";
}
?>