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
    
        // public function obtenerDepartamentos(){
        //     // Llama a la funcion conectar que se encuentra en esta clase
        //     $conexion = $this->conectar();
    
        //     // Selecciona todos los departamentos.
        //     $sql = 'SELECT * FROM DEPARTAMENTOS';
    
        //     //ejecuta el query en la base de datos y devuelve un objeto PDOStatement o False
        //     $departamento = $conexion->query($sql);
    
        //     //devuelve un array indexado por los nombres de las columnas del conjunto de resultados.
        //     $departamentos = $departamento->fetchAll(PDO::FETCH_ASSOC);
    
        //     //codifica el array a un formato JSON y lo imprime con la funcion echo
        //     echo json_encode($departamentos);
        // }
    
        // public function obtenerUsuarios(){
        //     $conexion = $this->conectar();
    
        //     $sql = 'SELECT * FROM TBLUSUARIO';
    
        //     $respuesta = $conexion->query($sql);
    
        //     $usuarios = $respuesta->fetchAll(PDO::FETCH_ASSOC);
            
        //     echo json_encode($usuarios);
        // }
    
        // public function ingresarUsuario(string $usuario, string $nombre, string $password, string $rol, bool $isactive){
        //     $conexion = $this->conectar();
    
        //     $sql = "INSERT INTO TBLUSUARIO(USUARIO, NOMBRE, CONTRASEÑA, ROL, ISACTIVE) VALUES ('$usuario', '$nombre', '$password', '$rol', '$isactive')";
            
        //    $respuesta = $conexion->query($sql);
    
        //     if($respuesta != false){
        //         echo json_encode(array("message"=>"Usuario insertado correctamente"));
        //     }else{
        //         echo 'Hay un error';
        //     }
      
        // }
    
        // public function obtenerDatos($querySql){
        //     $conexion = $this->conectar();
    
        //     $respuesta = $conexion->query($querySql);
    
        //     if($respuesta == false){
        //        return false;
        //     }
    
        //     $allRespuesta = $respuesta->fetchAll(PDO::FETCH_ASSOC);
        //     echo json_encode($allRespuesta);
    
        // }
    
        // public function InsertarDatos($querySql){
        //     $conexion = $this->conectar();
    
        //     $respuesta = $conexion->query($querySql);
    
        //     if($respuesta == false){
        //         return false;
        //      }else{
        //          return true;
        //      }
        // }
    } 
