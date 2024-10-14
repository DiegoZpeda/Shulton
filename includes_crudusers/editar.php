<script>
    function limpiarEspacios(campo) {
        return campo.trim();
    }

    function validarYEnviarFormulario() {
        var nombre = limpiarEspacios(document.getElementById('nombre').value);
        var apellido = limpiarEspacios(document.getElementById('apellido').value);
        var edad = limpiarEspacios(document.getElementById('edad').value);
        var correo = limpiarEspacios(document.getElementById('correo').value);
        var passwor = limpiarEspacios(document.getElementById('passwor').value);

        if (nombre === '' && '<?php echo isset($fila['nombre']) ? $fila['nombre'] : ''; ?>' === '') {
            alert('El campo nombre no puede estar vacío.');
            return false;
        }

        if (apellido === '' && '<?php echo isset($fila['apellido']) ? $fila['apellido'] : ''; ?>' === '') {
            alert('El campo apellido no puede estar vacío.');
            return false;
        }

        if (edad === '' && '<?php echo isset($fila['edad']) ? $fila['edad'] : ''; ?>' === '') {
            alert('El campo edad no puede estar vacío.');
            return false;
        }

        if (correo === '' && '<?php echo isset($fila['correo']) ? $fila['correo'] : ''; ?>' === '') {
            alert('El campo correo no puede estar vacío.');
            return false;
        }

        if (passwor === '' && '<?php echo isset($fila['passwor']) ? $fila['passwor'] : ''; ?>' === '') {
            alert('El campo contraseña no puede estar vacío.');
            return false;
        }

        return true;
    }
</script>

<div class="modal fade" id="editar<?php echo $fila['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" style="background-color: #7ED957; color: #ffffff;">
                <h3 class="modal-title" id="exampleModalLabel">Editar Usuario <?php echo $fila['nombre']; ?></h3>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                <i class="fa fa-times" aria-hidden="true" style="color: #7ED957;"></i>
</button>

            </div>
            <div class="modal-body">

            <form action="../includes_crudusers/functions.php" method="POST" onsubmit="return validarYEnviarFormulario()">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $fila['nombre']; ?>" required>

                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" id="apellido" name="apellido" class="form-control" value="<?php echo $fila['apellido']; ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="text" name="edad" id="edad" class="form-control" value="<?php echo $fila['edad']; ?>">

                    </div>

                    <div class="col-12">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="text" name="correo" id="correo" class="form-control" value="<?php echo $fila['correo']; ?>">

                    </div>

                    <div class="col-12">
                        <label for="passwor " class="form-label">Contraseña</label>
                        <input type="text" name="passwor" id="passwor" class="form-control" value="<?php echo $fila['passwor']; ?>">

                    </div>

                    <div class="col-12">
                        <label for="yourPassword" class="form-label">Rol</label>
                        
                        <input type="text" name="id_rol" id="id_rol" class="form-control" value="<?php echo $fila['id_rol']; ?>">
                    </div>



                    <input type="hidden" name="accion" value="editar">
                    <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                    <br>

                    <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" style="background-color: #0B44B7; color: white; border-radius: 5px; display: block; margin: 0 auto;">Actualizar</button>
                    <button type="button" class="btn btn-dark" data-dismiss="modal" style="background-color: red; color: white; border-radius: 5px; display: block; margin: 0 auto;">Cancelar</button>


                    </div>

            </div>
            </form>
        </div>
    </div>
</div>