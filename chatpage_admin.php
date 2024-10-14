<?php 
	session_start();
	if(isset($_SESSION['correo']))
	{
		include "Menu_adm.php";
		include "db.php"; 
		
		$sql="SELECT * FROM `chat`";

		$query = mysqli_query($conexion,$sql);
?>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

<!-- FontAwesome (si usas íconos) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!-- jQuery (si usas Bootstrap 4 o anterior) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>

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
		background-color:#ffffff; /* color de contenido*/
		margin-bottom:4%;
		overflow:auto;
		padding:15px;
        font-family: 'Average', sans-serif;
	}
	.message{
		background-color: #cee3fc; /* color de texto*/
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
    resize: none; /* evita el cambio de tamaño del textarea */
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
  color: #f0f0f0; /* Cambia el color al pasar el cursor */
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
        // Set trigger and container variables
        var trigger = $('.container .display-chat '),
            container = $('#content');
        
        // Fire on click
        trigger.on('click', function(){
          // Set $this for re-use. Set target from data attribute
          var $this = $(this),
            target = $this.data('target');       
          
          // Load target page into container
          container.load(target + '.php');
          
          // Stop normal link behavior
          return false;
        });
      });
    </script>

</br>
</br>

<div class="container">

<div class="welcome-container">
        <a href="menu_admin.php" class="back-icon"><i class="fas fa-arrow-left"></i></a> <!-- Enlace al que quieres regresar -->
        <h2>¡Bienvenid@ Administrador!</h2>
        <p> Consultas de Usuarios.</p>
    </div>

   <div class="display-chat" id = "display-chat">
<?php
	if(mysqli_num_rows($query)>0)
	{
		while($row= mysqli_fetch_assoc($query))	
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
			<p>
				No hay ninguna conversación previa.
			</p>
</div>
<?php
	} 
?>

  </div>


  
  
  <form class="form-horizontal" method="post" action="sendMessage_admin.php">
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

<?php
	}
	else
	{
		// header('location:index.php');
	}
?>
