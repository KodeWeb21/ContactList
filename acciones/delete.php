<?php 
    require_once("../clases/contacto/contact.php");
    require_once("../clases/redirect/redirect.php");
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $objContacto = new Contactos();
        $idContacto = $_GET['id'];
        session_start();
        $idUsuario = $_SESSION['id'];
        $objContacto->deleteContacto($idContacto,1);
        Redirect::irAlIndex();
    }