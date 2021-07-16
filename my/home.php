<?php 
    require_once("../clases/sesion/verificar.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Telefonica</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/head.css">
</head>
<body>
    <header>
        <form class="search" action="../contacto/search.php" method="GET">
            <input type="search" class="input" name="q" id="" placeholder="Buscar...">
        </form>
        <div class="user">
            <div class="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M7,16 L17,16 C19.7614237,16 22,18.2385763 22,21 C22,21.5522847 21.5522847,22 21,22 C20.4871642,22 20.0644928,21.6139598 20.0067277,21.1166211 L19.9949073,20.8237272 C19.9070404,19.3072462 18.6927538,18.0929596 17.1762728,18.0050927 L17,18 L7,18 C5.34314575,18 4,19.3431458 4,21 C4,21.5522847 3.55228475,22 3,22 C2.44771525,22 2,21.5522847 2,21 C2,18.3112453 4.12230671,16.1181819 6.78311038,16.0046195 L7,16 L17,16 L7,16 Z M12,2 C15.3137085,2 18,4.6862915 18,8 C18,11.3137085 15.3137085,14 12,14 C8.6862915,14 6,11.3137085 6,8 C6,4.6862915 8.6862915,2 12,2 Z M12,4 C9.790861,4 8,5.790861 8,8 C8,10.209139 9.790861,12 12,12 C14.209139,12 16,10.209139 16,8 C16,5.790861 14.209139,4 12,4 Z"/>
                </svg>
            </div>
            <div class="button logout">
                <a href="../logout/logout.php?sesion=<?php echo session_id()?>" class="logout-link">
                    <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11 20H6a2 2 0 01-2-2V6a2 2 0 012-2h5M20 12l-4-4m4 4l-4 4m4-4H10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
            </div>
        </div>
    </header>
    <main class="main">
       <section class="contactos">
       <?php
        require_once("../clases/usuario/usuario.php"); 
        $idUsuario = $_SESSION['id'];
        $objUsuario = new Usuario();
        $contactos = $objUsuario->obtenerContactos($idUsuario['ID_USUARIO']);
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
                        <a href='../contacto/delete.php?id={$contacto['ID_CONTACTO']}' class='button'>Eliminar</a>
                    </div>
                </div>
            </article>
            "
           );
       }
    ?>
       </section>
    </main>
       <div class="content-add">
       <a href="../contacto/contact.php" class="addlink">
            <button type="submit" class="addbtn">+</button>
            </a>
      </div>
</body>
</html>
