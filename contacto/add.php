<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      require_once("../clases/contact.php");  
      require_once("../clases/sesion.php");
      Sesion::VerificarSesion();
      $idUsuario = $_SESSION['id']['ID_USUARIO'];
        if(
            isset($_POST['nombre']) && 
            isset($_POST['email']) && 
            isset($_POST['telefono'])&&
            isset($_POST['type'])){
                $regexTelefono = '/(809|829)-\d{3}-\d{4}/';
                $nombreContacto = $_POST['nombre'];
                $emailContacto = $_POST['email'];
                $telefono = $_POST['telefono'];
                $tipo = $_POST['type'];
                
                $objContacto = new Contactos();
                $objContacto->crearContacto($idUsuario,$nombreContacto,$emailContacto,$telefono, $tipo);
                header("Location:../my/home.php");
            }
    }