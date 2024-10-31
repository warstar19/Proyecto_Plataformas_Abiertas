<?php
class conexion{

    //Atributos
    private $server = "localhost";
    private $bd = "proyectophp";
    private $user = "root";
    private $password = "";
    private $conn;

    //metodos
    public function crear_conexion(){
        //Crear la conexión a la base de datos
        try{
            $this->conn = new PDO('mysql:host='.$this->server.';dbname='.$this->bd.'', $this->user, $this->password);
            return $this->conn;
        }catch(PDOException $e){
            die('Error al conectarse a MySQL('.$e.')');
        }  
    }

    public function cerrar_conexion(){
        //Cerrar la conexión a la base
        $this->conn = null;
    }
}

?>