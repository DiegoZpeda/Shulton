<?php 
    include "menu.php"; 
    include "db.php"; 
    
    $sql="SELECT * FROM `chat`";
    $query = mysqli_query($conexion,$sql);
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    /* El estilo permanece igual */
    h2 {
        color: #fff; 
        font-size: 2.5rem; 
        font-family: 'Average', sans-serif; 
        line-height: 1.3;
        margin-bottom: 1rem; 
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2); 
    }
    label {
        color: #0B44B7; 
        font-size: 1.875rem; 
        font-family: 'Average', sans-serif; 
        line-height: 1.3;
        margin-bottom: 0.5rem; 
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1); 
    }
    span{
        color:#424345;
        font-weight:bold;
    }
    .container {
        margin-top: 3%;
        width: 60%;
        background-color: #ffffff;
        padding-right:10%;
        padding-left:10%;
        padding: 10px 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);   
    }
    .btn-primary {
        background-color: #0B44B7;
    }
    .display-chat{
        height:300px;
        background-color:#ffffff; 
        margin-bottom:4%;
        overflow:auto;
        padding:15px;
        font-family: 'Average', sans-serif;
    }
    .message{
        background-color: #cee3fc;
        color:#2c3e50 ;
        border-radius: 5px;
        padding: 5px;
        margin-bottom: 3%;
    }
    .form-group {
        margin-bottom: 0;
    }
    .form-control {
        height: 100%;
        resize: none;
    }
    .btn1 {
        background-color: #0B44B7;
        border: none;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 8px;
        transition: background-color 0.3s;
    }
    .btn1:hover {
        background-color: #0056b3;
    }
    .welcome-container {
        background-color: rgba(11, 68, 183, 0.5);
        color: #fff; 
        padding: 30px;
        text-align: center;
        border-radius: 8px;
        position: relative; 
        margin: 20px;
        position: relative;
    }
    .welcome-container h2 {
        margin: 0;
        font-size: 28px;
        font-weight: bold;
    }
    .welcome-container p {
        font-size: 22px;
        margin-top: 10px;
        margin-bottom: 20px;
    }
    .back-icon {
        position: absolute;
        top: 20px;
        left: 20px;
        font-size: 24px;
        color: #fff;
        text-decoration: none;
    }
    .back-icon:hover {
        color: #f0f0f0;
    }
</style>

<script>
    $(document).ready(function() {
        // Función para cargar los mensajes cada 5 segundos
        function cargarMensajes() {
            $.ajax({
                url: "cargarMensajes.php", // Archivo que devuelve los mensajes
                method: "GET",
                success: function(data) {
                    $('#display-chat').html(data); // Actualiza el contenedor del chat con los nuevos mensajes
                }
            });
        }

        // Llama a la función al cargar la página
        cargarMensajes();

        // Repite la función cada 5 segundos
        setInterval(cargarMensajes, 1000 );
    });
</script>
<script>
    $(document).ready(function(){
        var trigger = $('.container .display-chat '),
            container = $('#content');
        
        trigger.on('click', function(){
            var $this = $(this),
            target = $this.data('target');       
            container.load(target + '.php');
            return false;
        });
    });
</script>

<br><br>

<div class="container">
    <div class="welcome-container">
        <a href="usuario.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <h2>¡Bienvenid@ a Shulton Parking!</h2>
        <p> Estamos encantados de tenerte aquí, puedes realiza cualquier consulta que tengas.</p>
    </div>

    <div class="display-chat" id="display-chat">
    <?php
        if(mysqli_num_rows($query)>0)
        {
            while($row = mysqli_fetch_assoc($query))    
            {
    ?>
        <div class="message">
            <p>
                <span><?php echo $row['nombre']; ?> :</span>
                <?php echo $row['message']; ?>
            </p>
        </div>
    <?php
            }
        }
        else
        {
    ?>
        <div class="message">
            <p>No hay ninguna conversación previa.</p>
        </div>
    <?php
        } 
    ?>
    </div>
  
    <form class="form-horizontal" method="post" action="sendMessageUsu.php">
        <div class="form-group row">
            <div class="col-sm-10">
                <textarea name="msg" class="form-control" placeholder="Ingresa tu mensaje acá..."></textarea>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn1">Enviar</button>
            </div>
        </div>
    </form>
</div>

</body>
</html>
