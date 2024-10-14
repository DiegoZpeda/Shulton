<!DOCTYPE html>
<html>
<head>
	<title>Google Maps - Rutas</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/css/base.css">
	<script type="text/javascript" src=""></script>
	<script type="text/javascript" src="<?=BASE_URL?>/js/jquery.js"></script>
	<script type="text/javascript" src="<?=BASE_URL?>/js/functions.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shulton Parking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Average&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/dise.css">

<style>
         /* importar form de tipo de letra  */
@import url('https://fonts.googleapis.com/css2?family=Average&display=swap');

.content1 {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh; /* asegura al tamaño de la ventana*/
    background-color: #FFFFFF; 
    padding-top: 50px; /* espacio parte superior */
}


.container1 {
    background-color: #FFFFFF;
    border-radius: 8px; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
    padding: 20px;
    max-width: 800px; 
    width: 100%; 
}
        h1 {
            text-align: center;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        button {
    padding: 10px 20px;
    background-color: #0B44B7; 
    color: #fff;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    opacity: 0.8; 
}


button.delete-btn {
    background-color: #dc3545;
}

button.delete-btn:hover {
    opacity: 0.8; 
}

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        td:last-child {
            text-align: center;
        }

        td button {
            margin-right: 5px;
        }

        .btn.btn-primary {
            background-color: #7ED957;
            color: white;
        }
        
        .btn.btn-primary:hover {
            background-color: darkgreen;
        }

        h1 {
            color: #7ED957;
            font-weight: normal; 
        }
        h2{
color:white;
  }
  label2{
color:white;
  }
  span{
	  color:#98BD89;
	  font-weight:bold;
  }
  .container {
    margin-top: 3%;
    width: 60%;
    background-color: #26262b9e;
    padding-right:10%;
    padding-left:10%;
  }
  .btn-primary {
    background-color: #0B44B7;
	}
	.display-chat{
		height:300px;
		background-color:#98BD89;
		margin-bottom:4%;
		overflow:auto;
		padding:15px;
	}
	.message{
		background-color: #0B44B7;
	
		color: white;
		border-radius: 5px;
		padding: 5px;
		margin-bottom: 3%;
	}
    </style>


</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="background-color: #ffffff;">
    <a class="navbar-brand" href="#" style="color: #7ED957; font-family: 'Average', serif;">Shulton Parking</a>
</nav>

<div class="container-fluid">
    <div class="row">
        <!-- Menú lateral -->
        <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="menu_admin.php">
                            <i class="fas fa-home mr-2"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./usuarios/crud_usuarios.php">
                            <i class="fas fa-user mr-2"></i> Administrar Usuarios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="crud_rutas.php">
                            <i class="fas fa-route mr-2"></i> Administrar Rutas
                        </a>
                    </li>

                    <li class="nav-item">
                    <a class="nav-link" href="quienesomos_admin.php">
                    <i class="fas fa-users mr-2"></i> Quiénes Somos
                    </a>
                </li>
                    
                <li class="nav-item">
                        <a class="nav-link" href="#" onclick="salir()">
                            <i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        </br>
</br>
</br>
