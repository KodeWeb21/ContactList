<?php 
    require_once("clases/sesion.php");
    Sesion::VerificarSesion();
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
    <h1>Bienvenido</h1>
    <form action="logout.php" method="POST">
        <input type="submit" value="Cerrar Sesion" name="logOut">
    </form>
</body>
</html>

