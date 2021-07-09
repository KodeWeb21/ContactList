<?php 
    require_once("../clases/redirect/redirect.php");

    class Sesion{

        public function crearSesion($id){
            session_start();
            $_SESSION['id'] = $id;
            Redirect::irAlHome();
        }

        public function cerrarSesion(){
            session_start();
            session_destroy();
            Redirect::irAlIndex();
        }

        public function VerificarSesion(){
            session_start();
            if(!isset($_SESSION['id'])){
                Redirect::irAlIndex();
                exit();
            }
        }
    }

