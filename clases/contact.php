<?php 
    require_once("conexion.php");
    class Contactos{
        private string $nombreContacto;
        private string $emailContacto;
        private string $telefono;
        function __construct($nombreContacto, $emailContacto, $telefono){
            $this->nombreContacto = $nombreContacto;
            $this->emailContacto = $emailContacto;
            $this->telefono = $telefono;
        }

        /*
            SCOPE_IDENTITY() devuelve el ultimo identity generado en el mismo ambito.   
        */

        public function crearContacto($userId){
            $conect = new ConexionSQLSERVER();
            $query = 
            "INSERT INTO CONTACTO(NOMBRE_CONTACTO,ID_USUARIO) VALUES ('$this->nombreContacto',
            '$userId')
            DECLARE @ultimoID INT 
            SELECT @UltimoID = SCOPE_IDENTITY()
            INSERT INTO TELEFONO(ID_CONTACTO,TELEFONO_CONTACTO,TIPO) VALUES (@ultimoID,'$this->telefono','Casa')   
            INSERT INTO EMAIL(ID_CONTACTO,EMAIL_CONTACTO) VALUES (@ultimoID,'$this->emailContacto') ";
            $contacto = $conect->ejecutarQuery($query);
            return $contacto;
        }

        public function obtenerIdContactos($userId){
            $conect = new ConexionSQLSERVER();
            $query = "SELECT ID_CONTACTO from CONTACTO WHERE ID_USUARIO = $userId ";
            $idContactos = $conect->ejecutarQuery($query);
            return $idContactos;
        }

        private function obtenerEmailContactos($idContacto){
            $conect = new ConexionSQLSERVER();
            $query = "SELECT EMAIL_CONTACTO FROM EMAIL WHERE ID_CONTACTO = $idContacto ";
            $email = $conect->ejecutarQuery($query);
            return $email;
        }

        private function ObtenerTelefonoContactos($idContacto){
            $conect = new ConexionSQLSERVER();
            $query = "SELECT TELEFONO_CONTACTO, TIPO FROM TELEFONO WHERE ID_CONTACTO = $idContacto ";
            $telefono = $conect->ejecutarQuery($query);
            return $telefono;
        }

        private function obtenerNombreContacto($idContacto){
            $conect = new ConexionSQLSERVER();
            $query = "SELECT NOMBRE_CONTACTO FROM CONTACTO WHERE ID_CONTACTO = $idContacto";
            $nombreContacto = $conect->ejecutarQuery($query);
            return $nombreContacto;
        }

        public function obtenerContactos($userId){
            $contactos = array();
            $idContactos = $this->obtenerIdContactos($userId);
            foreach ($idContactos as $key => $value) {
                $idContacto = $value['ID_CONTACTO'];
                $emailContacto = $this->obtenerEmailContactos($idContacto);
                $telefonoContacto = $this->ObtenerTelefonoContactos($idContacto);
                $nombreContacto = $this->obtenerNombreContacto($idContacto);
                $informacionContacto = array(
                    'ID_CONTACTO'=>$idContacto,
                    'EMAIL_CONTACTO'=>$emailContacto, 
                    'TELEFONO_CONTACTO'=>$telefonoContacto,
                    'NOMBRE_CONTACTO'=>$nombreContacto 
                );
               array_push($contactos,$informacionContacto);
            }

            return $contactos;
        }
    }