<?php 
     require_once("clases/sesion/sesion.php");
     require_once("clases/redirect/redirect.php");
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['logOut'])){
        Sesion::cerrarSesion();
    }
   }else{
       Redirect::irAlHome();
   }

