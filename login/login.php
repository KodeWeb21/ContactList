<?php 
    require_once("../clases/login/login.php");
    require_once("../clases/sesion/sesion.php");
    require_once("../clases/redirect/redirect.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['correo']) && isset($_POST['clave'])){
            $correoUsuario = $_POST['correo'];
            $clave = $_POST['clave'];
            $objLogin = new Login();
            $user = $objLogin->logearUsuario($correoUsuario,$clave);
            
            if(!$user){
                echo "
                <style>
                body{
                    display:grid;
                    place-items:center;
                    min-height:100vh;
                    background-color:#535c68;
                  }
                  
                  .message{
                    background:linear-gradient(to bottom left, rgba(255,0,0,.2),rgba(255,0,0,1));
                    min-height:50px;
                    display:flex;
                    align-items:center;
                    padding:1rem;
                    color:#f5f6fa;
                    font-weight:bold;
                  }
                </style>
                <div class='message'>El usuario no existe</div>
                ";
                exit();
            }
    
            $idUser = $user[0];
            $objSesion = new Sesion();
            $objSesion->crearSesion($idUser);
        }
    }else{
        Redirect::irAlIndex();
    }
