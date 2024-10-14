<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" style="background-color: #7ED957; color: #ffffff;">
                <h3 class="modal-title" id="exampleModalLabel">Agregar Usuario</h3>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                <i class="fa fa-times" aria-hidden="true" style="color: #7ED957;"></i>
            </div>
            <div class="modal-body">
                <form id="registroForm" action="../includes_crudusers/upload.php" method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" id="apellido" name="apellido" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="text" name="edad" id="edad" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="text" name="correo" id="correo" class="form-control" required>
                        <div id="emailError" class="invalid-feedback"></div>
                    </div>

                    <div class="col-12">
                        <label for="passwor" class="form-label">Contraseña</label>
                        <input type="passwor" name="passwor" id="passwor" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <label for="id_rol" class="form-label">Rol</label>
                    
                        <select class="form-control" name="id_rol" id="id_rol" required>
                                <option value="">Seleccionar</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                        </select>       
                        
                    <!-- <input type="passwor" name="id_rol" id="id_rol" class="form-control" required>-->
                    </div>

                    <br>

                    <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" id="register" name="registrar" style="background-color: blue; color: white; border-radius: 5px; display: block; margin: 0 auto;">Guardar</button>
                    <button type="button" class="btn btn-dark" data-dismiss="modal" style="background-color: red; color: white; border-radius: 5px; display: block; margin: 0 auto;">Cancelar</button>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registroForm');
    const emailInput = document.getElementById('correo');
    const emailError = document.getElementById('emailError');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    form.addEventListener('submit', function(event) {
        const inputs = form.querySelectorAll('input');
        let isValid = true;
        
        inputs.forEach(input => {
            if (input.value.trim() === '') {
                isValid = false;
            }
        });

        if (!emailRegex.test(emailInput.value.trim())) {
            emailError.textContent = 'Por favor ingresa un correo electrónico válido.';
            emailInput.classList.add('is-invalid');
            isValid = false;
        } else {
            emailError.textContent = '';
            emailInput.classList.remove('is-invalid');
        }
        
       //if (!isValid) {
           // event.preventDefault();
           // alert('Por favor completa todos los campos correctamente.');
        //}
    });
});
</script>
</body>
</html>