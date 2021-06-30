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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Agregar Contacto</title>
</head>
<body>
<form action="add.php" method="POST" class="login">
        <div class="field">
            <label for="nombre" class="label">Nombre</label>
            <div class="control">
                <input type="text" id="nombre" class="input" name="nombre">
            </div>
        </div>
        <div class="field">
            <label for="email" class="label">Email</label>
            <div class="control">
                <input type="email" class="input" name="email">
            </div>
        </div>
        <div class="field">
            <label for="telefono" class="label">Telefono</label>
            <div class="control">
                <input type="tel" class="input" id="telefono" name="telefono">
            </div>
            <div class="select" style="margin:15px;">
                <select name="type">
                    <option value="casa">Casa</option>
                    <option value="trabajo">Trabajo</option>
                    <option value="personal">Personal</option>
                </select>
            </div>
        </div>
        <input type="submit" value="Crear Contacto" class="button is-light  is-link">
    </form>
</body>
</html>