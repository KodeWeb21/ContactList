<?php 
    session_start();
    if(isset($_SESSION['id'])){
            header("Location:home.php");
        }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Agenda Telefonica</title>
</head>
<body>
    <form action="login.php" method="POST" class="login">
        <div class="field">
            <label for="email" class="label">Email</label>
            <div class="control">
                <input type="email" id="email" class="input" placeholder="Email" name="correo">
            </div>
        </div>
        <div class="field">
            <label for="password" class="label">Contraseña</label>
            <div class="control">
                <input type="password" class="input" id="password" placeholder="Contraseña" name="clave">
            </div>
        </div>
        <input type="submit" value="Iniciar Sesion" class="button is-light  is-link">
    </form>
</body>
</html>