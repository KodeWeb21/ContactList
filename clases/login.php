<?php 
    require_once("conexion.php");

    class Login{
        static function logearUsuario($email, $clave){
        $ObjConexion = new ConexionSQLSERVER();
        $smt = $ObjConexion->conectar();
        $sql = "SELECT ID_USUARIO FROM USUARIO WHERE EMAIL_USUARIO='$email' AND CONTRASEÑA='$clave' " ;
        $user = $smt->query($sql);
        if(!$user){
            echo 'No existe el usuario';
            return false;
        }

        return $user->fetchAll(PDO::FETCH_ASSOC);
        }
    }
