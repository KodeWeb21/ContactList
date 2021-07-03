<?php 
    require_once("../clases/contact.php");
    require_once("../clases/redirect.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['nombre']) &&
           !empty($_POST['nombre']) &&
           isset($_POST['email']) &&
           !empty($_POST['email']) &&
           isset($_POST['telefono']) &&
           !empty($_POST['telefono']) &&
           isset($_POST['type']) &&
           !empty($_POST['type']) &&
           isset($_POST['id']) &&
           !empty($_POST['id'])&&
           !isset($_POST['cancelar'])){
               $nombre = $_POST['nombre'];
               $email = $_POST['email'];
               $telefono = $_POST['telefono'];
               $tipo = $_POST['type'];
                $idContacto = $_POST['id'];

               $contacto = new Contactos();
               $contacto->editarNombreContacto($nombre,$idContacto);
               $contacto->editarEmailContacto($email,$idContacto);
               $contacto->editarTelefonoContacto($telefono, $tipo, $idContacto);
           }
           Redirect::irAlHome();
           exit();
    }