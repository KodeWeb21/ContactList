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
    <title>Agenda Telefonica</title>
</head>
<body>
    <form action="login.php" method="POST">
        <input type="email" placeholder="Email" name="correo">
        <input type="password" placeholder="Contraseña" name="clave">
        <input type="submit" value="Iniciar Sesion">
    </form>
</body>
</html>