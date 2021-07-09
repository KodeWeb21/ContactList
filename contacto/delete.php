<?php 
    require_once("../clases/usuario/usuario.php");
    require_once("../clases/redirect/redirect.php");
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $objUsuario = new Usuario();
        $idContacto = $_GET['id'];
        session_start();
        $idUsuario = $_SESSION['id'];
        $objUsuario->deleteContacto($idContacto,1);
        Redirect::irAlIndex();
    }