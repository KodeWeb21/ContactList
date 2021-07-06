<?php 
    require_once("../clases/conexion/conexion.php");
    class Contactos{

        /*
            SCOPE_IDENTITY() devuelve el ultimo identity generado en el mismo ambito.   
        */

        public function crearContacto($userId, $nombreContacto, $emailContacto, $telefono, $tipo){
            try{
                $conect = new ConexionSQLSERVER();
                $query = 
                "INSERT INTO CONTACTO(NOMBRE_CONTACTO,ID_USUARIO) VALUES ('$nombreContacto',
                '$userId')
                DECLARE @ultimoID INT 
                SELECT @UltimoID = SCOPE_IDENTITY()
                INSERT INTO TELEFONO(ID_CONTACTO,TELEFONO_CONTACTO,TIPO) VALUES (@ultimoID,'$telefono','$tipo')   
                INSERT INTO EMAIL(ID_CONTACTO,EMAIL_CONTACTO) VALUES (@ultimoID,'$emailContacto') ";
                $contacto = $conect->ejecutarQuery($query);
            }catch(Exception $error){
                echo 'Ocurrio un error'.$error->getMessage();
            }
        }

        private function obtenerIdContactos($userId){
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

        public function obtenerUnContacto($idContacto){
            
            $contactoNombre = $this->obtenerNombreContacto($idContacto);
            if($contactoNombre){
                $contactoEmail = $this->obtenerEmailContactos($idContacto);
                $contactoTelefono = $this->ObtenerTelefonoContactos($idContacto);
                $infoContacto = array(
                    "ID_CONTACTO"=>$idContacto,
                    "NOMBRE_CONTACTO"=>$contactoNombre,
                    "EMAIL_CONTACTO"=>$contactoEmail,
                    "TELEFONO_CONTACTO"=>$contactoTelefono
                );
                return $infoContacto;
            }

            throw new Exception('No se pudo obtener el contacto');
        }

        public function editarNombreContacto($nuevoNombre,$idContacto){
            $conect = new ConexionSQLSERVER();
            $query = "UPDATE CONTACTO SET NOMBRE_CONTACTO = '$nuevoNombre' WHERE ID_CONTACTO = $idContacto";
            $conect->ejecutarQuery($query);
        }

        public function editarEmailContacto($nuevoEmail, $idContacto){
            $conect = new ConexionSQLSERVER();
            $query = "UPDATE EMAIL SET EMAIL_CONTACTO = '$nuevoEmail' WHERE ID_CONTACTO = $idContacto";
            $conect->ejecutarQuery($query);
        }

        public function editarTelefonoContacto($nuevoTelefono, $nuevoTipo,  $idContacto){
            $conect = new ConexionSQLSERVER();
            $query = "UPDATE TELEFONO SET TELEFONO_CONTACTO = '$nuevoTelefono', TIPO = '$nuevoTipo' WHERE ID_CONTACTO = $idContacto";
            $conect->ejecutarQuery($query);
        }

        public function deleteContacto($idContacto,$idUsuario){
            $conect = new ConexionSQLSERVER();
            $query = "DELETE FROM CONTACTO WHERE ID_CONTACTO = $idContacto AND ID_USUARIO = $idUsuario
                      DELETE FROM EMAIL WHERE ID_CONTACTO = $idContacto
                      DELETE FROM TELEFONO WHERE ID_CONTACTO = $idContacto";
            $conect->ejecutarQuery($query);
        }
    }