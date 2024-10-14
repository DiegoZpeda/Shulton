<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/barra.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .icon {
            font-size: 50px;
            color: green;
        }
        .email {
            font-weight: bold;
        }
        .button {
            margin-top: 20px;
        }
        .button button {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        .button button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <header>
    <?php include 'menu.php'; ?>
    </header>

    
    <div class="inputs">
</div>
<div class="container">
        <div class="icon">❌</div>
        <h2>El enlace de recuperación ha expirado.</h2>
        <p>Puedes intentar recuperar tu cuenta en el siguiente enlace:</p>
        <div  style="text-align: center;">
            <a class="login-link center-text" href="olvido_contra.php">Recuperar Cuenta</a>
            <br>    
        </div>
        <div class="button">
            <button onclick="window.location.href='index.php'">Aceptar</button>
        </div>
    </div>

</body>
</html>