<!-- Agrega la biblioteca de SweetAlert -->


<?php

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
            //casos de registros
        case 'editar':
            editar();
            break;

        case 'eliminar':
            eliminar();
            break;
    }
}

function editar()
{

    extract($_POST);
    require_once("../db.php");

    $consulta = "UPDATE usuarios SET nombre = '$nombre', 
    apellido = '$apellido', edad = '$edad', correo = '$correo', passwor = '$passwor', id_rol = '$id_rol' WHERE id = '$id' ";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'El registro fue actualizado correctamente',
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

    
}

function eliminar()
{

    extract($_POST);
    require_once("../db.php");

    $consulta = "DELETE FROM usuarios WHERE id = '$id' ";

    $resultado = mysqli_query($conexion, $consulta);

    echo '
    <script type = "text/javascript">
        
        window.location = "../usuarios/crud_usuarios.php";
    </script>
';

}
