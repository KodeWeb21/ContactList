<?php 
    require_once("../clases/sesion.php");
    Sesion::VerificarSesion();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Telefonica</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/head.css">
</head>
<body>
    <header>
        <h3 class="tool">Configuracion</h3>
        <div class="search">
            <input type="search" name="q" id="" placeholder="Buscar...">
        </div>
        <div class="user">
            <span>Usuario</span>
        </div>
    </header>
    <main class="main">
       <section class="contactos">
       <?php
        require_once("../clases/contact.php"); 
        $idUsuario = $_SESSION['id'];
        $objContactos = new Contactos();
        $contactos = $objContactos->obtenerContactos($idUsuario['ID_USUARIO']);
       foreach($contactos as $key=>$contacto){
           print_r(
               "
                <article class='card'>
                <div class='content-name'>
                <span class='abreviatura'>
                {$contacto['NOMBRE_CONTACTO'][0]['NOMBRE_CONTACTO'][0]}
                </span>
                </div>
                <div class='content-text'>
                    <h3 class='nombre'>{$contacto['NOMBRE_CONTACTO'][0]['NOMBRE_CONTACTO']}</h3>
                    <div class='buttons'>
                    <a href='../contacto/contactedit.php?id={$contacto['ID_CONTACTO']}' class='button'>Editar</a>
                    <a href='../contacto/delete.php'?id={$contacto['ID_CONTACTO']} class='button'>Eliminar</a>
                    </div>
                </div>
            </article>
            "
           );
       }
    ?>
       </section>
    </main>
</body>
</html>
