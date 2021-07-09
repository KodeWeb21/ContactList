<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      require_once("../clases/usuario/usuario.php");  
      require_once("../clases/sesion/verificar.php");
      require_once("../clases/redirect/redirect.php");
      $idUsuario = $_SESSION['id']['ID_USUARIO'];
        if(
            isset($_POST['nombre']) && 
            isset($_POST['email']) && 
            isset($_POST['telefono'])&&
            isset($_POST['type']) &&
            !empty($_POST['nombre']) &&
            !empty($_POST['email']) &&
            !empty($_POST['telefono'])&&
            !empty($_POST['type']) &&
            isset($_POST['crear'])){
                $regexTelefono = '/(809|829)-\d{3}-\d{4}/';
                $nombreContacto = $_POST['nombre'];
                $emailContacto = $_POST['email'];
                $telefono = $_POST['telefono'];
                $tipo = $_POST['type'];
                
                $objUsuario = new Usuario();
                $objUsuario->crearContacto($idUsuario,$nombreContacto,$emailContacto,$telefono, $tipo);
                Redirect::irAlHome();
            }else{
                Redirect::irAlHome();
            }
    }