<?php 
    require_once("../clases/conexion/conexion.php");
    class Registro
    {
        public function logearUsuario($nombre,$email,$clave){
            $ObjConexion = new ConexionSQLSERVER();
            
            $sql = "INSERT INTO usuario(nombre_usuario,email_usuario,contraseña) VALUES ('$nombre','$email','$clave')";

            $usuarioRegistrado = $ObjConexion->ejecutarQuery($sql);
            if(!$usuarioRegistrado){
                return false;
            }

            return true;
        }
    }

