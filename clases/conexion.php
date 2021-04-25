<?php 
    class ConexionSQLSERVER {
        private string $usuario = '';
        private string $nombre_del_servidor = 'localhost';
        private string $nombreBaseDeDatos = 'LabProyecto';
        private string $password = '';
        

        public function conectar(){
            //De esta forma nos conectamos a sql server por medio de la autenticacion de window
            $conexion =   new PDO("sqlsrv:Server=$this->nombre_del_servidor;Database=$this->nombreBaseDeDatos", NULL, NULL);
    
            /*
                Si no nos conectamos por medio de la autenticacion de windows a sql server debemos utilizar 
                la instruccion que esta comentada mas abajo.
            */
            //$conexion = new PDO("sqlsrv:Server=$this->nombre_del_servidor;Database=$this->nombreBaseDeDatos", $this->usuario, $this->password);
    
            return $conexion;
        }

        public function ejecutarQuery($query){
            $conect = $this->conectar();
            $results = $conect->query($query);
            return $results->fetchAll(PDO::FETCH_ASSOC);
        }
    
    } 
