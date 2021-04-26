<?php 
    require_once("conexion.php");
    class contactos{
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
    }