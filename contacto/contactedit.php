<?php 
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $idContacto = $_GET['id'];
        session_start();
        $_SESSION['id-contacto'] = $idContacto;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar - contacto</title>
    <link rel="stylesheet" href="../css/head.css">
    <link rel="stylesheet" href="../css/edit.css">
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
        <article class='contact'>
            <?php 
                require_once("../clases/contact.php");
                $idContacto  = $_SESSION['id-contacto'];
                $objContacto = new Contactos();
                $contacto = $objContacto->obtenerUnContacto($idContacto);
                $_SESSION['id-contacto'] = "";
                print_r(
                        "
            <header>
                <div class='content-abreviatura'>
                    <h3 class='abreviatura'>
                    {$contacto['NOMBRE_CONTACTO'][0]['NOMBRE_CONTACTO'][0]}
                    </h3>
                </div>
            </header>
            <form action='edit.php' method='POST'>
                <div class='content-info'>
                        <label for='nombre'>Nombre</label>
                        <input type='text' name='nombre' id='' value='{$contacto['NOMBRE_CONTACTO'][0]['NOMBRE_CONTACTO']}'>
                        <label for='email'>Email</label>
                        <input type='text' name='email' value='{$contacto['EMAIL_CONTACTO'][0]['EMAIL_CONTACTO']}'>
                        <label for='telefono'>Telefono</label>
                        <input type='tel' name='telefono' value='{$contacto['TELEFONO_CONTACTO'][0]['TELEFONO_CONTACTO']}' pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}'>
                        <select name='type'>
                            <option value='{$contacto['TELEFONO_CONTACTO'][0]['TIPO']}' checked>
                                {$contacto['TELEFONO_CONTACTO'][0]['TIPO']}
                            </option>
                            <option>

                            </option>

                        </select>
                        <input type='hidden' name='id' value='{$idContacto}'>
                </div>
                <div class='buttons'>
                    <input type='submit' value='Confirmar cambios' name='editar'>
                    <input type='submit' value='Cancelar' name='cancelar'>
                </div>
            </form>
                        "
                    );
            ?>
        </article>
    </main>
</body>
</html>