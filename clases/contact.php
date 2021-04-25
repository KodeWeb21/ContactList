<?php 
    require_once("conexion.php");
    class contactos{
        private string $nombreContacto;
        private string $direccionContacto;
        private string $telefono;
        function __construct($nombreContacto, $direccionContacto, $telefono){
            $this->nombreContacto = $nombreContacto;
            $this->direccionContacto = $direccionContacto;
            $this->telefono = $telefono;
        }

        public function crearContacto($userId){
            $conect = new ConexionSQLSERVER();
            $query = 
            "INSERT INTO CONTACTO(NOMBRE_CONTACTO,ID_USUARIO) VALUES ('$this->nombreContacto',
            '$userId')
            DECLARE @ultimoID INT 
            SELECT @UltimoID = SCOPE_IDENTITY()
            INSERT INTO TELEFONO(ID_CONTACTO,TELEFONO_CONTACTO,TIPO) VALUES (@ultimoID,'$this->telefono','Casa')   ";
            $idContacto = $conect->ejecutarQuery($query);
            print_r($idContacto);
        }
    }

    $contacto = new Contactos('Samuel','Carretera','809-444-4444');
    $contacto->crearContacto(1);