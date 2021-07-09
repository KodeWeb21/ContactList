<?php 
    require_once("../clases/registro/registro.php");
    require_once("../clases/login/login.php");
    require_once("../clases/sesion/sesion.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['nombre']) &&
        !empty($_POST['nombre']) &&
        isset($_POST['correo']) &&
        !empty($_POST['correo']) &&
        isset($_POST['clave']) &&
        !empty($_POST['clave'])){
            $nombre = $_POST['nombre'];
            $email = $_POST['correo'];
            $clave = $_POST['clave'];
            $objRegistro = new Registro();
            $registrado = $objRegistro->logearUsuario($nombre,$email,$clave);
                $login = new Login();
                $user = $login->logearUsuario($email,$clave);
                $idUser = $user[0];
                $objSesion = new Sesion();
                $objSesion->crearSesion($idUser);
            
        }
    }else{
        exit();
    }
