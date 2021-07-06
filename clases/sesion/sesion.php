<?php 
    require_once("../clases/redirect/redirect.php");

    class Sesion{
        static function crearSesion($id){
            session_start();
            $_SESSION['id'] = $id;
            Redirect::irAlHome();
        }

        static function cerrarSesion(){
            session_start();
            session_destroy();
            Redirect::irAlIndex();
        }

        static function VerificarSesion(){
            session_start();
            if(!isset($_SESSION['id'])){
                Redirect::irAlIndex();
                exit();
            }
        }
    }

