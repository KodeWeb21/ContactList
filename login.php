<?php 
    require_once("clases/login.php");
    require_once("clases/sesion.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['correo']) && isset($_POST['clave'])){
            $correoUsuario = $_POST['correo'];
            $clave = $_POST['clave'];
            $user = Login::logearUsuario($correoUsuario,$clave);
            
            if(!$user){
                echo 'El usuario no existe';
                exit();
            }
    
            $idUser = $user[0];
            Sesion::crearSesion($idUser);
        }
    }else{
        header("Location:index.php");
    }
?>