<?php 
    require_once("../clases/sesion/sesion.php");
    Sesion::VerificarSesion();
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $idContacto = $_GET['id'];
        $_SESSION['id-contacto'] = $idContacto;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar - contacto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="../css/head.css">
    <link rel="stylesheet" href="../css/edit.css">
</head>
<body>
    <header>
        <div class="search">
            <input type="search" class="input" name="q" id="" placeholder="Buscar...">
        </div>
        <div class="user">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path fill-rule="evenodd" d="M7,16 L17,16 C19.7614237,16 22,18.2385763 22,21 C22,21.5522847 21.5522847,22 21,22 C20.4871642,22 20.0644928,21.6139598 20.0067277,21.1166211 L19.9949073,20.8237272 C19.9070404,19.3072462 18.6927538,18.0929596 17.1762728,18.0050927 L17,18 L7,18 C5.34314575,18 4,19.3431458 4,21 C4,21.5522847 3.55228475,22 3,22 C2.44771525,22 2,21.5522847 2,21 C2,18.3112453 4.12230671,16.1181819 6.78311038,16.0046195 L7,16 L17,16 L7,16 Z M12,2 C15.3137085,2 18,4.6862915 18,8 C18,11.3137085 15.3137085,14 12,14 C8.6862915,14 6,11.3137085 6,8 C6,4.6862915 8.6862915,2 12,2 Z M12,4 C9.790861,4 8,5.790861 8,8 C8,10.209139 9.790861,12 12,12 C14.209139,12 16,10.209139 16,8 C16,5.790861 14.209139,4 12,4 Z"/>
       </svg>

        </div>
    </header>
    <main class="main">
        <article class='contact'>
            <?php 
                require_once("../clases/contacto/contact.php");
                $idContacto  = $_SESSION['id-contacto'];
                $objContacto = new Contactos();
                $contacto = $objContacto->obtenerUnContacto($idContacto);
                $tipoCelular = $contacto['TELEFONO_CONTACTO'][0]['TIPO'];
                $options;
                switch($tipoCelular){
                    case "trabajo":
                        $options = '
                        <option value="trabajo" selected>Trabajo</option>
                        <option value="personal" >Personal</option>
                        <option value="casa" >Casa</option>
                        ';
                    break;
                    case "personal":
                        $options = '
                        <option value="trabajo">Trabajo</option>
                        <option value="personal" selected >Personal</option>
                        <option value="casa" >Casa</option>
                        ';
                    break;
                    case "casa":
                        $options = '
                        <option value="trabajo">Trabajo</option>
                        <option value="personal">Personal</option>
                        <option value="casa" selected>Casa</option>
                        ';
                    break;
                    default:
                        $options = '
                        <option value="trabajo">Trabajo</option>
                        <option value="personal">Personal</option>
                        <option value="casa">Casa</option>
                        ';
                }
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
            <form action='../acciones/edit.php' method='POST'>
                <div class='content-info'>
                        <label for='nombre' class='label'>Nombre</label>
                        <input type='text' class='input' name='nombre' id='' value='{$contacto['NOMBRE_CONTACTO'][0]['NOMBRE_CONTACTO']}'>
                        <label for='email' class='label'>Email</label>
                        <input type='text' class='input' name='email' value='{$contacto['EMAIL_CONTACTO'][0]['EMAIL_CONTACTO']}'>
                        <label for='telefono' class='label'>Telefono</label>
                        <input type='tel' class='input' name='telefono' value='{$contacto['TELEFONO_CONTACTO'][0]['TELEFONO_CONTACTO']}' pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}'>
                        <select name='type' class='select'>
                            {$options}
                        </select>
                        <input type='hidden' name='id' value='{$idContacto}'>
                </div>
                <div class='buttons'>
                    <input type='submit' class='button' value='Confirmar cambios' name='editar'>
                    <input type='submit'  class='button' value='Cancelar' name='cancelar'>
                </div>
            </form>
                        "
                    );
            ?>
        </article>
    </main>
</body>
</html>