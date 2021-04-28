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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <main class="main">
        <?php 
        require_once("clases/contact.php");
        $idUsuario =  $_SESSION['id']['ID_USUARIO'];
        $objContactos = new Contactos();
        $contactos = $objContactos->obtenerContactos($idUsuario);
        // echo '<pre>';
        // print_r($contactos);
        // echo '</pre>';
            foreach ($contactos as $key => $contacto) {
                echo "<div class='card '>";
                $contador = 0;
                echo "<div class='card-header'>";
                echo "<div class='card-header-title'> ".$contacto['NOMBRE_CONTACTO'][0]['NOMBRE_CONTACTO']."</div>"; 
               echo "</div>";
               echo "<div class='card-content'>";
               echo "<div class='content'> ";
                do{
                    echo "<div class='content-text'>";
                    echo "<span class='card-text' >".$contacto['TELEFONO_CONTACTO'][$contador]['TIPO']." :</span>";
                    echo "<span class='card-text'>".$contacto['TELEFONO_CONTACTO'][$contador]['TELEFONO_CONTACTO']."</span>";
                    echo "</div>";
                    $contador++;
                }while($contador < count($contacto['TELEFONO_CONTACTO']));
                echo "<div class='content-text'>";
               echo "<span class='card-text'>Email :</span>";
               echo "<span class='card-text'>".$contacto['EMAIL_CONTACTO'][0]['EMAIL_CONTACTO']."</span>";
               echo "</div>";
               echo "</div>";
               echo "</div>";
               echo "<footer class='card-footer'>";
               echo "<a class='card-footer-item' href='?action=edit&id=".$contacto['ID_CONTACTO'][0]."'>Editar</a>";
               echo "<a class='card-footer-item' href='?action=delete&id=".$contacto['ID_CONTACTO'][0]."'>Borrar</a>";
               echo "</footer>";
               echo "</div>";
               echo "</div>";
               echo "</div>";
            }
    ?>
    </main>
    <form action="logout.php" method="POST" class="logout">
        <input type="submit" value="Cerrar Sesion" name="logOut" class="button is-dark">
    </form>
</body>
</html>

<?php 
    // while($contador < count($contacto['TELEFONO_CONTACTO'])){
    //     echo "<td>".$contacto['TELEFONO_CONTACTO'][$contador]['TELEFONO_CONTACTO']."</td>";
    //     echo "<td>".$contacto['TELEFONO_CONTACTO'][$contador]['TIPO']."</td>";
    //     $contador++;
    // }
    // echo "<td>".$contacto['EMAIL_CONTACTO'][0]['EMAIL_CONTACTO']."</td>";
    // echo "</tr>";
?>