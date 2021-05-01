<?php 
    require_once("clases/sesion.php");
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['logOut'])){
        Sesion::cerrarSesion();
    }
   }else{
        header('Location:index.php');
   }

