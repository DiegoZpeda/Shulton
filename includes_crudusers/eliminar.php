<div class="modal fade" id="delete<?php echo $fila['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" style="background-color: #7ED957; color: #ffffff;">
                <h3 class="modal-title" id="exampleModalLabel">Confirmar Eliminacion</h3>
                <button type="button" class="btn btn-black" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <div class="container">
                    <div class="row">
                        <dvi class="col-12 text-center">
                            <div class="alert alert-secondary">
                                <p>¿Desea eliminar el usuario <b><?php echo $fila['nombre']; ?></b>?</p>
                            </div>
                        </dvi>
                    </div>
                </div>
                <div class="row">
                    <dvi class="col-12 text-center">
                        <form action="../includes_crudusers/functions.php" method="post">
                            <input type="hidden" name="accion" value="eliminar">
                            <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">

                            <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary" style="background-color: #0B44B7; color: white; border-radius: 5px; display: block; margin: 0 auto;">Eliminar</button>
                    <button type="button" class="btn btn-dark" data-dismiss="modal" style="background-color: red; color: white; border-radius: 5px; display: block; margin: 0 auto;">Cancelar</button>
                            
                            </div>

                        </form>
                    </dvi>
                </div>


            </div>
        </div>
    </div>