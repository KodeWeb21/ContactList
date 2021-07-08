<?php 
     require_once("../clases/sesion/sesion.php");
     require_once("../clases/redirect/redirect.php");
   if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['sesion'])){
        Sesion::cerrarSesion();
    }
   }else{
       Redirect::irAlHome();
   }

