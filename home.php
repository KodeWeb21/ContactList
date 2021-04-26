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
    <?php 
        require_once("clases/contact.php");
        $idUsuario =  $_SESSION['id']['ID_USUARIO'];
        $objContactos = new Contactos();
        $contactos = $objContactos->obtenerContactos($idUsuario);
        // echo '<pre>';
        // print_r($contactos);
        // echo '</pre>';
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Telefono</th>";
        echo "<th>Tipo</th>";
        echo "<th>Telefono 2</th>";
        echo "<th>Tipo</th>";
        echo "<th>Telefono 3</th>";
        echo "<th>Tipo</th>";
        echo "<th>Email</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
            foreach ($contactos as $key => $contacto) {
                $contador = 0;
                echo "<tr>";
                echo "<td>".$contacto['NOMBRE_CONTACTO'][0]['NOMBRE_CONTACTO']."</td>";
                while($contador < count($contacto['TELEFONO_CONTACTO'])){
                    echo "<td>".$contacto['TELEFONO_CONTACTO'][$contador]['TELEFONO_CONTACTO']."</td>";
                    echo "<td>".$contacto['TELEFONO_CONTACTO'][$contador]['TIPO']."</td>";
                    $contador++;
                }
                echo "<td>".$contacto['EMAIL_CONTACTO'][0]['EMAIL_CONTACTO']."</td>";
                echo "</tr>";
            }

        echo "</tbody>";
        echo"</table>";
    ?>
    <form action="logout.php" method="POST">
        <input type="submit" value="Cerrar Sesion" name="logOut">
    </form>
</body>
</html>

