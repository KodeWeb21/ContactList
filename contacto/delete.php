<?php 
    require_once("../clases/contact.php");
    require_once("../clases/redirect.php");
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $objContacto = new Contactos();
        $idContacto = $_GET['id'];
        session_start();
        $idUsuario = $_SESSION['id'];
        $objContacto->deleteContacto($idContacto,1);
        Redirect::irAlIndex();
    }